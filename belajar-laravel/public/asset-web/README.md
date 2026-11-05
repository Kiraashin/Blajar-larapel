# PrimaGraphia — Static Bootstrap 5 Site

Multi-page HTML + Bootstrap 5.3.2, disusun dari wireframe Google Stitch.

## Struktur

```
primagraphia-web/
├── index.html           # Beranda
├── katalog.html         # Katalog Semua Produk
├── detail-produk.html   # Detail Produk + Kalkulator Cetak
├── outlet.html          # Direktori Outlet Kami
├── keranjang.html       # Keranjang & Checkout
├── faq.html             # FAQ / Pusat Bantuan (konten dari primagraphia.co.id/faq)
├── kontak.html          # Hubungi Kami (data dari primagraphia.co.id/home#hubungi_kami)
├── blog.html            # Daftar artikel (12 artikel terbaru dari primagraphia.co.id/blogs)
├── blog-<judul>.html    # Detail artikel, satu file per artikel (12 file)
└── assets/
    ├── css/
    │   ├── style.css          # Theme bersama (variabel --pg-*, header, footer, komponen)
    │   ├── faq.css            # Style khusus halaman FAQ
    │   ├── kontak.css         # Style khusus halaman Hubungi Kami
    │   └── blog.css           # Style daftar & detail artikel
    └── js/
        ├── detail-produk.js   # Kalkulator harga, qty, thumbnail, checkout
        ├── outlet.js          # Filter wilayah & pencarian outlet
        ├── faq.js             # Pencarian FAQ, deep-link #id, salin tautan, feedback
        ├── kontak.js          # Validasi form & kirim kebutuhan cetak ke WhatsApp CS
        ├── blog.js            # Filter kategori & pencarian artikel
        └── blog-detail.js     # Tombol share, salin tautan, daftar isi (ScrollSpy)
```

## Alur navigasi

Beranda → Semua Produk (katalog) → Lihat Opsi / Order (detail produk) → Pesan (keranjang).
Header (logo, menu Beranda / Semua Produk / Outlet Kami, tombol keranjang), breadcrumb,
dan link footer "Outlet & Lokasi Cabang" sudah saling terhubung.

## Menjalankan

Tidak perlu build. Buka `index.html` langsung di browser, atau jalankan server statis:

```
npx serve .
```

Dependensi dimuat via CDN: Bootstrap 5.3.2, Bootstrap Icons 1.11.3, Google Fonts
(Plus Jakarta Sans, Material Symbols).
