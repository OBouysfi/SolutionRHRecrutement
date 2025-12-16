@extends('client_portal.layouts.portal')

@section('title', __('generated.Tracking Application'))

@section('css_header')
    <link rel="stylesheet" href="{{ asset('assets/vendor/dragula/dragula.min.css') }}">
    <style>
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
    </style>
@endsection

@section('content')

    <main class="main mainheight">

        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.ATS - Application Tracking System") }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>

                {{-- <div class="col col-sm-auto">
                <div class="input-group input-group-md">
                    <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                    <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                </div>
            </div> --}}
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ __("generated.contact") }}">
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
                    data-bs-placement="top" title="{{ __("generated.Chatbot") }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
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
                            <!-- Rangée principale, 3 colonnes sur grand écran (3+3+6=12) -->
                            <div class="row align-items-end g-3">

                                <!-- Colonne 1 : Client -->
                                {{-- <div class="col-12 col-md-4 col-lg-3">
                                    <div class="custom-multiple-select rounded border poste-chosen"
                                        style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important; padding: 4px;">
                                        <label class="mt-2 ms-2 text-secondary mb-0 small ">{{ __("generated.Client") }}</label>
                                        <select id="filter-client" class="chosenoptgroup w-100">
                                            <option value="">Tous</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ __($client->id) }}">{{ __($client->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <!-- Fin Colonne 1 -->

                                <!-- Colonne 2 : Offre d'emploi -->
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="custom-multiple-select rounded border poste-chosen"
                                        style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important; padding: 4px;">
                                        <label class="mt-2 ms-2 text-secondary mb-0 small ">{{ __("generated.Offre d'emploi") }}</label>
                                        <select id="filter-job-offer" class="chosenoptgroup w-100">
                                            <option value="">Tous</option>
                                            @foreach ($jobOffers as $jobOffer)
                                                <option value="{{ __($jobOffer->id) }}">{{ __($jobOffer->title) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Fin Colonne 2 -->

                                <!-- Colonne 3 : Récap (Shortlist, En process, Accepté, Rejeté) -->
                                <div class="col-12 col-md-4 col-lg-9">
                                    <!-- Rangée de 4 petites cartes (2 par ligne en xs, 4 par ligne en sm) -->
                                    <div class="row row-cols-2 row-cols-sm-4 g-2">

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
                                                <div style="border-bottom: 1px solid var(--adminux-theme) !important" class="card border-0 border-bottom border-primary-subtle bg-light-theme">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-3">
                                                                <div class="bg-{{ __($card['color']) }} text-white rounded-circle d-flex justify-content-center align-items-center"
                                                                    style="width: 30px; height: 30px;">
                                                                    <i class="bi {{ __($card['icon']) }}"></i>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <p class="small text-secondary mb-1 translated_text">
                                                                    {{ __($card['label']) }}</p>
                                                                <h6 class="fw-medium mb-0">{{ __($card['count']) }}</h6>
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

                            </div> <!-- Fin .row align-items-end g-3 -->
                        </div> <!-- Fin .card-body -->
                    </div> <!-- Fin .card -->
                </div> <!-- Fin .col-12 -->
            </div>


           <div class="row mb-3">
    @php
        $cards = [
            [
                'title' => __('Acceptation des offres'),
                'percentage' => $acceptanceStats['acceptancePercentage'],
                'secondaryPercentage' => $acceptanceStats['rejectionPercentage'],
                'primaryLabel' => __('generated.Offre acceptée: :count Candidats', ['count' => $acceptanceStats['acceptedCount']]),
                'secondaryLabel' => __('generated.Offre refusée: :count Candidats', ['count' => $acceptanceStats['rejectedCount']]),
                'primaryColor' => '#4e7393',
                'secondaryColor' => '#87a5c3',
                'isTimeCard' => false
            ],
            [
                'title' => __('Sélection client'),
                'percentage' => $clientSelectionStats['clientSelectionPercentage'],
                'secondaryPercentage' => 100,
                'primaryLabel' => __('generated.Sélection cabinet: :count Candidats', ['count' => $clientSelectionStats['cabinetSelectionCount']]),
                'secondaryLabel' => __('generated.Sélection client: :count Candidats', ['count' => $clientSelectionStats['clientSelectionCount']]),
                'primaryColor' => '#4e7393',
                'secondaryColor' => '#87a5c3',
                'isTimeCard' => false
            ],
            [
                'title' => __('Conversion à l\'embauche'),
                'percentage' => $conversionStats['conversionPercentage'],
                'secondaryPercentage' => 100,
                'primaryLabel' => __('generated.Sélection client: :count Candidats', ['count' => $conversionStats['clientSelectionCount']]),
                'secondaryLabel' => __('generated.Candidat embauché: :count Candidats', ['count' => $conversionStats['hiredCount']]),
                'primaryColor' => '#4e7393',
                'secondaryColor' => '#87a5c3',
                'isTimeCard' => false
            ],
            [
                'title' => __('Temps de recrutement'),
                'percentage' => ($recruitmentTimeStats['realizedTime'] / $recruitmentTimeStats['estimatedTime']) * 100,
                'secondaryPercentage' => 100,
                'primaryLabel' => __('generated.Temps estimé: :days Jours', ['days' => $recruitmentTimeStats['estimatedTime']]),
                'secondaryLabel' => __('generated.Temps réalisé: :days Jours', ['days' => $recruitmentTimeStats['realizedTime']]),
                'primaryColor' => '#4e7393',
                'secondaryColor' => '#87a5c3',
                'isTimeCard' => true,
                'valueText' => __('generated.:days Jours', ['days' => $recruitmentTimeStats['realizedTime']])

            ]
        ];
    @endphp

    @foreach ($cards as $card)
        <div class="col-12 col-md-6 col-xl-3 mb-3 mb-xl-0">
            <div class="card border-light-gray h-100">
                <div class="card-header  ">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="small mb-0 fw-bold text-dark translated_text ">{{ __("generated.".$card['title']) }}</p>
                        <p class="small mb-0 fw-bold fs-5 text-dark">
                            {{ $card['isTimeCard'] ? __($card['valueText']) : $card['percentage'] . '%' }}
                        </p>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <!-- Primary progress bar (always 100% for secondary metrics) -->

                    <div class="mb-2">
                        <div class="progress progress-thin bg-light-primary">
                            <div class="progress-bar" role="progressbar"
                                style="width: 100%; background-color: {{ __($card['primaryColor']) }}"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>

                    <!-- Secondary progress bar (actual metric) -->
                    <div class="mb-3">
                        <div class="progress progress-thin bg-light-secondary">
                            <div class="progress-bar" role="progressbar"
                                style="width: {{ __($card['percentage']) }}%; background-color: {{ __($card['secondaryColor']) }}"
                                aria-valuenow="{{ __($card['percentage']) }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>

                    <!-- Legend items -->
                    <div class="legend-item mb-2">
                        <div class="d-flex align-items-center">
                            <div class="legend-color me-2" style="height: 12px;width: 12px; background-color: {{ __($card['primaryColor']) }}"></div>
                            <p class="small mb-0 translated_text text-dark">{{ __($card['primaryLabel']) }}</p>
                        </div>
                    </div>

                    <div class="legend-item">
                        <div class="d-flex align-items-center">
                            <div class="legend-color me-2" style="height: 12px;width: 12px; background-color: {{ __($card['secondaryColor']) }}"></div>
                            <p class="small mb-0 translated_text text-dark">{{ __($card['secondaryLabel']) }}</p>
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
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-md-6">
                                                    <h5 class="mb-0 ">{{ __("generated.Suivi de la mission") }}</h5>
                                                </div>
                                                <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
                                                    <div class="row justify-content-end gx-3">
                                                        <!--  Clôturer -->
                                                        <div class="col-auto translated_text" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="{{ __("generated.Clôturer") }}">
                                                            <div class="avatar avatar-40 rounded bg-light-blue">
                                                                <a href="#" id="closeJobOfferButton">
                                                                    <i style="font-size: 20px"
                                                                        class="bi bi-door-closed"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        @can('ats-SendEmail')
                                                            <div class="col-auto translated_text" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ __("generated.Calendrier") }}">
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
                                                                data-bs-placement="top" title="{{ __("generated.E-mail") }}">
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
                                                            data-bs-placement="top" title="{{ __("generated.Tableau / Kanban") }}">
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
                        <!-- En-tête de la colonne -->
                        <div class="card border-0 mb-2">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar avatar-40 text-white rounded me-2"
                                    style="background-color: {{ __($status['color']) }};">
                                    <i class="bi {{ __($status['icon']) }} h5"></i>
                                </div>
                                <h6 class="fw-medium m-0">{{ __('generated.' . $status['label']) }}</h6>
                            </div>
                        </div>
                        <!-- Colonne de cartes -->
                        <div class="dragzonecard p-2  rounded" id="column-{{ __($status['id']) }}"
                            data-status-id="{{ __($status['id']) }}" style="min-height: 250px;">
                            @if (isset($grouped[$status['id']]))
                                @foreach ($grouped[$status['id']] as $application)
                                    <div class="card mb-3 draggable-card" data-application-id="{{ __($application->id) }}"
                                        data-ratio="{{ optional($application->match)->ratio ?? 0 }}">
                                        <div class="card-body p-2">
                                            <!-- En-tête de la carte -->
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 coverimg me-1 translated_text"
                                                        data-bs-toggle="tooltip" title="{{ __("generated.Photo") }}"
                                                        style="background-image: url('{{ asset($application->profile?->path_picture ? 'storage/' . $application->profile?->path_picture : ($application->profile?->sexe === 'Femme' ? 'assets/img/Femmes/female-default.webp' : 'assets/img/Hommes/male-default.webp')) }}');">
                                                        <img src="{{ asset($application->profile?->path_picture ? 'storage/' . $application->profile?->path_picture : ($application->profile?->sexe === 'Femme' ? 'assets/img/ats/female-default.jpg' : 'assets/img/ats/male-default.webp')) }}"
                                                            alt="Photo de {{ __($application->profile?->first_name) }}"
                                                            class="img-fluid rounded" style="display: none;">
                                                    </div>
                                                </div>
                                                <div class="col fs-12">
                                                    <p class="mb-1 small text-muted translated_text">
                                                        Réf : {{ $application->profile?->matricule ?? $application->id }}
                                                    </p>
                                                    <p class="mb-0">{{ __($application->profile?->first_name) }}</p>
                                                    <p class="mb-0">{{ __($application->profile?->last_name) }}</p>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="dropdown">
                                                        <a class="text-secondary" data-bs-toggle="dropdown"
                                                            role="button">
                                                            <i class="bi bi-three-dots-vertical"
                                                                style="font-size: 14px;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li>
                                                                @if ($application->match && $application->profile && $application->jobOffer)
                                                                    <a class="dropdown-item "
                                                                        href="{{ route('matching.detail', [$application->match->id, $application->profile?->id, $application->jobOffer->id]) }}" target="_blank"> {{__("generated.Détail") }}</a>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                @if ($application->match && $application->profile && $application->jobOffer && !$application->is_abandon_candidature)
                                                                    <a class="dropdown-item abandon-candidature "
                                                                        href="javascript:void(0);"
                                                                        data-id="{{ __($application->id) }}"> {{__("generated.abandon_candidature") }}</a>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                @if ($application->is_abandon_candidature)
                                                                    <a class="dropdown-item restore-candidature "
                                                                        href="javascript:void(0);"
                                                                        data-id="{{ __($application->id) }}"> {{ __("generated.Restaurer candidature") }}</a>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Titre du poste -->
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <p class="fw-bold mb-0" style="font-size: 13px;">
                                                        {{ __($application->jobOffer->title) }}</p>
                                                </div>
                                            </div>
                                            <!-- Score Matching avec ProgressBar -->
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <span class="small ">{{ __("generated.Score Matching") }}</span>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Le conteneur de la progress bar DOIT avoir une taille définie via CSS -->
                                                    <div class="circle-small" id="circle-{{ __($application->id) }}"></div>
                                                </div>
                                            </div>
                                            @if ($application->is_abandon_candidature)
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <span class="badge bg-danger abandon-tag "
                                                            title="Candidature abandonnée">{{ __("generated.Candidature abandonnée") }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-footer p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 coverimg rounded-circle"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ __($application->profile?->first_name) }}"
                                                        style="background-image: url('{{ asset($application->profile?->path_picture ?? 'assets/img/team/default.jpg') }}'); background-size: cover; width: 40px; height: 40px;">
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <label class="custom-checkbox mb-0">
                                                        <input type="checkbox" class="to-email"
                                                            target-data="{{ __($application->profile?->email) }}">
                                                        <span class="checkmark" data-bs-toggle="tooltip"
                                                            title="Sélectionner"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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
                                                <table id="trackingApplicationTable" class="table offres-table Intégrale"
                                                    data-show-toggle="true" style="width: 100%">
                                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                        <tr style="vertical-align: middle;">
                                                            <th style="font-weight: 600;">
                                                                <input type="checkbox" class="select-all"
                                                                    style="margin-left: -4px;vertical-align: middle;">
                                                            </th>
                                                            <th style="font-weight: 600;">#</th>
                                                            <th style="font-weight: 600;" >{{ __("generated.Référence") }}</th>
                                                            <th style="font-weight: 600;" >{{ __("generated.Prénom") }}</th>
                                                            <th style="font-weight: 600;" >{{ __("generated.Nom") }}</th>
                                                            <th style="font-weight: 600;" >{{ __("generated.Diplôme") }}</th>
                                                            <th style="font-weight: 600;" >{{ __("generated.Option") }}</th>
                                                            <th style="font-weight: 600;" >{{ __("generated.Expérience") }}</th>
                                                            <th style="font-weight: 600;" >{{ __("generated.Poste actuel") }}</th>
                                                            <th style="font-weight: 600;" >{{ __("generated.Poste souhaité") }}</th>
                                                            <th style="font-weight: 600;">{{ __("generated.Score") }}</th>
                                                            <th style="font-weight: 600;">{{ __("generated.Etapes") }}</th>
                                                            <th
                                                                style="font-weight: 600; text-align: center;">{{ __("generated.Action") }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px;vertical-align: middle;">

                                                    </tbody>
                                                </table>
                                                <div class="row align-items-center mx-0 mb-3">
                                                    <div class="col-6"></div>
                                                    <div class="col-6 footable-paging-external footable-paging-right mt-3"
                                                        id="footable-pagination">
                                                        <div class="footable-pagination-wrapper">
                                                            <ul class="pagination"></ul>
                                                            <div class="divider"></div>
                                                            <span class="label label-default">1 <span
                                                                    >{{ __("generated.sur") }}</span> 1</span>
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

    @include('client_portal.trackingApplication.inc.sendCandidateEmail')
    @include('client_portal.trackingApplication.inc.addEvent')

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
    {{-- <script type="text/javascript" src="{{ asset('assets/js/event/listing.js') }}"></script> --}}

    <script>
        var trackingApplicationListingData = "{{ route('candidate-portal.api.ats.dataclient-portal') }}";
        const updateStatusTableUrl = "{{ route('api.ats.update.status', ['id' => ':id']) }}";
        var updateStatusUrlBase = "{{ url('/api/tracking-applications') }}";
        const filterKanbanUrl = "{{ route('api.ats.filter.kanban') }}";
        const updateStatusKanbanUrl = "{{ route('api.ats.update.status', ['id' => ':id']) }}";
        const createProfileEventRoute = "{{ route('events.create') }}";
        var storeEventRoute = "{{ route('events.store') }}";
        const getAtsProfilesRoute = "{{ route('api.ats.getProfiles') }}";

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
    @vite(['resources/js/clientPortal/trackingApplication/kanbanByStatus.js', 'resources/js/clientPortal/trackingApplication/listing.js'])

    {{-- Script pour Cloturer mission --}}
    <script>
        const closeJobOfferUrl = '{{ route('candidate.jobOffers.close') }}';

        $(document).ready(function() {
            $('#closeJobOfferButton').on('click', function(e) {
                e.preventDefault();
                const translations = {
                    fr: {
                        selectJobOfferWarning: 'Veuillez sélectionner une mission avant de clôturer.',
                        confirmCloseTitle: 'Voulez-vous vraiment clôturer cette mission ?',
                        confirmCloseText: 'Cette action est irréversible.',
                        confirmCloseButton: 'Oui, clôturer',
                        cancelButton: 'Annuler',
                        errorTitle: 'Erreur',
                        closeErrorText: 'Impossible de clôturer la mission.',
                    },
                    en: {
                        selectJobOfferWarning: 'Please select a job offer before closing it.',
                        confirmCloseTitle: 'Do you really want to close this job offer?',
                        confirmCloseText: 'This action is irreversible.',
                        confirmCloseButton: 'Yes, close it',
                        cancelButton: 'Cancel',
                        errorTitle: 'Error',
                        closeErrorText: 'Unable to close the job offer.',
                    },
                    es: {
                        selectJobOfferWarning: 'Por favor, seleccione una oferta de trabajo antes de cerrarla.',
                        confirmCloseTitle: '¿Realmente desea cerrar esta oferta de trabajo?',
                        confirmCloseText: 'Esta acción es irreversible.',
                        confirmCloseButton: 'Sí, cerrarla',
                        cancelButton: 'Cancelar',
                        errorTitle: 'Error',
                        closeErrorText: 'No se pudo cerrar la oferta de trabajo.',
                    },
                    pt: {
                        selectJobOfferWarning: 'Selecione uma oferta de emprego antes de fechar.',
                        confirmCloseTitle: 'Você realmente deseja encerrar esta oferta de emprego?',
                        confirmCloseText: 'Esta ação é irreversível.',
                        confirmCloseButton: 'Sim, encerrar',
                        cancelButton: 'Cancelar',
                        errorTitle: 'Erro',
                        closeErrorText: 'Não foi possível encerrar a oferta de emprego.',
                    },
                    ar: {
                        selectJobOfferWarning: 'يرجى اختيار المهمة قبل الإغلاق.',
                        confirmCloseTitle: 'هل تريد حقًا إغلاق هذه المهمة؟',
                        confirmCloseText: 'هذا الإجراء لا رجعة فيه.',
                        confirmCloseButton: 'نعم، إغلاق',
                        cancelButton: 'إلغاء',
                        errorTitle: 'خطأ',
                        closeErrorText: 'تعذر إغلاق المهمة.',
                    },
                    zh: {
                        selectJobOfferWarning: '请先选择一个职位再关闭。',
                        confirmCloseTitle: '您确定要关闭此职位吗？',
                        confirmCloseText: '此操作不可撤销。',
                        confirmCloseButton: '是的，关闭',
                        cancelButton: '取消',
                        errorTitle: '错误',
                        closeErrorText: '无法关闭该职位。',
                    },
                };

                const locale = document.documentElement.lang || "fr";
                const t = translations[locale] || translations.fr;

                const selectedJobOfferId = $('#filter-job-offer').val();

                if (!selectedJobOfferId || selectedJobOfferId === 'Tous') {
                    Swal.fire({
                        icon: 'warning',
                        title: t.selectJobOfferWarning,
                        showConfirmButton: true,
                        confirmButtonText: t.confirmCloseButton,
                        confirmButtonColor: '#005dc7',
                    });
                    return;
                }

                Swal.fire({
                    title: t.confirmCloseTitle,
                    text: t.confirmCloseText,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: t.confirmCloseButton,
                    cancelButtonText: t.cancelButton,
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
                                    title: t.errorTitle,
                                    text: t.closeErrorText,
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
                placeholder: 'Composez votre message...',
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
