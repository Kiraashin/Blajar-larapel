@props([
    'name',
    'label',
    'value' => '',
    'rows' => 6,
])

@php
    $editorId = 'rich-text-'.str_replace(['[', ']'], '-', $name);
    $labelId = $editorId.'-label';
@endphp

<div class="mb-3" data-rich-text>
    <label id="{{ $labelId }}" for="{{ $editorId }}-input" class="form-label-custom">{{ $label }}</label>
    <textarea id="{{ $editorId }}-input" name="{{ $name }}" rows="{{ $rows }}" class="form-control"
        data-rich-text-input>{{ old($name, $value) }}</textarea>
    <div id="{{ $editorId }}" data-rich-text-editor aria-labelledby="{{ $labelId }}" style="min-height: 220px;"
        hidden></div>
    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/libs/quill/quill.snow.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/quill/quill.js') }}"></script>
        <script>
            document.querySelectorAll('[data-rich-text]').forEach((container) => {
                const input = container.querySelector('[data-rich-text-input]');
                const editor = container.querySelector('[data-rich-text-editor]');

                if (!input || !editor || typeof Quill === 'undefined') {
                    return;
                }

                const quill = new Quill(editor, {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ header: [1, 2, 3, false] }],
                            [{ list: 'ordered' }, { list: 'bullet' }],
                            ['link', 'clean'],
                        ],
                    },
                });

                if (input.value.trim()) {
                    quill.clipboard.dangerouslyPasteHTML(input.value);
                }

                quill.root.setAttribute('aria-labelledby', editor.getAttribute('aria-labelledby'));
                input.hidden = true;
                editor.hidden = false;
                input.form?.addEventListener('submit', () => {
                    input.value = quill.getText().trim() ? quill.root.innerHTML : '';
                });
            });
        </script>
    @endpush
@endonce
