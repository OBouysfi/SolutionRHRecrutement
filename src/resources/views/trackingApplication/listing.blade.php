@extends('layouts.master')

@section('title', __('generated.Tracking Application'))

@section('css_header')
    <link rel="stylesheet" href="{{ asset('assets/vendor/dragula/dragula.min.css') }}">
    <style>
        @media (min-width: 1400px) {
        .container-xxl, .container-xl, 
        .container-lg, .container-md, 
        .container-sm, .container {
            max-width: 1625px;  }
        }
        .ui-state-highlight {
            background: #f0f0f0;
            border: 2px dashed #ccc;
            height: 100px;
        }

        .dragging {
            opacity: 0.5;
        }

        .circle-progress {
            width: 50px;
            height: 50px;
            display: inline-block;
            position: relative;
        }

        .poste-chosen .chosen-container.chosen-container-single a.chosen-single {
            padding: 3px 10px;
            /* background: var(--adminux-theme-bg) !important; */
        }

        .poste-chosen .chosen-container.chosen-container-single {
            padding: 2px 9px;
            /* background-color: var(--adminux-theme-bg); */
            border-radius: 7px;
            margin-top: -4px;
        }

        .vue-kanban .dragzonecard {
            max-height: 70vh;
            overflow-y: auto;
            scrollbar-width: none;
        }

        .vue-kanban .dragzonecard::-webkit-scrollbar {
            display: none;
        }

        .file-upload {
            position: relative;
            width: 100%;
            /* max-width: 600px; */
            height: 150px;
            border: 2px dashed #cccccc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: border-color 0.3s ease;
            flex-direction: column;
        }

        .file-upload:hover {
            border-color: #2e9c65ba;
        }

        .file-upload input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload label {
            font-size: 16px;
            color: #6c757d;
            pointer-events: none;
            margin-bottom: 10px;
            padding: 15px;
            text-align: center;
        }

        .file-preview {
            margin-top: 10px;
            width: 100px;
            height: 100px;
            display: none;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            border: 1px solid #cccccc;
        }

        .action-check {
            border: 1px solid #ccc;
            background-color: white;
            transition: background-color 0.3s, border-color 0.3s;
            border-radius: 10px;
        }

        input[type="radio"]:checked+.action-check {
            background-color: #005dc7;
            color: white;
            border-color: #005dc7;
            border-radius: 10px;
        }

        .chosen-container .chosen-choices li.search-choice {
            background: #005dc7 !important;
            border-color: #005dc7 !important;
        }

        .active {
            background: linear-gradient(90deg, #005dc7 0%, #005dc75e 100%);
        }

        #resultsList {
            max-height: 400px;
            overflow-y: auto;
            z-index: 1000;
            background-color: white;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #resultsList li {
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #resultsList li:hover {
            background-color: #f8f9fa;
        }

        .attachment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .attachment-preview img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        .attachment-item button {
            margin-left: 10px;
        }

        /* Animation de célébration */
        .celebration-animation {
            animation: celebrate 1s ease-in-out;
            box-shadow: 0 0 15px rgba(46, 156, 101, 0.8);
            border: 2px solid #2e9c65;
        }

        @keyframes celebrate {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .column-loading {
            position: sticky;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            z-index: 10;
        }

        .dragzonecard {
            scrollbar-width: thin;
            scrollbar-color: #ccc transparent;
        }

        .dragzonecard::-webkit-scrollbar {
            width: 6px;
        }

        .dragzonecard::-webkit-scrollbar-track {
            background: transparent;
        }

        .dragzonecard::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 6px;
        }

        .total-count {
            font-size: 0.75rem;
        }

        .column-loading {
            position: sticky;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            padding: 8px;
            z-index: 10;
            text-align: center;
        }
        .custom-multiple-select {
            background-color: var(--adminux-theme-bg) !important;
            border: 1px solid var(--adminux-border-color) !important;
            border-bottom: 1px solid var(--adminux-theme-bg) !important;
            border-radius.card-footer{}: 8px !important;
            height: 64px !important;
        }
        .card .card-footer{
            border-top: 0px solid transparent;
            margin-top: 1px;
        }

        .custom-select {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            background: #fff;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            outline: none;
        }

        .custom-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .custom-select:hover {
            border-color: #667eea;
        }

        .select-wrapper::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 8px solid #667eea;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .select-wrapper:hover::after {
            border-top-color: #5a67d8;
        }

        .rappel .poste-chosen .chosen-container.chosen-container-single{
            margin-top: 23px;
        }
        .rappel .input-label{
            background-color: transparent;
            margin-top: 18px;
        }


    </style>
@endsection

