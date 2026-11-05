<?php

namespace App\Support;

use DOMDocument;
use DOMNode;
use DOMText;
use RuntimeException;

class RichText
{
    private const ALLOWED_ELEMENTS = [
        'a', 'blockquote', 'br', 'code', 'em', 'h1', 'h2', 'h3', 'li', 'ol', 'p', 'pre', 's', 'strong', 'u',
    ];

    private const DROP_CONTENT_ELEMENTS = [
        'iframe', 'object', 'script', 'style', 'svg', 'template',
    ];

    public static function sanitize(?string $html): ?string
    {
        if ($html === null || trim($html) === '') {
            return null;
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $previousErrorSetting = libxml_use_internal_errors(true);
        try {
            $loaded = $document->loadHTML(
                '<?xml encoding="UTF-8"><!DOCTYPE html><html><body>'.$html.'</body></html>',
                LIBXML_HTML_NODEFDTD | LIBXML_NONET
            );
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previousErrorSetting);
        }

        if (! $loaded) {
            throw new RuntimeException('Unable to parse rich-text content.');
        }

        $body = $document->getElementsByTagName('body')->item(0);

        if ($body === null) {
            throw new RuntimeException('Unable to read rich-text content.');
        }

        self::sanitizeChildren($body, $document);

        $result = '';

        foreach ($body->childNodes as $child) {
            $result .= $document->saveHTML($child);
        }

        return $result;
    }

    private static function sanitizeChildren(DOMNode $parent, DOMDocument $document): void
    {
        foreach (iterator_to_array($parent->childNodes) as $child) {
            if ($child instanceof DOMText) {
                continue;
            }

            if (! $child->hasChildNodes() && $child->nodeType !== XML_ELEMENT_NODE) {
                $parent->removeChild($child);

                continue;
            }

            $tag = strtolower($child->nodeName);

            if (in_array($tag, self::DROP_CONTENT_ELEMENTS, true)) {
                $parent->removeChild($child);

                continue;
            }

            self::sanitizeChildren($child, $document);

            if (! in_array($tag, self::ALLOWED_ELEMENTS, true)) {
                while ($child->firstChild !== null) {
                    $parent->insertBefore($child->firstChild, $child);
                }

                $parent->removeChild($child);

                continue;
            }

            $href = $tag === 'a' ? self::safeLink($child->attributes?->getNamedItem('href')?->nodeValue) : null;
            $listType = $tag === 'li' ? $child->attributes?->getNamedItem('data-list')?->nodeValue : null;

            while ($child->attributes?->length > 0) {
                $child->removeAttributeNode($child->attributes->item(0));
            }

            if ($href !== null) {
                $child->setAttribute('href', $href);
                $child->setAttribute('rel', 'nofollow noopener noreferrer');
            }

            if ($tag === 'li' && in_array($listType, ['bullet', 'ordered'], true)) {
                $child->setAttribute('data-list', $listType);
            }

            if ($tag === 'ol') {
                $listItems = array_values(array_filter(
                    iterator_to_array($child->childNodes),
                    static fn (DOMNode $node): bool => $node->nodeType === XML_ELEMENT_NODE
                ));
                $bulletItems = array_filter(
                    $listItems,
                    static fn (DOMNode $node): bool => strtolower($node->nodeName) === 'li'
                        && $node->attributes?->getNamedItem('data-list')?->nodeValue === 'bullet'
                );

                if ($listItems !== [] && count($listItems) === count($bulletItems)) {
                    $list = $document->createElement('ul');

                    while ($child->firstChild !== null) {
                        $list->appendChild($child->firstChild);
                    }

                    foreach ($list->getElementsByTagName('li') as $item) {
                        $item->removeAttribute('data-list');
                    }

                    $parent->replaceChild($list, $child);

                    continue;
                }

                foreach ($listItems as $item) {
                    if (strtolower($item->nodeName) === 'li') {
                        $item->removeAttribute('data-list');
                    }
                }
            }
        }
    }

    private static function safeLink(?string $href): ?string
    {
        if ($href === null || preg_match('/[\x00-\x20\\\\]/', $href)) {
            return null;
        }

        $scheme = strtolower((string) parse_url($href, PHP_URL_SCHEME));

        if (in_array($scheme, ['http', 'https'], true) && filter_var($href, FILTER_VALIDATE_URL)) {
            return $href;
        }

        if ($scheme === 'mailto' && filter_var(substr($href, 7), FILTER_VALIDATE_EMAIL)) {
            return $href;
        }

        return str_starts_with($href, '#') ? $href : null;
    }
}
