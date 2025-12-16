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
    {{-- <link rel="manifest" href="manifest.json" /> --}}

    <!-- Favicons -->
    {{-- <link rel="apple-touch-icon" href="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" sizes="180x180"> --}}
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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- app tour css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/Product-Tour-Plugin-jQuery/lib.css') }}">

    <!-- Footable table master css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fooTable/css/footable.bootstrap.min.css') }}">


    <!-- style css for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/scss/style.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet"> --}}

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container--default .select2-selection--multiple {
            background-color: var(--adminux-theme-bg) !important;
            border: 0;
        }

        .modal-backdrop {
            display: none !important;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            border-color: var(--adminux-theme-bg) !important;
        }

        table.dataTable.no-footer {
            border: none !important;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: brightness(0) saturate(100%) invert(22%) sepia(94%) saturate(2234%) hue-rotate(199deg) brightness(91%) contrast(101%);
        }

        input[type="date"] {
            padding-right: 1.5rem;
            font-size: 1rem;
            height: 2.5rem;
        }
    </style>
    @yield('css_header')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendor/progressbar-js/progressbar.min.js') }}"></script>



</head>


<body>


<!-- Begin page content -->
<main class="main mainheight">

    <!-- content -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body" style="padding: 48px">
                        <div class="row mb-5" style="margin-bottom: 75px !important;">
                            <div class="col-auto" style="width: 50%;"><span><img src="{{ asset('assets/img/icon/Recruitment.png') }}" alt="" style="width: 62%;"></span></div>
                            <div class="col-auto ms-auto" style="padding-top: 15px;">
                                <h4 class="title custom-title" style="font-size: 25px;">Rapport d'évaluation</h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-2" style="width: 14%">
                                <div class="card border-0" style="background-color: #e4e8ee47;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">

                                                            <div class="col">
                                                                <p class="text-secondary small mb-1" style="margin-bottom: 2px !important;font-size: 11px;">Référence</p>
                                                                <h5 class="fw-medium" style="margin-bottom: 6px !important;font-size: 14px;">{{ __($profile->matricule) }}</h5>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3" style="width: 29%;margin-left: -14px;">
                                <div class="card border-0" style="background-color: #e4e8ee47;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <figure class="avatar avatar-40 mb-0 coverimg " >
                                                                    <img src="{{  isset($profile) ? asset('storage/' . $profile->path_picture) : asset('assets/img/icon/photo-empty.png') }} " alt="" >
                                                                </figure>
                                                            </div>
                                                            <div class="col-auto">
                                                                <p class="text-secondary small mb-1" style="margin-bottom: 2px !important;font-size: 11px;">Prénom et Nom</p>
                                                                <h6 class="fw-medium" style="margin-bottom: 6px !important;font-size: 14px;">{{ __($profile->first_name) }} {{ __($profile->last_name) }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2" style="width: 27%;margin-left: -14px;">
                                <div class="card border-0" style="background-color: #e4e8ee47;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">

                                                            <div class="col">
                                                                <p class="text-secondary small mb-1" style="margin-bottom: 2px !important;font-size: 11px;">Offre d'emploi</p>
                                                                <h5 class="fw-medium" style="margin-bottom: 6px !important;font-size: 14px;">{{ __($jobOffer?->profession?->label) }}</h5>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2" style="width: 32%;margin-left: -14px;">
                                <div class="card border-0" style="background-color: #e4e8ee47;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">

                                                            <div class="col">
                                                                <p class="text-secondary small mb-1" style="margin-bottom: 2px !important;font-size: 11px;">Client</p>
                                                                <h5 class="fw-medium" style="margin-bottom: 6px !important;font-size: 14px;">{{ __($client->name) }}</h5>
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
                        <div class="row  mb-3">
                            <div class="col-12 mb-4">
                                <div class="card border-0" style="background-color: #e4e8ee47;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12 mb-4">
                                                                <img src="{{  isset($client) ? asset('storage/' . $client->path_logo) : asset('assets/img/icon/photo-empty.png') }}" style="width: 121px;">
                                                            </div>
                                                            <div class="col-12">
                                                                <table class="table">
                                                                    <thead style="font-size: 13px">
                                                                    <tr style="border-top: 1px solid #c7c7c7;">
                                                                        <th style="width: 176px;">Critère</th>
                                                                        <th style="width: 200px">Prénom et Nom</th>
                                                                        <th>Date</th>
                                                                        <th style="text-align: right">Note</th>
                                                                        <th style="text-align: right">Coefficient</th>
                                                                        <th style="text-align: right">Pondération</th>
                                                                        <th style="text-align: center;width: 567px">Appréciation</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody style="font-size: 13px">
                                                                    @if(isset($evaluators_evaluation))
                                                                        @foreach($evaluators_evaluation as $evaluator)
                                                                    <tr>
                                                                        <td style="vertical-align: middle;">Compétences<br> techniques</td>
                                                                        <td style="vertical-align: middle;">
                                                                            <div class="row">
                                                                                <div class="col-auto" style="margin-right: -16px">
                                                                                    <figure class="avatar avatar-50 mb-0 coverimg " style="background-image: url(&quot;assets/img/team/T1.jpg&quot;);background-size: 34px;;">
                                                                                        <img src="assets/img/team/T1.jpg" alt="" style="display: none;">
                                                                                    </figure>
                                                                                </div>
                                                                                <div class="col-auto" style="margin-top: 8px;margin-left: 5px;">
                                                                                    <span>{{ __($evaluator->first_name) }}<br> {{ __($evaluator->last_name) }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            12/12/2024
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: center">
                                                                            {{ __($evaluator->mark) }}
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: center">
                                                                            {{ __($evaluator->coefficient) }}
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: center">
                                                                            {{ __($evaluator->ponderation) }}
                                                                        </td>
                                                                        <td>
                                                                            <p style="text-align: justify">
                                                                                {{ __($evaluator->evaluation) }}
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    @endif

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="card border-0" style="background-color: #e4e8ee47;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12 mb-4">
                                                                <img src="assets/img/logo-entreprise/BYTEIT.png" style="width: 121px;">
                                                            </div>
                                                            <div class="col-12">
                                                                <table class="table">
                                                                    <thead style="font-size: 13px">
                                                                    <tr style="border-top: 1px solid #c7c7c7;">
                                                                        <th style="width: 176px;">Critère</th>
                                                                        <th style="width: 200px">Prénom et Nom</th>
                                                                        <th>Date</th>
                                                                        <th style="text-align: right">Note</th>
                                                                        <th style="text-align: right">Coefficient</th>
                                                                        <th style="text-align: right">Pondération</th>
                                                                        <th style="text-align: center;width: 567px">Appréciation</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody style="font-size: 13px">
                                                                    @if(isset($evaluators_evaluation))
                                                                    @foreach($evaluatorsEvaluationCompany as $evaluator)

                                                                        <tr>
                                                                        <td style="vertical-align: middle;">Capacité à résoudre<br> de problèmes</td>
                                                                        <td style="vertical-align: middle;">
                                                                            <div class="row">
                                                                                <div class="col-auto" style="margin-right: -16px">
                                                                                    <figure class="avatar avatar-50 mb-0 coverimg " style="background-image: url(&quot;assets/img/icon2/9989.jpg&quot;);">
                                                                                        <img src="assets/img/icon2/9989.jpg" alt="" style="display: none;">
                                                                                    </figure>
                                                                                </div>
                                                                                <div class="col-auto" style="margin-top: 8px;margin-left: 5px;">
                                                                                    <span>{{ __($evaluator->first_name) }}<br> {{ __($evaluator->last_name) }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle;">
                                                                            12/12/2024
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: center">
                                                                            {{ __($evaluator->mark) }}
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: center">
                                                                            {{ __($evaluator->coefficient) }}
                                                                        </td>
                                                                        <td style="vertical-align: middle;text-align: center">
                                                                            {{ __($evaluator->ponderation) }}
                                                                        </td>
                                                                        <td>
                                                                            <p style="text-align: justify">
                                                                                {{ __($evaluator->evaluation) }}
                                                                            </p>
                                                                        </td>
                                                                    </tr>

                                                                        @endforeach
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 ms-auto" style="width: 13%">
                                <div class="card border-0" style="background-color: #e4e8ee47;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0 ">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">

                                                            <div class="col">
                                                                <p class="text-secondary small mb-1" style="text-align: center">Moyenne</p>
                                                                <h5 class="fw-medium" style="text-align: center">{{ __($average) }} / 10</h5>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    <!-- Begin page content -->
</body>


<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<!-- JS Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/progressbar.js"></script>

</html>
