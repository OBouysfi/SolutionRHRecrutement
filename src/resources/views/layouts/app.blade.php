<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>@yield('title')</title>
    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- swiper carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper-7.3.1/swiper-bundle.min.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">
    {{-- <link href="{{asset('assets/scss/style.css')}}" rel="stylesheet" id="style"> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        html {
            zoom: 0.8;
            }

            @media print {
            html {
                zoom: 1 !important;
            }
        }
    </style>
    @yield('head')
</head>

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">
    <!-- page loader -->
    <div class="container-fluid h-100 position-fixed loader-wrap bg-blur">
        <div class="row justify-content-center h-100">
            <div class="col-auto align-self-center text-center px-5 ">
                <h2 class="mb-1"><img src="{{ asset('assets/img/icon/Recruitment.png') }}" style="width: 509px;margin-bottom: 53px;"></h2>
                <h4 class="mb-4 text-secondary chargement-text">
                    <span class="gradient-text">
                        <b style="font-weight: 700;font-size: 29px;margin-bottom: 7px;width: 100%;display: block;">Chargement
                            en cours...</b>
                        <span style="font-size: 22px;">La maîtrise prend un instant de plus.</span>
                    </span>
                </h4>
                <div class="dotslaoder">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- page loader ends -->

    <!-- background -->
    <div class="coverimg h-100 w-100 top-0 start-0 position-absolute" id="image-daytime">
        <div class="overlay"></div>
        <img src="{{ asset('assets/img/icon/1590289.jpg') }}" alt="" class="w-100" />
    </div>
    <!-- background ends  -->

    <!-- header -->
    <header class="header">
        <!-- Fixed navbar -->
        <nav class="navbar fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/icon/Recruitment.png') }}" alt="Logo" class="img-fluid"
                            style="max-height: 40px;" />
                    </div>
                </a>
            </div>
        </nav>

    </header>
    <!-- header ends -->

    @yield('content')

    <!-- footer -->
    <footer class="footer text-white mt-auto container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 col-lg py-2">
                <img src="{{ asset('assets/img/icon/logo-footer.png') }}" style="height: 40px;">
            </div>
            {{-- <div class="col-12 col-md-12 col-lg-auto align-self-center">
                <ul class="nav small">
                    <li class="nav-item"><a class="nav-link" href="help-center.html">Support</a></li>
                    <li class="nav-item">|</li>
                    <li class="nav-item"><a class="nav-link" href="terms-of-use.html">Conditions d'utilisation</a></li>
                    <li class="nav-item">|</li>
                    <li class="nav-item"><a class="nav-link" href="privacy-policy.html">Politique de confidentialité
                        </a></li>
                </ul>
            </div> --}}
        </div>
    </footer>
    <!-- footer ends -->

    <!-- Required jquery and libraries -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5/dist/js/bootstrap.bundle.js') }}"></script>

    <!-- Customized jquery file  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/color-scheme.js') }}"></script>

    <!-- PWA app service registration and works -->
    <script src="{{ asset('assets/js/pwa-services.js') }}"></script>

    <!-- Chart js script -->
    <script src="{{ asset('assets/vendor/chart-js-3.3.1/chart.min.js') }}"></script>

    <!-- Progress circle js script -->
    <script src="{{ asset('assets/vendor/progressbar-js/progressbar.min.js') }}"></script>

    <!-- swiper js script -->
    <script src="{{ asset('assets/vendor/swiper-7.3.1/swiper-bundle.min.js') }}"></script>

    <!-- page level script -->
    <script src="{{ asset('assets/js/login.js') }}"></script>

    @stack('scripts')

</body>

</html>
<style>
    .overlay {
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        z-index: 1;
        display: block;
        position: absolute;
        background: linear-gradient(to bottom, rgba(var(--adminux-theme-rgb), 0.15) 0%, rgb(15 23 63 / 20%) 25%, rgb(4 13 54 / 90%) 100%);
    }

    .btn-theme,
    .sw-btn-next,
    .sw-btn-prev {
        background-color: #005dc7 !important;
        color: var(--adminux-theme-color);
        box-shadow: 0 4px 10px rgba(var(--adminux-theme-rgb), 0.4);
    }

    .btn-theme:focus,
    .btn-theme:hover,
    .sw-btn-next:focus,
    .sw-btn-next:hover,
    .sw-btn-prev:focus,
    .sw-btn-prev:hover {
        background-color: #8490a5;
        color: var(--adminux-theme-color);
        border-color: var(--adminux-theme-darken);
    }

    .loader-wrap {
        background-color: #ffffff !important;
        /*background-image: url("../../assets/img/icon/profil-banner.jpg");*/
    }

    #image-daytime {
        background-size: 33%;
    }

    .loader-wrap .gradient-text {
        color: #000 !important;
    }
</style>
