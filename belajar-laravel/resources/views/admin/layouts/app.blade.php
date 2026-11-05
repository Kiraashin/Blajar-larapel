<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin PPKD Sticker' }}</title>

    <!-- SEO Optimization -->
    <meta name="description" content="Panel Admin {{ $settings['site_name'] ?? 'PPKD Sticker' }}">
    <meta name="author" content="Spark Admin Team">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Local Third-Party Libraries (100% Offline Compatible) -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">

    <!-- Main Design System & Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    @stack('styles')
</head>

<body>

    <!-- ==========================================
         START: Sidebar Component
         Highly polished, dark-green navigation
         ========================================== -->
    @include('admin.layouts.inc.sidebar')
    <!-- ==========================================
         END: Sidebar Component
         ========================================== -->


    <!-- ==========================================
         START: Main Content Area
         ========================================== -->
    <div class="main-wrapper">

        <!-- START: Top Navbar Component -->
        @include('admin.layouts.inc.header')
        <!-- END: Top Navbar Component -->

        <!-- START: Page Header Banner -->
        <div class="page-header">
            <div>
                <h1 class="page-title">@yield('title')</h1>
                <p class="page-subtitle">@yield('subtitle')</p>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"
                            class="text-decoration-none text-muted-green">Home</a></li>
                    <li class="breadcrumb-item active text-main" aria-current="page">@yield('title')</li>
                </ol>
            </nav>
        </div>
        <!-- END: Page Header Banner -->

        <!-- START: Page Content Area -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible mb-3">
                <i class="bi bi-check-circle-fill me-2"></i>
                <strong>Success:</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible mb-3">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                <strong>Error:</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible mb-3">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Peringatan:</strong> Terdapat beberapa kesalahan pengisian form:
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card p-4 border-light shadow-sm h-100">
            @yield('content')
        </div>
        <!-- END: Page Content Area -->


        <!-- START: Footer Component -->
        <footer class="footer-custom">
            <div class="footer-left">
                <span class="footer-logo">
                    <i class="bi bi-asterisk"></i> PPKD Sticker Admin
                </span>
                <span class="footer-separator">|</span>
                <span class="footer-copy">&copy; {{ date('Y') }} Made with <i
                        class="bi bi-heart-fill text-danger footer-heart"></i> by<a
                        href="https://sparkadminpro.gumroad.com/" target="_blank">Aira Sastri</a>• Distributed by <a
                        href="https://www.themewagon.com/" target="_blank">ThemeWagon</a> </span>
            </div>

        </footer>
        <!-- END: Footer Component -->

    </div>
    <!-- ==========================================
         END: Main Content Area
         ========================================== -->

    <!-- Local Third-Party Libraries Script dependencies -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Local dashboard interactions controller -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    @stack('scripts')
</body>

</html>
