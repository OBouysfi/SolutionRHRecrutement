<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="">
        <meta name="csrf-token" content="NI9WPU8xPqOt076CBU6hJ8eBiqpRRCBY53S0TX57">
    
        <title>{{ __("generated.HumanJobs - Cvthéque")}}</title>
        <!-- manifest meta -->
        <meta name="apple-mobile-web-app-capable">
        <!-- Favicons -->
    
        <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
        <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
         <!-- Google fonts-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
 
     <!-- bootstrap icons -->
     
 
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
      
    
    </head>
<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled">

<main class="main mainheight">
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body" style="padding: 10px">
                        <div class="row mb-5">
                            <div class="col-auto">
                                <img src="{{ asset('assets/img/icon/Recruitment.png') }}" alt="" style="width: 35%;">
                            </div>
                            <div class="col-auto ms-auto" style="padding-top: 15px;">
                                <h4 class="title custom-title">{{ __("generated.Cvthéque")}}</h4>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12 text-center">
                                <span>
                                    {{ __('generated.Du') }} {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}
                                    {{ __('generated.au') }} {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}
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
                                                                <h6 class="fw-medium mb-0 ">{{ __("generated.CVthèque") }}</h6>
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
                                                                        <li><a class="dropdown-item show-detail show-row1 "
                                                                                data-detail="1"
                                                                                href="javascript:void(0)"
                                                                                id="flt-chartall">{{ __("generated.Détail") }}</a>
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
                                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Profils actifs") }}</h6>
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
                                                                        <li><a class="dropdown-item show-detail show-row1 "
                                                                                data-detail="2"
                                                                                href="javascript:void(0)"
                                                                                id="flt-chart1">{{ __("generated.Détail") }}</a>
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
                                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Profils qualifiés") }}</h6>
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
                                                                        <li><a class="dropdown-item show-detail show-row1 "
                                                                                data-detail="3"
                                                                                href="javascript:void(0)"
                                                                                id="flt-chart2">{{ __("generated.Détail") }}</a>
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
                                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Profils pertinents") }}</h6>
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
                                                                        <li><a class="dropdown-item show-detail show-row1 "
                                                                                data-detail="4"
                                                                                href="javascript:void(0)"
                                                                                id="flt-chart3">{{ __("generated.Détail") }}</a>
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
                                <table class="table offres-table Intégrale" data-show-toggle="true" id="vivierTable">
                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                        <tr style="vertical-align: middle;">
                                            <th  rowspan="2"
                                                style="font-weight: 600;text-align: center">#</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;">{{ __("generated.Matricule") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;">{{ __("generated.Prénom") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 147px;">{{ __("generated.Nom") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 147px;">{{ __("generated.Diplôme") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 181px;">{{ __("generated.Option") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 105px;">{{ __("generated.Expérience") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 172px;">{{ __("generated.Poste actuel") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 178px;">{{ __("generated.Poste souhaité") }}</th>
                                            <th  colspan="2"
                                                style="font-weight: 600;text-align: center;width: 71px;">{{ __("generated.Profils") }}</th>
                                            <th class="translated_text" rowspan="2"
                                                style="font-weight: 600;text-align: center;width: 10px;">
                                            </th>
                                            <th  colspan="2"
                                                style="font-weight: 600;text-align: center;/* width: 117px; */">{{ __("generated.Date") }}</th>
                                        </tr>
                                        <tr style="vertical-align: middle; text-align: center;">
                                            <th 
                                                style="font-weight: 600;width: 51px;">{{ __("generated.Actif") }}</th>
                                            <th  style="font-weight: 600;">{{ __("generated.Qualifié") }}</th>
                                            <th 
                                                style="font-weight: 600;width: 100px;">{{ __("generated.Dépôt CV") }}</th>
                                            <th  style="font-weight: 600;">{{ __("generated.Modification") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 13px">
                                       
                                    </tbody>
                                </table>
                                <div class="row align-items-center mx-0 mb-4">
                                    <div class="col-7 ">
    
                                    </div>
                                    <div class="col-5  footable-paging-external footable-paging-right"
                                        id="footable">
                                        <div class="footable-pagination-wrapper">
                                            <ul class="pagination">
                                                <li class="footable-page-nav disabled" data-page="first">
                                                    <a class="footable-page-link" href="#">«</a>
                                                </li>
                                                <li class="footable-page-nav disabled" data-page="prev">
                                                    <a class="footable-page-link" href="#">‹</a>
                                                </li>
                                                <li class="footable-page visible active" data-page="1"><a
                                                        class="footable-page-link" href="#">1</a>
                                                </li>
                                                <li class="footable-page visible" data-page="2">
                                                    <a class="footable-page-link" href="#">2</a>
                                                </li>
                                                <li class="footable-page-nav" data-page="next"><a
                                                        class="footable-page-link" href="#">›</a>
                                                </li>
                                                <li class="footable-page-nav" data-page="last"><a
                                                        class="footable-page-link" href="#">»</a>
                                                </li>
                                            </ul>
                                            <div class="divider"></div><span class="label label-default">1
                                                <span >{{ __("generated.sur") }}</span> 2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                             

                        </div>

                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        var allProfileListingData = "{{ route('profile.listing.data', '0') }}";

        var table =  $('#vivierTable').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: false,
            searching: false,
            paginate:true,
            ajax: {
                url: allProfileListingData,
                
            },
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json',
                info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                emptyTable: "Aucune donnée disponible dans le tableau",
                infoEmpty: "Affichage de 0 à 0 sur 0 entrée"
            },
            columns: [
                { data: 'picture', name: 'picture' },
                { data: 'matricule', name: 'matricule' },
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'diploma_label', name: 'diploma_label' },
                { data: 'option', name: 'option' },
                { data: 'total_experience', name: 'total_experience' },
                { data: 'current_profession', name: 'current_profession' },
                { data: 'desired_profession', name: 'desired_profession' },
                { data: 'is_active', name: 'is_active' },
                { data: 'is_qualified', name: 'is_qualified' },
                { data: 'tab', name: 'tab' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
            ],
            drawCallback: function (settings) {
                updateCustomPagination(settings);

              
            },
           
        });
           // Pagination custom
   function updateCustomPagination(settings) {
    const pageInfo = settings.json;
    if (!pageInfo) return; // sécurité
    const recordsTotal = pageInfo.recordsTotal;
    const pageLength   = settings._iDisplayLength;
    const totalPages   = Math.ceil(recordsTotal / pageLength);
    const currentPage  = Math.floor(settings._iDisplayStart / pageLength) + 1;

    const paginationWrapper = $('#footable .pagination');
    paginationWrapper.empty();

    // First & Prev
    paginationWrapper.append(`
        <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="first">
            <a class="footable-page-link" href="#">«</a>
        </li>
        <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="prev">
            <a class="footable-page-link" href="#">‹</a>
        </li>
    `);

    // Numéros de pages
    let startPage = Math.max(1, currentPage - 4);
    let endPage = Math.min(totalPages, startPage + 9);

    if (endPage - startPage < 9) {
        startPage = Math.max(1, endPage - 9);
    }

    for (let i = startPage; i <= endPage; i++) {
        paginationWrapper.append(`
    <li class="footable-page visible ${i === currentPage ? 'active' : ''}" data-page="${i}">
        <a class="footable-page-link" href="#">${i}</a>
    </li>
`);
    }

    // Next & Last
    paginationWrapper.append(`
        <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="next">
            <a class="footable-page-link" href="#">›</a>
        </li>
        <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="last">
            <a class="footable-page-link" href="#">»</a>
        </li>
    `);

    $('#footable .label').text(`${currentPage} sur ${totalPages}`);

    addPaginationEventListeners();
}

function addPaginationEventListeners() {
    $('#footable .footable-page-nav').on('click', function (e) {
        e.preventDefault();
        if ($(this).hasClass('disabled')) return;

        const action = $(this).data('page');
        if (action === 'first')  table.page('first').draw('page');
        if (action === 'prev')   table.page('previous').draw('page');
        if (action === 'next')   table.page('next').draw('page');
        if (action === 'last')   table.page('last').draw('page');
    });

    $('#footable .footable-page').on('click', function (e) {
        e.preventDefault();
        const page = $(this).data('page') - 1; // 0-based
        table.page(page).draw('page');
    });
}
    });
</script>
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

</body>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">
</html>
