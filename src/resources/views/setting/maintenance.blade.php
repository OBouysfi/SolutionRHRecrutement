<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-mode" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>@yield('title')</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable">
    {{-- <link rel="manifest" href="manifest.json" /> --}}

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon180.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('assets/img/favicon32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/favicon16.png') }}" sizes="16x16" type="image/png">

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
    @yield('css_header')

</head>

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">

    <main class="main h-100 container-fluid rounded-0">
        <div class="row h-100">
            <div class="col-12 col-md-12 h-100 overflow-y-auto">
                <div class="row h-100">
                    <div class="col-12 mb-auto">
                        <!-- header -->
                        <header class="header">
                            <!-- Fixed navbar -->
                            <nav class="navbar">
                                <div class="container-fluid">
                                    <div class="row">
                                        <a class="navbar-brand ms-2" href="home.html">
                                            <div class="row">
                                                <div class="col-auto"><span style="background: transparent"><img
                                                            src="{{ asset('assets/img/icon/Recruitment.png') }}"
                                                            alt="" /></span></div>

                                            </div>
                                        </a>

                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </nav>
                        </header>
                        <!-- header ends -->
                    </div>
                    <div class="col-12 align-self-center py-4 text-center" style="margin-top: -690px;">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-7 col-xl-6 col-xxl-4 text-white"
                                style="color: #000 !important;">
                                <h1 class="display-5">Redesign in progress</h1>
                                <p class="h4 fw-light mb-2">This page is currently being redesigned.</p>

                                <p class="mb-4">We are in the process of updating features and provide you a best
                                    experience.</p>


                                <br>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
    <!-- Rightbar -->
    @include('partials.rightbar')
    <!-- Rightbar ends -->

    <!-- chat window -->
    @include('partials.chatWindow')
    <!-- chat window ends -->


    <!-- Required jquery and libraries -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5/dist/js/bootstrap.bundle.js') }}"></script>

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
    <!-- <script src="assets/js/dashboard-custom.js"></script> -->

    @yield('js_footer')

</body>

</html>
