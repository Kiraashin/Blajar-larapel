<header class="sticky-top bg-white border-bottom shadow-sm">
        <!-- Top Utility Quick Links -->
        <div class="border-bottom py-1 bg-light d-none d-lg-block">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-1">
                    <!-- Category dropdown trigger -->
                    <div class="dropdown">
                        <button aria-expanded="false"
                            class="btn btn-sm btn-pg-primary rounded-pill px-3 py-1 dropdown-toggle fw-semibold d-flex align-items-center gap-2"
                            data-bs-toggle="dropdown" style="font-size: 0.8rem;" type="button">
                            <i class="bi bi-grid-fill"></i> Kategori
                        </button>
                        <ul class="dropdown-menu shadow border-0 mt-2 py-2"
                            style="font-size: 0.85rem; min-width: 220px;">
                            @forelse ($navCategories as $navCategory)
                                <li><a class="dropdown-item py-1 fw-medium" href="{{ route('catalog.category', $navCategory->slug) }}"><i
                                            class="{{ $navCategory->icon ?: 'bi bi-tag' }} text-primary me-2"></i> {{ $navCategory->name }}</a></li>
                            @empty
                                <li><span class="dropdown-item-text py-1 text-muted">Belum ada kategori</span></li>
                            @endforelse
                        </ul>
                    </div>
                    <nav aria-label="Navigasi Header Atas" class="d-flex align-items-center ms-2">
                        <a class="nav-top-link active" href="{{ route('home') }}"><i class="bi bi-house-door"></i> Beranda</a>
                        <a class="nav-top-link" href="{{ route('catalog.index') }}"><i class="bi bi-layers"></i> Semua Produk</a>
                        <a class="nav-top-link" href="outlet.html"><i class="bi bi-geo-alt"></i> Outlet Kami</a>
                        <a class="nav-top-link" href="faq.html"><i class="bi bi-question-circle"></i> FAQ</a>
                        <a class="nav-top-link" href="kontak.html"><i class="bi bi-telephone"></i> Hubungi Kami</a>
                        <a class="nav-top-link" href="blog.html"><i class="bi bi-journal-text"></i> Blog</a>
                    </nav>
                </div>
                <div class="d-flex align-items-center gap-3 text-muted" style="font-size: 0.8rem;">
                    <span class="d-flex align-items-center gap-1"><i class="bi bi-clock"></i> Buka Setiap Hari (09.00 -
                        18.00)</span>
                    <span class="border-end h-75"></span>
                    <span class="d-flex align-items-center gap-1 text-danger fw-semibold"><i class="bi bi-whatsapp"></i>
                        Chat CS: 0811-987-990</span>
                </div>
            </div>
        </div>
        <!-- Main Navigation Bar with Logo, Search, and Cart -->
        <div class="container py-2 py-lg-3">
            <div class="row align-items-center g-2 g-lg-3">
                <!-- Logo Container -->
                <div class="col-6 col-md-3 col-lg-3">
                    <a class="d-inline-block" href="{{ route('home') }}">
                        <img alt="PrimaGraphia - Inovasi Cetak Kekinian" class="img-fluid"
                            src="https://lh3.googleusercontent.com/aida/AEtjO1Xqry6qw2vUQSI9rgWQp5wG9IEWpNyBr_qtSHLs0JUAsLqXh5rlF2X4LRoa0DNt_DAOJoiAa20HFjC1RmkiNObcfUgNZhlveauu5OmOR3WZJi3nfPU5IPy5yiZFKD-NLxwE7ZRGzuuo8a67NDvqKEetINcB4yc10OV_Fc30AlRbnRct0nnBpNw2EJZRG-bGmv3B-Sn0d-lVpe8O2jDVhzYCi5AX782OHW5ros6SNho"
                            style="max-height: 48px; width: auto;" />
                    </a>
                </div>
                <!-- Global Search Bar Form -->
                <div class="col-12 col-md-6 col-lg-6 order-3 order-md-2">
                    <form class="d-flex align-items-center pg-search-group px-3 py-1" role="search">
                        <i class="bi bi-search text-muted me-2 fs-6"></i>
                        <input aria-label="Search" class="form-control pg-search-input p-0"
                            placeholder="Cari kartu nama, stiker, banner, box..." type="search" />
                        <button aria-label="Tombol Cari"
                            class="btn btn-sm btn-pg-primary rounded-circle ms-2 d-flex align-items-center justify-content-center"
                            style="width: 28px; height: 28px; padding: 0;" type="submit">
                            <i class="bi bi-arrow-right text-white" style="font-size: 0.85rem;"></i>
                        </button>
                    </form>
                </div>
                <!-- User Profile & Cart Controls -->
                <div
                    class="col-6 col-md-3 col-lg-3 order-2 order-md-3 d-flex align-items-center justify-content-end gap-2 gap-lg-3">
                    <!-- Tombol Masuk / Akun -->
                    <a class="btn btn-outline-secondary rounded-pill px-3 py-1 d-flex align-items-center gap-2 text-dark border-1 fw-semibold"
                        href="#" style="font-size: 0.85rem;">
                        <i class="bi bi-person-fill fs-6 text-primary"></i>
                        <span class="d-none d-sm-inline">Masuk</span>
                    </a>
                    <!-- Tombol Keranjang Belanja -->
                    <a class="btn btn-light rounded-pill px-3 py-1 d-flex align-items-center gap-2 border fw-semibold position-relative"
                        href="keranjang.html" style="font-size: 0.85rem;">
                        <div class="position-relative">
                            <i class="bi bi-cart3 fs-6 text-primary"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                style="font-size: 0.65rem;">
                                0
                            </span>
                        </div>
                        <div class="d-none d-md-flex flex-column text-start ps-1 lh-1">
                            <span class="text-muted" style="font-size: 0.7rem;">Keranjang</span>
                            <span class="fw-bold text-dark" style="font-size: 0.785rem;">Rp 0</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </header>
