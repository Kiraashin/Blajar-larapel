document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('faqSearchInput');
  const clearBtn = document.getElementById('faqSearchClear');
  const content = document.getElementById('faqContent');
  const sections = document.querySelectorAll('.faq-category');
  const items = document.querySelectorAll('.faq-item');
  const navLinks = document.querySelectorAll('#faqNav .list-group-item');
  const noResults = document.getElementById('faqNoResults');
  const resultInfo = document.getElementById('faqResultInfo');
  const resultCount = document.getElementById('faqResultCount');
  const resultQuery = document.getElementById('faqResultQuery');

  const normalize = function (text) {
    return text.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '').replace(/\s+/g, ' ').trim();
  };

  // Cache searchable text once
  items.forEach(function (item) {
    item.dataset.search = normalize(item.textContent);
  });

  function refreshScrollSpy() {
    const spy = bootstrap.ScrollSpy.getInstance(content);
    if (spy) spy.refresh();
  }

  function applySearch() {
    const query = normalize(searchInput.value);
    const words = query.split(' ').filter(Boolean);
    let visibleCount = 0;

    items.forEach(function (item) {
      const match = words.every(function (w) { return item.dataset.search.includes(w); });
      item.classList.toggle('d-none', !match);
      if (match) visibleCount++;
    });

    sections.forEach(function (section) {
      const hasVisible = section.querySelector('.faq-item:not(.d-none)') !== null;
      section.classList.toggle('d-none', !hasVisible);
      const link = document.querySelector('#faqNav [href="#' + section.id + '"]');
      if (link) link.classList.toggle('d-none', !hasVisible);
    });

    clearBtn.classList.toggle('d-none', !query);
    resultInfo.classList.toggle('d-none', !query);
    noResults.classList.toggle('d-none', visibleCount > 0);
    resultCount.textContent = visibleCount;
    resultQuery.textContent = searchInput.value.trim();
    refreshScrollSpy();
  }

  searchInput.addEventListener('input', applySearch);
  clearBtn.addEventListener('click', function () {
    searchInput.value = '';
    applySearch();
    searchInput.focus();
  });

  // Open a question (or scroll to a category) by its id
  function openTarget(id, smooth) {
    const target = document.getElementById(id);
    if (!target) return false;

    if (target.classList.contains('faq-item')) {
      if (target.classList.contains('d-none')) {
        searchInput.value = '';
        applySearch();
      }
      bootstrap.Collapse.getOrCreateInstance(target.querySelector('.accordion-collapse'), { toggle: false }).show();
      target.classList.add('faq-highlight');
      setTimeout(function () { target.classList.remove('faq-highlight'); }, 2000);
    }
    target.scrollIntoView({ behavior: smooth ? 'smooth' : 'auto', block: 'start' });
    return true;
  }

  // In-page links: popular topics, category pills, cross-references inside answers
  document.addEventListener('click', function (e) {
    const link = e.target.closest('a[href^="#"]');
    if (!link || link.getAttribute('href').length < 2) return;
    const id = link.getAttribute('href').slice(1);
    if (openTarget(id, true)) {
      e.preventDefault();
      history.replaceState(null, '', '#' + id);
    }
  });

  if (location.hash) openTarget(location.hash.slice(1), false);

  // Copy permalink
  document.querySelectorAll('[data-faq-copy]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const url = location.href.split('#')[0] + '#' + btn.dataset.faqCopy;
      const label = btn.querySelector('[data-copy-label]');
      const done = function () {
        label.textContent = 'Tautan disalin';
        setTimeout(function () { label.textContent = 'Salin tautan'; }, 2000);
      };
      if (navigator.clipboard) {
        navigator.clipboard.writeText(url).then(done, function () { prompt('Salin tautan ini:', url); });
      } else {
        prompt('Salin tautan ini:', url);
      }
    });
  });

  // "Apakah jawaban ini membantu?" feedback
  document.querySelectorAll('[data-faq-vote]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const box = btn.closest('.faq-feedback');
      box.querySelectorAll('[data-faq-vote], [data-feedback-ask]').forEach(function (el) { el.classList.add('d-none'); });
      box.querySelector('[data-feedback-thanks]').classList.remove('d-none');
    });
  });

  // Keep sidebar active state in sync when ScrollSpy is not yet tracking (e.g. top of page)
  navLinks.forEach(function (link) {
    link.addEventListener('click', function () {
      navLinks.forEach(function (l) { l.classList.remove('active'); });
      link.classList.add('active');
    });
  });
});
