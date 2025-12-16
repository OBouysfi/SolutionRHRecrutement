@extends('layouts.master')

@section('title', __('generated.Ajouter offre d\'emploi'))

@section('css_header')

    <!-- chosen css -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/chosen_v1.8.7/chosen.min.css') }}"> --}}

    <!-- Include Select2 CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #0d6efd;
            /* Bootstrap primary */
            border: none;
            border-radius: 1rem;
            color: white;
            padding: 0.25rem 0.75rem;
            margin-top: 0.25rem;
            margin-right: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.2s ease;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            margin-left: 0.5rem;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #ffc107;
            /* Bootstrap warning for hover effect */
        }

        .select2-selection__choice__remove {
            border: 0 !important;
            height: 100%;
            line-height: 48px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #4c9ee1 !important;
            /* color: #212529; */
            border-radius: 1rem;
            padding: 0 0.75rem;
            /* padding: 0.25rem 0.75rem; */
            font-size: 0.875rem;
            font-weight: 500;
            border: 1px solid #dee2e6;
            padding-left: 25px !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #dc3545;
        }


        /* Style the Select2 multi-select input */
        .select2-container--default .select2-selection--multiple {
            position: relative;
            padding-right: 2.5rem;
            min-height: 42px;
            background-color: #dbeafe;
            border-radius: 0.375rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            height: calc(3.5rem + 2px);
        }

        /* Add a custom dropdown arrow */
        .select2-container--default .select2-selection--multiple::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 6px solid #333;
            /* color of the arrow */
            pointer-events: none;
            z-index: 10;
        }

        /* Optional: hide any default arrow that might interfere */
        .select2-container--default .select2-selection__arrow {
            display: none !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__clear{
            display: none;
        }
    </style> --}}

    {{-- /* Désactiver les flèches seulement pour les inputs avec la classe .no-spin */ --}}
    {{-- <style>
        .no-spin::-webkit-outer-spin-button,
        .no-spin::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        .no-spin {
        -moz-appearance: textfield;
        }
    </style> --}}
    <style>
        .custom-file-input {
            display: none;
        }

        .btn-light {
            background-color: #f8f9fa;
            color: #169889;
            border: 1px solid #ced4da;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-align: center;
            cursor: pointer;
        }

        .btn i:first-child {
            margin-right: 0 !important;
        }

        .btn-light:hover {
            background-color: #e2e6ea;
        }
    </style>

    <!-- CSS Select2 -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Missions") }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="contact">
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
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: black;">
                        <img src="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" alt=""
                            style="display: none;">
                    </figure>
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Créer offre d'emploi") }}</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">
            <div class="row mb-5 justify-content-center">
                <div class="col-10">
                    <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button style="font-size: 14px" class="nav-link active " id="personal-tab"
                                data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab"
                                aria-controls="personal" aria-selected="true">{{ __("generated.Recrutement") }}</button>
                        </li>
                        <li class="nav-item" role="presentation2">
                            <button style="font-size: 14px" class="nav-link  " id="personal2-tab"
                                data-bs-toggle="tab" data-bs-target="#personal2" type="button" role="tab"
                                aria-controls="personal2" aria-selected="false" tabindex="-1">{{ __("generated.Échelle") }}</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <form id="jobOfferForm" action="{{ route('jobOffer.storeJobOffer') }}" method="POST">
                        @csrf
                        <div class="tab-content py-3" id="myTabContent" style="background-color: transparent">
                            {{-- star partie Recrutement --}}
                            <div class="tab-pane fade active show" id="personal" role="tabpanel"
                                aria-labelledby="personal-tab">
                                {{-- star Détails du Poste --}}
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card border-0">
                                                                            <div
                                                                                class="card-header bg-gradient-theme-light">
                                                                                <div class="row align-items-center">
                                                                                    <h6
                                                                                        class="fw-medium mb-0 ">{{ __("generated.Détails du Poste") }}</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row g-3">
                                                                                    <!-- Client -->
                                                                                    {{-- <div class="col-12 col-md-6 col-lg-2">
                                                                                        <div class="form-group position-relative check-valid is-valid">
                                                                                            <div class="input-group input-group-lg">
                                                                                                <div class="form-floating w-100">
                                                                                                    <select required name="client_id" id="client_id" class="form-select border-0">
                                                                                                        <option value="" >{{ __("generated.Sélectionnez un client") }}</option>
                                                                                                        @foreach ($clients as $client)
                                                                                                            <option value="{{ __($client->id) }}" {{ old('client_id') == $client->id ? 'selected' : '' }} class=" translated_text"> {{ __($client->name) }}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <label for="client_id"><span >{{ __("generated.Client") }}</span><span class="text-themeColor">*</span></label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> --}}

                                                                                    <!-- Client -->
                                                                                    <div class="col-12 col-md-6 col-lg-3">
                                                                                        <div class="form-group position-relative check-valid is-valid">
                                                                                            <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important;  ">
                                                                                                <label><span >{{ __("generated.Client") }}</span><span class="text-themeColor">*</span></label>
                                                                                                <select required name="client_id" id="client_id" class="chosenoptgroup w-100 select-search-chosen">
                                                                                                    <option value="" >{{ __("generated.Sélectionnez un client") }}</option>
                                                                                                    @foreach ($clients as $client)
                                                                                                        <option value="{{ __($client->id) }}" {{ old('client_id') == $client->id ? 'selected' : '' }} class=" translated_text"> {{ __($client->name) }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Title -->
                                                                                    <div class="col-12 col-md-6 col-lg-3">
                                                                                        <div
                                                                                            class="form-group position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="title"
                                                                                                        id="title"
                                                                                                        required
                                                                                                        placeholder="{{ __("generated.Intitulé de la mission") }}"
                                                                                                        class="form-control border-start-0 translated_text"
                                                                                                        value="{{ old('title') }}">
                                                                                                    <label for="title"
                                                                                                        class=" translated_text">{{ __("generated.Intitulé de la mission") }}<span
                                                                                                            class="text-themeColor">*</span></label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Poste -->
                                                                                    <div class="col-12 col-md-6 col-lg-2">
                                                                                        <div
                                                                                            class="form-group check-valid is-valid">
                                                                                            <div id="profession-selector"
                                                                                                class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                                style="border-radius: 8px !important;  ">
                                                                                                <label><span
                                                                                                        >{{ __("generated.Poste") }}</span>
                                                                                                    <span
                                                                                                        class="text-themeColor">*</span></label>
                                                                                                <select required
                                                                                                    name="profession_id"
                                                                                                    id="profession_id"
                                                                                                    class="chosenoptgroup w-100 select-search-chosen">
                                                                                                    <option value=""
                                                                                                        selected
                                                                                                        >{{ __("generated.Sélectionner le poste") }}</option>
                                                                                                    @foreach ($professions as $profession)
                                                                                                        <option
                                                                                                            value="{{ __($profession->id) }}"
                                                                                                            {{ old('profession_id') == $profession->id ? 'selected' : '' }}
                                                                                                            class=" translated_text">
                                                                                                            {{ __($profession->label) }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Secteur d'activité -->
                                                                                    <div class="col-12 col-md-6 col-lg-2">
                                                                                        <div
                                                                                            class="form-group position-relative check-valid is-valid">
                                                                                            <div id="profession-selector"
                                                                                                class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                                style="border-radius: 8px !important;  ">
                                                                                                <label><span
                                                                                                        >{{ __("generated.Secteur d'activité") }}</span>
                                                                                                    <span
                                                                                                        class="text-themeColor">*</span></label>
                                                                                                <select required
                                                                                                    name="activity_area_id"
                                                                                                    id="activity_area_id"
                                                                                                    class="chosenoptgroup w-100 select-search-chosen">
                                                                                                    <option value=""
                                                                                                        selected
                                                                                                        >{{ __("generated.Secteur d'activitée") }}</option>
                                                                                                    @foreach ($activityAreas as $activityArea)
                                                                                                        <option
                                                                                                            value="{{ __($activityArea->id) }}"
                                                                                                            {{ old('activity_area_id') == $activityArea->id ? 'selected' : '' }}
                                                                                                            class=" translated_text">
                                                                                                            {{ __($activityArea->label) }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Type de contrat -->
                                                                                    <div class="col-12 col-md-6 col-lg-2">
                                                                                        <div
                                                                                            class="form-group position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating w-100">
                                                                                                    <select required
                                                                                                        name="contract_type_id"
                                                                                                        id="contract_type_id"
                                                                                                        class="form-select border-0">
                                                                                                        <option
                                                                                                            value=""
                                                                                                            >{{ __("generated.Type de contrat") }}</option>
                                                                                                        @foreach ($contractsTypes as $key => $contractsType)
                                                                                                            <option
                                                                                                                value="{{ $key }}"
                                                                                                                {{ old('contract_type_id') == $key ? 'selected' : '' }}
                                                                                                                class=" translated_text">
                                                                                                                {{ __($contractsType) }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="contract_type_id"><span
                                                                                                            >{{ __("generated.Type de contrat") }}</span>
                                                                                                        <span
                                                                                                            class="text-themeColor">*</span></label>
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
                                    </div>
                                </div>
                                {{-- end Détails du Poste --}}

                                {{-- star Informations sur la mission --}}
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-header bg-gradient-theme-light">
                                                                <div class="row align-items-center">
                                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Informations sur la mission") }}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row g-3">
                                                                    <!-- Date début -->
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div
                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                            <div class="input-group input-group-lg">
                                                                                <div class="form-floating">
                                                                                    <input required type="date"
                                                                                        name="mission_started_at"
                                                                                        id="mission_started_at"
                                                                                        class="form-control border-start-0 translated_text"
                                                                                        value="{{ old('mission_started_at') }}">
                                                                                    <label for="mission_started_at"><span
                                                                                            >{{ __("generated.Date début") }}</span> <span
                                                                                            class="text-themeColor">*</span></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Date fin -->
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div
                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                            <div class="input-group input-group-lg">
                                                                                <div class="form-floating">
                                                                                    <input required type="date"
                                                                                        name="mission_finished_at"
                                                                                        id="mission_finished_at"
                                                                                        class="form-control border-start-0"
                                                                                        value="{{ old('mission_finished_at') }}">
                                                                                    <label for="mission_finished_at"
                                                                                        class=" translated_text">{{ __("generated.Date fin") }}
                                                                                        <span
                                                                                            class="text-themeColor">*</span></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Lieu -->
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group mb-3 check-valid is-valid">
                                                                            <div id="city-selector"
                                                                                class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                style="border-radius: 8px !important;  ">
                                                                                <label><span
                                                                                        >{{ __("generated.Lieu") }}</span>
                                                                                    <span
                                                                                        class="text-themeColor">*</span></label>
                                                                                <select required name="city_id"
                                                                                    id="city_id"
                                                                                    class="chosenoptgroup w-100 select-search-chosen">
                                                                                    <option value="" selected
                                                                                        >{{ __("generated.Tous") }}</option>
                                                                                    @foreach ($cities as $city)
                                                                                        <option
                                                                                            value="{{ __($city->id) }}"
                                                                                            {{ old('city_id') == $city->id ? 'selected' : '' }}
                                                                                            class=" translated_text">
                                                                                            {{ __($city->name) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row g-3">
                                                                    <!-- Nombre Profile -->
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group position-relative check-valid is-valid">
                                                                            <div class="input-group input-group-lg">
                                                                                <div class="form-floating">
                                                                                    <input required type="number"
                                                                                        name="nbr_profiles"
                                                                                        id="nbr_profiles"
                                                                                        placeholder="{{ __("generated.Nombre de profils") }}"
                                                                                        class="form-control border-start-0 translated_text"
                                                                                        value="{{ old('nbr_profiles') }}">
                                                                                    <label for="nbr_profiles"><span
                                                                                        >{{ __("generated.Nombre de profils") }}</span>
                                                                                        <span class="text-themeColor">*</span></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    {{-- <!-- Évaluateur client -->
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group position-relative check-valid is-valid">
                                                                            <div class="input-group input-group-lg">
                                                                                <div class="form-floating w-100">
                                                                                    <select required name="client_evaluator" id="client_evaluator" class="form-select border-0">
                                                                                        <option value="" >{{ __("generated.Sélectionnez un évaluateur") }}</option>
                                                                                    </select>
                                                                                    <label for="client_evaluator"><span >{{ __("generated.Évaluateur client") }}</span> <span class="text-themeColor">*</span></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Évaluateur entreprise -->
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group position-relative check-valid is-valid">
                                                                            <div class="input-group input-group-lg">
                                                                                <div class="form-floating">
                                                                                    <select required name="company_evaluator" id="company_evaluator" class="form-select border-0">
                                                                                        <option value="" >{{ __("generated.Sélectionnez un évaluateur d'entreprise") }}</option>
                                                                                        @foreach ($evaluators as $evaluator)
                                                                                            <option value="{{ __($evaluator->id) }}" {{ old('company_evaluator') == $evaluator->id ? 'selected' : '' }} class=" translated_text"> {{ $evaluator->first_name . ' ' . $evaluator->last_name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <label for="company_evaluator"><span >{{ __("generated.Évaluateur entreprise") }}</span> <span class="text-themeColor">*</span></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}

                                                                    <!-- Évaluateur client -->
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group check-valid is-valid">
                                                                            <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                                <label><span >{{ __("generated.Évaluateur client") }}</span> <span class="text-themeColor">*</span></label>
                                                                                <select required name="client_evaluator[]" class="chosenoptgroup w-100 input-1 select2" data-placeholder="{{ __("generated.Sélectionnez un évaluateur") }}"
                                                                                    {{-- data-placeholder="Sélectionnez un évaluateur" --}}
                                                                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="client_evaluator" multiple>
                                                                                    {{-- <option value="" >{{ __("generated.Sélectionnez un évaluateur") }}</option> --}}
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Évaluateur entreprise -->
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group check-valid is-valid">
                                                                            <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                                <label><span >{{ __("generated.Évaluateur entreprise") }}</span> <span class="text-themeColor">*</span></label>
                                                                                <select required name="company_evaluator[]" class="chosenoptgroup w-100 input-1 select2"
                                                                                    data-placeholder="{{ __("generated.Sélectionnez un évaluateur d'entreprise") }}"
                                                                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="company_evaluator" multiple>
                                                                                    <option value="" >{{ __("generated.Sélectionnez un évaluateur d'entreprise") }}</option>
                                                                                    @foreach ($evaluators as $evaluator)
                                                                                        <option value="{{ __($evaluator->id) }}" {{ old('company_evaluator') == $evaluator->id ? 'selected' : '' }} class=" translated_text">
                                                                                            {{ $evaluator->first_name . ' ' . $evaluator->last_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
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
                                {{-- end Informations sur la mission --}}

                                {{-- star Indication du changement de statut "En cours" -> Clôturé --}}
                                {{-- <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0 shadow-sm p-3">
                                                            <div class="card-body">
                                                                <h6 class="fw-bold mb-2 ">{{ __("generated.Mode de changement de statut") }}</h6>

                                                                <!-- Indication du changement de statut -->
                                                                <div class="border rounded p-3 mb-3 bg-light">
                                                                    <strong class="text-dark ">{{ __("generated.🔄 Changement du statut :") }}</strong>
                                                                    <span class="text-warning fw-semibold ">{{ __("generated.En cours") }}</span> →
                                                                    <span class="text-success fw-semibold ">{{ __("generated.Clôturé") }}</span>
                                                                </div>

                                                                <!-- Sélection unique entre Manuel & Automatique sur une seule ligne -->
                                                                <div class="row g-4 align-items-start">

                                                                    <!-- Option Manuel -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                            <div class="input-group input-group-lg">
                                                                                <div class="form-floating">
                                                                                    <div class="border rounded p-3">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="status_change_mode" id="manualMode" value="0" {{ old('status_change_mode') == '0' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label fw-semibold text-primary " for="manualMode">{{ __("generated.Manuel") }}</label>
                                                                                        </div>
                                                                                        <div class="bg-light p-2 mt-2 rounded border">
                                                                                            <small class="text-muted">
                                                                                                📌 <span >{{ __("generated.En mode") }}</span> <strong >{{ __("generated.manuel") }}</strong>, <span >{{ __("generated.le changement de statut doit être effectué par l'utilisateur.") }}</span>
                                                                                            </small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Option Automatique -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                            <div class="input-group input-group-lg">
                                                                                <div class="form-floating">
                                                                                    <div class="border rounded p-3">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" type="radio" name="status_change_mode" id="autoMode" value="1" {{ old('status_change_mode') == '1' ? 'checked' : '' }}>
                                                                                            <label class="form-check-label fw-semibold text-success " for="autoMode">{{ __("generated.Automatique") }}</label>
                                                                                        </div>
                                                                                        <div class="bg-light p-2 mt-2 rounded border">
                                                                                            <small class="text-muted">
                                                                                                📌 <span >{{ __("generated.En mode") }}</span> <strong >{{ __("generated.automatique") }}</strong>, <span >{{ __("generated.le statut sera mis à jour sans intervention.") }}</span>
                                                                                            </small>
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
                                </div> --}}
                                {{-- end Indication du changement de statut "En cours" -> Clôturé --}}

                                {{-- star Offre d'emploi --}}
                                <div class="card border-0">
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-header bg-gradient-theme-light">
                                                                        <div class="row align-items-center">
                                                                            <h5 class="fw-medium mb-0 ">{{ __("generated.Offre d'emploi") }}</h5>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-body">
                                                                        {{-- <div class="row mb-3">
                                                                            <div class="col-12">
                                                                                <div class="card border-0">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="card border-0">
                                                                                                    <div class="card-body p-4">
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            <div
                                                                                                                class="col-12">
                                                                                                                <h6
                                                                                                                    class="title custom-title ">{{ __("generated.Infos sur l’entreprise") }}</h6>
                                                                                                                <textarea name="company_info" id="company_info" placeholder="{{ __("generated.Informations sur l’entreprise") }}"
                                                                                                                    class="form-control border translated_text">{{ old('company_info') }}</textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                        <div class="row p-4" >
                                                                            <div class="col-12 col-md-6 mb-3">
                                                                                <div class="card border-0 h-100">
                                                                                    <div class="card-body p-0">
                                                                                        <h6 class="title custom-title translated_text">{{ __("generated.Infos sur l’entreprise") }}</h6>
                                                                                        <textarea name="company_info" id="company_info" placeholder="{{ __("generated.Informations sur l’entreprise") }}" class="form-control border translated_text">{{ old('company_info') }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 mb-3">
                                                                                <div class="card border-0 h-100">
                                                                                    <div class="card-body p-0">
                                                                                        <h6 class="title custom-title translated_text">{{ __("generated.Responsabilités secondaires") }}</h6>
                                                                                        <textarea class="form-control border translated_text" name="Responsibilitiess_details2" id="Responsibilitiess_details2" placeholder="{{ __("generated.Détails des responsabilités secondaires") }}">{{ old('Responsibilitiess_details2') }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12 col-md-6 mb-3">
                                                                                <div class="card border-0 h-100">
                                                                                    <div class="card-body p-0">
                                                                                        <h6
                                                                                            class="title custom-title  ">{{ __("generated.Mission Principale") }}</h6>
                                                                                        <textarea class="form-control border translated_text" name="mission_details" id="mission_details"
                                                                                            placeholder="{{ __("generated.Détails de la mission principale") }}">{{ old('mission_details') }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 mb-3">
                                                                                <div class="card border-0 h-100">
                                                                                    <div class="card-body p-0">
                                                                                        <h6
                                                                                            class="title custom-title ">{{ __("generated.Responsabilités") }}</h6>
                                                                                        <textarea class="form-control border translated_text" name="Responsibilities_details" id="Responsibilities_details"
                                                                                            placeholder="{{ __("generated.Détails des responsabilités") }}">{{ old('Responsibilities_details') }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 mb-3">
                                                                                <div class="card border-0 h-100">
                                                                                    <div class="card-body p-0">
                                                                                        <h6
                                                                                            class="title custom-title ">{{ __("generated.Compétences techniques") }}</h6>
                                                                                        <textarea class="form-control border translated_text" name="technical_skills_details" id="technical_skills_details"
                                                                                            placeholder="{{ __("generated.Détails des compétences techniques") }}">{{ old('technical_skills_details') }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 mb-3">
                                                                                <div class="card border-0 h-100">
                                                                                    <div class="card-body p-0">
                                                                                        <h6
                                                                                            class="title custom-title ">{{ __("generated.Formation") }}</h6>
                                                                                        <textarea class="form-control border translated_text" name="formation_details" id="formation_details"
                                                                                            placeholder="{{ __("generated.Détails de la formation") }}">{{ old('formation_details') }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 mb-3">
                                                                                <div class="card border-0 h-100">
                                                                                    <div class="card-body p-0">
                                                                                        <h6
                                                                                            class="title custom-title ">{{ __("generated.Expérience") }}</h6>
                                                                                        <textarea class="form-control border translated_text" name="experience_details" id="experience_details"
                                                                                            placeholder="{{ __("generated.Détails de l'expérience") }}">{{ old('experience_details') }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 mb-3">
                                                                                <div class="card border-0 h-100">
                                                                                    <div class="card-body p-0">
                                                                                        <h6
                                                                                            class="title custom-title ">{{ __("generated.Compétences personnelles") }}</h6>
                                                                                        <textarea class="form-control border translated_text" name="personal_skills_details" id="personal_skills_details"
                                                                                            placeholder="{{ __("generated.Détails des compétences personnelles") }}">{{ old('personal_skills_details') }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-3">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-theme " type="button"
                                                                id="btn-suivant">{{ __("generated.Suivant") }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end Offre d'emploi --}}
                            </div>
                            {{-- end partie Recrutement --}}

                            {{-- star partie Echelle --}}
                            <div class="tab-pane fade" id="personal2" role="tabpanel" aria-labelledby="personal2-tab">

                                {{-- star for Formation & Expérience --}}
                                <div class="row justify-content-center mb-4">
                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-header bg-gradient-theme-light">
                                                                <div class="row align-items-center">
                                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Formation") }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0">
                                                                <div class="container">
                                                                    <div id="form-rows-formation">
                                                                        <div
                                                                            class="row justify-content-center align-items-center mb-3">
                                                                            <div
                                                                                class="col-12 col-md-12 text-md-end text-center mt-3 mb-3">
                                                                                <button type="button"
                                                                                    class="btn btn-theme btn-sm  text-white btn-add-row-formation "
                                                                                    style="background: var(--adminux-bg);">{{ __("generated.Ajouter") }}</button>
                                                                            </div>

                                                                            <div class="col-12 col-md-8 mb-3">
                                                                                <div
                                                                                    class="form-group check-valid is-valid">
                                                                                    <div id="profession-selector"
                                                                                        class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                        style="border-radius: 8px !important;  ">
                                                                                        <label><span
                                                                                                >{{ __("generated.Formation") }}</span>
                                                                                            <span
                                                                                                class="text-themeColor">*</span></label>
                                                                                        <select required
                                                                                            name="formations[0][diploma_id_job_offer_formations]"
                                                                                            id="diploma_id-1"
                                                                                            class="chosenoptgroup w-100 select-search-chosen">
                                                                                            <option value=""
                                                                                                {{ old('formations.0.diploma_id_job_offer_formations') ? '' : 'selected' }}
                                                                                                >{{ __("generated.Sélectionner la formation") }}</option>
                                                                                            @foreach ($formations as $formation)
                                                                                                <option
                                                                                                    value="{{ __($formation->id) }}"
                                                                                                    {{ old('formations.0.diploma_id_job_offer_formations') == $formation->id ? 'selected' : '' }}
                                                                                                    class=" translated_text">
                                                                                                    {{ __($formation->label) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-4 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number"
                                                                                                name="formations[0][weight_formation_job_offer_formations]"
                                                                                                id="weight_formation-formation-1"
                                                                                                class="form-control text-center border-start-0"
                                                                                                value="{{ old('formations.0.weight_formation_job_offer_formations') }}">
                                                                                            <label
                                                                                                for="weight_formation-formation-1"><span
                                                                                                    >{{ __("generated.% Tolérance formation") }}</span> <span
                                                                                                    class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-8 mb-3">
                                                                                <div
                                                                                    class="form-group check-valid is-valid">
                                                                                    <div id="profession-selector"
                                                                                        class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                        style="border-radius: 8px !important;  ">
                                                                                        <label><span
                                                                                                >{{ __("generated.Option") }}</span>
                                                                                            <span
                                                                                                class="text-themeColor">*</span></label>
                                                                                        <select required
                                                                                            name="formations[0][option_id_job_offer_formations]"
                                                                                            id="option_id-1"
                                                                                            class="chosenoptgroup w-100 select-search-chosen">
                                                                                            <option value=""
                                                                                                {{ old('formations.0.option_id_job_offer_formations') ? '' : 'selected' }}
                                                                                                >{{ __("generated.Sélectionner l'option") }}</option>
                                                                                            @foreach ($formations_options as $formation_option)
                                                                                                <option
                                                                                                    value="{{ __($formation_option->id) }}"
                                                                                                    {{ old('formations.0.option_id_job_offer_formations') == $formation_option->id ? 'selected' : '' }}>
                                                                                                    {{ __($formation_option->label) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-4 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number"
                                                                                                name="formations[0][weight_option_job_offer_formations]"
                                                                                                id="weight_option-formation-1"
                                                                                                class="form-control text-center border-start-0"
                                                                                                value="{{ old('formations.0.weight_option_job_offer_formations') }}">
                                                                                            <label
                                                                                                for="weight_option-formation-1"><span
                                                                                                    >{{ __("generated.% Tolérance option") }}</span>
                                                                                                <span
                                                                                                    class="text-themeColor">*</span></label>
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

                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-header bg-gradient-theme-light">
                                                                <div class="row align-items-center">
                                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Expérience") }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0">
                                                                <div class="container">
                                                                    <div id="form-rows-experience">
                                                                        <div
                                                                            class="row justify-content-center align-items-center mb-3">
                                                                            <div
                                                                                class="col-12 col-md-18 text-md-end text-center mt-3 mb-3">
                                                                                <button type="button"
                                                                                    class="btn btn-theme btn-sm  text-white btn-add-row-experience "
                                                                                    style="background: var(--adminux-bg);">{{ __("generated.Ajouter") }}</button>
                                                                            </div>
                                                                            <div class="col-12 col-md-8 mb-3">
                                                                                <div
                                                                                    class="form-group check-valid is-valid">
                                                                                    <div id="profession-selector"
                                                                                        class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                        style="border-radius: 8px !important;  ">
                                                                                        <label><span
                                                                                                >{{ __("generated.Poste") }}</span>
                                                                                            <span
                                                                                                class="text-themeColor">*</span></label>
                                                                                        <select required
                                                                                            name="experiences[0][profession_id_job_offer_experiences]"
                                                                                            id="profession_id-1"
                                                                                            class="chosenoptgroup w-100 select-search-chosen">
                                                                                            <option value="" selected
                                                                                                >{{ __("generated.Sélectionner le poste") }}</option>
                                                                                            @foreach ($professions as $profession)
                                                                                                <option
                                                                                                    value="{{ __($profession->id) }}"
                                                                                                    {{ old('experiences.0.profession_id_job_offer_experiences') == $profession->id ? 'selected' : '' }}
                                                                                                    class=" translated_text">
                                                                                                    {{ __($profession->label) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-4 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number"
                                                                                                name="experiences[0][weight_profession_job_offer_experiences]"
                                                                                                id="weight_profession-experience-1"
                                                                                                class="form-control text-center border-start-0"
                                                                                                value="{{ old('experiences.0.weight_profession_job_offer_experiences') }}">
                                                                                            <label
                                                                                                for="weight_profession-experience-1"><span
                                                                                                    >{{ __("generated.% Tolérance poste") }}</span>
                                                                                                <span
                                                                                                    class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-8 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number"
                                                                                                name="experiences[0][years_job_offer_experiences]"
                                                                                                id="years-1"
                                                                                                class="form-control border-start-0"
                                                                                                value="{{ old('experiences.0.years_job_offer_experiences') }}">
                                                                                            <label for="years-1"><span
                                                                                                    >{{ __("generated.Nombre d'années d'expérience") }}</span>
                                                                                                <span
                                                                                                    class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-4 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number"
                                                                                                name="experiences[0][weight_experience_job_offer_experiences]"
                                                                                                id="weight_experience-experience-1"
                                                                                                class="form-control text-center border-start-0"
                                                                                                value="{{ old('experiences.0.weight_experience_job_offer_experiences') }}">
                                                                                            <label
                                                                                                for="weight_experience-experience-1"><span
                                                                                                    >{{ __("generated.% Tolérance expérience") }}</span> <span
                                                                                                    class="text-themeColor">*</span></label>
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
                                {{-- end for Formation --}}

                                {{-- star for Expérience --}}
                                {{-- <div class="row justify-content-center mb-4">
                                    <div class="col-12 col-md-12">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center py-3 px-4">
                                                                    <h5 class="title mb-3 custom-title ">{{ __("generated.Expérience") }}</h5>
                                                                </div>
                                                                <div class="container">
                                                                    <div id="form-rows-experience">
                                                                        <div class="row justify-content-center align-items-center mb-3">
                                                                            <div class="col-12 col-md-4 mb-3">
                                                                                <div class="form-group check-valid is-valid">
                                                                                    <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important;  ">
                                                                                        <label><span >{{ __("generated.Poste") }}</span> <span class="text-themeColor">*</span></label>
                                                                                        <select required name="experiences[0][profession_id_job_offer_experiences]" id="profession_id-1" class="chosenoptgroup w-100 select-search-chosen">
                                                                                            <option value="" selected >{{ __("generated.Sélectionner le poste") }}</option>
                                                                                            @foreach ($professions as $profession)
                                                                                                <option value="{{ __($profession->id) }}"
                                                                                                    {{ old('experiences.0.profession_id_job_offer_experiences') == $profession->id ? 'selected' : '' }} class=" translated_text">
                                                                                                    {{ __($profession->label) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-3 mb-3">
                                                                                <div class="form-group position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number" name="experiences[0][years_job_offer_experiences]" id="years-1" class="form-control border-start-0" value="{{ old('experiences.0.years_job_offer_experiences') }}">
                                                                                            <label for="years-1"><span >{{ __("generated.Nombre d'expérience") }}</span> <span class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-2 mb-3">
                                                                                <div class="form-group position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number" name="experiences[0][weight_profession_job_offer_experiences]" id="weight_profession-experience-1" class="form-control text-center border-start-0" value="{{ old('experiences.0.weight_profession_job_offer_experiences') }}">
                                                                                            <label for="weight_profession-experience-1"><span >{{ __("generated.% Tolérance Poste") }}</span> <span class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-2 mb-3">
                                                                                <div class="form-group position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number" name="experiences[0][weight_experience_job_offer_experiences]" id="weight_experience-experience-1" class="form-control text-center border-start-0" value="{{ old('experiences.0.weight_experience_job_offer_experiences') }}">
                                                                                            <label for="weight_experience-experience-1"><span >{{ __("generated.% Tolérance Expérience") }}</span> <span class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-1 text-md-end text-center">
                                                                                <button type="button" class="btn btn-theme   text-white btn-add-row-experience " style="background: var(--adminux-bg);">{{ __("generated.Ajouter") }}</button>
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
                                </div> --}}
                                {{-- end for Expérience --}}

                                {{-- Start for Compétences techniques --}}
                                <div class="row justify-content-center mb-4">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-header bg-gradient-theme-light">
                                                                <div class="row align-items-center">
                                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Compétences techniques") }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="card-body mt-3">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12">
                                                                        <div id="form-rows-technical-skills">
                                                                            <div
                                                                                class="row justify-content-center align-items-center">
                                                                                <div class="col-12 col-md-3 mb-3">
                                                                                    <div
                                                                                        class="form-group mb-3 check-valid is-valid">
                                                                                        <div id="profession-selector"
                                                                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                            style="border-radius: 8px !important;  ">
                                                                                            <label><span
                                                                                                    >{{ __("generated.Catégorie") }}</span>
                                                                                                <span
                                                                                                    class="text-themeColor">*</span></label>
                                                                                            <select required
                                                                                                id="technical_label_skill_types-0"
                                                                                                name="technical_skills[0][label_skill_types]"
                                                                                                class="chosenoptgroup w-100 select-search-chosen">
                                                                                                <option value=""
                                                                                                    selected
                                                                                                    >{{ __("generated.Sélectionner une catégorie") }}</option>
                                                                                                @foreach ($skillType_technicals as $skillType_technical)
                                                                                                    <option
                                                                                                        value="{{ __($skillType_technical->id) }}"
                                                                                                        {{ old('technical_skills.0.label_skill_types') == $skillType_technical->id ? 'selected' : '' }}
                                                                                                        class=" translated_text">
                                                                                                        {{ __($skillType_technical->label) }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-3 mb-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select required
                                                                                                    id="technical_label_skills-0"
                                                                                                    name="technical_skills[0][label_skills]"
                                                                                                    class="form-select border-start-0">
                                                                                                    <option value=""

                                                                                                        disabled selected>{{ __("generated.Sélectionner un détail") }}</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="technical_label_skills-0"
                                                                                                    class=" translated_text">{{ __("generated.Détail") }}
                                                                                                    <span
                                                                                                        class="text-themeColor">*</span></label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-3 mb-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select required
                                                                                                    id="technical_level_job_offers_skills-0"
                                                                                                    name="technical_skills[0][level_job_offers_skills]"
                                                                                                    class="form-select border-0">
                                                                                                    <option value=""

                                                                                                        disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                                                                    <option value="1"
                                                                                                        {{ old('technical_skills.0.level_job_offers_skills') == '1' ? 'selected' : '' }}
                                                                                                        >{{ __("generated.Débutant") }}</option>
                                                                                                    <option value="2"
                                                                                                        {{ old('technical_skills.0.level_job_offers_skills') == '2' ? 'selected' : '' }}
                                                                                                        >{{ __("generated.Intermédiaire") }}</option>
                                                                                                    <option value="3"
                                                                                                        {{ old('technical_skills.0.level_job_offers_skills') == '3' ? 'selected' : '' }}
                                                                                                        >{{ __("generated.Avancé") }}</option>
                                                                                                    <option value="4"
                                                                                                        {{ old('technical_skills.0.level_job_offers_skills') == '4' ? 'selected' : '' }}
                                                                                                        >{{ __("generated.Expert") }}</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="technical_level_job_offers_skills-0">{{ __("generated.Niveau") }}
                                                                                                    <span
                                                                                                        class="text-themeColor">*</span></label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-2 mb-3">
                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select required id="technical_weight_job_offers_skills-0" name="technical_skills[0][weight_job_offers_skills]" class="form-select border-0">
                                                                                                    <option value=""  disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                    <option value="1" {{ old('technical_skills.0.weight_job_offers_skills') == '1' ? 'selected' : '' }} >{{ __("generated.1") }}</option>
                                                                                                    <option value="2" {{ old('technical_skills.0.weight_job_offers_skills') == '2' ? 'selected' : '' }} >{{ __("generated.2") }}</option>
                                                                                                    <option value="3" {{ old('technical_skills.0.weight_job_offers_skills') == '3' ? 'selected' : '' }}>{{ __("generated.3") }}</option>
                                                                                                    <option value="4" {{ old('technical_skills.0.weight_job_offers_skills') == '4' ? 'selected' : '' }}>{{ __("generated.4") }}</option>
                                                                                                    <option value="5" {{ old('technical_skills.0.weight_job_offers_skills') == '5' ? 'selected' : '' }}>{{ __("generated.5") }}</option>
                                                                                                </select>
                                                                                                <label for="technical_weight_job_offers_skills-0"><span >{{ __("generated.Échelle") }}</span><span class="text-themeColor">*</span></label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-12 col-md-1 text-center mb-3">
                                                                                    <button type="button"
                                                                                        class="btn btn-theme btn-sm  text-white btn-add-row-technical-skills "
                                                                                        style="background: var(--adminux-bg);">{{ __("generated.Ajouter") }}</button>
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
                                {{-- End for Compétences techniques --}}

                                {{-- star for Compétences personnelles --}}
                                <div class="row justify-content-center mb-4 py-2">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-header bg-gradient-theme-light">
                                                                <div class="row align-items-center">
                                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Compétences personnelles") }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="card-body mt-3">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12">
                                                                        <div id="form-rows-personal-skills">
                                                                            <div
                                                                                class="row justify-content-center align-items-center">
                                                                                <div class="col-12 col-md-3 mb-3">
                                                                                    <div
                                                                                        class="form-group mb-3 check-valid is-valid">
                                                                                        <div id="profession-selector"
                                                                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                            style="border-radius: 8px !important;  ">
                                                                                            <label><span
                                                                                                    >{{ __("generated.Catégorie") }}</span>
                                                                                                <span
                                                                                                    class="text-themeColor">*</span></label>
                                                                                            <select required
                                                                                                id="personal_label_skill_types-0"
                                                                                                name="personal_skills[0][label_skill_types]"
                                                                                                class="chosenoptgroup w-100 select-search-chosen">
                                                                                                <option value=""

                                                                                                    selected>{{ __("generated.Sélectionner une catégorie") }}</option>
                                                                                                @foreach ($skillType_personals as $skillType_personal)
                                                                                                    <option
                                                                                                        value="{{ __($skillType_personal->id) }}"
                                                                                                        {{ old('personal_skills.0.label_skill_types') == $skillType_personal->id ? 'selected' : '' }}
                                                                                                        class=" translated_text">
                                                                                                        {{ __($skillType_personal->label) }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-3 mb-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select required
                                                                                                    id="personal_label_skills-0"
                                                                                                    name="personal_skills[0][label_skills]"
                                                                                                    class="form-select border-start-0">
                                                                                                    <option value=""

                                                                                                        disabled selected>{{ __("generated.Sélectionner un détail") }}</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="personal_label_skills-0"><span
                                                                                                        >{{ __("generated.Détail") }}</span>
                                                                                                    <span
                                                                                                        class="text-themeColor">*</span></label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-3 mb-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select required
                                                                                                    id="personal_label_level_job_offers_skills-0"
                                                                                                    name="personal_skills[0][level_job_offers_skills]"
                                                                                                    class="form-select border-0"
                                                                                                    style="pointer-events: none;">
                                                                                                    <option

                                                                                                        value=""
                                                                                                        disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                                                                    <option

                                                                                                        value="1"
                                                                                                        {{ old('personal_skills.0.level_job_offers_skills') == 1 ? 'selected' : '' }}>{{ __("generated.Débutant") }}</option>
                                                                                                    <option

                                                                                                        value="2"
                                                                                                        {{ old('personal_skills.0.level_job_offers_skills') == 2 ? 'selected' : '' }}>{{ __("generated.Intermédiaire") }}</option>
                                                                                                    <option

                                                                                                        value="3"
                                                                                                        {{ old('personal_skills.0.level_job_offers_skills') == 3 ? 'selected' : '' }}>{{ __("generated.Avancé") }}</option>
                                                                                                    <option

                                                                                                        value="4"
                                                                                                        {{ old('personal_skills.0.level_job_offers_skills') == 4 ? 'selected' : '' }}>{{ __("generated.Expert") }}</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="personal_label_level_job_offers_skills-0"><span
                                                                                                        >{{ __("generated.Niveau") }}</span>
                                                                                                    <span
                                                                                                        class="text-themeColor">*</span></label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-2 mb-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select required
                                                                                                    id="personal_weight_job_offers_skills-0"
                                                                                                    name="personal_skills[0][weight_job_offers_skills]"
                                                                                                    class="form-select border-0">
                                                                                                    <option value=""

                                                                                                        disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                    <option value="1"

                                                                                                        {{ old('personal_skills.0.weight_job_offers_skills') == 1 ? 'selected' : '' }}>{{ __("generated.1") }}</option>
                                                                                                    <option value="2"

                                                                                                        {{ old('personal_skills.0.weight_job_offers_skills') == 2 ? 'selected' : '' }}>{{ __("generated.2") }}</option>
                                                                                                    <option value="3"

                                                                                                        {{ old('personal_skills.0.weight_job_offers_skills') == 3 ? 'selected' : '' }}>{{ __("generated.3") }}</option>
                                                                                                    <option value="4"

                                                                                                        {{ old('personal_skills.0.weight_job_offers_skills') == 4 ? 'selected' : '' }}>{{ __("generated.4") }}</option>
                                                                                                    <option value="5"

                                                                                                        {{ old('personal_skills.0.weight_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.5") }}</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="personal_weight_job_offers_skills-0"><span
                                                                                                        >{{ __("generated.Échelle") }}</span>
                                                                                                    <span
                                                                                                        class="text-themeColor">*</span></label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="col-12 col-md-1 text-center mb-3">
                                                                                    <button type="button"
                                                                                        class="btn btn-theme btn-sm  text-white btn-add-row-personal-skills "
                                                                                        style="background: var(--adminux-bg);">{{ __("generated.Ajouter") }}</button>
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
                                {{-- end for Compétences personnelles --}}

                                {{-- star for Compétences Linguistiques --}}
                                <div class="row justify-content-center mb-4">
                                    <div class="col-12">
                                        <div class="card border-0 mb-3">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-header bg-gradient-theme-light">
                                                                <div class="row align-items-center">
                                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Compétences Linguistiques") }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="card-body mt-3">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12">
                                                                        <div id="form-rows-language-skills">
                                                                            <div
                                                                                class="language_label_skill_types_row row mb-4">
                                                                                <div class="col-12 col-md-3 mb-2">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                            <div
                                                                                                class="form-group check-valid is-valid">
                                                                                                <div id="profession-selector"
                                                                                                    class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                                    style="border-radius: 8px !important;  ">
                                                                                                    <label>{{ __("generated.Langue") }} <span
                                                                                                            class="text-themeColor">*</span></label>
                                                                                                    <select required
                                                                                                        class="language_label_skill_types chosenoptgroup w-100 select-search-chosen"
                                                                                                        data-id="0"
                                                                                                        id="language_label_skill_types-0"
                                                                                                        name="language_skills[0][label_skill_types]">
                                                                                                        <option
                                                                                                            value=""

                                                                                                            selected>{{ __("generated.Sélectionner une langue") }}</option>
                                                                                                        @foreach ($skillType_linguistiques as $skillType_linguistique)
                                                                                                            <option
                                                                                                                value="{{ __($skillType_linguistique->id) }}"
                                                                                                                {{ old('language_skills.0.label_skill_types') == $skillType_linguistique->id ? 'selected' : '' }}
                                                                                                                class=" translated_text">
                                                                                                                {{ __($skillType_linguistique->label) }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-8">
                                                                                    <div class="row g-2">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-5 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select
                                                                                                            id="language_label_skills-0-0"
                                                                                                            name="language_skills[0][multiple_skills][0][label_skills]"
                                                                                                            class="form-select border-start-0"></select>
                                                                                                        <label
                                                                                                            for="language_label_skills-0-0"><span
                                                                                                                >{{ __("generated.Compétence") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-4 col-lg-4 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            class="form-select border-0 translated_text"
                                                                                                            id="language_level_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][0][level_job_offers_skills]">
                                                                                                            <option
                                                                                                                value=""

                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                                                                            <option
                                                                                                                value="5"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.level_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.A1 :Débutant") }}</option>
                                                                                                            <option
                                                                                                                value="6"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.level_job_offers_skills') == 6 ? 'selected' : '' }}>{{ __("generated.A2 :Intermédiaire bas") }}</option>
                                                                                                            <option
                                                                                                                value="7"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.level_job_offers_skills') == 7 ? 'selected' : '' }}>{{ __("generated.B1 :Intermédiaire") }}</option>
                                                                                                            <option
                                                                                                                value="8"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.level_job_offers_skills') == 8 ? 'selected' : '' }}>{{ __("generated.B2 :Intermédiaire avancé") }}</option>
                                                                                                            <option
                                                                                                                value="9"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.level_job_offers_skills') == 9 ? 'selected' : '' }}>{{ __("generated.C1 :Avancé") }}</option>
                                                                                                            <option
                                                                                                                value="10"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.level_job_offers_skills') == 10 ? 'selected' : '' }}>{{ __("generated.C2 :Maîtrise") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_level_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Niveau") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-3 col-lg-3 mb-3">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            id="language_weight_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][0][weight_job_offers_skills]"
                                                                                                            class="form-select border-0">
                                                                                                            <option
                                                                                                                value=""

                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                            <option
                                                                                                                value="1"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.weight_job_offers_skills') == 1 ? 'selected' : '' }}>{{ __("generated.1") }}</option>
                                                                                                            <option
                                                                                                                value="2"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.weight_job_offers_skills') == 2 ? 'selected' : '' }}>{{ __("generated.2") }}</option>
                                                                                                            <option
                                                                                                                value="3"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.weight_job_offers_skills') == 3 ? 'selected' : '' }}>{{ __("generated.3") }}</option>
                                                                                                            <option
                                                                                                                value="4"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.weight_job_offers_skills') == 4 ? 'selected' : '' }}>{{ __("generated.4") }}</option>
                                                                                                            <option
                                                                                                                value="5"

                                                                                                                {{ old('language_skills.0.multiple_skills.0.weight_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.5") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_weight_job_offers_skills-0">{{ __("generated.Échelle") }}
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row g-2">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-5 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select
                                                                                                            id="language_label_skills-0-1"
                                                                                                            name="language_skills[0][multiple_skills][1][label_skills]"
                                                                                                            class="form-select border-start-0">
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_label_skills-0-1"><span
                                                                                                                >{{ __("generated.Compétence") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-4 col-lg-4 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            class="form-select border-0"
                                                                                                            id="language_level_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][1][level_job_offers_skills]">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.level_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.A1 : Débutant") }}</option>
                                                                                                            <option

                                                                                                                value="6"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.level_job_offers_skills') == 6 ? 'selected' : '' }}>{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                                                                            <option

                                                                                                                value="7"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.level_job_offers_skills') == 7 ? 'selected' : '' }}>{{ __("generated.B1 : Intermédiaire") }}</option>
                                                                                                            <option

                                                                                                                value="8"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.level_job_offers_skills') == 8 ? 'selected' : '' }}>{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                                                                            <option

                                                                                                                value="9"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.level_job_offers_skills') == 9 ? 'selected' : '' }}>{{ __("generated.C1 : Avancé") }}</option>
                                                                                                            <option

                                                                                                                value="10"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.level_job_offers_skills') == 10 ? 'selected' : '' }}>{{ __("generated.C2 : Maîtrise") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_level_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Niveau") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-3 col-lg-3 mb-3">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            id="language_weight_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][1][weight_job_offers_skills]"
                                                                                                            class="form-select border-0">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                            <option

                                                                                                                value="1"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.weight_job_offers_skills') == 1 ? 'selected' : '' }}>{{ __("generated.1") }}</option>
                                                                                                            <option

                                                                                                                value="2"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.weight_job_offers_skills') == 2 ? 'selected' : '' }}>{{ __("generated.2") }}</option>
                                                                                                            <option

                                                                                                                value="3"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.weight_job_offers_skills') == 3 ? 'selected' : '' }}>{{ __("generated.3") }}</option>
                                                                                                            <option

                                                                                                                value="4"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.weight_job_offers_skills') == 4 ? 'selected' : '' }}>{{ __("generated.4") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.1.weight_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.5") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_weight_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Échelle") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="row g-2">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-5 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select
                                                                                                            id="language_label_skills-0-2"
                                                                                                            name="language_skills[0][multiple_skills][2][label_skills]"
                                                                                                            class="form-select border-start-0">
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_label_skills-0-2"><span
                                                                                                                >{{ __("generated.Compétence") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-4 col-lg-4 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            class="form-select border-0"
                                                                                                            id="language_level_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][2][level_job_offers_skills]">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.level_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.A1 : Débutant") }}</option>
                                                                                                            <option

                                                                                                                value="6"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.level_job_offers_skills') == 6 ? 'selected' : '' }}>{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                                                                            <option

                                                                                                                value="7"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.level_job_offers_skills') == 7 ? 'selected' : '' }}>{{ __("generated.B1 : Intermédiaire") }}</option>
                                                                                                            <option

                                                                                                                value="8"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.level_job_offers_skills') == 8 ? 'selected' : '' }}>{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                                                                            <option

                                                                                                                value="9"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.level_job_offers_skills') == 9 ? 'selected' : '' }}>{{ __("generated.C1 : Avancé") }}</option>
                                                                                                            <option

                                                                                                                value="10"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.level_job_offers_skills') == 10 ? 'selected' : '' }}>{{ __("generated.C2 : Maîtrise") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_level_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Niveau") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-3 col-lg-3 mb-3">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            id="language_weight_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][2][weight_job_offers_skills]"
                                                                                                            class="form-select border-0">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                            <option

                                                                                                                value="1"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.weight_job_offers_skills') == 1 ? 'selected' : '' }}>{{ __("generated.1") }}</option>
                                                                                                            <option

                                                                                                                value="2"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.weight_job_offers_skills') == 2 ? 'selected' : '' }}>{{ __("generated.2") }}</option>
                                                                                                            <option

                                                                                                                value="3"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.weight_job_offers_skills') == 3 ? 'selected' : '' }}>{{ __("generated.3") }}</option>
                                                                                                            <option

                                                                                                                value="4"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.weight_job_offers_skills') == 4 ? 'selected' : '' }}>{{ __("generated.4") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.2.weight_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.5") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_weight_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Échelle") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row g-2">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-5 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select
                                                                                                            id="language_label_skills-0-3"
                                                                                                            name="language_skills[0][multiple_skills][3][label_skills]"
                                                                                                            class="form-select border-start-0">
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_label_skills-0-3"><span
                                                                                                                >{{ __("generated.Compétence") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-4 col-lg-4 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            class="form-select border-0"
                                                                                                            id="language_level_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][3][level_job_offers_skills]">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.level_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.A1 : Débutant") }}</option>
                                                                                                            <option

                                                                                                                value="6"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.level_job_offers_skills') == 6 ? 'selected' : '' }}>{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                                                                            <option

                                                                                                                value="7"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.level_job_offers_skills') == 7 ? 'selected' : '' }}>{{ __("generated.B1 : Intermédiaire") }}</option>
                                                                                                            <option

                                                                                                                value="8"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.level_job_offers_skills') == 8 ? 'selected' : '' }}>{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                                                                            <option

                                                                                                                value="9"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.level_job_offers_skills') == 9 ? 'selected' : '' }}>{{ __("generated.C1 : Avancé") }}</option>
                                                                                                            <option

                                                                                                                value="10"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.level_job_offers_skills') == 10 ? 'selected' : '' }}>{{ __("generated.C2 : Maîtrise") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_level_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Niveau") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-3 col-lg-3 mb-3">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            id="language_weight_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][3][weight_job_offers_skills]"
                                                                                                            class="form-select border-0">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                            <option

                                                                                                                value="1"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.weight_job_offers_skills') == 1 ? 'selected' : '' }}>{{ __("generated.1") }}</option>
                                                                                                            <option

                                                                                                                value="2"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.weight_job_offers_skills') == 2 ? 'selected' : '' }}>{{ __("generated.2") }}</option>
                                                                                                            <option

                                                                                                                value="3"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.weight_job_offers_skills') == 3 ? 'selected' : '' }}>{{ __("generated.3") }}</option>
                                                                                                            <option

                                                                                                                value="4"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.weight_job_offers_skills') == 4 ? 'selected' : '' }}>{{ __("generated.4") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.3.weight_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.5") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_weight_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Échelle") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row g-2">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-5 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select
                                                                                                            id="language_label_skills-0-4"
                                                                                                            name="language_skills[0][multiple_skills][4][label_skills]"
                                                                                                            class="form-select border-start-0">
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_label_skills-0-4"><span
                                                                                                                >{{ __("generated.Compétence") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-4 col-lg-4 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            class="form-select border-0"
                                                                                                            id="language_level_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][4][level_job_offers_skills]">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.level_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.A1 : Débutant") }}</option>
                                                                                                            <option

                                                                                                                value="6"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.level_job_offers_skills') == 6 ? 'selected' : '' }}>{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                                                                            <option

                                                                                                                value="7"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.level_job_offers_skills') == 7 ? 'selected' : '' }}>{{ __("generated.B1 : Intermédiaire") }}</option>
                                                                                                            <option

                                                                                                                value="8"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.level_job_offers_skills') == 8 ? 'selected' : '' }}>{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                                                                            <option

                                                                                                                value="9"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.level_job_offers_skills') == 9 ? 'selected' : '' }}>{{ __("generated.C1 : Avancé") }}</option>
                                                                                                            <option

                                                                                                                value="10"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.level_job_offers_skills') == 10 ? 'selected' : '' }}>{{ __("generated.C2 : Maîtrise") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_level_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Niveau") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-3 col-lg-3 mb-3">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            id="language_weight_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][4][weight_job_offers_skills]"
                                                                                                            class="form-select border-0">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                            <option

                                                                                                                value="1"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.weight_job_offers_skills') == 1 ? 'selected' : '' }}>{{ __("generated.1") }}</option>
                                                                                                            <option

                                                                                                                value="2"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.weight_job_offers_skills') == 2 ? 'selected' : '' }}>{{ __("generated.2") }}</option>
                                                                                                            <option

                                                                                                                value="3"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.weight_job_offers_skills') == 3 ? 'selected' : '' }}>{{ __("generated.3") }}</option>
                                                                                                            <option

                                                                                                                value="4"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.weight_job_offers_skills') == 4 ? 'selected' : '' }}>{{ __("generated.4") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.4.weight_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.5") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_weight_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Échelle") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row g-2">
                                                                                        <div
                                                                                            class="col-12 col-md-6 col-lg-5 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select
                                                                                                            id="language_label_skills-0-5"
                                                                                                            name="language_skills[0][multiple_skills][5][label_skills]"
                                                                                                            class="form-select border-start-0">
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_label_skills-0-5"><span
                                                                                                                >{{ __("generated.Compétence") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-4 col-lg-4 mb-3">
                                                                                            <div
                                                                                                class="form-group position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            class="form-select border-0"
                                                                                                            id="language_level_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][5][level_job_offers_skills]">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.level_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.A1 : Débutant") }}</option>
                                                                                                            <option

                                                                                                                value="6"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.level_job_offers_skills') == 6 ? 'selected' : '' }}>{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                                                                            <option

                                                                                                                value="7"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.level_job_offers_skills') == 7 ? 'selected' : '' }}>{{ __("generated.B1 : Intermédiaire") }}</option>
                                                                                                            <option

                                                                                                                value="8"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.level_job_offers_skills') == 8 ? 'selected' : '' }}>{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                                                                            <option

                                                                                                                value="9"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.level_job_offers_skills') == 9 ? 'selected' : '' }}>{{ __("generated.C1 : Avancé") }}</option>
                                                                                                            <option

                                                                                                                value="10"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.level_job_offers_skills') == 10 ? 'selected' : '' }}>{{ __("generated.C2 : Maîtrise") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_level_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Niveau") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div
                                                                                            class="col-12 col-md-3 col-lg-3 mb-3">
                                                                                            <div
                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                <div
                                                                                                    class="input-group input-group-lg">
                                                                                                    <div
                                                                                                        class="form-floating">
                                                                                                        <select required
                                                                                                            id="language_weight_job_offers_skills-0"
                                                                                                            name="language_skills[0][multiple_skills][5][weight_job_offers_skills]"
                                                                                                            class="form-select border-0">
                                                                                                            <option

                                                                                                                value=""
                                                                                                                disabled
                                                                                                                selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                            <option

                                                                                                                value="1"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.weight_job_offers_skills') == 1 ? 'selected' : '' }}>{{ __("generated.1") }}</option>
                                                                                                            <option

                                                                                                                value="2"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.weight_job_offers_skills') == 2 ? 'selected' : '' }}>{{ __("generated.2") }}</option>
                                                                                                            <option

                                                                                                                value="3"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.weight_job_offers_skills') == 3 ? 'selected' : '' }}>{{ __("generated.3") }}</option>
                                                                                                            <option

                                                                                                                value="4"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.weight_job_offers_skills') == 4 ? 'selected' : '' }}>{{ __("generated.4") }}</option>
                                                                                                            <option

                                                                                                                value="5"
                                                                                                                {{ old('language_skills.0.multiple_skills.5.weight_job_offers_skills') == 5 ? 'selected' : '' }}>{{ __("generated.5") }}</option>
                                                                                                        </select>
                                                                                                        <label
                                                                                                            for="language_weight_job_offers_skills-0"><span
                                                                                                                >{{ __("generated.Échelle") }}</span>
                                                                                                            <span
                                                                                                                class="text-themeColor">*</span></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-12 col-md-1 text-md-center">
                                                                                    <button type="button"
                                                                                        class="btn btn-theme btn-sm  text-white btn-add-row-language-skills "
                                                                                        style="background: var(--adminux-bg);">{{ __("generated.Ajouter") }}</button>
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
                                {{-- end for Compétences Linguistiques --}}

                                {{-- start for Prétention Salariale --}}
                                <div class="row justify-content-center mb-4">
                                    <div class="col-12 col-md-12">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-header bg-gradient-theme-light">
                                                                <div class="row align-items-center">
                                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Prétention salariale") }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="card-body mt-3">
                                                                <div class="container">
                                                                    <div id="form-rows-salaire">
                                                                        <div class="row justify-content-center align-items-center mb-3">
                                                                            <div class="col-12 col-md-3 mb-3">
                                                                                <div class="form-group position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number"
                                                                                                name="salaires[0][montant_min]"
                                                                                                id="montant_min-salaires-1"
                                                                                                class="form-control text-right border-start-0"
                                                                                                value="{{ old('salaires.0.montant_min') }}">
                                                                                            <label
                                                                                                for="montant_min-1"><span
                                                                                                    >{{ __("generated.Montant minimum") }}</span><span
                                                                                                    class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-3 mb-3">
                                                                                <div class="form-group position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number"
                                                                                                name="salaires[0][montant_max]"
                                                                                                id="montant_max-salaires-1"
                                                                                                class="form-control text-right border-start-0"
                                                                                                value="{{ old('salaires.0.montant_max') }}">
                                                                                            <label
                                                                                                for="montant_max-1"><span
                                                                                                    >{{ __("generated.Montant maximum") }}</span><span
                                                                                                    class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-3 mb-3">
                                                                                <div class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input required type="number"
                                                                                                name="salaires[0][weight]"
                                                                                                id="weight-salaires-1"
                                                                                                class="form-control text-right border-start-0"
                                                                                                value="{{ old('salaires.0.weight') }}">
                                                                                            <label
                                                                                                for="weight-salaires-1">%
                                                                                                <span
                                                                                                    >{{ __("generated.Tolérance") }}</span><span
                                                                                                    class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-12 col-md-1 text-md-end text-center">
                                                                                <button type="button"
                                                                                    class="btn btn-theme btn-sm  text-white btn-add-row-salaire "
                                                                                    style="background: var(--adminux-bg);">{{ __("generated.Ajouter") }}</button>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- end of form-rows-salaire -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end for Prétention Salariale --}}

                                {{-- star for Mobilité --}}
                                <div class="row justify-content-center mb-4">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-header bg-gradient-theme-light">
                                                                <div class="row align-items-center">
                                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Mobilité") }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="card-body mt-3">
                                                                <div class="row justify-content-center">
                                                                    {{-- star Mobilité géographique = Geographic_mobility --}}
                                                                    <div class="col-12 col-lg-5 mt-2 mb-2">
                                                                        <div class="row">
                                                                            <div class="col-md-auto">
                                                                                <div id="mobilitys-geographic-label"
                                                                                    class="mobilitys-label">
                                                                                    <div class="form-group mb-3 mt-4 position-relative check-valid is-valid">
                                                                                        <div class="input-group input-group-lg" style="padding: 10px 26px; background-color: var(--adminux-theme-bg); min-width: 210px;">
                                                                                            <label >{{ __("generated.Mobilité géographique") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="row">
                                                                                    <div class="col-7"></div>
                                                                                    <div class="col"
                                                                                        style="text-align: left; margin-bottom: 10px; font-size: 12px;  ">
                                                                                        <span style="margin-right: 23px;"
                                                                                            >{{ __("generated.Échelle") }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-7">
                                                                                        <div
                                                                                            class="form-check form-switch">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="local"
                                                                                                name="mobilitys[with_echelle][Geographic_mobilitys][local][is_active]"
                                                                                                {{ old('mobilitys.with_echelle.Geographic_mobilitys.local.is_active') ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label "
                                                                                                for="local">{{ __("generated.Locale") }}</label>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-2"
                                                                                        style="width: 34%;margin-top: -4px;">
                                                                                        <div class="form-group mb-3 position-relative check-valid"
                                                                                            style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                            <div class="input-group input-group-lg"
                                                                                                style="width: 56px;">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][local][weight]"
                                                                                                        class="form-control border-start-0 {{-- no-spin --}}"
                                                                                                        value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.local.weight') }}"
                                                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="input-group-text text-theme border-end-0"
                                                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                                                        class="bi bi-">%</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-7">
                                                                                        <div
                                                                                            class="form-check form-switch">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                role="switch"
                                                                                                id="regionale"
                                                                                                name="mobilitys[with_echelle][Geographic_mobilitys][regional][is_active]"
                                                                                                {{ old('mobilitys.with_echelle.Geographic_mobilitys.regional.is_active') ? 'checked' : '' }}>

                                                                                            <label
                                                                                                class="form-check-label "
                                                                                                for="regionale">{{ __("generated.Régionale") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"
                                                                                        style="width: 34%;margin-top: -4px;">
                                                                                        <div class="form-group mb-3 position-relative check-valid"
                                                                                            style="height: 31px; width: 56px ; border-bottom: 2px solid var(--adminux-theme);">
                                                                                            <div class="input-group input-group-lg"
                                                                                                style="width: 56px;">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][regional][weight]"
                                                                                                        value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.regional.weight') }}"
                                                                                                        class="form-control border-start-0"
                                                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="input-group-text text-theme border-end-0"
                                                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                                                        class="bi bi-">%</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-7">
                                                                                        <div
                                                                                            class="form-check form-switch">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="nationale"
                                                                                                role="switch"
                                                                                                name="mobilitys[with_echelle][Geographic_mobilitys][national][is_active]"
                                                                                                {{ old('mobilitys.with_echelle.Geographic_mobilitys.national.is_active') ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label "
                                                                                                for="nationale">{{ __("generated.Nationale") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"
                                                                                        style="width: 34%;margin-top: -4px;">
                                                                                        <div class="form-group mb-3 position-relative check-valid"
                                                                                            style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                            <div class="input-group input-group-lg"
                                                                                                style="width: 56px;">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][national][weight]"
                                                                                                        value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.national.weight') }}"
                                                                                                        class="form-control border-start-0"
                                                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="input-group-text text-theme border-end-0"
                                                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                                                        class="bi bi-">%</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-7">
                                                                                        <div
                                                                                            class="form-check form-switch">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                role="switch"
                                                                                                id="internationale"
                                                                                                name="mobilitys[with_echelle][Geographic_mobilitys][international][is_active]"
                                                                                                {{ old('mobilitys.with_echelle.Geographic_mobilitys.international.is_active') ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label "
                                                                                                for="internationale">{{ __("generated.Internationale") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"
                                                                                        style="width: 34%;margin-top: -4px;">
                                                                                        <div class="form-group mb-3 position-relative check-valid"
                                                                                            style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                            <div class="input-group input-group-lg"
                                                                                                style="width: 56px;">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][international][weight]"
                                                                                                        value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.international.weight') }}"
                                                                                                        class="form-control border-start-0"
                                                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="input-group-text text-theme border-end-0"
                                                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                                                        class="bi bi-">%</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- end Mobilité géographique = Geographic_mobility --}}

                                                                    <div class="col-lg-1"></div>

                                                                    {{-- star Mode de travail = work_mode --}}
                                                                    <div class="col-12 col-lg-5 mt-2 mb-2">
                                                                        <div class="row">
                                                                            <div class="col-md-auto">
                                                                                <div id="mobilitys-work-mode-label"
                                                                                    class="mobilitys-label">
                                                                                    <div id="mobilitys-geographic-label"
                                                                                        class="mobilitys-label">
                                                                                        <div  class="form-group mb-3 mt-4 position-relative check-valid is-valid">
                                                                                            <div class="input-group input-group-lg" style="padding: 10px 26px; background-color: var(--adminux-theme-bg); min-width: 210px;">
                                                                                                <label >{{ __("generated.Mode de travail") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="row">
                                                                                    <div class="col-7"></div>
                                                                                    <div class="col"
                                                                                        style="text-align: left; margin-bottom: 10px; font-size: 12px;  ">
                                                                                        <span style="margin-right: 23px;"
                                                                                            >{{ __("generated.Échelle") }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-7">
                                                                                        <div
                                                                                            class="form-check form-switch">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="onsite"
                                                                                                role="switch"
                                                                                                name="mobilitys[with_echelle][work_modes][onsite][is_active]"
                                                                                                {{ old('mobilitys.with_echelle.work_modes.onsite.is_active') ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label "
                                                                                                for="onsite">{{ __("generated.Présentiel") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"
                                                                                        style="width: 34%;margin-top: -4px;">
                                                                                        <div class="form-group mb-3 position-relative check-valid"
                                                                                            style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                            <div class="input-group input-group-lg"
                                                                                                style="width: 56px;">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="mobilitys[with_echelle][work_modes][onsite][weight]"
                                                                                                        value="{{ old('mobilitys.with_echelle.work_modes.onsite.weight') }}"
                                                                                                        class="form-control border-start-0"
                                                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="input-group-text text-theme border-end-0"
                                                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                                                        class="bi bi-">%</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-7">
                                                                                        <div
                                                                                            class="form-check form-switch">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="remote"
                                                                                                role="switch"
                                                                                                name="mobilitys[with_echelle][work_modes][remote][is_active]"
                                                                                                {{ old('mobilitys.with_echelle.work_modes.remote.is_active') ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label "
                                                                                                for="remote">{{ __("generated.Distanciel") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"
                                                                                        style="width: 34%;margin-top: -4px;">
                                                                                        <div class="form-group mb-3 position-relative check-valid"
                                                                                            style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                            <div class="input-group input-group-lg"
                                                                                                style="width: 56px;">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="mobilitys[with_echelle][work_modes][remote][weight]"
                                                                                                        value="{{ old('mobilitys.with_echelle.work_modes.remote.weight') }}"
                                                                                                        class="form-control border-start-0"
                                                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="input-group-text text-theme border-end-0"
                                                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                                                        class="bi bi-">%</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-7">
                                                                                        <div
                                                                                            class="form-check form-switch">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="hybrid"
                                                                                                role="switch"
                                                                                                name="mobilitys[with_echelle][work_modes][hybrid][is_active]"
                                                                                                {{ old('mobilitys.with_echelle.work_modes.hybrid.is_active') ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label "
                                                                                                for="hybrid">{{ __("generated.Hybride") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"
                                                                                        style="width: 34%;margin-top: -4px;">
                                                                                        <div class="form-group mb-3 position-relative check-valid"
                                                                                            style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                            <div class="input-group input-group-lg"
                                                                                                style="width: 56px;">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="mobilitys[with_echelle][work_modes][hybrid][weight]"
                                                                                                        value="{{ old('mobilitys.with_echelle.work_modes.hybrid.weight') }}"
                                                                                                        class="form-control border-start-0"
                                                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="input-group-text text-theme border-end-0"
                                                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                                                        class="bi bi-">%</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- end Mode de travail = work_mode --}}
                                                                </div>
                                                                <div class="row mt-5 justify-content-center">
                                                                    {{-- star Temps de travail = working_hours --}}
                                                                    <div class="col-12 col-lg-5 mt-2 mb-2">
                                                                        <div class="row">
                                                                            <div class="col-md-auto">
                                                                                <div id="mobilitys-working-hours-label"
                                                                                    class="mobilitys-label">
                                                                                    <div id="mobilitys-geographic-label"
                                                                                        class="mobilitys-label">
                                                                                        <div class="form-group mb-3 mt-4 position-relative check-valid is-valid">
                                                                                            <div class="input-group input-group-lg" style="padding: 10px 26px; background-color: var(--adminux-theme-bg); min-width: 210px;">
                                                                                                <label >{{ __("generated.Mode de travail") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="row">
                                                                                    <div class="col-7"
                                                                                        style="min-width: 135px"></div>
                                                                                    <div class="col"
                                                                                        style="text-align: left; margin-bottom: 10px; font-size: 12px;  ">
                                                                                        <span style="margin-right: 23px;"
                                                                                            >{{ __("generated.Échelle") }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <!-- Full-Time -->
                                                                                    <div class="col-7">
                                                                                        <div
                                                                                            class="form-check form-switch">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="full_time"
                                                                                                name="mobilitys[with_echelle][working_hours][full_time][is_active]"
                                                                                                {{ old('mobilitys.with_echelle.working_hours.full_time.is_active') ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="form-check-label "
                                                                                                for="full_time">{{ __("generated.Plein") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"
                                                                                        style="width: 34%;margin-top: -4px;">
                                                                                        <div class="form-group mb-3 position-relative check-valid"
                                                                                            style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                            <div class="input-group input-group-lg"
                                                                                                style="width: 56px;">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="mobilitys[with_echelle][working_hours][full_time][weight]"
                                                                                                        class="form-control border-start-0"
                                                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;"
                                                                                                        value="{{ old('mobilitys.with_echelle.working_hours.full_time.weight') }}">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="input-group-text text-theme border-end-0"
                                                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                                                        class="bi bi-">%</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Part-Time -->
                                                                                <div class="row">
                                                                                    <div class="col-7">
                                                                                        <div
                                                                                            class="form-check form-switch">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="checkbox"
                                                                                                id="part_time"
                                                                                                name="mobilitys[with_echelle][working_hours][part_time][is_active]"
                                                                                                {{ old('mobilitys.with_echelle.working_hours.part_time.is_active') ? 'checked' : '' }}>

                                                                                            <label
                                                                                                class="form-check-label "
                                                                                                for="part_time">{{ __("generated.Partiel") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"
                                                                                        style="width: 34%;margin-top: -4px;">
                                                                                        <div class="form-group mb-3 position-relative check-valid"
                                                                                            style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                            <div class="input-group input-group-lg"
                                                                                                style="width: 56px;">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        name="mobilitys[with_echelle][working_hours][part_time][weight]"
                                                                                                        class="form-control border-start-0"
                                                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;"
                                                                                                        value="{{ old('mobilitys.with_echelle.working_hours.part_time.weight') }}">
                                                                                                </div>
                                                                                                <span
                                                                                                    class="input-group-text text-theme border-end-0"
                                                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                                                        class="bi bi-">%</i></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- end Temps de travail = working_hours --}}

                                                                    <div class="col-lg-1"></div>

                                                                    {{-- star Disponibilité = Availability --}}
                                                                    <div class="col-12 col-lg-5 mt-5 mb-2">
                                                                        <div class="row">
                                                                            <div class="col-md-auto">
                                                                                <div id="mobilitys-availabilitys-label"
                                                                                    class="mobilitys-label">
                                                                                    <div id="mobilitys-geographic-label"
                                                                                        class="mobilitys-label">
                                                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            {{-- <div style="padding: 10px 26px;   min-width: 210px;">
                                                                                                <label class=" title custom-title ">{{ __("generated.Disponibilité") }}</label>
                                                                                            </div> --}}

                                                                                            <div class="input-group input-group-lg" style="padding: 10px 26px; background-color: var(--adminux-theme-bg); min-width: 210px;">
                                                                                                <label >{{ __("generated.Disponibilité") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="row">
                                                                                    <!-- Immediate Option -->
                                                                                    <div class="col-6">
                                                                                        <div class="row">

                                                                                            <div class="col-12">
                                                                                                <div class="form-check">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="radio"
                                                                                                        id="immediate"
                                                                                                        name="mobilitys[availabilitys][type]"
                                                                                                        value="immediate"
                                                                                                        {{ old('mobilitys.availabilitys.type') == 'immediate' ? 'checked' : '' }}>
                                                                                                    <label
                                                                                                        class="form-check-label "
                                                                                                        for="immediate">{{ __("generated.Immédiate") }}</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- Notice Option -->
                                                                                            <div class="col-12">
                                                                                                <div class="form-check">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="radio"
                                                                                                        id="notice"
                                                                                                        name="mobilitys[availabilitys][type]"
                                                                                                        value="notice"
                                                                                                        {{ old('mobilitys.availabilitys.type') == 'notice' ? 'checked' : '' }}>
                                                                                                    <label
                                                                                                        class="form-check-label "
                                                                                                        for="notice">{{ __("generated.Préavis") }}</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6"
                                                                                        id="notice-duration-container">
                                                                                        <div class="rounded border poste-chosen"
                                                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;">
                                                                                            {{-- <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;"></label> --}}
                                                                                            {{-- <select class="chosenoptgroup w-100" name="availability[notice_duration]" id="notice_duration">
                                                                                                @foreach (\App\Enums\Profile\NoticePeriodEnum::getAll() as $key => $label)
                                                                                                    <option class=" translated_text" value="{{ $key }}">
                                                                                                        {{ __($label) }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select> --}}

                                                                                            <select
                                                                                                class="chosenoptgroup w-100"
                                                                                                id="notice_duration"
                                                                                                name="mobilitys[availabilitys][notice_duration]">
                                                                                                @foreach ($noticePeriodEnum as $value => $label)
                                                                                                    <option
                                                                                                        class=" translated_text"
                                                                                                        value="{{ __($value) }}"
                                                                                                        {{ old('mobilitys.availabilitys.notice_duration') == $value ? 'selected' : '' }}>
                                                                                                        {{ __($label) }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- end Disponibilité = Availability --}}
                                                                </div>
                                                                {{-- star for partie Permis --}}
                                                                <div class="row mb-4 justify-content-center">
                                                                    <div class="col-6 col-md-3 mt-3">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-12">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                                                        style="border-radius: 8px !important;">
                                                                                        <label
                                                                                            >{{ __("generated.Permis de conduire") }}</label>
                                                                                        <select
                                                                                            class="chosenoptgroup w-100"
                                                                                            name="has_driving_license"
                                                                                            id="has_driving_license"
                                                                                            onchange="toggleLicenseType()">
                                                                                            <option

                                                                                                value=""
                                                                                                {{ old('has_driving_license') === null ? 'selected' : '' }}>{{ __("generated.Sélectionnez une option") }}</option>
                                                                                            <option

                                                                                                value="1"
                                                                                                {{ old('has_driving_license') == '1' ? 'selected' : '' }}>{{ __("generated.Oui") }}</option>
                                                                                            <option

                                                                                                value="0"
                                                                                                {{ old('has_driving_license') == '0' ? 'selected' : '' }}>{{ __("generated.Non") }}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6 col-md-3 mt-3"
                                                                        id="licenseTypeContainer">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-12">
                                                                                <div class="form-group position-relative check-valid is-valid">
                                                                                    <div class="custom-multiple-select rounded border poste-chosen" style="border-radius: 8px !important;">
                                                                                        <label
                                                                                            >{{ __("generated.Type de permis") }}</label>
                                                                                        <select
                                                                                            class="chosenoptgroup w-100"
                                                                                            name="license_types[]"
                                                                                            id="license_types" multiple data-placeholder="{{ __("generated.Sélectionnez des options") }}">
                                                                                            @foreach (App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getAll() as $key => $license)
                                                                                                <option
                                                                                                    value="{{ $key }}"
                                                                                                    @if (in_array($key, old('license_types', []))) selected @endif>
                                                                                                    {{ __($license) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- end for partie Permis --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end for Mobilité --}}

                                {{-- star for btn_Enregister JobOffre --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    {{-- <div class="col-12 col-md-4">
                                                        <button class="btn btn-warning m-1 "
                                                            type="button"
                                                            style="background-color: #78D4EA; color: white;">{{ __("generated.Aperçu de l'offre") }}</button>
                                                    </div> --}}

                                                    <div class="col-12 col-md-12 d-flex justify-content-end">
                                                        <input type="hidden" name="action" id="actionInput" value="">
                                                        <button class="btn btn-theme m-1 " type="button" onclick="location.reload();">{{ __("generated.Annuler") }}</button>

                                                        <button class="btn btn-theme m-1 " type="submit" name="action" value="draft" style="background-color: #78D4EA" onclick="submitForm('draft')">{{ __("generated.Enregistrer brouillon") }}</button>

                                                        <button class="btn btn-theme m-1 " type="submit"
                                                            name="action" value="publish" onclick="submitForm('publish')">{{ __("generated.Enregister") }}</button>

                                                        <script>
                                                            function submitForm(action) {
                                                                document.getElementById('actionInput').value = action;
                                                                // document.getElementById('jobOfferForm').submit();
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- star for btn_Enregister JobOffre --}}
                            </div>
                            {{-- end partie Echelle --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include('translation')
@endsection

@section('js_footer')

    @vite(['resources/js/jobOffer/create.js'])

    {{-- for select search ( ville ) --}}
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="{{ asset('assets/vendor/chosen_v1.8.7/chosen.jquery.min.js') }}"></script>

    <script src="{{ asset('assets/js/jobOffer/validation.js') }}"></script>

    <!-- JS Select2 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.license-option');
            const selectedDisplay = document.getElementById('selected-license');

            function updateSelected() {
                const selected = Array.from(checkboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.parentElement.textContent.trim());

                selectedDisplay.textContent = selected.length > 0 ?
                    selected.join(', ') :
                    'Permis';
            }

            checkboxes.forEach(cb => cb.addEventListener('change', updateSelected));
            updateSelected(); // initial load
        });
    </script> --}}

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const userSelector = document.getElementById('userSelector');
            const $multiSelect = $('#selectedRecruiters');
            const $selectedUsersContainer = $('#selectedUsersContainer');

            // Init Select2
            $multiSelect.select2({
                placeholder: "Aucun utilisateur sélectionné",
                allowClear: true,
                width: '100%',
            });

            function updateVisibility() {
                const hasOptions = userSelector.querySelectorAll(
                    'option:not([style*="display: none"]):not([value=""])').length;
                const hasSelected = $multiSelect.find('option').length;

                userSelector.style.display = hasOptions ? '' : 'none';
                $selectedUsersContainer.toggle(hasSelected);
            }

            function hideOptionInUserSelector(id) {
                const optionToHide = userSelector.querySelector('option[value="' + id + '"]');
                if (optionToHide) optionToHide.style.display = 'none';
            }

            function showOptionInUserSelector(id) {
                const optionToShow = userSelector.querySelector('option[value="' + id + '"]');
                if (optionToShow) optionToShow.style.display = '';
            }

            userSelector.addEventListener('change', function() {
                const selectedId = this.value;
                const selectedText = this.options[this.selectedIndex].text;

                if (selectedId && !$multiSelect.find('option[value="' + selectedId + '"]').length) {
                    const newOption = new Option(selectedText, selectedId, true, true);
                    $multiSelect.append(newOption).trigger('change');
                    hideOptionInUserSelector(selectedId);
                    updateVisibility();
                }

                this.value = '';
            });

            $multiSelect.on('select2:unselect', function(e) {
                const removedId = e.params.data.id;
                showOptionInUserSelector(removedId);
                $multiSelect.find('option[value="' + removedId + '"]').remove();
                $multiSelect.trigger('change');
                updateVisibility();
            });

            updateVisibility(); // Initial state
        });
    </script> --}}


    {{-- pour Appliquer chosen sur tous les selects dynamiques --}}
    <script>
        function initializeChosen() {
            $('.select-search-chosen').each(function() {
                $(this).chosen("destroy").removeClass("chosen-initialized"); // Supprime l'ancienne instance
                $(this).chosen({
                    disable_search_threshold: 10,
                    no_results_text: "Oops, nothing found!"
                }).addClass("chosen-initialized");
            });
        }

        // Appliquer chosen sur tous les selects dynamiques
        initializeChosen();
    </script>

    {{-- script JavaScript qui récupère les évaluateurs en fonction du client sélectionné  --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("client_id").addEventListener("change", function() {
                let clientId = this.value;
                let evaluatorSelect = document.getElementById("client_evaluator");

                // Vider les anciennes options
                evaluatorSelect.innerHTML =
                    "<option class='translated_text' value=''>Sélectionnez un évaluateur</option>";

                if (clientId) {
                    fetch(`/missions/clients/${clientId}/evaluators`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(evaluator => {
                                let option = new Option(
                                    `${evaluator.first_name} ${evaluator.last_name}`,
                                    evaluator.id);
                                evaluatorSelect.add(option);
                            });
                        })
                        .catch(error => console.error("Erreur lors du chargement des évaluateurs :",
                            error));
                }
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#client_id').on('change', function() {
                var clientId = $(this).val();

                if (clientId) {
                    $.ajax({
                        url: '/missions/clients/' + clientId + '/evaluators',
                        type: 'GET',
                        success: function(data) {
                            $('#client_evaluator').empty(); // Clear current options

                            if (data.length > 0) {
                                $.each(data, function(index, evaluator) {
                                    let fullName = evaluator.first_name + ' ' + evaluator.last_name;
                                    $('#client_evaluator').append('<option value="' + evaluator.id + '">' + fullName + '</option>');
                                });
                            } else {
                                $('#client_evaluator').append('<option disabled>Aucun évaluateur disponible</option>');
                            }

                            // Réinitialiser Select2 avec les nouvelles options
                            $('#client_evaluator').trigger("chosen:updated");

                        },
                        error: function() {
                            alert('Une erreur est survenue lors de la récupération des évaluateurs.');
                        }
                    });
                } else {
                    $('#client_evaluator').empty();
                }
            });
        });
    </script>

    <!-- jQuery for formation -->
    <script>
        $(document).ready(function() {
            let rowCountFormation = 1; // Compteur pour générer des IDs uniques pour la formation

            // Ajouter une nouvelle ligne de formation
            $(document).on("click", ".btn-add-row-formation", function() {
                rowCountFormation++;
                const newRowFormation = `
                <div class="row justify-content-center align-items-center mb-3">
                    <div class="col-12 col-md-12 text-md-end text-center mb-3">
                        <button type="button" class="btn btn-danger btn-sm     btn-remove-row ">{{ __("generated.Supprimer") }}</button>
                    </div>

                    <div class="col-12 col-md-8 mb-3">
                        <div class="form-group check-valid is-valid">
                            <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important;  ">
                                <label><span >{{ __("generated.Formation") }}</span> <span class="text-themeColor">*</span></label>
                                <select required name="formations[${rowCountFormation}][diploma_id_job_offer_formations]" id="diploma_id-${rowCountFormation}" class="chosenoptgroup w-100 select-search-chosen">
                                    <option  value="" {{ old('formations.${rowCountFormation}.diploma_id_job_offer_formations') ? '' : 'selected' }}>{{ __("generated.Sélectionner la formation") }}</option>
                                    @foreach ($formations as $formation)
                                        <option class=" translated_text" value="{{ __($formation->id) }}" {{ old('formations.0.diploma_id_job_offer_formations') == $formation->id ? 'selected' : '' }}>
                                            {{ __($formation->label) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <div class="form-group position-relative check-valid is-valid">
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <input required type="number" name="formations[${rowCountFormation}][weight_formation_job_offer_formations]" id="weight_formation-formation-${rowCountFormation}" class="form-control text-center border-start-0">
                                    <label for="weight_formation-formation-${rowCountFormation}"><span >{{ __("generated.% Tolérance formation") }}</span> <span class="text-themeColor">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 mb-3">
                        <div class="form-group check-valid is-valid">
                            <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important;  ">
                                <label><span >{{ __("generated.Option") }}</span> <span class="text-themeColor">*</span></label>
                                <select required name="formations[${rowCountFormation}][option_id_job_offer_formations]" id="option_id-${rowCountFormation}" class="chosenoptgroup w-100 select-search-chosen">
                                    <option  value="" selected>{{ __("generated.Sélectionner l'option") }}</option>
                                    @foreach ($formations_options as $formation_option)
                                        <option class=" translated_text" value="{{ __($formation_option->id) }}">{{ __($formation_option->label) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <div class="form-group position-relative check-valid is-valid">
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <input required type="number" name="formations[${rowCountFormation}][weight_option_job_offer_formations]" id="weight_option-formation-${rowCountFormation}" class="form-control text-center border-start-0">
                                    <label for="weight_option-formation-${rowCountFormation}"><span >{{ __("generated.% Tolérance option") }}</span> <span class="text-themeColor">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                $("#form-rows-formation").append(newRowFormation);

                // Réinitialiser Chosen sur les nouveaux éléments
                initializeChosen();
            });
            // Supprimer une ligne de formation
            $(document).on("click", ".btn-remove-row", function() {
                $(this).closest(".row").remove();
            });
        });
    </script>

    <!-- jQuery for experience -->
    <script>
        $(document).ready(function() {
            let rowCountExperience = 1; // Compteur pour générer des IDs uniques pour l'expérience

            // Ajouter une nouvelle ligne d'expérience
            $(document).on("click", ".btn-add-row-experience", function() {
                rowCountExperience++;
                const newRowExperience = `
                <div class="row justify-content-center align-items-center mb-3">
                    <div class="col-12 col-md-12 text-md-end text-center mb-3">
                        <button type="button" class="btn btn-danger btn-sm   btn-remove-row ">{{ __("generated.Supprimer") }}</button>
                    </div>
                    <div class="col-12 col-md-8 mb-3">
                        <div class="form-group check-valid is-valid">
                            <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important;  ">
                                <label><span >{{ __("generated.Poste") }}</span> <span class="text-themeColor">*</span></label>
                                <select required name="experiences[${rowCountExperience}][profession_id_job_offer_experiences]" id="profession_id-${rowCountExperience}" class="chosenoptgroup w-100 select-search-chosen">
                                    <option  value="" selected>{{ __("generated.Sélectionner le poste") }}</option>
                                    @foreach ($professions as $profession)
                                        <option class=" translated_text" value="{{ __($profession->id) }}"
                                            {{ old('experiences.0.profession_id_job_offer_experiences') == $profession->id ? 'selected' : '' }}>
                                            {{ __($profession->label) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <div class="form-group position-relative check-valid is-valid">
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <input required type="number" name="experiences[${rowCountExperience}][weight_profession_job_offer_experiences]" id="weight_profession-experience-${rowCountExperience}" class="form-control text-center border-start-0">
                                    <label for="weight_profession-experience-${rowCountExperience}"><span >{{ __("generated.% Tolérance poste") }}</span> <span class="text-themeColor">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 mb-3">
                        <div class="form-group position-relative check-valid is-valid">
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <input required type="number" name="experiences[${rowCountExperience}][years_job_offer_experiences]" id="years-${rowCountExperience}" class="form-control border-start-0">
                                    <label for="years-${rowCountExperience}"><span >{{ __("generated.Nombre d'années d'expérience") }}</span> <span class="text-themeColor">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-3">
                        <div class="form-group position-relative check-valid is-valid">
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <input required type="number" name="experiences[${rowCountExperience}][weight_experience_job_offer_experiences]" id="weight_experience-experience-${rowCountExperience}" class="form-control text-center border-start-0">
                                    <label for="weight_experience-experience-${rowCountExperience}"><span >{{ __("generated.% Tolérance expérience") }}</span> <span class="text-themeColor">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                $("#form-rows-experience").append(newRowExperience);

                // Réinitialiser Chosen sur les nouveaux éléments
                initializeChosen();
            });

            // Supprimer une ligne d'expérience
            $(document).on("click", ".btn-remove-row", function() {
                $(this).closest(".row").remove();
            });
        });
    </script>

    <!-- jQuery for Compétences techniques new -->
    <script>
        $(document).ready(function() {
            let rowCountTechnicalSkills = 0;

            // Met à jour les compétences en fonction de la catégorie sélectionnée
            function updateSkillsByCategoryTechnical(row) {
                let categoryId = $(row).find('select[id*="technical_label_skill_types"]')
                    .val(); // Récupérer l'ID de la catégorie
                let skillsSelect = $(row).find('select[id*="technical_label_skills"]');

                // Réinitialiser le champ 'Détail'
                skillsSelect.html(
                    '<option  value="" disabled selected>{{ __("generated.Sélectionner un détail") }}</option>'
                );

                if (categoryId) {
                    // Effectuer la requête AJAX pour récupérer les compétences par catégorie
                    $.ajax({
                        url: '{{ url('/missions/get-skills-by-category') }}/' + categoryId,
                        type: 'GET',
                        success: function(data) {
                            // Ajouter les options à 'label_skills'
                            // data.skills.forEach(function(skill) {
                            //     skillsSelect.append('<option  value="' +
                            //         skill.id + '">{{ __("generated.' + skill .label + '") }}</option>');
                            // });
                            data.skills.forEach(function(skill) {
                                let translatedLabel = window.translations['generated.' + skill.label] || skill.label;
                                skillsSelect.append('<option value="' + skill.id + '">' + translatedLabel + '</option>');
                            });
                        },
                        error: function() {
                            alert('Une erreur est survenue lors de la récupération des compétences.');
                        }
                    });
                }
            }

            // Ajouter une nouvelle ligne
            $(document).on("click", ".btn-add-row-technical-skills", function() {
                rowCountTechnicalSkills++;
                const newRowTechnicalSkills = `
                        <div class="row justify-content-center align-items-center">
                            <div class="col-12 col-md-3 mb-3">
                                <div class="form-group mb-3 check-valid is-valid">
                                    <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important;  ">
                                        <label><span >{{ __("generated.Catégorie") }}</span> <span class="text-themeColor">*</span></label>
                                        <select required id="technical_label_skill_types-${rowCountTechnicalSkills}" name="technical_skills[${rowCountTechnicalSkills}][label_skill_types]" class="chosenoptgroup w-100 select-search-chosen">
                                            <option  value="" selected>{{ __("generated.Sélectionner une catégorie") }}</option>
                                            @foreach ($skillType_technicals as $skillType_technical)
                                                <option class=" translated_text" value="{{ __($skillType_technical->id) }}"
                                                    {{ old('technical_skills.0.label_skill_types') == $skillType_technical->id ? 'selected' : '' }}>
                                                    {{ __($skillType_technical->label) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 mb-3">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required id="technical_label_skills-${rowCountTechnicalSkills}" name="technical_skills[${rowCountTechnicalSkills}][label_skills]" class="form-select border-start-0">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner un détail") }}</option>
                                            </select>
                                            <label for="technical_label_skills-${rowCountTechnicalSkills}"><span >{{ __("generated.Détail") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required id="technical_level_job_offers_skills-${rowCountTechnicalSkills}" name="technical_skills[${rowCountTechnicalSkills}][level_job_offers_skills]" class="form-select border-0">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                <option  value="1">{{ __("generated.Débutant") }}</option>
                                                <option  value="2">{{ __("generated.Intermédiaire") }}</option>
                                                <option  value="3">{{ __("generated.Avancé") }}</option>
                                                <option  value="4">{{ __("generated.Expert") }}</option>
                                            </select>
                                            <label for="technical_level_job_offers_skills-${rowCountTechnicalSkills}"><span >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 mb-3">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required id="technical_weight_job_offers_skills-${rowCountTechnicalSkills}" name="technical_skills[${rowCountTechnicalSkills}][weight_job_offers_skills]" class="form-select border-0">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                <option  value="1">{{ __("generated.1") }}</option>
                                                <option  value="2">{{ __("generated.2") }}</option>
                                                <option  value="3">{{ __("generated.3") }}</option>
                                                <option  value="4">{{ __("generated.4") }}</option>
                                                <option  value="5">{{ __("generated.5") }}</option>
                                            </select>
                                            <label for="technical_weight_job_offers_skills-${rowCountTechnicalSkills}"><span >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-1 text-center mb-3">
                                <button type="button" class="btn btn-danger btn-sm   text-white btn-remove-row-technical-skills ">{{ __("generated.Supprimer") }}</button>
                            </div>
                        </div>`;

                // Ajouter la nouvelle ligne dans le formulaire
                $('#form-rows-technical-skills').append(newRowTechnicalSkills);

                // Réinitialiser Chosen sur les nouveaux éléments
                initializeChosen();
            });

            // Mettre à jour les compétences dès qu'une catégorie est sélectionnée
            $(document).on('change', 'select[id*="technical_label_skill_types"]', function() {
                updateSkillsByCategoryTechnical($(this).closest('.row'));
            });

            // Supprimer une ligne
            $(document).on('click', '.btn-remove-row-technical-skills', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>

    <!-- jQuery for Compétences personnelles new -->
    <script>
        $(document).ready(function() {
            let rowCountPersonalSkills = 0;

            function updateSkillsByCategoryPersonal(row) {

                let categoryId = $(row).find('select[id*="personal_label_skill_types"]').val();
                let skillsSelect = $(row).find('select[id*="personal_label_skills"]');

                skillsSelect.html(
                    '<option  value="" disabled selected>{{ __("generated.Sélectionner un détail") }}</option>'
                );

                if (categoryId) {
                    $.ajax({
                        url: '{{ url('/missions/get-skills-by-category') }}/' + categoryId,
                        type: 'GET',
                        success: function(data) {
                            data.skills.forEach(function(skill) {
                                skillsSelect.append('<option data-level="' + skill.level +
                                    '" value="' + skill.id + '">' + skill
                                    .label + '</option>');
                            });
                        },
                        error: function() {
                            alert('Une erreur est survenue lors de la récupération des compétences.');
                        }
                    });
                }
            }

            $(document).on("click", ".btn-add-row-personal-skills", function() {
                rowCountPersonalSkills++;
                const newRowPersonalSkills = `
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-3 mb-3">
                        <div class="form-group mb-3 check-valid is-valid">
                            <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important;  ">
                                <label><span >{{ __("generated.Catégorie") }}</span> <span class="text-themeColor">*</span></label>
                                <select required id="personal_label_skill_types-${rowCountPersonalSkills}" name="personal_skills[${rowCountPersonalSkills}][label_skill_types]" class="chosenoptgroup w-100 select-search-chosen">
                                    <option  value="" selected>{{ __("generated.Sélectionner une catégorie") }}</option>
                                    @foreach ($skillType_personals as $skillType_personal)
                                        <option class=" translated_text" value="{{ __($skillType_personal->id) }}"
                                            {{ old('personal_skills.0.label_skill_types') == $skillType_personal->id ? 'selected' : '' }}>
                                            {{ __($skillType_personal->label) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <div class="form-group mb-3 position-relative check-valid is-valid">
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <select required id="personal_label_skills-${rowCountPersonalSkills}" name="personal_skills[${rowCountPersonalSkills}][label_skills]" class="form-select border-start-0">
                                        <option  value="" disabled selected>{{ __("generated.Sélectionner un détail") }}</option>
                                    </select>
                                    <label for="personal_label_skills-${rowCountPersonalSkills}"><span >{{ __("generated.Détail") }}</span> <span class="text-themeColor">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <div class="form-group mb-3 position-relative check-valid is-valid">
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <select required id="personal_label_level_job_offers_skills-${rowCountPersonalSkills}" name="personal_skills[${rowCountPersonalSkills}][level_job_offers_skills]" class="form-select border-0" style="pointer-events: none;">
                                        <option  value="" disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                        <option  value="1">{{ __("generated.Débutant") }}</option>
                                        <option  value="2">{{ __("generated.Intermédiaire") }}</option>
                                        <option  value="3">{{ __("generated.Avancé") }}</option>
                                        <option  value="4">{{ __("generated.Expert") }}</option>
                                    </select>
                                    <label for="personal_label_level_job_offers_skills-${rowCountPersonalSkills}"><span >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <div class="form-group mb-3 position-relative check-valid is-valid">
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <select required id="personal_personal_weight_job_offers_skills-${rowCountPersonalSkills}" name="personal_skills[${rowCountPersonalSkills}][weight_job_offers_skills]" class="form-select border-0">
                                        <option  value="" disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                        <option  value="1">{{ __("generated.1") }}</option>
                                        <option  value="2">{{ __("generated.2") }}</option>
                                        <option  value="3">{{ __("generated.3") }}</option>
                                        <option  value="4">{{ __("generated.4") }}</option>
                                        <option  value="5">{{ __("generated.5") }}</option>
                                    </select>
                                    <label for="personal_personal_weight_job_offers_skills-${rowCountPersonalSkills}"><span >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-1 text-center mb-3">
                        <button type="button" class="btn btn-danger btn-sm   text-white btn-remove-row-personal-skills ">{{ __("generated.Supprimer") }}</button>
                    </div>
                </div>`;
                $('#form-rows-personal-skills').append(newRowPersonalSkills);

                // Réinitialiser Chosen sur les nouveaux éléments
                initializeChosen();
            });

            $(document).on('change', 'select[id*="personal_label_skill_types"]', function() {
                updateSkillsByCategoryPersonal($(this).closest('.row'));
            });

            // Sync le niveau sélectionné avec le select de niveau correspondant
            $(document).on('change', 'select[id*="personal_label_skills"]', function() {
                let level = $(this).find(':selected').data('level');
                let levelSelect = $(this).closest('.row').find(
                    'select[id*="personal_label_level_job_offers_skills"]');
                levelSelect.val(level).trigger('change');
            });

            $(document).on('click', '.btn-remove-row-personal-skills', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>

    <!-- jQuery for Compétences Linguistiques -->
    <script>
        $(document).ready(function() {
            let rowCountLanguageSkills = 0;

            function updateSkillsByCategoryLanguage(row) {
                let languageId = $(row).find('select[name*="label_skill_types"]')
                    .val(); // Récupérer l'ID de la catégorie
                let rowId = $(row).find('select[name*="label_skill_types"]').data(
                    "id"); // Récupérer l'ID de la catégorie

                if (languageId) {
                    // Effectuer la requête AJAX pour récupérer les compétences par catégorie
                    $.ajax({
                        url: '{{ url('/missions/get-skills-by-category') }}/' + languageId,
                        type: 'GET',
                        success: function(data) {
                            // Ajouter les options à 'label_skills'
                            for (i = 0; i < 6; i++) {
                                let skillsSelect = $(row).find(`#language_label_skills-${rowId}-${i}`);
                                data.skills.forEach(function(skill, key) {
                                    selected = key == i ? 'selected' : '';
                                    skillsSelect.append(
                                        `<option ${selected} value="${skill.id}">${skill.label}</option>`
                                    );
                                });
                            }
                        },
                        error: function() {
                            alert('Une erreur est survenue lors de la récupération des compétences.');
                        }
                    });
                }
            }

            // Ajouter une nouvelle ligne
            $(document).on("click", ".btn-add-row-language-skills", function() {
                rowCountLanguageSkills++;

                const newRowLanguageSkills = `
                <div class="language_label_skill_types_row row mb-4">
                    <div class="col-12 col-md-3 mb-2">
                        <div class="row">
                            <div class="col-12 col-md-12 mb-2">
                                <div class="form-group check-valid is-valid">
                                    <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important;  ">
                                        <label><span >{{ __("generated.Langue") }}</span> <span class="text-themeColor">*</span></label>
                                        <select required class="language_label_skill_types chosenoptgroup w-100 select-search-chosen" data-id="${rowCountLanguageSkills}" id="language_label_skill_types-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][label_skill_types]">
                                            <option  value="" selected>{{ __("generated.Sélectionner une langue") }}</option>
                                            @foreach ($skillType_linguistiques as $skillType_linguistique)
                                                <option class=" translated_text" value="{{ __($skillType_linguistique->id) }}"
                                                    {{ old('language_skills.0.label_skill_types') == $skillType_linguistique->id ? 'selected' : '' }}>
                                                    {{ __($skillType_linguistique->label) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="row g-2">
                            <div class="col-12 col-md-6 col-lg-5 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select id="language_label_skills-${rowCountLanguageSkills}-0" name="language_skills[${rowCountLanguageSkills}][multiple_skills][0][label_skills]" class="form-select border-start-0">
                                            </select>
                                            <label for="language_label_skills-${rowCountLanguageSkills}-0"><span >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required class="form-select border-0" id="language_level_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][0][level_job_offers_skills]">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                <option  value="5">{{ __("generated.A1 : Débutant") }}</option>
                                                <option  value="6">{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                <option  value="7">{{ __("generated.B1 : Intermédiaire") }}</option>
                                                <option  value="8">{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                <option  value="9">{{ __("generated.C1 : Avancé") }}</option>
                                                <option  value="10">{{ __("generated.C2 : Maîtrise") }}</option>
                                            </select>
                                            <label for="language_level_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3 mb-3">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required id="language_weight_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][0][weight_job_offers_skills]" class="form-select border-0">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                <option  value="1">{{ __("generated.1") }}</option>
                                                <option  value="2">{{ __("generated.2") }}</option>
                                                <option  value="3">{{ __("generated.3") }}</option>
                                                <option  value="4">{{ __("generated.4") }}</option>
                                                <option  value="5">{{ __("generated.5") }}</option>
                                            </select>
                                            <label for="language_weight_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-12 col-md-6 col-lg-5 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select id="language_label_skills-${rowCountLanguageSkills}-1" name="language_skills[${rowCountLanguageSkills}][multiple_skills][1][label_skills]" class="form-select border-start-0">
                                            </select>
                                            <label for="language_label_skills-${rowCountLanguageSkills}-1"><span >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required class="form-select border-0" id="language_level_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][1][level_job_offers_skills]">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                <option  value="5">{{ __("generated.A1 : Débutant") }}</option>
                                                <option  value="6">{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                <option  value="7">{{ __("generated.B1 : Intermédiaire") }}</option>
                                                <option  value="8">{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                <option  value="9">{{ __("generated.C1 : Avancé") }}</option>
                                                <option  value="10">{{ __("generated.C2 : Maîtrise") }}</option>
                                            </select>
                                            <label for="language_level_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3 mb-3">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required id="language_weight_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][1][weight_job_offers_skills]" class="form-select border-0">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                <option  value="1">{{ __("generated.1") }}</option>
                                                <option  value="2">{{ __("generated.2") }}</option>
                                                <option  value="3">{{ __("generated.3") }}</option>
                                                <option  value="4">{{ __("generated.4") }}</option>
                                                <option  value="5">{{ __("generated.5") }}</option>
                                            </select>
                                            <label for="language_weight_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-12 col-md-6 col-lg-5 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select id="language_label_skills-${rowCountLanguageSkills}-2" name="language_skills[${rowCountLanguageSkills}][multiple_skills][2][label_skills]" class="form-select border-start-0">
                                            </select>
                                            <label for="language_label_skills-${rowCountLanguageSkills}-2"><span >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required class="form-select border-0" id="language_level_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][2][level_job_offers_skills]">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                <option  value="5">{{ __("generated.A1 : Débutant") }}</option>
                                                <option  value="6">{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                <option  value="7">{{ __("generated.B1 : Intermédiaire") }}</option>
                                                <option  value="8">{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                <option  value="9">{{ __("generated.C1 : Avancé") }}</option>
                                                <option  value="10">{{ __("generated.C2 : Maîtrise") }}</option>
                                            </select>
                                            <label for="language_level_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3 mb-3">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required id="language_weight_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][2][weight_job_offers_skills]" class="form-select border-0">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                <option  value="1">{{ __("generated.1") }}</option>
                                                <option  value="2">{{ __("generated.2") }}</option>
                                                <option  value="3">{{ __("generated.3") }}</option>
                                                <option  value="4">{{ __("generated.4") }}</option>
                                                <option  value="5">{{ __("generated.5") }}</option>
                                            </select>
                                            <label for="language_weight_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-12 col-md-6 col-lg-5 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select id="language_label_skills-${rowCountLanguageSkills}-3" name="language_skills[${rowCountLanguageSkills}][multiple_skills][3][label_skills]" class="form-select border-start-0">
                                            </select>
                                            <label for="language_label_skills-${rowCountLanguageSkills}-3"><span >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required class="form-select border-0" id="language_level_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][3][level_job_offers_skills]">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                <option  value="5">{{ __("generated.A1 : Débutant") }}</option>
                                                <option  value="6">{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                <option  value="7">{{ __("generated.B1 : Intermédiaire") }}</option>
                                                <option  value="8">{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                <option  value="9">{{ __("generated.C1 : Avancé") }}</option>
                                                <option  value="10">{{ __("generated.C2 : Maîtrise") }}</option>
                                            </select>
                                            <label for="language_level_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3 mb-3">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required id="language_weight_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][3][weight_job_offers_skills]" class="form-select border-0">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                <option  value="1">{{ __("generated.1") }}</option>
                                                <option  value="2">{{ __("generated.2") }}</option>
                                                <option  value="3">{{ __("generated.3") }}</option>
                                                <option  value="4">{{ __("generated.4") }}</option>
                                                <option  value="5">{{ __("generated.5") }}</option>
                                            </select>
                                            <label for="language_weight_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-12 col-md-6 col-lg-5 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select id="language_label_skills-${rowCountLanguageSkills}-4" name="language_skills[${rowCountLanguageSkills}][multiple_skills][4][label_skills]" class="form-select border-start-0">
                                            </select>
                                            <label for="language_label_skills-${rowCountLanguageSkills}-4"><span >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required class="form-select border-0" id="language_level_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][4][level_job_offers_skills]">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                <option  value="5">{{ __("generated.A1 : Débutant") }}</option>
                                                <option  value="6">{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                <option  value="7">{{ __("generated.B1 : Intermédiaire") }}</option>
                                                <option  value="8">{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                <option  value="9">{{ __("generated.C1 : Avancé") }}</option>
                                                <option  value="10">{{ __("generated.C2 : Maîtrise") }}</option>
                                            </select>
                                            <label for="language_level_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3 mb-3">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required id="language_weight_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][4][weight_job_offers_skills]" class="form-select border-0">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                <option  value="1">{{ __("generated.1") }}</option>
                                                <option  value="2">{{ __("generated.2") }}</option>
                                                <option  value="3">{{ __("generated.3") }}</option>
                                                <option  value="4">{{ __("generated.4") }}</option>
                                                <option  value="5">{{ __("generated.5") }}</option>
                                            </select>
                                            <label for="language_weight_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-12 col-md-6 col-lg-5 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select id="language_label_skills-${rowCountLanguageSkills}-5" name="language_skills[${rowCountLanguageSkills}][multiple_skills][5][label_skills]" class="form-select border-start-0">
                                            </select>
                                            <label for="language_label_skills-${rowCountLanguageSkills}-5"><span >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 mb-3">
                                <div class="form-group position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required class="form-select border-0" id="language_level_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][5][level_job_offers_skills]">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner un niveau") }}</option>
                                                <option  value="5">{{ __("generated.A1 : Débutant") }}</option>
                                                <option  value="6">{{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                <option  value="7">{{ __("generated.B1 : Intermédiaire") }}</option>
                                                <option  value="8">{{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                <option  value="9">{{ __("generated.C1 : Avancé") }}</option>
                                                <option  value="10">{{ __("generated.C2 : Maîtrise") }}</option>
                                            </select>
                                            <label for="language_level_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3 mb-3">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <div class="input-group input-group-lg">
                                        <div class="form-floating">
                                            <select required id="language_weight_job_offers_skills-${rowCountLanguageSkills}" name="language_skills[${rowCountLanguageSkills}][multiple_skills][5][weight_job_offers_skills]" class="form-select border-0">
                                                <option  value="" disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                <option  value="1">{{ __("generated.1") }}</option>
                                                <option  value="2">{{ __("generated.2") }}</option>
                                                <option  value="3">{{ __("generated.3") }}</option>
                                                <option  value="4">{{ __("generated.4") }}</option>
                                                <option  value="5">{{ __("generated.5") }}</option>
                                            </select>
                                            <label for="language_weight_job_offers_skills-${rowCountLanguageSkills}"><span >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-1 text-md-center">
                        <button type="button" class="btn btn-danger btn-sm   btn-remove-row-language-skill ">{{ __("generated.Supprimer") }}</button>
                    </div>
                </div>`;
                $("#form-rows-language-skills").append(newRowLanguageSkills);

                // Réinitialiser Chosen sur les nouveaux éléments
                initializeChosen();
            });

            $(document).on('change', 'select.language_label_skill_types', function() {
                updateSkillsByCategoryLanguage($(this).closest('.language_label_skill_types_row'));
            });

            // Supprimer une ligne
            $(document).on("click", ".btn-remove-row-language-skill", function() {
                $(this).closest(".row").remove();
            });
        });
    </script>

    <!-- jQuery for prétention salariale -->
    <script>
        $(document).ready(function() {
            let rowCountSalaire = 1;

            // Ajouter une ligne de salaire
            $(document).on("click", ".btn-add-row-salaire", function() {
                const newRowSalaire = `
                    <div class="row justify-content-center align-items-center mb-3">
                        <div class="col-12 col-md-3 mb-3">
                            <div class="form-group position-relative check-valid is-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input required type="number" name="salaires[${rowCountSalaire}][montant_min]" id="montant_min-salaires-${rowCountSalaire}" class="form-control text-right border-start-0">
                                        <label for="montant_min-${rowCountSalaire}"><span >{{ __("generated.Montant minimum") }}</span> <span class="text-themeColor">*</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 mb-3">
                            <div class="form-group position-relative check-valid is-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input required type="number" name="salaires[${rowCountSalaire}][montant_max]" id="montant_max-salaires-${rowCountSalaire}" class="form-control text-right border-start-0">
                                        <label for="montant_max-${rowCountSalaire}"><span >{{ __("generated.Montant maximum") }}</span> <span class="text-themeColor">*</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 mb-3">
                            <div class="form-group position-relative check-valid is-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input required type="number" name="salaires[${rowCountSalaire}][weight]" id="weight-salaires-${rowCountSalaire}" class="form-control text-right border-start-0">
                                        <label for="weight-${rowCountSalaire}"><span >{{ __("generated.% Tolérance") }}</span> <span class="text-themeColor">*</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-1 text-md-end text-center">
                            <button type="button" class="btn btn-danger btn-sm   btn-remove-row ">{{ __("generated.Supprimer") }}</button>
                        </div>
                    </div>`;
                $("#form-rows-salaire").append(newRowSalaire);
                rowCountSalaire++;
            });

            // Supprimer une ligne de salaire
            $(document).on("click", ".btn-remove-row", function() {
                $(this).closest(".row").remove();
            });
        });
    </script>

    {{-- script pour afficher ou masquer le champ de durée du préavis --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let immediateRadio = document.getElementById("immediate");
            let noticeRadio = document.getElementById("notice");
            let noticeDuration = document.getElementById("notice_duration").closest(
                ".col-6"); // Récupère le parent div

            function toggleNoticeDuration() {
                if (noticeRadio.checked) {
                    noticeDuration.style.display = "block"; // Affiche si "Préavis" est sélectionné
                } else if (immediateRadio.checked) {
                    noticeDuration.style.display = "none"; // Cache si "Immédiate" est sélectionné
                }
            }

            // Ajoute un événement pour écouter les changements sur les radios
            immediateRadio.addEventListener("change", toggleNoticeDuration);
            noticeRadio.addEventListener("change", toggleNoticeDuration);

            // S'assurer que le select est visible au chargement tant qu'aucun radio n'est coché
            if (!immediateRadio.checked && !noticeRadio.checked) {
                noticeDuration.style.display = "block"; // Visible par défaut
            } else {
                toggleNoticeDuration(); // Applique la logique si un radio est déjà coché
            }
        });
    </script>

    {{-- Fonction pour cacher ou afficher la section "Type de permis" selon le choix "Permis de conduire" --}}
    <script>
        function toggleLicenseType() {
            const hasDrivingLicense = document.getElementById('has_driving_license').value;
            const licenseTypeContainer = document.getElementById('licenseTypeContainer');

            if (hasDrivingLicense == "0") {
                licenseTypeContainer.style.display = 'none';
            } else {
                licenseTypeContainer.style.display = 'block';
            }
        }
    </script>

    {{-- star for ckeditor --}}
    <script>
        'use strict'
        $(window).on('load', function() {
            /* ck editor */
            ClassicEditor
                .create(document.querySelector('#company_info'), {
                    language: 'fr'
                })
                // .then(editor => {
                //     const textarea = document.querySelector('#company_info');
                //     textarea.value = editor.getData();
                // })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 2 */
            ClassicEditor
                .create(document.querySelector('#Responsibilitiess_details2'), {
                    language: 'fr'
                })
                // .then(editor => {
                //     const textarea = document.querySelector('#mission_details');
                //     textarea.value = editor.getData();
                // })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 2 */
            ClassicEditor
                .create(document.querySelector('#mission_details'), {
                    language: 'fr'
                })
                // .then(editor => {
                //     const textarea = document.querySelector('#mission_details');
                //     textarea.value = editor.getData();
                // })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 3 */
            ClassicEditor
                .create(document.querySelector('#Responsibilities_details'), {
                    language: 'fr'
                })
                // .then(editor => {
                //     const textarea = document.querySelector('#Responsibilities_details');
                //     textarea.value = editor.getData();
                // })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 4 */
            ClassicEditor
                .create(document.querySelector('#technical_skills_details'), {
                    language: 'fr'
                })
                // .then(editor => {
                //     const textarea = document.querySelector('#technical_skills_details');
                //     textarea.value = editor.getData();
                // })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 5 */
            ClassicEditor
                .create(document.querySelector('#formation_details'), {
                    language: 'fr'
                })
                // .then(editor => {
                //     const textarea = document.querySelector('#formation_details');
                //     textarea.value = editor.getData();
                // })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 6 */
            ClassicEditor
                .create(document.querySelector('#experience_details'), {
                    language: 'fr'
                })
                // .then(editor => {
                //     const textarea = document.querySelector('#experience_details');
                //     textarea.value = editor.getData();
                // })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 7 */
            ClassicEditor
                .create(document.querySelector('#personal_skills_details'), {
                    language: 'fr'
                })
                // .then(editor => {
                //     const textarea = document.querySelector('#personal_skills_details');
                //     textarea.value = editor.getData();
                // })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($errors->any())
        <script>
            let errorMessages = {!! json_encode($errors->all()) !!}; // Récupère toutes les erreurs
            Swal.fire({
                icon: 'error',
                title: 'Erreur de validation',
                html: errorMessages.map(message => `<ul><li>${message}</li></ul>`).join(''), // Affiche chaque erreur
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: window.translations.success_ats,
                // text: "{{ session('success') }}",
                text: window.translations.succes_offre_emploi,
                confirmButtonColor: '#3085d6',
                confirmButtonText: window.translations.OKconfirm,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('jobOffer.listing') }}";
                }
            });
        </script>
    @endif

    {{-- @if (session('danger'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: "{{ session('danger') }}",
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        </script>
    @endif --}}

@endsection
