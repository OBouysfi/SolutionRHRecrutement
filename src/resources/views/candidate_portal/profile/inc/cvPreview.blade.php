<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="NI9WPU8xPqOt076CBU6hJ8eBiqpRRCBY53S0TX57">

    <title>Preview Vivier Talents</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable">


    <!-- Favicons -->

    <link rel="icon" href="/assets/img/icon/HJ_icon_black_back.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/assets/img/icon/HJ_icon_black_back.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- chosen css -->
    <link rel="stylesheet" href="/assets/vendor/chosen_v1.8.7/chosen.min.css">

    <!-- date range picker -->
    <link rel="stylesheet" href="/assets/vendor/daterangepicker/daterangepicker.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="/assets/vendor/swiper-7.3.1/swiper-bundle.min.css">

    <!-- simple lightbox css -->
    <link rel="stylesheet" href="/assets/vendor/simplelightbox/simple-lightbox.min.css">

    <link rel="stylesheet" href="/assets/vendor/dropzone5-9-3/dropzone.min.css">
    <link rel="stylesheet" href="/assets/vendor/tagsinput/bootstrap-tagsinput.css">

    <!-- app tour css -->
    <link rel="stylesheet" href="/assets/vendor/Product-Tour-Plugin-jQuery/lib.css">

    <!-- Footable table master css -->
    <link rel="stylesheet" href="/assets/vendor/fooTable/css/footable.bootstrap.min.css">

    <!-- style css for this template -->
    <link href="/assets/scss/style.css" rel="stylesheet">
    <link href="/assets/css/custom-style.css" rel="stylesheet">
    <!-- Required jquery and libraries -->
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap-5/dist/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Customized jquery file  -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="/assets/js/pwa-services.js"></script>

    <!-- date range picker -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="/assets/vendor/daterangepicker/daterangepicker.js"></script>

    <!-- chosen script -->
    <script src="/assets/vendor/chosen_v1.8.7/chosen.jquery.min.js"></script>

    <!-- Chart js script -->
    <script src="/assets/vendor/chart-js-3.3.1/chart.min.js"></script>

    <!-- Progress circle js script -->
    <script src="/assets/vendor/progressbar-js/progressbar.min.js"></script>

    <!-- swiper js script -->
    <script src="/assets/vendor/swiper-7.3.1/swiper-bundle.min.js"></script>

    <!-- Simple lightbox script -->
    <script src="/assets/vendor/simplelightbox/simple-lightbox.jquery.min.js"></script>

    <!-- app tour script-->
    <script src="/assets/vendor/Product-Tour-Plugin-jQuery/lib.js"></script>
    <!-- tags input -->
    <script src="/assets/vendor/tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- ckeditor input -->
    <script src="/assets/vendor/ckeditor5-build-classic/ckeditor.js"></script>
    <!-- Footable table master script-->
    <script src="/assets/vendor/fooTable/js/footable.min.js"></script>

    <script src="/assets/vendor/dropzone5-9-3/dropzone.min.js"></script>

    <!-- page level script here -->
    <script src="/assets/js/header-title.js"></script>
    <!-- <script src="assets/js/dashboard-custom.js"></script> -->
    <script type="text/javascript">
        $(window).on('load', function() {
            var progressCirclesred1 = new ProgressBar.Circle(circleprogressgreen1, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesred1.animate(1.00); // Number from 0.0 to 1.0

            var progressCirclesred2 = new ProgressBar.Circle(circleprogressgreen2, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesred2.animate(0.48); // Number from 0.0 to 1.0

            var progressCirclesred3 = new ProgressBar.Circle(circleprogressgreen3, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesred3.animate(0.45); // Number from 0.0 to 1.0

            var progressCirclesred4 = new ProgressBar.Circle(circleprogressgreen4, {
                color: '#2e9c65',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#2e9c657a',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#2e9c65',
                    width: 10
                },
                to: {
                    color: '#2e9c65',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesred4.animate(0.08); // Number from 0.0 to 1.0
        })
    </script>

</head>

<body>
    <main class="main mainheight">

        <!-- content -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding: 48px">
                            <div class="row mb-5">
                                <div class="col-auto"><span><img src="{{ asset('assets/img/icon/Recruitment.png') }}"
                                            alt="" style="width: 35%;"></span></div>
                                <div class="col-auto ms-auto" style="padding-top: 15px;">
                                    <h4 class="title custom-title" style="font-size: 25px;">CVthèque</h4>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12" style="text-align: center;">
                                    <span>
                                        Du {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}
                                        au {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-3">
                                    <div class="card border-0"  >
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-12">
                                                    <div class="card border-0  ">
                                                        <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="avatar avatar-40 rounded bg-light-theme">
                                                                        <i class="bi bi-database h5"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-0">CVthèque</h6>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button" data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots-vertical"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            style="padding: 0px; min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-detail show-row1"
                                                                                    data-detail="1"
                                                                                    href="javascript:void(0)"
                                                                                    id="flt-chartall">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row mb-2">

                                                                <div class="col text-center">
                                                                    <a href="#" class="card border-0"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#billpay"
                                                                        style="background-color: #e6eaee;">
                                                                        <div class="card-body "
                                                                            style="height: 69px !important;">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-auto">
                                                                                    <div class="circle-small">
                                                                                        <div
                                                                                            id="circleprogressgreen11">

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-auto"
                                                                                    style="    margin-right: 24px;">
                                                                                    <p class="bi bi- h4 avatar avatar-40 rounded text-theme "
                                                                                        style="width: 100%;color: #000;">
                                                                                        {{ __($statsComparison['cvtheque']['total']) }}&nbsp;
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div class="row">
                                                                                        <div class="col-auto"
                                                                                            style="margin-top: 8px;margin-right: -16px;">
                                                                                            <span class="text-green"
                                                                                                style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                                {{ abs($statsComparison['cvtheque']['change']) }}%
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            @if ($statsComparison['cvtheque']['change'] == 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-blue">
                                                                                                <i class="bi bi-arrow-right" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @elseif ($statsComparison['cvtheque']['change'] > 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-green">
                                                                                                <i class="bi bi-arrow-up-right" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @elseif ($statsComparison['cvtheque']['change'] < 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-red">
                                                                                                <i class="bi bi-arrow-down-left" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @endif
                                                                                        
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card border-0"  >
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-12">
                                                    <div class="card border-0  ">
                                                        <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="avatar avatar-40 rounded bg-light-theme"
                                                                        style="background-color: rgba(145, 195, 0, 0.5) !important;">
                                                                        <i class="bi bi-people h5"
                                                                            style="color: #638502 !important;"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-0">Profils actifs</h6>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button" data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots-vertical"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            style="padding: 0px; min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-detail show-row1"
                                                                                    data-detail="2"
                                                                                    href="javascript:void(0)"
                                                                                    id="flt-chart1">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row mb-2">

                                                                <div class="col text-center">
                                                                    <a href="#" class="card border-0"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#billpay"
                                                                        style="background-color: #e6eaee;">
                                                                        <div class="card-body "
                                                                            style="height: 69px !important;">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-auto">
                                                                                    <div class="circle-small">
                                                                                        <div
                                                                                            id="circleprogressgreen22">

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-auto"
                                                                                    style="    margin-right: 24px;">
                                                                                    <p class="bi bi- h4 avatar avatar-40 rounded text-theme "
                                                                                        style="width: 100%;color: #000;">
                                                                                        {{ __($statsComparison['active_profiles']['total']) }}&nbsp;
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div class="row">
                                                                                        <div class="col-auto"
                                                                                            style="margin-top: 8px;margin-right: -16px;">
                                                                                            <span class="text-green"
                                                                                                style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                                {{ abs($statsComparison['active_profiles']['change']) }}%
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            @if ($statsComparison['active_profiles']['change'] == 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-blue">
                                                                                                <i class="bi bi-arrow-right" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @elseif ($statsComparison['active_profiles']['change'] > 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-green">
                                                                                                <i class="bi bi-arrow-up-right" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @elseif ($statsComparison['active_profiles']['change'] < 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-red">
                                                                                                <i class="bi bi-arrow-down-left" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @endif
                                                                                        
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card border-0"  >
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-12">
                                                    <div class="card border-0  ">
                                                        <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">

                                                                    <div class="avatar avatar-40 rounded bg-light-theme"
                                                                        style="background-color: rgba(240, 61, 79, 0.40) !important;">
                                                                        <i class="bi bi-person-check h5"
                                                                            style="color: #b51121 !important;"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-0">Profils qualifiés</h6>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button" data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots-vertical"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            style="padding: 0px; min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-detail show-row1"
                                                                                    data-detail="3"
                                                                                    href="javascript:void(0)"
                                                                                    id="flt-chart2">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row mb-2">

                                                                <div class="col text-center">
                                                                    <a href="#" class="card border-0"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#billpay"
                                                                        style="background-color: #e6eaee;">
                                                                        <div class="card-body "
                                                                            style="height: 69px !important;">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-auto">
                                                                                    <div class="circle-small">
                                                                                        <div
                                                                                            id="circleprogressgreen33">

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-auto"
                                                                                    style="    margin-right: 24px;">
                                                                                    <p class="bi bi- h4 avatar avatar-40 rounded text-theme "
                                                                                        style="width: 100%;color: #000;">
                                                                                        {{ __($statsComparison['qualified_profiles']['total']) }}&nbsp;
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div class="row">
                                                                                        <div class="col-auto"
                                                                                            style="margin-top: 8px;margin-right: -16px;">
                                                                                            <span class="text-green"
                                                                                                style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                                {{ abs($statsComparison['qualified_profiles']['change']) }}%
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            @if ($statsComparison['qualified_profiles']['change'] == 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-blue">
                                                                                                <i class="bi bi-arrow-right" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @elseif ($statsComparison['qualified_profiles']['change'] > 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-green">
                                                                                                <i class="bi bi-arrow-up-right" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @elseif ($statsComparison['qualified_profiles']['change'] < 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-red">
                                                                                                <i class="bi bi-arrow-down-left" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @endif                                                                                        
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card border-0"  >
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-12">
                                                    <div class="card border-0  ">
                                                        <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="avatar avatar-40 rounded bg-light-theme"
                                                                        style="background-color: rgba(1, 94, 194, 0.4) !important;">
                                                                        <i class="bi bi-person-bounding-box h5"
                                                                            style="color: #01448d !important;"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-0">Profils pertinents
                                                                    </h6>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="dropdown d-inline-block">
                                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                            role="button" data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="outside"
                                                                            aria-expanded="false">
                                                                            <i class="bi bi-three-dots-vertical"
                                                                                style="font-size: 21px;"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            style="padding: 0px; min-width: 99px !important;">
                                                                            <li><a class="dropdown-item show-detail show-row1"
                                                                                    data-detail="4"
                                                                                    href="javascript:void(0)"
                                                                                    id="flt-chart3">Détail</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row mb-2">

                                                                <div class="col text-center">
                                                                    <a href="#" class="card border-0"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#billpay"
                                                                        style="background-color: #e6eaee;">
                                                                        <div class="card-body "
                                                                            style="height: 69px !important;">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-auto">
                                                                                    <div class="circle-small">
                                                                                        <div
                                                                                            id="circleprogressgreen44">

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-auto"
                                                                                    style="    margin-right: 24px;">
                                                                                    <p class="bi bi- h4 avatar avatar-40 rounded text-theme "
                                                                                        style="width: 100%;color: #000;">
                                                                                        {{ __($statsComparison['validation_profiles']['total']) }}&nbsp;
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div class="row">
                                                                                        <div class="col-auto"
                                                                                            style="margin-top: 8px;margin-right: -16px;">
                                                                                            <span class="text-green"
                                                                                                style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                                {{ abs($statsComparison['validation_profiles']['change']) }}%
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            @if ($statsComparison['validation_profiles']['change'] == 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-blue">
                                                                                                <i class="bi bi-arrow-right" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @elseif ($statsComparison['validation_profiles']['change'] > 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-green">
                                                                                                <i class="bi bi-arrow-up-right" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @elseif ($statsComparison['validation_profiles']['change'] < 0)
                                                                                            <div class="avatar avatar-40 rounded-circle bg-red">
                                                                                                <i class="bi bi-arrow-down-left" style="color: #FFF"></i>
                                                                                            </div>
                                                                                        @endif                                                                                        
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-12">
                                    <table class="table offres-table Intégrale" data-show-toggle="true">
                                        <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                            <tr style="vertical-align: middle;">
                                                <th rowspan="2" style="font-weight: 600;text-align: center">#</th>
                                                <th rowspan="2" style="font-weight: 600;">Matricule</th>
                                                <th rowspan="2" style="font-weight: 600;">Prénom</th>
                                                <th rowspan="2" style="font-weight: 600;width: 147px;">Nom</th>
                                                <th rowspan="2" style="font-weight: 600;width: 147px;">Diplôme</th>
                                                <th rowspan="2" style="font-weight: 600;width: 181px;">Option</th>
                                                <th rowspan="2" style="font-weight: 600;width: 105px;">Expérience
                                                </th>
                                                <th rowspan="2" style="font-weight: 600;width: 172px;">Poste actuel
                                                </th>
                                                <th rowspan="2" style="font-weight: 600;width: 178px;">Poste
                                                    souhaité</th>
                                                <th colspan="2"
                                                    style="font-weight: 600;text-align: center;width: 71px;">Profils
                                                </th>
                                                <th rowspan="2"
                                                    style="font-weight: 600;text-align: center;width: 10px;"></th>
                                                <th colspan="2"
                                                    style="font-weight: 600;text-align: center;/* width: 117px; */">
                                                    Date</th>
                                            </tr>
                                            <tr style="vertical-align: middle;">
                                                <th style="font-weight: 600;width: 51px;">Actif</th>
                                                <th style="font-weight: 600;">Qualifié</th>
                                                <th style="font-weight: 600;width: 100px;">Dépôt CV</th>
                                                <th style="font-weight: 600;">Modification</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 13px">
                                            @forelse($profiles as $profile)
                                                <tr>
                                                    <td style="vertical-align: middle;">
                                                        <img src="{{  $profile->getAvatarUrl() }} " alt="Picture" class="" width="40" style="max-width:none;">

                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->matricule ?? ' - ' }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->first_name ?? ' - ' }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->last_name ?? ' - ' }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        @foreach ($profile->formations as $formation)
                                                            {{ $formation->diploma?->label ?? '-' }}<br>
                                                        @endforeach
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        @foreach ($profile->formations as $formation)
                                                            {{ $formation->option?->label ?? '-' }}<br>
                                                        @endforeach
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->total_experience_in_years . ' ans' . ' et ' . $profile->total_experience . ' mois' }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->profession->label ?? '' }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->desired_profile ?? '' }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <div class="form-check form-switch" style="margin-top: 7px;">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" value="{{ __($profile->is_active) }}"
                                                                id="isActive_{{ $profile->id }}"
                                                                {{ $profile->is_active ? 'checked' : '' }} disabled>
                                                        </div>
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <div class="form-check form-switch"
                                                            style="margin-top: 7px; margin-left: 15px;">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" value="{{ $profile->is_qualified }}"
                                                                id="isQualified_{{ $profile->id }}"
                                                                {{ $profile->is_qualified ? 'checked' : '' }} disabled>
                                                        </div>
                                                    </td>

                                                    <td style="font-weight: 600;text-align: center;width: 10px;"></td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->created_at->toDateString() ?? '' }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->updated_at->toDateString() ?? ' - ' }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="12" style="text-align: center; font-weight: bold;">
                                                        Aucune donnée disponible dans le tableau</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function createProgressBar(elementId, value) {
            var container = document.getElementById(elementId);

            if (!container) {
                console.error("L'élément avec l'ID '" + elementId + "' n'existe pas.");
                return;
            }

            try {
                var progressBar = new ProgressBar.Circle(container, {
                    color: '#2e9c65',
                    strokeWidth: 10,
                    trailWidth: 10,
                    easing: 'easeInOut',
                    trailColor: '#2e9c657a',
                    duration: 1400,
                    text: {
                        autoStyleContainer: false
                    },
                    from: {
                        color: '#2e9c65',
                        width: 10
                    },
                    to: {
                        color: '#2e9c65',
                        width: 10
                    },
                    step: function(state, circle) {
                        circle.path.setAttribute('stroke', state.color);
                        var percentage = Math.round(circle.value() * 100);
                        circle.setText(percentage ? percentage + "<small>%</small>" : '');
                    }
                });
                progressBar.animate(value / 100);

                if (value === 0)
                    progressBar.animate(0);

            } catch (error) {
                console.error("Erreur lors de la création de la ProgressBar pour :", elementId, error);
            }
        }


        $.ajax({
            url: "/api/profiles/persentage-charts",
            method: "GET",
            dataType: "json",
            success: function(data) {
                if (data.total !== undefined) createProgressBar("circleprogressgreen11", data.total);
                if (data.activated !== undefined) createProgressBar("circleprogressgreen22", data.activated);
                if (data.qualified !== undefined) createProgressBar("circleprogressgreen33", data.qualified);
                if (data.validated !== undefined) createProgressBar("circleprogressgreen44", data.validated);
            },
            error: function(xhr, status, error) {
                console.error("Erreur AJAX :", status, error);
            }
        });
    </script>
</body>

</html>
