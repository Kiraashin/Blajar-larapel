@extends('layouts.app')
@section('content')
<!-- BEGIN: HeroPromoSection -->
        <section class="py-3 py-lg-4" data-purpose="hero-promotions">
            <div class="container">
                <!-- Hero Promotional Slider / Banner Mockup -->
                <div class="hero-banner-card p-4 p-md-5 mb-4 position-relative">
                    <div class="banner-graphic-bg position-absolute top-0 start-0 w-100 h-100 pointer-events-none">
                    </div>
                    <div class="row align-items-center position-relative z-1 g-4">
                        <!-- Promo Left Copy -->
                        <div class="col-lg-6 col-md-7 text-white">
                            <span class="badge bg-white text-danger fw-bold text-uppercase px-2.5 py-1 mb-2 rounded-2"
                                style="font-size: 0.75rem;">Baru!</span>
                            <h1 class="display-6 fw-extrabold lh-tight mb-2 fw-bold">
                                Kartu Nama <br class="d-none d-sm-inline" />Premium
                            </h1>
                            <p class="fs-6 text-white-50 mb-3 fw-medium">
                                Spot UV &amp; Foil Digital finishing mewah dan berkelas. Buat impresi pertama bisnis
                                Anda tak terlupakan.
                            </p>
                            <div class="d-flex align-items-baseline gap-2 mb-4">
                                <span class="text-white-50 fs-6">Mulai</span>
                                <span class="fs-2 fw-bold text-warning">Rp87.500</span>
                                <span class="badge bg-warning text-dark fw-bold rounded-pill px-2.5 py-1"
                                    style="font-size: 0.7rem;">Tanpa minimum order</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <a class="btn btn-light rounded-pill px-4 py-2 fw-bold text-primary shadow-sm d-inline-flex align-items-center gap-2"
                                    href="#">
                                    Lihat promo <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Promo Right Visual Display Mockup -->
                        <div class="col-lg-6 col-md-5 text-center text-md-end">
                            <div class="position-relative d-inline-block">
                                <div
                                    class="p-3 bg-white bg-opacity-10 rounded-4 border border-white border-opacity-25 shadow-lg d-inline-block">
                                    <div class="bg-dark text-white rounded-3 p-4 shadow-sm"
                                        style="width: 260px; height: 155px; transform: rotate(-4deg); background: linear-gradient(135deg, #1e293b, #0f172a);">
                                        <div class="d-flex justify-content-between align-items-start mb-4">
                                            <span class="badge bg-warning text-dark fw-bold"
                                                style="font-size: 0.65rem;">SPOT UV DIGITAL</span>
                                            <i class="bi bi-stars text-warning fs-5"></i>
                                        </div>
                                        <div class="fw-bold fs-6 tracking-wide text-uppercase">PT Prima Inovasi</div>
                                        <div class="text-white-50" style="font-size: 0.7rem;">Foil Emas Premium Finish
                                        </div>
                                    </div>
                                </div>
                                <!-- Navigation Controls Overlay -->
                                <div class="position-absolute bottom-0 end-0 d-flex gap-2 p-2">
                                    <button aria-label="Slide sebelumnya"
                                        class="btn btn-sm btn-light rounded-circle shadow-sm p-0 d-flex align-items-center justify-content-center"
                                        style="width: 32px; height: 32px;">
                                        <i class="bi bi-chevron-left"></i>
                                    </button>
                                    <button aria-label="Slide berikutnya"
                                        class="btn btn-sm btn-light rounded-circle shadow-sm p-0 d-flex align-items-center justify-content-center"
                                        style="width: 32px; height: 32px;">
                                        <i class="bi bi-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 4 USP Cards Under Banner -->
                <div class="row g-2 g-md-3">
                    <div class="col-6 col-lg-3">
                        <div class="usp-item d-flex align-items-center gap-2 gap-md-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary p-2 d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px; flex-shrink: 0;">
                                <i class="bi bi-shop fs-5"></i>
                            </div>
                            <div class="lh-sm">
                                <div class="fw-bold text-dark" style="font-size: 0.85rem;">7 outlet</div>
                                <div class="text-muted" style="font-size: 0.75rem;">di Jabodetabek</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="usp-item d-flex align-items-center gap-2 gap-md-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary p-2 d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px; flex-shrink: 0;">
                                <i class="bi bi-bag-check fs-5"></i>
                            </div>
                            <div class="lh-sm">
                                <div class="fw-bold text-dark" style="font-size: 0.85rem;">Pesan online</div>
                                <div class="text-muted" style="font-size: 0.75rem;">ambil di outlet</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="usp-item d-flex align-items-center gap-2 gap-md-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary p-2 d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px; flex-shrink: 0;">
                                <i class="bi bi-truck fs-5"></i>
                            </div>
                            <div class="lh-sm">
                                <div class="fw-bold text-dark" style="font-size: 0.85rem;">Bisa dikirim</div>
                                <div class="text-muted" style="font-size: 0.75rem;">ke seluruh Indonesia</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="usp-item d-flex align-items-center gap-2 gap-md-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary p-2 d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px; flex-shrink: 0;">
                                <i class="bi bi-download fs-5"></i>
                            </div>
                            <div class="lh-sm">
                                <div class="fw-bold text-dark" style="font-size: 0.85rem;">Unduh template</div>
                                <div class="text-muted" style="font-size: 0.75rem;">desain siap pakai</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: HeroPromoSection -->
        <!-- BEGIN: QuickCategoryGrid -->
        <section class="py-4" data-purpose="quick-categories">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h2 class="h5 fw-bold mb-0 text-dark">Mau cetak apa hari ini?</h2>
                        <p class="text-muted small mb-0">Pilihan kategori lengkap sesuai kebutuhan bisnis Anda</p>
                    </div>
                    <a class="text-primary fw-semibold small d-flex align-items-center gap-1" href="{{ route('catalog.index') }}">
                        Semua produk <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <!-- Category Grid: 11 Categories -->
                <div class="row row-cols-3 row-cols-sm-4 row-cols-md-6 row-cols-lg-11 g-2 g-md-3">
                    @forelse ($categories as $category)
                        <div class="col">
                            <a class="cat-icon-card h-100" href="{{ route('catalog.category', $category->slug) }}">
                                <div class="cat-icon-wrapper"><i class="{{ $category->icon ?: 'bi bi-tag' }}"></i></div>
                                <span class="cat-title">{{ $category->name }}</span>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-muted small">Belum ada kategori.</div>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- END: QuickCategoryGrid -->
        <!-- BEGIN: FeaturedProductsTabs -->
        <section class="py-4 bg-light" data-purpose="featured-products">
            <div class="container">
                <!-- Tab Navigation & Title Header -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <h2 class="h4 fw-bold mb-1 text-dark">Produk Pilihan</h2>
                        <p class="text-muted small mb-0">Cetak cepat berkualitas tinggi dengan harga transparan</p>
                    </div>
                    <ul class="nav nav-pills bg-white p-1 rounded-pill border" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-pill px-3 py-1 fw-semibold small"
                                data-bs-target="#new-arrivals" data-bs-toggle="pill" id="new-arrivals-tab"
                                role="tab" type="button">
                                <i class="bi bi-stars text-warning me-1"></i> Baru Datang
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill px-3 py-1 fw-semibold small text-muted"
                                data-bs-target="#best-sellers" data-bs-toggle="pill" id="best-sellers-tab"
                                role="tab" type="button">
                                <i class="bi bi-fire text-danger me-1"></i> Paling Terlaris
                            </button>
                        </li>
                    </ul>
                </div>
                <!-- Tab Content -->
                <div class="tab-content" id="productsTabContent">
                    <!-- Active Tab: New Arrivals -->
                    <div class="tab-pane fade show active" id="new-arrivals" role="tabpanel">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                            @forelse ($newProducts as $product)
                                <div class="col">
                                    <div class="product-card">
                                        <div class="product-img-container">
                                            <span class="badge bg-danger product-badge-corner">Baru</span>
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                                    class="w-100 h-100 object-fit-cover">
                                            @else
                                                <div
                                                    class="d-flex align-items-center justify-content-center text-primary fs-1 opacity-75">
                                                    <i class="bi bi-image"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-3 d-flex flex-column flex-grow-1">
                                            <div class="text-muted small mb-1">{{ $product->category->name ?? 'Tanpa Kategori' }}</div>
                                            <h3 class="h6 fw-bold mb-2 text-dark text-truncate">{{ $product->name }}</h3>
                                            <div class="mt-auto">
                                                <span class="text-muted small d-block">Mulai dari</span>
                                                <span class="fw-bold fs-6 text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-muted mb-0">Belum ada produk.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- Secondary Tab: Best Sellers -->
                    <div class="tab-pane fade" id="best-sellers" role="tabpanel">
                        <div class="row row-cols-2 row-cols-md-4 g-3">
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-img-container">
                                        <span class="badge bg-warning text-dark product-badge-corner">Terlaris</span>
                                        <i class="bi bi-postcard fs-1 text-primary opacity-75"></i>
                                    </div>
                                    <div class="p-3 d-flex flex-column flex-grow-1">
                                        <div class="text-muted small mb-1">Kartu Nama</div>
                                        <h3 class="h6 fw-bold mb-2 text-dark text-truncate">Kartu Nama Art Carton 260gr
                                        </h3>
                                        <div class="mt-auto">
                                            <span class="text-muted small d-block">Mulai dari</span>
                                            <span class="fw-bold fs-6 text-primary">Rp 18.000 <span
                                                    class="small text-muted fw-normal">/ box</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-img-container">
                                        <span class="badge bg-warning text-dark product-badge-corner">Terlaris</span>
                                        <i class="bi bi-tags-fill fs-1 text-primary opacity-75"></i>
                                    </div>
                                    <div class="p-3 d-flex flex-column flex-grow-1">
                                        <div class="text-muted small mb-1">Sticker</div>
                                        <h3 class="h6 fw-bold mb-2 text-dark text-truncate">Sticker Vinyl Waterproof
                                            Kiss-Cut</h3>
                                        <div class="mt-auto">
                                            <span class="text-muted small d-block">Mulai dari</span>
                                            <span class="fw-bold fs-6 text-primary">Rp 14.000 <span
                                                    class="small text-muted fw-normal">/ lbr</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-img-container">
                                        <span class="badge bg-warning text-dark product-badge-corner">Terlaris</span>
                                        <i class="bi bi-megaphone fs-1 text-primary opacity-75"></i>
                                    </div>
                                    <div class="p-3 d-flex flex-column flex-grow-1">
                                        <div class="text-muted small mb-1">Display Promotion</div>
                                        <h3 class="h6 fw-bold mb-2 text-dark text-truncate">Roll Up Banner Aluminium
                                            60x160</h3>
                                        <div class="mt-auto">
                                            <span class="text-muted small d-block">Mulai dari</span>
                                            <span class="fw-bold fs-6 text-primary">Rp 145.000 <span
                                                    class="small text-muted fw-normal">/ set</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-img-container">
                                        <span class="badge bg-warning text-dark product-badge-corner">Terlaris</span>
                                        <i class="bi bi-file-earmark-richtext fs-1 text-primary opacity-75"></i>
                                    </div>
                                    <div class="p-3 d-flex flex-column flex-grow-1">
                                        <div class="text-muted small mb-1">Digital Printing</div>
                                        <h3 class="h6 fw-bold mb-2 text-dark text-truncate">Brosur Flyer A5 Art Paper
                                            150gr</h3>
                                        <div class="mt-auto">
                                            <span class="text-muted small d-block">Mulai dari</span>
                                            <span class="fw-bold fs-6 text-primary">Rp 220.000 <span
                                                    class="small text-muted fw-normal">/ rim</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: FeaturedProductsTabs -->
        <!-- BEGIN: ExploreByCategory -->
        <section class="py-5" data-purpose="explore-category-catalog">
            <div class="container">
                <div class="mb-4">
                    <h2 class="h4 fw-bold mb-1 text-dark">Jelajahi Per Kategori</h2>
                    <p class="text-muted small mb-3">Temukan spesifikasi produk cetak sesuai dengan bidang usaha Anda
                    </p>
                    <!-- Category Pills Filter Bar -->
                    <div class="pg-category-pills">
                        <button class="btn pill-filter-btn active">Semua</button>
                        <button class="btn pill-filter-btn">Digital Printing</button>
                        <button class="btn pill-filter-btn">Sticker</button>
                        <button class="btn pill-filter-btn">NameCard &amp; Invitation</button>
                        <button class="btn pill-filter-btn">Display Promotion</button>
                        <button class="btn pill-filter-btn">Large Format</button>
                        <button class="btn pill-filter-btn">Garment &amp; Textile</button>
                        <button class="btn pill-filter-btn">Stationary</button>
                        <button class="btn pill-filter-btn">Packaging</button>
                        <button class="btn pill-filter-btn">Home Decor &amp; Photo</button>
                    </div>
                </div>
                <!-- Catalog Product Grid Preview -->
                <div class="row row-cols-2 row-cols-md-4 g-3">
                    <div class="col">
                        <div class="card h-100 border rounded-3 p-3 shadow-none hover-shadow">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-book text-primary fs-5"></i>
                                <span class="badge bg-light text-dark border">Katalog / Buku</span>
                            </div>
                            <h4 class="h6 fw-bold text-dark">Buku Profil Perusahaan Jilid Spiral</h4>
                            <p class="small text-muted mb-3">Cover laminasi doff / glossy, isi HVS/Art Paper kualitas
                                tajam.</p>
                            <div class="mt-auto d-flex justify-content-between align-items-end">
                                <div>
                                    <span class="d-block small text-muted" style="font-size: 0.75rem;">Mulai</span>
                                    <span class="fw-bold text-primary">Rp 25.000</span>
                                </div>
                                <button aria-label="Beli Buku"
                                    class="btn btn-sm btn-outline-primary rounded-circle"><i
                                        class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border rounded-3 p-3 shadow-none hover-shadow">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-card-image text-primary fs-5"></i>
                                <span class="badge bg-light text-dark border">Poster &amp; Canvas</span>
                            </div>
                            <h4 class="h6 fw-bold text-dark">Poster Albatros Indoor High-Res</h4>
                            <p class="small text-muted mb-3">Bahan halus tidak mudah sobek, warna cerah dan tahan lama.
                            </p>
                            <div class="mt-auto d-flex justify-content-between align-items-end">
                                <div>
                                    <span class="d-block small text-muted" style="font-size: 0.75rem;">Mulai</span>
                                    <span class="fw-bold text-primary">Rp 45.000</span>
                                </div>
                                <button aria-label="Beli Poster"
                                    class="btn btn-sm btn-outline-primary rounded-circle"><i
                                        class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border rounded-3 p-3 shadow-none border">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-box text-primary fs-5"></i>
                                <span class="badge bg-light text-dark border">Kemasan Makanan</span>
                            </div>
                            <h4 class="h6 fw-bold text-dark">Lunch Box Ivory Food Grade PE</h4>
                            <p class="small text-muted mb-3">Anti bocor minyak &amp; air, higienis untuk kemasan
                                resto/catering.</p>
                            <div class="mt-auto d-flex justify-content-between align-items-end">
                                <div>
                                    <span class="d-block small text-muted" style="font-size: 0.75rem;">Mulai</span>
                                    <span class="fw-bold text-primary">Rp 1.150</span>
                                </div>
                                <button aria-label="Beli Kemasan"
                                    class="btn btn-sm btn-outline-primary rounded-circle"><i
                                        class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border rounded-3 p-3 shadow-none border">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-flag-fill text-primary fs-5"></i>
                                <span class="badge bg-light text-dark border">Outdoor Display</span>
                            </div>
                            <h4 class="h6 fw-bold text-dark">Spanduk Flexi Korea 440gr</h4>
                            <p class="small text-muted mb-3">Tebal tahan cuaca hujan dan panas, cocok event luar
                                ruangan.</p>
                            <div class="mt-auto d-flex justify-content-between align-items-end">
                                <div>
                                    <span class="d-block small text-muted" style="font-size: 0.75rem;">Mulai</span>
                                    <span class="fw-bold text-primary">Rp 28.000 <span
                                            class="small text-muted fw-normal">/ m²</span></span>
                                </div>
                                <button aria-label="Beli Spanduk"
                                    class="btn btn-sm btn-outline-primary rounded-circle"><i
                                        class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: ExploreByCategory -->
        <!-- BEGIN: MachinesAndClientsSection -->
        <section class="py-5 bg-white border-top border-bottom" data-purpose="machines-and-clients">
            <div class="container text-center">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4 text-start">
                    <div>
                        <h2 class="h4 fw-bold mb-1 text-dark">Mesin &amp; klien kami</h2>
                        <p class="text-muted small mb-0">Didukung armada teknologi cetak modern kelas dunia untuk hasil
                            presisi</p>
                    </div>
                    <span class="badge bg-light text-muted border p-2"><i class="bi bi-shield-check text-primary"></i>
                        Standar ISO 9001</span>
                </div>
                <!-- Section: Didukung mesin cetak -->
                <div class="mb-4">
                    <div class="text-muted fw-semibold small text-uppercase tracking-wider mb-3">Didukung mesin cetak
                    </div>
                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-7 g-2 justify-content-center">
                        <div class="col">
                            <div class="partner-logo-box text-uppercase">RAPTOR II-R3</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box text-uppercase"><i
                                    class="bi bi-gear-wide-connected me-1"></i> Roland</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box text-uppercase">SEI LASER</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box text-uppercase">swissQprint</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box text-uppercase">trotec</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box text-uppercase">ZÜND G3</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box text-uppercase"><i class="bi bi-hp me-1"></i> HP Indigo</div>
                        </div>
                    </div>
                </div>
                <!-- Section: Dipercaya oleh -->
                <div class="mb-4 pt-2">
                    <div class="text-muted fw-semibold small text-uppercase tracking-wider mb-3">Dipercaya oleh</div>
                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-7 g-2 justify-content-center">
                        <div class="col">
                            <div class="partner-logo-box"><i class="bi bi-bank me-1 text-primary"></i> Mandiri</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box fw-bold">MERRY RIANA</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box fw-bold text-danger">MNC TV</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box fw-bold text-primary">OVO</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box fw-bold text-danger">PERTAMINA</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box fw-bold text-danger">Pizza Hut</div>
                        </div>
                        <div class="col">
                            <div class="partner-logo-box fw-bold text-primary">SAMSUNG</div>
                        </div>
                    </div>
                </div>
                <!-- Social link button -->
                <div class="pt-2">
                    <a class="btn btn-outline-primary btn-sm rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2"
                        href="#">
                        <i class="bi bi-instagram"></i> Ikuti @primagraphiaofficial
                    </a>
                </div>
            </div>
        </section>
        <!-- END: MachinesAndClientsSection -->
        <!-- BEGIN: BlogAndArticles -->
        <section class="py-5 bg-light" data-purpose="blog-and-articles">
            <div class="container">
                <!-- Section Title & Link -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="h4 fw-bold mb-1 text-dark">Artikel &amp; tips cetak</h2>
                        <p class="text-muted small mb-0">Edukasi dan inspirasi seputar dunia cetak dan branding</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a class="text-primary fw-semibold small d-flex align-items-center gap-1 me-2"
                            href="blog.html">
                            Semua artikel <i class="bi bi-arrow-right"></i>
                        </a>
                        <button aria-label="Artikel sebelumnya"
                            class="btn btn-sm btn-white border rounded-circle bg-white"><i
                                class="bi bi-chevron-left"></i></button>
                        <button aria-label="Artikel berikutnya"
                            class="btn btn-sm btn-white border rounded-circle bg-white"><i
                                class="bi bi-chevron-right"></i></button>
                    </div>
                </div>
                <!-- Articles Grid (3 Cards as shown in snapshot) -->
                <div class="row g-4">
                    <!-- Article 1 -->
                    <div class="col-md-4">
                        <article class="article-card">
                            <div class="bg-secondary bg-opacity-25 ratio ratio-16x9 position-relative overflow-hidden">
                                <div
                                    class="w-100 h-100 d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary">
                                    <i class="bi bi-calendar3 fs-1"></i>
                                </div>
                                <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-2 py-1 rounded-2"
                                    style="font-size: 0.7rem;">Tips &amp; Trick</span>
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <div class="text-muted small mb-2"><i class="bi bi-clock me-1"></i> 19 Okt 2024</div>
                                <h3 class="h6 fw-bold mb-2 text-dark">Tips Membuat Desain Kalender Custom agar Menarik
                                    dan Mudah Dibaca</h3>
                                <p class="text-muted small mb-3 flex-grow-1">
                                    Simak tips membuat desain kalender custom yang menarik dan mudah dibaca, mulai dari
                                    pemilihan grid tanggal hingga foto display...
                                </p>
                                <a class="text-primary fw-bold small d-inline-flex align-items-center gap-1"
                                    href="blog-tips-membuat-desain-kalender-custom-agar-menarik-dan-mudah-dibaca.html">
                                    Baca artikel <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                    <!-- Article 2 -->
                    <div class="col-md-4">
                        <article class="article-card">
                            <div class="bg-secondary bg-opacity-25 ratio ratio-16x9 position-relative overflow-hidden">
                                <div
                                    class="w-100 h-100 d-flex align-items-center justify-content-center bg-danger bg-opacity-10 text-danger">
                                    <i class="bi bi-music-note-beamed fs-1"></i>
                                </div>
                                <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-2 py-1 rounded-2"
                                    style="font-size: 0.7rem;">Event &amp; Activation</span>
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <div class="text-muted small mb-2"><i class="bi bi-clock me-1"></i> 19 Okt 2024</div>
                                <h3 class="h6 fw-bold mb-2 text-dark">5 Barang Cetakan yang Bisa Melengkapi Pengalaman
                                    Nonton Festival Musik</h3>
                                <p class="text-muted small mb-3 flex-grow-1">
                                    Mau nonton festival musik? Kenali 5 barang cetakan seperti kaos custom, tote bag,
                                    kipas, pouch, dan wristband lanyard unik...
                                </p>
                                <a class="text-primary fw-bold small d-inline-flex align-items-center gap-1"
                                    href="blog-5-barang-cetakan-yang-bisa-melengkapi-pengalaman-nonton-festival-musik.html">
                                    Baca artikel <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                    <!-- Article 3 -->
                    <div class="col-md-4">
                        <article class="article-card">
                            <div class="bg-secondary bg-opacity-25 ratio ratio-16x9 position-relative overflow-hidden">
                                <div
                                    class="w-100 h-100 d-flex align-items-center justify-content-center bg-info bg-opacity-10 text-info">
                                    <i class="bi bi-file-earmark-text fs-1"></i>
                                </div>
                                <span
                                    class="badge bg-secondary position-absolute top-0 start-0 m-3 px-2 py-1 rounded-2"
                                    style="font-size: 0.7rem;">Product</span>
                            </div>
                            <div class="p-3 d-flex flex-column flex-grow-1">
                                <div class="text-muted small mb-2"><i class="bi bi-clock me-1"></i> 19 Okt 2024</div>
                                <h3 class="h6 fw-bold mb-2 text-dark">Perbedaan Flyer, Leaflet, Brosur, dan Katalog
                                </h3>
                                <p class="text-muted small mb-3 flex-grow-1">
                                    Kenali perbedaan flyer, leaflet, brosur, dan katalog berdasarkan bentuk, fungsi,
                                    serta penggunaannya untuk pemasaran bisnis...
                                </p>
                                <a class="text-primary fw-bold small d-inline-flex align-items-center gap-1"
                                    href="blog-perbedaan-flyer-leaflet-brosur-dan-katalog.html">
                                    Baca artikel <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: BlogAndArticles -->
        <!-- BEGIN: WhatsAppBannerCTA -->
        <section class="py-4 bg-white" data-purpose="customer-service-cta">
            <div class="container">
                <div class="cta-wa-banner p-4 p-md-5">
                    <div class="row align-items-center justify-content-between g-3">
                        <div class="col-lg-8">
                            <h2 class="h4 fw-bold text-dark mb-2">Ada pertanyaan soal cetakan Anda?</h2>
                            <p class="text-muted mb-0">Chat CS PrimaGraphia lewat WhatsApp, atau datang langsung ke
                                outlet terdekat kami.</p>
                        </div>
                        <div class="col-lg-4 text-lg-end d-flex flex-wrap gap-2 justify-content-lg-end">
                            <a class="btn btn-pg-primary rounded-pill px-4 py-2 fw-semibold d-inline-flex align-items-center gap-2 shadow-sm"
                                href="#">
                                <i class="bi bi-whatsapp"></i> Chat WhatsApp
                            </a>
                            <a class="btn btn-outline-secondary rounded-pill px-3 py-2 fw-semibold d-inline-flex align-items-center gap-2"
                                href="outlet.html">
                                <i class="bi bi-geo-alt"></i> Lihat outlet
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: WhatsAppBannerCTA -->
@endsection
