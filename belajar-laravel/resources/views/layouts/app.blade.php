<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ $settings['site_name'] ?? 'PPKD Sticker' }} - Inovasi Cetak Kekinian | Percetakan Digital Terlengkap &amp; Terpercaya</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <!-- Google Fonts: Inter & Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- Core Theme & Layout Styles -->
    <link href="{{asset('asset-web/assets/css/style.css')}}" rel="stylesheet" />
</head>

<body>
    <!-- BEGIN: MainHeader -->
    @include('layouts._inc.header')
    <!-- END: MainHeader -->
    <main>
        @yield('content')
    </main>
    <!-- BEGIN: ComprehensiveFooter -->
    @include('layouts._inc.footer')
    <!-- END: ComprehensiveFooter -->
    <!-- BEGIN: FloatingWhatsApp -->
    <a aria-label="Hubungi WhatsApp Kami" class="floating-wa-btn" href="https://wa.me/62811987990"
        rel="noopener noreferrer" target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>
    <!-- END: FloatingWhatsApp -->
    <!-- Bootstrap 5 Bundle JS (Includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
