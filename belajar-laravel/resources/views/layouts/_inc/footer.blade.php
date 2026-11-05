<footer class="main-footer pt-5" data-purpose="site-footer">
        <div class="container pb-4">
            <div class="row g-4">
                <!-- Col 1: Brand Info, Address, Socials & Newsletter -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="mb-3">
                        @if (! empty($settings['site_logo']))
                            <div class="p-2 bg-white rounded-3 d-inline-block">
                                <img alt="{{ $settings['site_name'] ?? 'PPKD Sticker' }}"
                                    src="{{ asset('storage/' . $settings['site_logo']) }}"
                                    style="height: 38px; width: auto;" />
                            </div>
                        @else
                            <span class="fs-4 fw-bold text-white">{{ $settings['site_name'] ?? 'PPKD Sticker' }}</span>
                        @endif
                    </div>
                    <p class="small text-secondary mb-3 lh-base">
                        <i class="bi bi-geo-alt-fill text-danger me-1"></i>
                        {!! \App\Support\RichText::sanitize($settings['address'] ?? null) !!}
                    </p>
                    <!-- Social Icons -->
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <a aria-label="Shopee"
                            class="btn btn-sm btn-dark rounded-circle border border-secondary text-white"
                            href="{{ $settings['url_shopee'] ?? '' }}"><i class="bi bi-bag"></i></a>
                        <a aria-label="Facebook"
                            class="btn btn-sm btn-dark rounded-circle border border-secondary text-white"
                            href="{{ $settings['url_facebook'] ?? '' }}"><i class="bi bi-facebook"></i></a>
                        <a aria-label="Instagram"
                            class="btn btn-sm btn-dark rounded-circle border border-secondary text-white"
                            href="{{ $settings['url_instagram'] ?? '' }}"><i class="bi bi-instagram"></i></a>
                        <a aria-label="YouTube"
                            class="btn btn-sm btn-dark rounded-circle border border-secondary text-white"
                            href="{{ $settings['url_youtube'] ?? '' }}"><i class="bi bi-youtube"></i></a>
                        <a aria-label="TikTok"
                            class="btn btn-sm btn-dark rounded-circle border border-secondary text-white"
                            href="{{ $settings['url_tiktok'] ?? '' }}"><i class="bi bi-tiktok"></i></a>
                    </div>
                    <!-- Newsletter Subscribe -->
                    <div class="footer-newsletter">
                        <span class="d-block fw-semibold text-white small mb-2">Berlangganan newsletter kami</span>
                        <form class="input-group input-group-sm">
                            <input aria-label="Email Anda" class="form-control bg-dark border-secondary text-white"
                                placeholder="Email Anda" type="email" />
                            <button class="btn btn-pg-red px-3" type="button">Berlangganan</button>
                        </form>
                    </div>
                </div>
                <!-- Col 2: Kategori Produk -->
                <div class="col-6 col-md-3 col-lg-3">
                    <h4 class="footer-title">Kategori Produk</h4>
                    <ul class="footer-links-list">
                        <li><a href="#">Digital Printing</a></li>
                        <li><a href="#">Sticker</a></li>
                        <li><a href="#">NameCard &amp; Invitation</a></li>
                        <li><a href="#">Display Promotion</a></li>
                        <li><a href="#">Large Format</a></li>
                        <li><a href="#">Garment &amp; Textile</a></li>
                        <li><a href="#">Stationary</a></li>
                        <li><a href="#">Merchandise</a></li>
                        <li><a href="#">Packaging</a></li>
                        <li><a href="#">Home Decor &amp; Photo</a></li>
                        <li><a href="#">Parade Display</a></li>
                    </ul>
                </div>
                <!-- Col 3: Tentang Kami & Bantuan -->
                <div class="col-6 col-md-3 col-lg-3">
                    <h4 class="footer-title">Bantuan &amp; Info</h4>
                    <ul class="footer-links-list">
                        <li><a href="#">Solusi Korporat</a></li>
                        <li><a href="#">Cara Pemesanan</a></li>
                        <li><a href="kontak.html">Hubungi Kami</a></li>
                        <li><a href="faq.html">FAQ (Tanya Jawab)</a></li>
                        <li><a href="#">Tentang Perusahaan</a></li>
                        <li><a href="blog.html">Blog &amp; Edukasi</a></li>
                        <li><a href="outlet.html">Outlet &amp; Lokasi Cabang</a></li>
                        <li><a href="#">Unduh Template Desain</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat &amp; Ketentuan</a></li>
                    </ul>
                </div>
                <!-- Col 4: Kontak & Jam Operasional -->
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="footer-title">Hubungi Kami</h4>
                    <div class="mb-3 small">
                        <div class="d-flex align-items-center gap-2 mb-2 text-white">
                            <i class="bi bi-whatsapp text-success fs-5"></i>
                            <div>
                                <div class="text-secondary" style="font-size: 0.75rem;">CS chat only</div>
                                <div class="fw-bold">{{ $settings['phone'] ?? '' }}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-2 text-white">
                            <i class="bi bi-envelope text-primary fs-5"></i>
                            <div>
                                <div class="text-secondary" style="font-size: 0.75rem;">Upload file</div>
                                <div class="fw-semibold">{{ $settings['email_upload'] ?? '' }}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-3 text-white">
                            <i class="bi bi-envelope-open text-warning fs-5"></i>
                            <div>
                                <div class="text-secondary" style="font-size: 0.75rem;">Order custom</div>
                                <div class="fw-semibold">{{ $settings['email_order'] ?? '' }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- Jam Operasional Card -->
                    <div class="p-3 rounded-3 bg-dark border border-secondary border-opacity-50 small">
                        <div class="d-flex align-items-center gap-2 text-white fw-bold mb-2">
                            <i class="bi bi-clock-history text-info"></i> Jam Operasional
                        </div>
                        <div class="d-flex justify-content-between text-secondary mb-1">
                            <span>Senin - Jumat</span>
                            <span class="text-white fw-medium">09.00 - 18.00</span>
                        </div>
                        <div class="d-flex justify-content-between text-secondary mb-1">
                            <span>Sabtu</span>
                            <span class="text-white fw-medium">08.00 - 16.00</span>
                        </div>
                        <div class="d-flex justify-content-between text-secondary">
                            <span>Minggu &amp; Tgl Merah</span>
                            <span class="badge bg-danger text-white">Libur</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Value Badges Assurance Strip -->
        <div class="footer-trust-bar py-3">
            <div class="container">
                <div class="row g-3 text-white">
                    <div class="col-6 col-md-3 d-flex align-items-center gap-2">
                        <i class="bi bi-tags-fill text-danger fs-4"></i>
                        <div>
                            <div class="fw-bold small">Harga kompetitif</div>
                            <div class="text-secondary" style="font-size: 0.72rem;">Harga terjangkau</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 d-flex align-items-center gap-2">
                        <i class="bi bi-award-fill text-primary fs-4"></i>
                        <div>
                            <div class="fw-bold small">Garansi</div>
                            <div class="text-secondary" style="font-size: 0.72rem;">Hasil berkualitas</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 d-flex align-items-center gap-2">
                        <i class="bi bi-speedometer2 text-warning fs-4"></i>
                        <div>
                            <div class="fw-bold small">Pengiriman cepat</div>
                            <div class="text-secondary" style="font-size: 0.72rem;">Diantar ke alamat Anda</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 d-flex align-items-center gap-2">
                        <i class="bi bi-shield-lock-fill text-success fs-4"></i>
                        <div>
                            <div class="fw-bold small">Pembayaran aman</div>
                            <div class="text-secondary" style="font-size: 0.72rem;">Bersertifikat SSL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Copyright & Payment Methods -->
        <div class="container py-3">
            <div class="row align-items-center justify-content-between g-2">
                <div class="col-md-6 text-center text-md-start">
                    <div
                        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-start gap-2 mb-2">
                        <span class="small text-secondary me-2">Metode pembayaran:</span>
                        <span class="badge bg-light text-dark fw-bold">VISA</span>
                        <span class="badge bg-light text-dark fw-bold">Mastercard</span>
                        <span class="badge bg-light text-dark fw-bold">BCA</span>
                        <span class="badge bg-light text-dark fw-bold">Mandiri</span>
                        <span class="badge bg-light text-dark fw-bold">BNI</span>
                        <span class="badge bg-light text-dark fw-bold">BRI</span>
                        <span class="badge bg-light text-dark fw-bold">QRIS</span>
                        <span class="badge bg-light text-dark fw-bold">GoPay</span>
                        <span class="badge bg-light text-dark fw-bold">OVO</span>
                    </div>
                    <p class="text-secondary small mb-0" style="font-size: 0.785rem;">
                        Copyright © 2026 PT PRIMAGRAPHIA TEKNOLOGI. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end gap-3 text-secondary"
                        style="font-size: 0.785rem;">
                        <a href="#">Unduh Template</a>
                        <span>•</span>
                        <a href="faq.html">FAQ</a>
                        <span>•</span>
                        <a href="#">Kebijakan Privasi &amp; Keamanan</a>
                        <span>•</span>
                        <a href="#">Syarat &amp; Ketentuan</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
