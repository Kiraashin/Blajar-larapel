document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('outletSearchInput');
  const filterPills = document.querySelectorAll('.filter-pill');
  const outletItems = document.querySelectorAll('.outlet-item');
  const noResultsAlert = document.getElementById('noResultsAlert');
  const resetFilterBtn = document.getElementById('resetFilterBtn');

  let currentRegion = 'all';

  function applyFilter() {
    const query = searchInput.value.toLowerCase().trim();
    let visibleCount = 0;

    outletItems.forEach(function (item) {
      const region = item.getAttribute('data-region');
      const searchData = item.getAttribute('data-name');
      const textContent = item.innerText.toLowerCase();

      const matchesRegion = (currentRegion === 'all' || region === currentRegion);
      const matchesQuery = (!query || searchData.includes(query) || textContent.includes(query));

      if (matchesRegion && matchesQuery) {
        item.classList.remove('d-none');
        visibleCount++;
      } else {
        item.classList.add('d-none');
      }
    });

    if (visibleCount === 0) {
      noResultsAlert.classList.remove('d-none');
    } else {
      noResultsAlert.classList.add('d-none');
    }
  }

  filterPills.forEach(function (pill) {
    pill.addEventListener('click', function () {
      filterPills.forEach(function (p) {
        p.classList.remove('btn-primary', 'active');
        p.classList.add('btn-outline-secondary');
      });

      this.classList.remove('btn-outline-secondary');
      this.classList.add('btn-primary', 'active');

      currentRegion = this.getAttribute('data-filter');
      applyFilter();
    });
  });

  if (searchInput) {
    searchInput.addEventListener('input', applyFilter);
  }

  if (resetFilterBtn) {
    resetFilterBtn.addEventListener('click', function () {
      searchInput.value = '';
      currentRegion = 'all';
      filterPills.forEach(function (p) {
        p.classList.remove('btn-primary', 'active');
        p.classList.add('btn-outline-secondary');
      });
      const allPill = document.querySelector('.filter-pill[data-filter="all"]');
      if (allPill) {
        allPill.classList.remove('btn-outline-secondary');
        allPill.classList.add('btn-primary', 'active');
      }
      applyFilter();
    });
  }
});
