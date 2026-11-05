document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('blogSearchInput');
  const pills = document.querySelectorAll('[data-blog-filter]');
  const items = document.querySelectorAll('.blog-item');
  const noResults = document.getElementById('blogNoResults');
  const resetBtn = document.getElementById('blogResetBtn');

  let currentCategory = 'all';

  // Show a placeholder instead of a broken image icon
  document.querySelectorAll('img[data-img-fallback]').forEach(function (img) {
    const fail = function () { img.parentElement.classList.add('img-missing'); };
    if (img.complete && img.naturalWidth === 0) fail();
    else img.addEventListener('error', fail);
  });

  const normalize = function (text) {
    return text.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '').replace(/\s+/g, ' ').trim();
  };

  items.forEach(function (item) {
    item.dataset.search = normalize(item.textContent);
  });

  function applyFilter() {
    const words = normalize(searchInput.value).split(' ').filter(Boolean);
    let visibleCount = 0;

    items.forEach(function (item) {
      const matchesCategory = currentCategory === 'all' || item.dataset.category === currentCategory;
      const matchesQuery = words.every(function (w) { return item.dataset.search.includes(w); });
      const visible = matchesCategory && matchesQuery;
      item.classList.toggle('d-none', !visible);
      if (visible) visibleCount++;
    });

    noResults.classList.toggle('d-none', visibleCount > 0);
  }

  function setCategory(category) {
    const pill = document.querySelector('[data-blog-filter="' + category + '"]');
    if (!pill) return;
    currentCategory = category;
    pills.forEach(function (p) { p.classList.toggle('active', p === pill); });
    applyFilter();
  }

  pills.forEach(function (pill) {
    pill.addEventListener('click', function () {
      setCategory(pill.dataset.blogFilter);
      history.replaceState(null, '', currentCategory === 'all' ? location.pathname : '#' + currentCategory);
    });
  });

  searchInput.addEventListener('input', applyFilter);

  resetBtn.addEventListener('click', function () {
    searchInput.value = '';
    setCategory('all');
    history.replaceState(null, '', location.pathname);
  });

  // Category deep link from article breadcrumb, e.g. blog.html#product
  if (location.hash) setCategory(location.hash.slice(1));
});