@section('content')

    <main class="main mainheight">

        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __('generated.ATS - Application Tracking System') }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>

                {{-- <div class="col col-sm-auto">
                <div class="input-group input-group-md">
                    <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                    <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                </div>
            </div> --}}
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __('generated.contact') }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ __('generated.contact') }}">
                            <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #26b6ea;">
                                <span class="input-group-text text-secondary bg-none" style="border: 0;">
                                    <i class="bi bi-question-diamond" style="font-size: 22px; color: #fff"></i>
                                </span>
                            </figure>
                        </div>
                    </a>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __('generated.Chatbot') }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('generated.Confort utilisateur') }}" style="margin-right: 40px;">
                    <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                        id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="{{ asset('assets/img/icon/faciliti.png') }}"
                                style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page">{{ __("generated.Vue d'ensemble") }}</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">

            <div class="row mb-4">
                <div class="col-12">
                    <!-- Carte principale -->
                    <div class="card border-0 p-4">
                        <div class="card-body p-0">
                            {{-- <!-- Rangée principale, 3 colonnes sur grand écran (3+3+6=12) -->
                            <div class="row align-items-end g-3 flex-nowrap overflow-auto">

                                <!-- Colonne 1 : Client -->
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group check-valid is-valid">
                                        <div id="filter-client-wrapper"
                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label>
                                                <span>{{ __('generated.Client') }}</span>
                                            </label>
                                            <select id="filter-client" name="client_id"
                                                class="chosenoptgroup w-100 select-search-chosen">
                                                <option value="" selected>{{ __('generated.Tous') }}</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ __($client->id) }}">{{ __($client->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Colonne 1 -->

                                <!-- Colonne 2 : Offre d'emploi -->
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group check-valid is-valid">
                                        <div id="filter-job-offer-wrapper"
                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label>
                                                <span>{{ __("generated.Offre d'emploi") }}</span>
                                            </label>
                                            <select id="filter-job-offer" name="job_offer_id"
                                                class="chosenoptgroup w-100 select-search-chosen">
                                                <option value="" selected>{{ __('generated.Tous') }}</option>
                                                @foreach ($jobOffers as $jobOffer)
                                                    <option value="{{ __($jobOffer->id) }}">{{ __($jobOffer->title) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fin Colonne 2 -->

                                <!-- Colonne 3 : Récap (Shortlist, En process, Accepté, Rejeté) -->
                                <div class="col-12 col-md-4 col-lg-6">

                                    <div class="row row-cols-4 g-2">

                                        <!-- Carte "Shortlist" -->
                                        @php
                                            $cards = [
                                                [
                                                    'label' => __('generated.Shortlist'),
                                                    'icon' => 'bi-list-task',
                                                    'color' => 'warning',
                                                    'count' => $totals['Shortlist'] ?? 0,
                                                ],
                                                [
                                                    'label' => __('generated.Process'),
                                                    'icon' => 'bi-clock',
                                                    'color' => 'primary',
                                                    'count' => $totals['Évaluation'] ?? 0,
                                                ],
                                                [
                                                    'label' => __('generated.Accepté'),
                                                    'icon' => 'bi-person-check',
                                                    'color' => 'success',
                                                    'count' => $totals['Retenu'] ?? 0,
                                                ],
                                                [
                                                    'label' => __('generated.Rejeté'),
                                                    'icon' => 'bi-person-x',
                                                    'color' => 'danger',
                                                    'count' => $totals['Rejeté'] ?? 0,
                                                ],
                                            ];
                                        @endphp



                                        @foreach ($cards as $card)
                                            <div class="col">
                                                <div class="card border-0"
                                                    style="background-color: var(--adminux-theme-bg);border: 1px solid var(--adminux-theme-bg-2) !important; border-bottom: 1px solid var(--adminux-theme) !important;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <div
                                                                    class="bg-{{ $card['color'] }} avatar avatar-40 text-white rounded">
                                                                    <i class="bi {{ $card['icon'] }}"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <p class="small text-secondary mb-1 translated_text">
                                                                    {{ $card['label'] }}</p>
                                                                <h6 class="fw-medium mb-0">{{ $card['count'] }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- Fin carte "Rejeté" -->

                                    </div> <!-- Fin row row-cols-2 row-cols-sm-4 g-2 -->
                                </div>
                                <!-- Fin Colonne 3 -->

                            </div> <!-- Fin .row align-items-end g-3 --> --}}
                            <div class="d-flex flex-wrap gap-3 align-items-end">

                                <!-- Filtres -->
                                <div class="flex-fill" style="min-width: 200px;">
                                    <div class="form-group check-valid is-valid">
                                        <div id="filter-client-wrapper"
                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label>
                                                <span>{{ __('generated.Client') }}</span>
                                            </label>
                                            <select id="filter-client" name="client_id"
                                                class="chosenoptgroup w-100 select-search-chosen">
                                                <option value="" selected>{{ __('generated.Tous') }}</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ __($client->id) }}">{{ __($client->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-fill" style="min-width: 200px;">
                                    <div class="form-group check-valid is-valid">
                                        <div id="filter-job-offer-wrapper"
                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label>
                                                <span>{{ __("generated.Offre d'emploi") }}</span>
                                            </label>
                                            <select id="filter-job-offer" name="job_offer_id"
                                                class="chosenoptgroup w-100 select-search-chosen">
                                                <option value="" selected>{{ __('generated.Tous') }}</option>
                                                @foreach ($jobOffers as $jobOffer)
                                                    <option value="{{ __($jobOffer->id) }}">{{ __($jobOffer->title) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cartes -->
                                @php
                                    $cards = [
                                        [
                                            'label' => __('generated.Shortlist'),
                                            'icon' => 'bi-list-task',
                                            'color' => 'warning',
                                            'count' => $totals['Shortlist'] ?? 0,
                                        ],
                                        [
                                            'label' => __('generated.in_process'),
                                            'icon' => 'bi-clock',
                                            'color' => 'primary',
                                            'count' => $totals['Évaluation'] ?? 0,
                                        ],
                                        [
                                            'label' => __('generated.Accepté'),
                                            'icon' => 'bi-person-check',
                                            'color' => 'success',
                                            'count' => $totals['Retenu'] ?? 0,
                                        ],
                                        [
                                            'label' => __('generated.Rejeté'),
                                            'icon' => 'bi-person-x',
                                            'color' => 'danger',
                                            'count' => $totals['Rejeté'] ?? 0,
                                        ],
                                    ];
                                @endphp

                                @foreach ($cards as $card)
                                    <div class="card border-0"
                                        style="background-color: var(--adminux-theme-bg);border: 1px solid var(--adminux-theme-bg-2) !important; border-bottom: 1px solid var(--adminux-theme) !important;">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div
                                                        class="bg-{{ $card['color'] }} avatar avatar-40 text-white rounded">
                                                        <i class="bi {{ $card['icon'] }}"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p class="small text-secondary mb-1 translated_text">
                                                        {{ $card['label'] }}</p>
                                                    <h6 class="fw-medium mb-0">{{ $card['count'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div> <!-- Fin .card-body -->
                    </div> <!-- Fin .card -->
                </div> <!-- Fin .col-12 -->
            </div>


            <div class="row mb-3">
                @php
                    $cards = [
                        [
                            'title' => 'Acceptation des offres',
                            'percentage' => $acceptanceStats['acceptancePercentage'],
                            'secondaryPercentage' => $acceptanceStats['rejectionPercentage'],
                            'primaryLabel' => __('generated.Offre acceptée : :count candidats', [
                                'count' => $acceptanceStats['acceptedCount'],
                            ]),
                            'secondaryLabel' => __('generated.Offre refusée : :count candidats', [
                                'count' => $acceptanceStats['rejectedCount'],
                            ]),
                            'primaryColor' => '#4e7393',
                            'secondaryColor' => '#87a5c3',
                            'isTimeCard' => false,
                        ],
                        [
                            'title' => 'Sélection client',
                            'percentage' => $clientSelectionStats['clientSelectionPercentage'],
                            'secondaryPercentage' => 100, // Cabinet selection is always 100%
                            'primaryLabel' => __('generated.Sélection cabinet : :count candidats', [
                                'count' => $clientSelectionStats['cabinetSelectionCount'],
                            ]),
                            'secondaryLabel' => __('generated.Sélection client : :count candidats', [
                                'count' => $clientSelectionStats['clientSelectionCount'],
                            ]),
                            'primaryColor' => '#4e7393',
                            'secondaryColor' => '#87a5c3',
                            'isTimeCard' => false,
                        ],
                        [
                            'title' => 'Conversion à l\'embauche',
                            'percentage' => $conversionStats['conversionPercentage'],
                            'secondaryPercentage' => 100, // Client selection is always 100%
                            'primaryLabel' => __('generated.Sélection client : :count candidats', [
                                'count' => $conversionStats['clientSelectionCount'],
                            ]),
                            'secondaryLabel' => __('generated.Candidat embauché : :count candidats', [
                                'count' => $conversionStats['hiredCount'],
                            ]),
                            'primaryColor' => '#4e7393',
                            'secondaryColor' => '#87a5c3',
                            'isTimeCard' => false,
                        ],
                        [
                            'title' => 'Temps de recrutement',
                            'percentage' =>
                                ($recruitmentTimeStats['realizedTime'] / $recruitmentTimeStats['estimatedTime']) * 100,
                            'secondaryPercentage' => 100, // Estimated time is always 100%

                            'primaryLabel' => __('generated.Temps estimé : :days jours', [
                                'days' => $recruitmentTimeStats['estimatedTime'],
                            ]),
                            'secondaryLabel' => __('generated.Temps réalisé : :days jours', [
                                'days' => $recruitmentTimeStats['realizedTime'],
                            ]),
                            'primaryColor' => '#4e7393',
                            'secondaryColor' => '#87a5c3',
                            'isTimeCard' => true,

                            'valueText' => __('generated.:days Jours', [
                                'days' => $recruitmentTimeStats['realizedTime'],
                            ]),
                        ],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div class="col-12 col-md-6 col-xl-3 mb-3 mb-xl-0">
                        <div class="card border-light-gray h-100"
                            style="background-color: var(--adminux-theme-gray) !important;border: 1px solid var(--adminux-border-color) !important;">
                            <div class="card-header" style="background-color: var(--adminux-theme-gray) !important;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="small mb-0 text-dark translated_text ">
                                        {{ __('generated.' . $card['title']) }}
                                    </p>
                                    <p class="small mb-0 fw-bold fs-5 text-dark">
                                        {{ $card['isTimeCard'] ? $card['valueText'] : $card['percentage'] . '%' }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-body pt-4">
                                <!-- Primary progress bar (always 100% for secondary metrics) -->

                                <div class="mb-2">
                                    <div class="progress progress-thin h-10 bg-light-primary">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 100%; background-color: {{ $card['primaryColor'] }}"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>

                                <!-- Secondary progress bar (actual metric) -->
                                <div class="mb-3">
                                    <div class="progress progress-thin h-10 bg-light-secondary">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $card['percentage'] }}%; background-color: {{ $card['secondaryColor'] }}"
                                            aria-valuenow="{{ $card['percentage'] }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>

                                <!-- Legend items -->
                                <div class="legend-item mb-1">
                                    <div class="d-flex align-items-center">
                                        <div class="legend-color me-2"
                                            style="height: 12px;width: 12px; background-color: {{ $card['primaryColor'] }}">
                                        </div>
                                        <p class="small mb-0 translated_text text-dark">{{ $card['primaryLabel'] }}</p>
                                    </div>
                                </div>

                                <div class="legend-item">
                                    <div class="d-flex align-items-center">
                                        <div class="legend-color me-2"
                                            style="height: 12px;width: 12px; background-color: {{ $card['secondaryColor'] }}">
                                        </div>
                                        <p class="small mb-0 translated_text text-dark">{{ $card['secondaryLabel'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Suivi de la mission -->
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body bg-gradient-theme-light">
                                            <div class="row   align-items-center">
                                                <div class="col-12 col-md-6">
                                                    <h5 class="mb-0 ">{{ __('generated.Suivi de la mission') }}</h5>
                                                </div>
                                                <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
                                                    <div class="row justify-content-end gx-3">
                                                        <!--  Clôturer -->
                                                        <div class="col-auto translated_text" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="{{ __('generated.Clôturer') }}">
                                                            <div class="avatar avatar-40 rounded bg-light-blue">
                                                                <a href="#" id="closeJobOfferButton">
                                                                    <i style="font-size: 20px"
                                                                        class="bi bi-door-closed"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="col-auto translated_text" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="{{ __('generated.Inviter au test') }}">
                                                            <div class="avatar avatar-40 rounded bg-light-blue">
                                                                <a href="#" onclick="assignTestToCandidate()"
                                                                    id="inviteToTestButton">
                                                                    <i style="font-size: 20px"
                                                                        class="bi bi-person-bounding-box"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        @can('ats-SendEmail')
                                                            <div class="col-auto translated_text" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{ __('generated.Calendrier') }}">
                                                                <div class="avatar avatar-40 rounded bg-light-blue">
                                                                    <a onclick="createProfileEvent()" target="_blank">
                                                                        <i style="font-size: 20px"
                                                                            class="bi bi-calendar-event avatar   rounded"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        @can('ats-MakeEvent')
                                                            <div class="col-auto translated_text" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ __('generated.E-mail') }}">
                                                                <div class="avatar avatar-40 rounded bg-light-blue">
                                                                    <a onclick="createProfileEmail()" href="#"
                                                                        type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#emailcompose">
                                                                        <i style="font-size: 20px"
                                                                            class="bi bi-envelope avatar   rounded"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        <div class="col-auto translated_text" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="{{ __('generated.Tableau / Kanban') }}">
                                                            <!-- Toggle affichage -->
                                                            <div class="avatar avatar-40 rounded bg-light-blue click-vue click-table"
                                                                style="cursor: pointer">
                                                                <i style="font-size: 20px"
                                                                    class="bi bi-table avatar   rounded"></i>
                                                            </div>
                                                            <div class="avatar avatar-40 rounded bg-light-blue click-vue hidden click-kanban"
                                                                style="cursor: pointer">
                                                                <i style="font-size: 20px"
                                                                    class="bi bi-kanban avatar   rounded"></i>
                                                            </div>
                                                        </div>
                                                    </div> <!-- Fin row justify-content-end -->
                                                </div>
                                            </div> <!-- Fin row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kanban -->
            <div class="row mt-4 vue-kanban">
                @foreach ($statuses as $status)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3">
                        <!-- Column header -->
                        <div class="card border-0 mb-2">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar avatar-40 text-white rounded me-2"
                                    style="background-color: {{ $status['color'] }};">
                                    <i class="bi {{ $status['icon'] }} h5"></i>
                                </div>
                                <h6 class="fw-medium m-0">{{ __('generated.' . $status['label']) }}</h6>
                                {{-- <span class="badge bg-secondary ms-2 total-count"
                                        data-status="{{ __($status['id']) }}">
                                        {{ isset($grouped[$status['id']]) ? count($grouped[$status['id']]) : 0 }}
                                    </span> --}}
                            </div>
                        </div>
                        <!-- Cards column -->
                        <div class="dragzonecard rounded" id="column-{{ __($status['id']) }}"
                            data-status-id="{{ __($status['id']) }}" data-page="1"
                            data-total-pages="{{ ceil(($totals[$status['label']] ?? 0) / 3) }}"
                            style="min-height: 250px;">
                            @if (isset($grouped[$status['id']]))
                                @foreach ($grouped[$status['id']] as $application)
                                    @include('trackingApplication.inc.application_card', [
                                        'application' => $application,
                                    ])
                                @endforeach
                            @endif
                        </div>
                        <!-- Loading indicator for this column -->
                        <div class="column-loading text-center py-2" data-status="{{ __($status['id']) }}"
                            style="display: none;">
                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End kanban -->

            <!-- Tableau Kanban -->
            <div class="row mt-4 vue-table hidden">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="tableall alltable">
                                                <div class="table-responsive">

                                                <table id="trackingApplicationTable" class="table offres-table Intégrale"
                                                    data-show-toggle="true" style="width: 100%">
                                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                        <tr style="vertical-align: middle;">
                                                            <th style="font-weight: 600;">
                                                                <input type="checkbox" class="select-all"
                                                                    style="margin-left: -4px;vertical-align: middle;">
                                                            </th>
                                                            <th style="font-weight: 600;">#</th>
                                                            <th style="font-weight: 600;">{{ __('generated.Référence') }}
                                                            </th>
                                                            <th style="font-weight: 600;">{{ __('generated.Prénom') }}
                                                            </th>
                                                            <th style="font-weight: 600;">{{ __('generated.Nom') }}</th>
                                                            <th style="font-weight: 600;">{{ __('generated.Diplôme') }}
                                                            </th>
                                                            <th style="font-weight: 600;">{{ __('generated.Option') }}
                                                            </th>
                                                            <th style="font-weight: 600;">{{ __('generated.Expérience') }}
                                                            </th>
                                                            <th style="font-weight: 600;">
                                                                {{ __('generated.Poste actuel') }}</th>
                                                            <th style="font-weight: 600;">
                                                                {{ __('generated.Poste souhaité') }}</th>
                                                            <th style="font-weight: 600;">{{ __('generated.Score') }}</th>
                                                            <th style="font-weight: 600;">{{ __('generated.Etapes') }}
                                                            </th>
                                                            <th style="font-weight: 600; text-align: center;">
                                                                {{ __('generated.Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px;vertical-align: middle;">

                                                    </tbody>
                                                </table>
                                                </div>
                                                <div class="row align-items-center mx-0 mb-3">
                                                    <div class="col-6"></div>
                                                    <div class="col-6 footable-paging-external footable-paging-right mt-3"
                                                        id="footable-pagination">
                                                        <div class="footable-pagination-wrapper">
                                                            <ul class="pagination"></ul>
                                                            <div class="divider"></div>
                                                            <span class="label label-default">1
                                                                <span>{{ __('generated.sur') }}</span> 1</span>
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
            <!-- End Tableau Kanban -->

        </div>
    </main>

    @include('trackingApplication.inc.sendCandidateEmail')
    @include('trackingApplication.inc.addEvent')

    <div class="modal fade" id="modal-affect-test-manuel-to-candidate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 702px">
            <div class="modal-content theme-blue bg-gradient-theme-light" style="width: 1799px;">
                <div class="modal-header d-block" style="width: 1048px;border-bottom: 0;">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <i class="bi bi-plus-square h5 avatar   rounded"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0 translated_text">{{ __('generated.Inscrire à un test manuel') }}
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="modal-body d-block" style="width: 1048px;">
                    <div class="row mb-3 mt-3">
                        <div style="padding-left: 24px;padding-top: 20px;" class="col-6">

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group check-valid is-valid mb-3">
                                        <div class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label>
                                                <span class="translated_text">{{ __('generated.Client') }}</span>
                                            </label>
                                            <select class="form-select border-0" id="manual-client-select"
                                                style="padding-top: 24px;">
                                                <option value="" class="translated_text">
                                                    {{ __('generated.Sélectionnez un client') }}</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group check-valid is-valid mb-3">
                                        <div class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label class="translated_text">
                                                <span>{{ __('generated.Mission') }}</span></label>

                                            <select class="form-select border-0" name="job_offer_id"
                                                id="manual-missions-select" style="padding-top: 24px;">
                                                <option value="" class="translated_text">
                                                    {{ __('generated.Sélectionnez une mission') }}</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group check-valid is-valid mb-3">
                                        <div class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label class="translated_text">
                                                <span>{{ __('generated.Type de test') }}</span></label>

                                            <select class="form-select border-0" id="type-test-select"
                                                style="padding-top: 24px;">
                                                <option value="" class="translated_text">
                                                    {{ __('generated.Sélectionnez type de test') }}</option>
                                                <option value="1">{{ __('generated.Test Isograd') }}</option>
                                                <option value="2">{{ __('generated.Test HumanJobs') }}</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3 check-valid is-valid">
                                        <div class="custom-multiple-select rounded border poste-chosen select-search">
                                            <label class="translated_text">{{ __('generated.Langue') }}</label>
                                            <select class="form-select border-0" id="language-select"
                                                style="padding-top: 24px;">
                                                <option value="" class="translated_text">
                                                    {{ __('generated.Sélectionnez une langue') }}</option>
                                                @foreach ($languages as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3 check-valid is-valid">
                                        <div class="custom-multiple-select rounded border poste-chosen select-search">
                                            <label class="translated_text">{{ __('generated.Catégorie') }}</label>

                                            <select class="form-select border-0" id="group-select"
                                                style="padding-top: 24px;">
                                                <option value="" class="translated_text">
                                                    {{ __('generated.Sélectionnez une catégorie') }}</option>
                                                @foreach ($groups as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3 check-valid is-valid">
                                        <div class="custom-multiple-select rounded border poste-chosen select-search">
                                            <label class="translated_text">{{ __('generated.Sujet') }}</label>

                                            <select class="form-select border-0" id="category-select"
                                                style="padding-top: 24px;">
                                                <option value="" class="translated_text">
                                                    {{ __('generated.Sélectionnez un sujet') }}</option>
                                                @foreach ($categories as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3 check-valid is-valid">
                                        <div class="custom-multiple-select rounded border poste-chosen select-search">
                                            <label class="translated_text">{{ __('generated.Test') }}</label>

                                            <select class="form-select border-0" id="test-select"
                                                style="padding-top: 24px;">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-group list-group-flush bg-none">
                                        <li class="list-group-item text-secondary"
                                            style="padding: 0.22rem 0.75rem;border: 0;">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="nee_ful_scr">
                                                    </div>
                                                </div>
                                                <div class="col-9 ps-0 translated_text">
                                                    {{ __('generated.Avec e-surveillance') }}
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item text-secondary"
                                            style="padding: 0.22rem 0.75rem;border: 0;">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="add_pro">
                                                    </div>
                                                </div>
                                                <div class="col-9 ps-0 translated_text">
                                                    {{ __('generated.Plein écran') }}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 ms-auto" style="margin-left: 67px !important;">
                            <div class="form-group mb-3 position-relative check-valid">
                                <div class="input-group input-group-lg" style="">
                                    <div class="form-floating" style="">
                                        <div id="test-details" class="form-control border-start-0 h-auto" rows="6"
                                            style="text-align: justify;padding: 37px 18px 30px;!i;!;">
                                            <b class="description-test">

                                            </b>


                                            <br><br>

                                            <b class="translated_text">{{ __('generated.Nombre de questions') }}</b> <span
                                                class="question-count"> </span><br><br>

                                            <b
                                                class="translated_text">{{ __('generated.Temps maximal (en minutes)') }}</b>
                                            <span class="max-time"> </span>
                                        </div>
                                        <label class="hidlab translated_text">{{ __('generated.Description') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 16px;border: 0">
                    <div class="row">
                        <div class="col-12 ms-auto">
                            <div class="form-check form-switch save-test-btns">
                                <button class="btn btn-theme mnw-100 bg-blue translated_text"
                                    style="/* float: right; */font-size: 14px;margin-left: 10px">{{ __('generated.Annuler') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('profile.inc.translation') --}}
    @include('translation')


@endsection

@section('js_footer')
    <!-- Animation js -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <!-- ProgressBar.js -->
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js"></script>
    <!-- Chosen (si utilisé) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/39.0.1/ckeditor.min.js"></script>
    <!-- token CSRF -->
    <script>
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    </script>

    <script>
        document.getElementById('filter-job-offer').addEventListener('change', function() {
            const selectedValue = this.value;
            const targetInput = document.getElementById('job-offer-id'); // Replace with your input's ID

            if (targetInput) {
                targetInput.value = selectedValue;
            }
        });
        // document.getElementById('filter-job-offer').addEventListener('change', function() {
        //     const selectedValue = this.value;
        //     console.log('Selected Job Offer ID:', selectedValue);
        //     const targetInput = document.getElementById('job-offer-id'); // Replace with your input's ID

        //     if (targetInput) {
        //         targetInput.value = selectedValue;
        //     }
        // });
    </script>
    {{-- <script type="text/javascript" src="{{ asset('assets/js/event/listing.js') }}"></script> --}}

    <script>
        var trackingApplicationListingData = "{{ route('api.ats.data') }}";
        const updateStatusTableUrl = "{{ route('api.ats.update.status', ['id' => ':id']) }}";
        var updateStatusUrlBase = "{{ url('/api/tracking-applications') }}";
        const filterKanbanUrl = "{{ route('api.ats.filter.kanban') }}";
        const updateStatusKanbanUrl = "{{ route('api.ats.update.status', ['id' => ':id']) }}";
        const createProfileEventRoute = "{{ route('events.create') }}";
        var storeEventRoute = "{{ route('events.store') }}";
        const getAtsProfilesRoute = "{{ route('api.ats.getProfiles') }}";
        var apiFetchingTests = "{{ route('api.testsTechniques.fetch') }}"
        var apiFetchingTestsManual = "{{ route('api.testsTechniques.manual.fetch') }}"

        var ApiTestGetDetails = "{{ route('api.testsTechniques.getDetails') }}"
        var ApiTestResult = "{{ route('api.testsTechniques.createTestResult') }}"
        var ApiAssignTestToCandidate = "{{ route('api.testsTechniques.assignTestToCandidate') }}"


        var apiGetATSMoreApps = "{{ route('api.ats.load-more') }}"
        var ApiInviteCandidateToTest = "{{ route('api.testsTechniques.inviteTestToCandidate') }}"

        var ApiSendInvitationTest = "{{ route('api.testsTechniques.sendInvitation') }}"
        var jobOffers = @json($jobOffers);


        $(document).ready(function() {
            $('select').chosen({
                width: '100%',
                no_results_text: "Aucun résultat trouvé",
                placeholder_text_single: "Sélectionnez un choix",
            });
        });
    </script>
    <script>
        const rejectionReasons = @json(\App\Enums\TrackingApplication\RejectionReasonEnum::getAll());
    </script>
    @vite(['resources/js/trackingApplication/kanbanByStatus.js', 'resources/js/trackingApplication/listing.js'])

    <!-- ###################### START ####################### -->
    <!-- ############# Infinite Scroll JS CODE ############## -->

    <script>
        $(document).ready(function() {
            // Set up infinite scroll for each column

        });
    </script>
    <!-- ############# Infinite Scroll JS CODE ############## -->
    <!-- ###################### START ####################### -->

    {{-- Script pour Cloturer mission --}}
    <script>
        const closeJobOfferUrl = '{{ route('jobOffers.close') }}';

        $(document).ready(function() {
            $('#closeJobOfferButton').on('click', function(e) {
                e.preventDefault();

                const selectedJobOfferId = $('#filter-job-offer').val();

                if (!selectedJobOfferId || selectedJobOfferId === 'Tous') {
                    Swal.fire({
                        icon: 'warning',
                        title: '{{ __('generated.Veuillez sélectionner une mission avant de clôturer.') }}',
                        confirmButtonColor: '#005dc7',
                        confirmButtonText: '{{ __('generated.OK') }}',
                    });
                    return;
                }

                Swal.fire({
                    title: '{{ __('generated.Voulez-vous vraiment clôturer cette mission ?') }}',
                    text: '{{ __('generated.Cette action est irréversible.') }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '{{ __('generated.Oui, clôturer') }}',
                    cancelButtonText: '{{ __('generated.Annuler') }}',
                    confirmButtonColor: '#005dc7',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: closeJobOfferUrl,
                            type: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                job_offer_id: selectedJobOfferId
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: response.status === 'already_closed' ?
                                        'info' : 'success',
                                    title: response.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                if ($('#matchingTable').length) {
                                    $('#matchingTable').DataTable().ajax.reload();
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: '{{ __('generated.Erreur') }}',
                                    text: '{{ __('generated.Impossible de clôturer la mission.') }}',
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>

    {{-- End Cloture mission  --}}
    <script type="text/javascript">
        function setFocus(on) {
            var element = document.activeElement;
            if (on) {
                setTimeout(function() {
                    element.parentNode.classList.add("focus");
                });
            } else {
                let box = document.querySelector(".input-box");
                box.classList.remove("focus");
                $("input").each(function() {
                    var $input = $(this);
                    var $parent = $input.closest(".input-box");
                    if ($input.val()) $parent.addClass("focus");
                    else $parent.removeClass("focus");
                });
            }
        }
        $(document).ready(function() {
            $('#emailcompose').on('shown.bs.modal', function() {
                $('.to-email').each(function() {
                    // Access checkbox properties
                    if ($(this).is(':checked')) {
                        $('.destinataires').parent().addClass("focus")
                        $('.destinataires').val($(this).attr('target-data'));
                    }
                });
                if (!$('.vue-table').hasClass('hidden')) {
                    $('.to-email-2').each(function() {
                        // Access checkbox properties
                        if ($(this).is(':checked')) {
                            $('.destinataires').parent().addClass("focus")
                            $('.destinataires').val($(this).attr('target-data'));
                        }
                    });
                }
            });
            $('.click-vue').on('click', function() {
                if ($('.vue-table.hidden').length > 0) {
                    $('.vue-kanban').addClass('hidden');
                    $('.vue-table').removeClass('hidden');

                    $('.click-kanban').removeClass('hidden');
                    $('.click-table').addClass('hidden');
                } else {
                    $('.vue-kanban').removeClass('hidden');
                    $('.vue-table').addClass('hidden');

                    $('.click-kanban').addClass('hidden');
                    $('.click-table').removeClass('hidden');
                }
            })
            $('.tkh-filter label').addClass('hidden');
            $('.tkh-filter select').addClass('filter-empty');
            $('.tkh-filter select').on('change', function() {
                var value = $(this).val();
                if (value != 0) {
                    $(this).parent('.tkh-filter').children('label').removeClass('hidden');
                    $(this).removeClass('filter-empty');
                    //$(this+' select').removeClass('filter-empty');
                } else {
                    $(this).parent('.tkh-filter').children('label').addClass('hidden');
                    $(this).addClass('filter-empty');
                }
            })

            $('.bi-camera').on('click', function() {
                $('#demofile').click();
            })
            $('.bnk-1').on('click', function() {
                $('.entreprise-logo').addClass('hidden');
                $('.bnk-photo1').removeClass('hidden');
            });
            $('.bnk-2').on('click', function() {
                $('.entreprise-logo').addClass('hidden');
                $('.bnk-photo2').removeClass('hidden');
            });
            $('.bnk-3').on('click', function() {
                $('.entreprise-logo').addClass('hidden');
                $('.bnk-photo3').removeClass('hidden');
            });
            $('.bnk-4').on('click', function() {
                $('.entreprise-logo').addClass('hidden');
                $('.bnk-photo4').removeClass('hidden');
            });
            $('.bnk-5').on('click', function() {
                $('.entreprise-logo').addClass('hidden');
                $('.bnk-photo5').removeClass('hidden');
            });
            $('.bnk-6').on('click', function() {
                $('.entreprise-logo').addClass('hidden');
                $('.bnk-photo6').removeClass('hidden');
            });
            $('.bnk-7').on('click', function() {
                $('.entreprise-logo').addClass('hidden');
                $('.bnk-photo7').removeClass('hidden');
            });
            /*$('.nav-item .nav-link').on('click',function(){
                if($('#contactus').hasClass('show')){
                    $('.bt-ajouter').removeClass('hidden');
                }else{
                    $('.bt-ajouter').addClass('hidden');
                }
            })*/
            $('.chosen-single span').each(function() {
                var gethtml = $(this).html();
                if (gethtml == 'Selectionner') {
                    $(this).attr('style', 'opacity: 0.4;');
                }
            })
        });
    </script>

    <!-- Initialisation de Chosen -->
    <script>
        $(document).ready(function() {
            $(".chosenoptgroup").chosen();
        });
    </script>

    <!--  CKEditor  -->
    <script>
        // Initialisation de CKEditor
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                placeholder: '{{ __('Composez votre message...') }}',
                language: 'fr',
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload'
                ],
            })
            .catch(error => {
                console.error(error);
            });

        // Gestion du formulaire
        if (document.getElementById('emailForm')) {
            document.getElementById('emailForm').addEventListener('submit', function(e) {
                e.preventDefault();
                // Logique d'envoi d'email
                const formData = {
                    recipients: document.getElementById('recipients').value,
                    cc: document.getElementById('cc').value,
                    subject: document.getElementById('subject').value,
                    content: document.querySelector('.ck-content').innerHTML
                };
                console.log('Email data:', formData);
            });
        }
        // Focus handling
        function setFocus(isFocused) {
            const inputs = document.querySelectorAll('.input-1');
            inputs.forEach(input => {
                if (isFocused) {
                    input.classList.add('focused');
                } else if (!input.value) {
                    input.classList.remove('focused');
                }
            });
        }
    </script>
@endsection
