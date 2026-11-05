document.addEventListener('DOMContentLoaded', function () {
  const share = document.querySelector('[data-blog-share]');
  const toc = document.getElementById('blogToc');
  const url = location.href.split('#')[0];
  const title = share.dataset.title;

  // Show a placeholder instead of a broken image icon
  document.querySelectorAll('img[data-img-fallback]').forEach(function (img) {
    const fail = function () { img.parentElement.classList.add('img-missing'); };
    if (img.complete && img.naturalWidth === 0) fail();
    else img.addEventListener('error', fail);
  });

  // Share links use the current page URL
  const targets = {
    whatsapp: 'https://api.whatsapp.com/send?text=' + encodeURIComponent(title + ' ' + url),
    facebook: 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url),
    linkedin: 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(url)
  };
  share.querySelectorAll('[data-share]').forEach(function (link) {
    link.href = targets[link.dataset.share];
  });

  const nativeBtn = share.querySelector('[data-share-native]');
  if (navigator.share) {
    nativeBtn.classList.remove('d-none');
    nativeBtn.addEventListener('click', function () {
      navigator.share({ title: title, url: url }).catch(function () {});
    });
  }

  const copyBtn = share.querySelector('[data-share-copy]');
  const copyLabel = copyBtn.querySelector('[data-copy-label]');
  copyBtn.addEventListener('click', function () {
    const done = function () {
      copyLabel.textContent = 'Tautan disalin';
      setTimeout(function () { copyLabel.textContent = 'Salin tautan'; }, 2000);
    };
    if (navigator.clipboard) {
      navigator.clipboard.writeText(url).then(done, function () { prompt('Salin tautan ini:', url); });
    } else {
      prompt('Salin tautan ini:', url);
    }
  });

  // Highlight the current section in the table of contents
  if (toc) {
    new bootstrap.ScrollSpy(document.getElementById('blogContent'), {
      target: '#blogToc',
      rootMargin: '0px 0px -60%',
      smoothScroll: true
    });
  }
});
