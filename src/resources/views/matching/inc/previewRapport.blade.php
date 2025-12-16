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

    <script>

        let matchingDetailProfile = @json($matchingDetailProfile);
        let matchingDetailMobilityGeographique = @json($matchingDetailMobilityGeographique);
        let matchingDetailsModeWork = @json($matchingDetailsModeWork);
        let matchingDetailsTimeWork = @json($matchingDetailsTimeWork);
        let groupedTechnicalSkills = @json($matchingDetailsTechnicalSkills); // La variable initiale
        let groupedPersonalSkills = @json($matchingDetailsPersonalSkills); // La variable initiale
        let matchingDetailsLinguistiqueSkills = @json($matchingDetailsLinguistiqueSkills);



    </script>

    @vite('resources/js/matching/previewDetail.js')


</head>
<body>
<main class="main mainheight">
    <!-- title bar -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card border-0" style="background-color: #e4e8ee47;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-body" style="padding: 10px 33px;">
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <h4 class="title custom-title ">{{ __("generated.Rapport Matching") }}</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table">
                                                    <thead style="font-size: 14px">
                                                    <tr>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;width: 200px;" >{{ __("generated.Intitulé") }}</th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                        </th>
                                                        <th colspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;text-align: center;width: 111px;" >{{ __("generated.Candidat") }}</th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                        </th>
                                                        <th colspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;text-align: center" >{{ __("generated.Recruteur") }}</th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                        </th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;text-align: right;width: 87px;" >{{ __("generated.Ecart") }}</th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;text-align: right;width: 90px;" >{{ __("generated.Score") }}</th>
                                                    </tr>
                                                    <tr>
                                                        <th
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 66px;text-align: right" >{{ __("generated.Indicateur") }}</th>
                                                        <th
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 112px;text-align: right" >{{ __("generated.Tolérance") }}</th>
                                                        <th
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 66px;text-align: right" >{{ __("generated.Indicateur") }}</th>
                                                        <th
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 112px;text-align: right" >{{ __("generated.Tolérance") }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody style="font-size: 14px">
                                                    <tr>
                                                        <td colspan="10" style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="10" style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Profil") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>
                                                    @foreach($matchingDetailProfile as $detail)
                                                        <tr style="vertical-align: middle;">
                                                            <td
                                                                style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;">
                                                                {{ __($detail->name) }}</td>
                                                            <td
                                                                style="border-bottom: 0;width: 30px;">
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;text-indent: 20px">
                                                                {{ __($detail->profileIndicator) }}
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --
                                                            </td>
                                                            <td
                                                                style="border-bottom: 0;width: 2px">
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">{{ __($detail->jobOfferIndicator) }}
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --</td>
                                                            <td
                                                                style="border-bottom: 0;width: 2px">
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ round($detail->ecart, 2) }}%&nbsp;
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                <div class="circle-small"
                                                                     style="float: right">
                                                                    <div
                                                                        id="circleprogressgreenRM-{{ __($detail->id) }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                    <tr>
                                                        <td colspan="10" style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="10" style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Mobilité") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Mobilité géographique") }}</td>
                                                        <td rowspan="15" style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td rowspan="15" style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td rowspan="15" style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>
                                                    @foreach($matchingDetailMobilityGeographique as $details)
                                                        <tr style="vertical-align: middle;">
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                <i class="bi bi-square-fill"
                                                                   style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i>
                                                                <span>{{ __($details->mobility) }}</span>
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ __($details->profileScore) }}%</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ __($details->jobOfferScore) }}%</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ round($details->ecart, 2) }}%<i
                                                                    class="bi bi-arrow-up-right"
                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                <div class="circle-small"
                                                                     style="float: right">
                                                                    <div
                                                                        id="circleprogressgreenRM-{{ __($details->id) }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    <tr>
                                                        <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Mode de travail") }}</td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>


                                                    @foreach($matchingDetailsModeWork as $detail)
                                                        <tr style="vertical-align: middle;">
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                <i class="bi bi-square-fill"
                                                                   style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>
                                                                                                    {{ __($detail->modeWork) }}
                                                                                                </span>
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ __($detail->profileScore) }}%</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ __($detail->jobofferScore) }}</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ round($detail->ecart, 2) }}%
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                <div class="circle-small"
                                                                     style="float: right">
                                                                    <div
                                                                        id="circleprogressgreenRM-{{ __($detail->id) }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endforeach


                                                    <tr>
                                                        <td
                                                            style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Temps de travail") }}</td>
                                                        <td
                                                            style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td
                                                            style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td
                                                            style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td
                                                            style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td
                                                            style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td
                                                            style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                    </tr>
                                                    @foreach($matchingDetailsTimeWork as $detail)
                                                        <tr style="vertical-align: middle;">
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                <i class="bi bi-square-fill"
                                                                   style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>{{ __($detail->timeWork) }}</span>
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                --</td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ round($detail->ecart, 2) }}
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                <div class="circle-small"
                                                                     style="float: right">
                                                                    <div
                                                                        id="circleprogressgreenRM-{{ __($detail->id) }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>



                                                    @endforeach


                                                    <tr>
                                                        <td colspan="10" style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="10" style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Compétences techniques") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>

                                                    @foreach($matchingDetailsTechnicalSkills as $skillType => $skills)
                                                        <tr>
                                                            <td style="padding-left: 20px; border-bottom: 1px solid #cfcdcd;">{{ __($skillType) }}</td>
                                                            <td rowspan="{{ $skills->count() + 1 }}" style="width: 2px; border-bottom: 0;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td rowspan="{{ $skills->count() + 1 }}" style="width: 2px; border-bottom: 0;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td rowspan="{{ $skills->count() + 1 }}" style="width: 2px; border-bottom: 0;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        </tr>

                                                        @foreach($skills as $skill)
                                                            <tr style="vertical-align: middle;">
                                                                <td style="border-bottom: 1px solid #cfcdcd; padding-left: 40px;">
                                                                    <i class="bi bi-square-fill" style="font-size: 6px; margin-top: 7px; margin-right: 9px; float: left;"></i>
                                                                    <span>{{ __($skill->skillName) }}</span>
                                                                </td>
                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">{{ __($skill->profileScore) }}%</td>
                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">--</td>
                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">{{ __($skill->jobOfferScore) }}%</td>
                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">--</td>

                                                                @php
                                                                    $arrowClass = $skill->ecart > 0 ? 'bi-arrow-up-right' : 'bi-arrow-down-left';
                                                                    $arrowColor = $skill->ecart > 0 ? '#2e9c65' : '#dd2255';
                                                                @endphp

                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                    {{ round($skill->ecart, 2) }}%&nbsp;
                                                                    <i class="bi {{ __($arrowClass) }}" style="color: {{ __($arrowColor) }}; font-size: 15px"></i>
                                                                </td>

                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                    <div class="circle-small" style="float: right;">
                                                                        <div id="circleprogressgreenRM-{{ __($skill->id) }}"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach

                                                    <tr>
                                                        <td colspan="10" style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="10" style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Compétences personnelles") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>

                                                    @foreach($matchingDetailsPersonalSkills as $skillType => $skills)
                                                        <tr>
                                                            <td style="padding-left: 20px; border-bottom: 1px solid #cfcdcd;">{{ __($skillType) }}</td>
                                                            <td rowspan="{{ $skills->count() + 1 }}" style="width: 2px; border-bottom: 0;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td rowspan="{{ $skills->count() + 1 }}" style="width: 2px; border-bottom: 0;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td rowspan="{{ $skills->count() + 1 }}" style="width: 2px; border-bottom: 0;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                        </tr>

                                                        @foreach($skills as $skill)
                                                            <tr style="vertical-align: middle;">
                                                                <td style="border-bottom: 1px solid #cfcdcd; padding-left: 40px;">
                                                                    <i class="bi bi-square-fill" style="font-size: 6px; margin-top: 7px; margin-right: 9px; float: left;"></i>
                                                                    <span>{{ __($skill->skillName) }}</span>
                                                                </td>
                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">{{ __($skill->profileScore) }}%</td>
                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">--</td>
                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">{{ __($skill->jobOfferScore) }}%</td>
                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">--</td>

                                                                @php
                                                                    $arrowClass = $skill->ecart > 0 ? 'bi-arrow-up-right' : 'bi-arrow-down-left';
                                                                    $arrowColor = $skill->ecart > 0 ? '#2e9c65' : '#dd2255';
                                                                @endphp

                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                    {{ round($skill->ecart, 2) }}%&nbsp;
                                                                    <i class="bi {{ __($arrowClass) }}" style="color: {{ __($arrowColor) }}; font-size: 15px"></i>
                                                                </td>

                                                                <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                    <div class="circle-small" style="float: right;">
                                                                        <div id="circleprogressgreenRM-{{ __($skill->id) }}"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach

                                                    <tr>
                                                        <td colspan="10" style="padding: 10px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="10" style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Compétences linguistiques") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 0;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                        <td style="width: 2px;border-bottom: 1px solid #cfcdcd;"></td>
                                                    </tr>
                                                    <!-- Boucle sur Compétences linguistiques -->
                                                    @if($matchingDetailsLinguistiqueSkills->isNotEmpty())
                                                        @foreach($matchingDetailsLinguistiqueSkills as $detail)
                                                            @if($detail->isNotEmpty())
                                                                <tr>
                                                                    <td style="border-bottom: 1px solid #cfcdcd; padding-left: 40px;">
                                                                        {{ optional($detail->first())->skill->skillType->label }}
                                                                    </td>
                                                                    <td rowspan="{{ $detail->count() + 1 }}" style="width: 2px; border-bottom: 0;"></td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                                    <td rowspan="{{ $detail->count() + 1 }}" style="width: 2px; border-bottom: 0;"></td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                                    <td rowspan="{{ $detail->count() + 1 }}" style="width: 2px; border-bottom: 0;"></td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;"></td>
                                                                </tr>

                                                                @foreach($detail as $detailSkill)
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #cfcdcd; padding-left: 40px;">
                                                                            <i class="bi bi-square-fill" style="font-size: 6px; margin-top: 7px; margin-right: 9px; float: left;"></i>
                                                                            <span>{{ optional($detailSkill->skill)->label }}</span>
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">{{ $detailSkill->profile_score * 100 }}%</td>
                                                                        <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">--</td>
                                                                        <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">{{ $detailSkill->job_offer_score * 100 }}%</td>
                                                                        <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">--</td>
                                                                        <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                            {{ round($detailSkill->ecart, 2) }}%
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                            <div class="circle-small" style="float: right;">
                                                                                <div id="circleprogressgreenRM-{{ __($detailSkill->id) }}"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
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
        </div>

    </div>
</main>

@section('js_footer')

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>





@endsection

</body>

</html>


