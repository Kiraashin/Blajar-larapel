<div class="sidebar-wrapper" id="sidebar">
    <!-- Brand Logo / Identity -->
    <a href="{{ route('admin.dashboard.index') }}" class="sidebar-brand">
      <i class="bi bi-asterisk"></i>
      <span>{{ $settings['site_name'] ?? 'PPKD Sticker' }}</span>
    </a>

    <!-- Navigation Menu -->
    <div class="flex-grow-1 overflow-y-auto">
      <!-- Group: Menu -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Menu</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ route('admin.dashboard.index') }}"
              class="sidebar-menu-link {{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}"
              id="menu-overview" title="Dashboard">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Group: Pages -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Pages</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ route('admin.category.index') }}"
              class="sidebar-menu-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"
              id="menu-category" title="Kategori Produk">
              <i class="bi bi-tags"></i>
              <span>Kategori Produk</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('admin.product.index') }}"
              class="sidebar-menu-link {{ request()->routeIs('admin.product.*') ? 'active' : '' }}"
              id="menu-product" title="Produk">
              <i class="bi bi-box-seam"></i>
              <span>Product</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('admin.user.index') }}"
              class="sidebar-menu-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}"
              id="menu-user" title="User">
              <i class="bi bi-people"></i>
              <span>User</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('admin.settings') }}"
              class="sidebar-menu-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}"
              id="menu-settings" title="Pengaturan">
              <i class="bi bi-gear"></i>
              <span>Pengaturan</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Sidebar Profile Card (Dynamic Footer) -->
    <div class="sidebar-profile">
      <img src="{{ asset('assets/images/avatar.png') }}" alt="Administrator" class="sidebar-profile-img">
      <div class="sidebar-profile-info">
        <div class="sidebar-profile-name">{{ auth()->user()->name ?? '' }}</div>
        <div class="sidebar-profile-email">{{ auth()->user()->email ?? '' }}</div>
      </div>
    </div>
  </div>
