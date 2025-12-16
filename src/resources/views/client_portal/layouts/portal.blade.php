<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-mode" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- chosen css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/chosen_v1.8.7/chosen.min.css') }}">

    <!-- date range picker -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper-7.3.1/swiper-bundle.min.css') }}">

    <!-- simple lightbox css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/simplelightbox/simple-lightbox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/dropzone5-9-3/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/tagsinput/bootstrap-tagsinput.css') }}">

    <!-- app tour css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/Product-Tour-Plugin-jQuery/lib.css') }}">

    <!-- Footable table master css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fooTable/css/footable.bootstrap.min.css') }}">

    <!-- style css for this template -->
    <link href="{{ asset('assets/scss/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('css_header')

    <!-- style css for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled menu-close"
    data-sidebarstyle="sidebar-pushcontent">
    <!-- page loader -->
    @include('client_portal.partials.loader')
    <!-- page loader ends -->

    <!-- Header -->
    @include('client_portal.partials.header')
    <!-- Header ends -->

    <!-- Sidebar -->
    @include('client_portal.partials.sidebar')
    <!-- Sidebar ends -->

    <!-- Begin page content -->
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5/dist/js/bootstrap.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.chosenoptgroup').chosen({
                width: '100%',
                no_results_text: "Aucun résultat trouvé",
                placeholder_text_single: "Sélectionnez un choix",
            });
        });
    </script>

    <!-- Customized jquery file  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/color-scheme.js') }}"></script>

    <!-- PWA app service registration and works -->
    <script src="{{ asset('assets/js/pwa-services.js') }}"></script>

    <!-- date range picker -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>

    <!-- chosen script -->
    <script src="{{ asset('assets/vendor/chosen_v1.8.7/chosen.jquery.min.js') }}"></script>

    <!-- Chart js script -->
    <script src="{{ asset('assets/vendor/chart-js-3.3.1/chart.min.js') }}"></script>

    <!-- Progress circle js script -->
    <script src="{{ asset('assets/vendor/progressbar-js/progressbar.min.js') }}"></script>

    <!-- swiper js script -->
    <script src="{{ asset('assets/vendor/swiper-7.3.1/swiper-bundle.min.js') }}"></script>

    <!-- Simple lightbox script -->
    <script src="{{ asset('assets/vendor/simplelightbox/simple-lightbox.jquery.min.js') }}"></script>

    <!-- app tour script-->
    <script src="{{ asset('assets/vendor/Product-Tour-Plugin-jQuery/lib.js') }}"></script>
    <!-- tags input -->
    <script src="{{ asset('assets/vendor/tagsinput/bootstrap-tagsinput.min.js') }}"></script>

    <!-- ckeditor input -->
    <script src="{{ asset('assets/vendor/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <!-- Footable table master script-->
    <script src="{{ asset('assets/vendor/fooTable/js/footable.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/dropzone5-9-3/dropzone.min.js') }}"></script>

    <!-- page level script here -->
    <script src="{{ asset('assets/js/header-title.js') }}"></script>

    <script>
        /* Switch Light Mode to Dark Mode */
        function toggleTheme() {
            let htmlElement = document.documentElement;
            let themeIcon = document.getElementById('theme-icon');
            let logo = document.getElementById('logo');
            if (htmlElement.classList.contains('dark-mode')) {
                // Switch to Light Mode
                htmlElement.classList.remove('dark-mode');
                htmlElement.classList.add('light-mode');
                themeIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
                localStorage.setItem('theme', 'light');
            } else {
                // Switch to Dark Mode
                htmlElement.classList.remove('light-mode');
                htmlElement.classList.add('dark-mode');
                themeIcon.classList.replace('bi-sun-fill', 'bi-moon-fill');
                localStorage.setItem('theme', 'dark');
            }
        }

        //  event listener to button
        document.getElementById('theme-toggle-client').addEventListener('click', toggleTheme);
        /* End Switch */
    </script>
    @yield('js_footer')

</body>

</html>
