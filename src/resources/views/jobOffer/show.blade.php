@extends('layouts.master')

@section('title',  __('generated.Détail offre d\'emploi'))

@section('css_header')

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
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.contact") }}">
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
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Guide vidéo") }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: black;">
                        <img src="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" alt=""
                            style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}"
                    style="margin-right: 40px;">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Détail offre d'emploi") }}</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">
            <div class="row mb-5 justify-content-center">
                <div class="col-10">
                    <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button style="font-size: 14px" class="nav-link active " id="personal-tab" data-bs-toggle="tab"
                                data-bs-target="#personal" type="button" role="tab" aria-controls="personal"
                                aria-selected="true">{{ __("generated.Recrutement") }}</button>
                        </li>
                        <li class="nav-item" role="presentation2">
                            <button style="font-size: 14px" class="nav-link  " id="personal2-tab" data-bs-toggle="tab"
                                data-bs-target="#personal2" type="button" role="tab" aria-controls="personal2"
                                aria-selected="false" tabindex="-1">{{ __("generated.Échelle") }}</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-12">
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
                                                                        <div class="card-header bg-gradient-theme-light">
                                                                            <div class="row align-items-center">
                                                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Détails du Poste") }}</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row g-3">
                                                                                <!-- Client -->
                                                                                <div class="col-12 col-md-6 col-lg-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div
                                                                                                class="form-floating w-100">
                                                                                                <select disabled
                                                                                                    name="client_id"
                                                                                                    id="client_id"
                                                                                                    class="form-select border-0">
                                                                                                    <option  value="">{{ __("generated.Sélectionnez un client") }}</option>
                                                                                                    @foreach ($clients as $client)
                                                                                                        <option class="translated_text"
                                                                                                            value="{{ __($client->id) }}"
                                                                                                            {{ $client->id == old('client_id', $jobOffer?->client_id) ? 'selected' : '' }}>
                                                                                                            {{ __($client->name) }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <label
                                                                                                    for="client_id" >{{ __("generated.Client") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Title -->
                                                                                <div class="col-12 col-md-6 col-lg-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input disabled
                                                                                                    type="text"
                                                                                                    name="title"
                                                                                                    id="title"
                                                                                                    value="{{ __($jobOffer->title) }}"
                                                                                                    class="form-control border-start-0">
                                                                                                <label
                                                                                                    for="title" >{{ __("generated.Intitulé de la mission") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Poste -->
                                                                                <div class="col-12 col-md-6 col-lg-2">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div id="profession-selector"
                                                                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                            style="border-radius: 8px !important;">
                                                                                            <label
                                                                                                >{{ __("generated.Poste") }}</label>
                                                                                            <select disabled
                                                                                                name="profession_id"
                                                                                                id="profession_id"
                                                                                                class="chosenoptgroup w-100 select-search-chosen">
                                                                                                @foreach ($professions as $profession)
                                                                                                    <option class="translated_text"
                                                                                                        value="{{ __($profession->id) }}"{{ $profession->id == old('profession_id', $jobOffer->profession_id) ? 'selected' : '' }}>
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
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div
                                                                                                class="form-floating w-100">
                                                                                                <select disabled
                                                                                                    name="activity_area_id"
                                                                                                    id="activity_area_id"
                                                                                                    class="form-select border-0">
                                                                                                    @foreach ($activityAreas as $key => $activityArea)
                                                                                                        <option class="translated_text"
                                                                                                            value="{{ __($activityArea->id) }}"{{ $activityArea->id == old('activity_area_id', $jobOffer->activity_area_id) ? 'selected' : '' }}>
                                                                                                            {{ __($activityArea->label) }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <label
                                                                                                    for="activity_area_id" >{{ __("generated.Secteur d'activité") }}</label>
                                                                                            </div>
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
                                                                                                <select disabled
                                                                                                    name="contract_type_id"
                                                                                                    class="form-select border-0"
                                                                                                    id="contract_type_id">
                                                                                                    @foreach ($contractsTypes as $key => $contract)
                                                                                                        <option class="translated_text"
                                                                                                            value="{{ $key }}"{{ $key == old('contract_type_id', $jobOffer->contract_type_id) ? 'selected' : '' }}>
                                                                                                            {{ __($contract) }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <label
                                                                                                    for="contract_type" >{{ __("generated.Type de contrat") }}</label>
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

                            {{-- start Informations sur la mission --}}
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
                                                                                <input disabled type="date"
                                                                                    name="mission_started_at"
                                                                                    id="mission_started_at"
                                                                                    class="form-control border-start-0"
                                                                                    value="{{ old('mission_started_at', $jobOffer->mission_started_at ? $jobOffer->mission_started_at->format('Y-m-d') : '') }}">
                                                                                <label for="mission_started_at" >{{ __("generated.Date début") }}</label>
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
                                                                                <input disabled type="date"
                                                                                    name="mission_finished_at"
                                                                                    id="mission_finished_at"
                                                                                    class="form-control border-start-0"
                                                                                    value="{{ old('mission_started_at', $jobOffer->mission_finished_at ? $jobOffer->mission_finished_at->format('Y-m-d') : '') }}">
                                                                                <label for="mission_finished_at" >{{ __("generated.Date fin") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Lieu -->
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div id="city-selector"
                                                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                                                            style="border-radius: 8px !important;">
                                                                            <label
                                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">{{ __("generated.Lieu") }}</label>
                                                                            <select disabled name="city_id" id="city_id"
                                                                                class="chosenoptgroup w-100 select-search-chosen">
                                                                                @foreach ($cities as $city)
                                                                                    <option class="translated_text"
                                                                                        value="{{ __($city->id) }}"{{ $city->id == old('city_id', $jobOffer->city_id) ? 'selected' : '' }}>
                                                                                        {{ __($city->name) }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row g-3">
                                                                <!-- Nombre Profile -->
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input disabled type="number"
                                                                                    name="nbr_profiles" id="nbr_profiles"
                                                                                    placeholder="{{ __("generated.Nombre de profils") }}"
                                                                                    class="form-control border-start-0 translated_text"
                                                                                    value="{{ __($jobOffer->nbr_profiles) }}">
                                                                                <label  for="nbr_profiles">{{ __("generated.Nombre de profils") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Évaluateur client_evaluator -->
                                                                {{-- <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating w-100">
                                                                                <select disabled name="client_evaluator" id="client_evaluator" class="form-select border-0">
                                                                                    <option  value="">{{ __("generated.Sélectionnez un évaluateur") }}</option>
                                                                                </select>
                                                                                <label  for="client_evaluator">{{ __("generated.Évaluateur client") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}

                                                                <!-- Évaluateur client (edit) -->
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="form-group check-valid is-valid">
                                                                        <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                            <label><span >{{ __("generated.Évaluateur client") }}</span> <span class="text-themeColor">*</span></label>
                                                                            <select disabled required name="client_evaluator[]" class="chosenoptgroup w-100 input-1 select2" data-placeholder="{{ __("generated.Sélectionnez un évaluateur") }}"
                                                                            id="client_evaluator" onfocus="setFocus(true)" onblur="setFocus(false)" multiple>
                                                                                @php
                                                                                $selectedClientEvaluators = old('client_evaluator', $jobOffer->client_evaluator ?? []);
                                                                                @endphp

                                                                                @foreach ($evaluators as $evaluator)
                                                                                <option class="translated_text" value="{{ __($evaluator->id) }}"
                                                                                    {{ in_array($evaluator->id, $selectedClientEvaluators) ? 'selected' : '' }}>
                                                                                    {{ $evaluator->first_name . ' ' . $evaluator->last_name }}
                                                                                </option>
                                                                                @endforeach

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Évaluateur entreprise -->
                                                                {{-- <div class="col-12 col-md-6 col-lg-4">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select disabled name="company_evaluator"
                                                                                    id="company_evaluator"
                                                                                    class="form-select border-0">
                                                                                    @foreach ($evaluators as $evaluator)
                                                                                        <option class="translated_text"
                                                                                            value="{{ __($evaluator->id) }}"{{ $evaluator->id == old('company_evaluator', $evaluator->company_evaluator) ? 'selected' : '' }}>
                                                                                            {{ $evaluator->first_name . ' ' . $evaluator->last_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <label  for="company_evaluator">{{ __("generated.Évaluateur entreprise") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}

                                                                <!-- Évaluateur entreprise -->
                                                                <div class="col-12 col-md-6 col-lg-4">
                                                                    <div class="form-group check-valid is-valid">
                                                                        <div id="profession-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                            <label><span >{{ __("generated.Évaluateur entreprise") }}</span> <span class="text-themeColor">*</span></label>
                                                                            <select disabled required name="company_evaluator[]" class="chosenoptgroup w-100 input-1 select2" data-placeholder="{{ __("generated.Sélectionnez un évaluateur d'entreprise") }}"
                                                                                onfocus="setFocus(true)" onblur="setFocus(false)" id="company_evaluator" multiple>
                                                                                <option value="" >{{ __("generated.Sélectionnez un évaluateur d'entreprise") }}</option>
                                                                                @php
                                                                                    $selectedCompanyEvaluators = old('company_evaluator', $jobOffer->company_evaluator ?? []);
                                                                                @endphp

                                                                                @foreach ($evaluators as $evaluator)
                                                                                    <option class="translated_text" value="{{ __($evaluator->id) }}"
                                                                                        {{ in_array($evaluator->id, $selectedCompanyEvaluators) ? 'selected' : '' }}>
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
                                        <div class="card-body" style="background-color: #e4e8ee54">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0 shadow-sm p-3">
                                                        <div class="card-body">
                                                            <h6 class="fw-bold mb-2">Mode de changement de statut</h6>

                                                            <!-- Indication du changement de statut -->
                                                            <div class="border rounded p-3 mb-3 bg-light">
                                                                <strong class="text-dark">🔄 Changement du statut
                                                                    :</strong>
                                                                <span class="text-warning fw-semibold">En cours</span> →
                                                                <span class="text-success fw-semibold">Clôturé</span>
                                                            </div>

                                                            <!-- Sélection unique entre Manuel & Automatique sur une seule ligne -->
                                                            <div class="row g-4 align-items-start">

                                                                <!-- Option Manuel -->
                                                                <div class="col-md-6">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <div class="border rounded p-3">
                                                                                    <div class="form-check">
                                                                                        <input disabled
                                                                                            class="form-check-input"
                                                                                            type="radio"
                                                                                            name="status_change_mode"
                                                                                            id="manualMode" value="0"
                                                                                            {{ old('status_change_mode', $jobOffer->status_change_mode) == '0' ? 'checked' : '' }}>
                                                                                        <label
                                                                                            class="form-check-label fw-semibold text-primary"
                                                                                            for="manualMode">Manuel</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="bg-light p-2 mt-2 rounded border">
                                                                                        <small class="text-muted">
                                                                                            📌 En mode
                                                                                            <strong>manuel</strong>, le
                                                                                            changement de statut doit être
                                                                                            effectué par l'utilisateur.
                                                                                        </small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Option Automatique -->
                                                                <div class="col-md-6">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <div class="border rounded p-3">
                                                                                    <div class="form-check">
                                                                                        <input disabled
                                                                                            class="form-check-input"
                                                                                            type="radio"
                                                                                            name="status_change_mode"
                                                                                            id="autoMode" value="1"
                                                                                            {{ old('status_change_mode', $jobOffer->status_change_mode) == '1' ? 'checked' : '' }}>
                                                                                        <label
                                                                                            class="form-check-label fw-semibold text-success"
                                                                                            for="autoMode">Automatique</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="bg-light p-2 mt-2 rounded border">
                                                                                        <small class="text-muted">
                                                                                            📌 En mode
                                                                                            <strong>automatique</strong>, le
                                                                                            statut sera mis à jour sans
                                                                                            intervention.
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
                                                                        <h6 class="fw-medium mb-0 ">{{ __("generated.Offre d'emploi") }}</h6>
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
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12">
                                                                                                            <h6 class="title custom-title ">{{ __("generated.Infos sur l’entreprise") }}</h6>
                                                                                                                <textarea hidden name="company_info" id="company_info" placeholder="{{ __("generated.Informations sur l’entreprise") }}" class="form-control border translated_text">
                                                                                                                        {{ old('company_info', $jobOffer->company_info ?? '') }}
                                                                                                                    </textarea>
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

                                                                    <div class="row p-4">

                                                                        <div class="col-12 col-md-6 mb-3">
                                                                            <div class="card border-0 h-100">
                                                                                <div class="card-body p-0">
                                                                                    <h6 class="title custom-title translated_text">{{ __("generated.Infos sur l’entreprise") }}</h6>
                                                                                    <textarea hidden name="company_info" id="company_info" placeholder="{{ __("generated.Infos sur l’entreprise") }}" class="form-control border translated_text">
                                                                                        {{ old('company_info', $jobOffer->company_info ?? '') }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-6 mb-3">
                                                                            <div class="card border-0 h-100">
                                                                                <div class="card-body p-0">
                                                                                    <h6 class="title custom-title translated_text">{{ __("generated.Responsabilités secondaires") }}</h6>
                                                                                    <textarea hidden class="form-control border translated_text" name="Responsibilitiess_details2" id="Responsibilitiess_details2" placeholder="{{ __("generated.Détails des responsabilités secondaires") }}">{{ old('Responsibilitiess_details2') }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-6 mb-3">
                                                                            <div class="card border-0 h-100">
                                                                                <div class="card-body p-0">
                                                                                    <h6 class="title custom-title ">{{ __("generated.Mission Principale") }}</h6>
                                                                                    <textarea class="form-control border translated_text" name="mission_details" id="mission_details"
                                                                                        placeholder="{{ __("generated.Détails de la mission principale") }}">
                                                                                        {{ old('mission_details', $jobOffer->mission_details ?? '') }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-6 mb-3">
                                                                            <div class="card border-0 h-100">
                                                                                <div class="card-body p-0">
                                                                                    <h6 class="title custom-title ">{{ __("generated.Responsabilités") }}</h6>
                                                                                    <textarea class="form-control border translated_text" name="Responsibilities_details" id="Responsibilities_details"
                                                                                        placeholder="{{ __("generated.Détails des responsabilités") }}">
                                                                                        {{ old('Responsibilities_details', $jobOffer->Responsibilities_details ?? '') }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-6 mb-3">
                                                                            <div class="card border-0 h-100">
                                                                                <div class="card-body p-0">
                                                                                    <h6 class="title custom-title ">{{ __("generated.Compétences techniques") }}</h6>
                                                                                    <textarea class="form-control border translated_text" name="technical_skills_details" id="technical_skills_details"
                                                                                        placeholder="{{ __("generated.Détails des compétences techniques") }}">
                                                                                        {{ old('technical_skills_details', $jobOffer->technical_skills_details ?? '') }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-6 mb-3">
                                                                            <div class="card border-0 h-100">
                                                                                <div class="card-body p-0">
                                                                                    <h6 class="title custom-title ">{{ __("generated.Formation") }}</h6>
                                                                                    <textarea class="form-control border translated_text" name="formation_details" id="formation_details"
                                                                                        placeholder="{{ __("generated.Détails de la formation") }}">
                                                                                        {{ old('formation_details', $jobOffer->formation_details ?? '') }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-6 mb-3">
                                                                            <div class="card border-0 h-100">
                                                                                <div class="card-body p-0">
                                                                                    <h6 class="title custom-title ">{{ __("generated.Expérience") }}</h6>
                                                                                    <textarea class="form-control border translated_text" name="experience_details" id="experience_details"
                                                                                        placeholder="{{ __("generated.Détails de l'expérience") }}">
                                                                                        {{ old('experience_details', $jobOffer->experience_details ?? '') }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-6 mb-3">
                                                                            <div class="card border-0 h-100">
                                                                                <div class="card-body p-0">
                                                                                    <h6 class="title custom-title ">{{ __("generated.Compétences personnelles") }}</h6>
                                                                                    <textarea class="form-control border translated_text" name="personal_skills_details" id="personal_skills_details"
                                                                                        placeholder="{{ __("generated.Détails des compétences personnelles") }}">
                                                                                        {{ old('personal_skills_details', $jobOffer->personal_skills_details ?? '') }}
                                                                                    </textarea>
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
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-header bg-gradient-theme-light">
                                                            <div class="row align-items-center">
                                                                <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Formation") }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-3">
                                                            <div class="container">
                                                                <div id="form-rows-formation">
                                                                    @foreach ($job_offer_formations as $key => $job_offer_formation)
                                                                        <div id="job-offer-formation-row-{{ $key }}"
                                                                            class="job-offer-formation-row row justify-content-center align-items-center mb-4">
                                                                            <!-- Sélection de la formation -->
                                                                            <div class="col-12 col-md-8 mb-3">
                                                                                <div
                                                                                    class="form-group check-valid is-valid">
                                                                                    <div id="profession-selector"
                                                                                        class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                        style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                                        <label
                                                                                             >{{ __("generated.Formation") }}</label>
                                                                                        <input type="hidden"
                                                                                            value="{{ __($job_offer_formation->id) }}"
                                                                                            name="formations[{{ $key }}][job_offer_formation_id]" />
                                                                                        <input type="hidden"
                                                                                            value="0"
                                                                                            name="formations[{{ $key }}][deleted]" />
                                                                                        <select disabled
                                                                                            name="formations[{{ $key }}][diploma_id_job_offer_formations]"
                                                                                            id="diploma_id_job_offer_formations-{{ $key }}"
                                                                                            class="chosenoptgroup w-100 select-search-chosen">
                                                                                            @foreach ($formations as $formation)
                                                                                                <option class="translated_text"
                                                                                                    value="{{ __($formation->id) }}"
                                                                                                    {{ old("formations.{$key}.job_offer_formation_id", $job_offer_formation->diploma_id) == $formation->id ? 'selected' : '' }}>
                                                                                                    {{ __($formation->label) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Pourcentage de tolérance weight_formation -->
                                                                            <div class="col-12 col-md-4 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input disabled type="number"
                                                                                                name="formations[{{ $key }}][weight_formation_job_offer_formations]"
                                                                                                id="weight_formation_job_offer_formations-{{ $key }}"
                                                                                                class="form-control text-center border-start-0"
                                                                                                value="{{ old('weight_formation', optional($job_offer_formation)->weight_formation) }}">
                                                                                            <label
                                                                                                for="weight_formation_job_offer_formations-{{ $key }}">{{ __("generated.% Tolérance formation") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Sélection de l'option -->
                                                                            <div class="col-12 col-md-8 mb-3">
                                                                                <div
                                                                                    class="form-group check-valid is-valid">
                                                                                    <div id="profession-selector"
                                                                                        class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                        style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                                        <label
                                                                                            >{{ __("generated.Option") }}</label>
                                                                                        <select disabled
                                                                                            name="formations[{{ $key }}][option_id_job_offer_formations]"
                                                                                            id="option_id_job_offer_formations-{{ $key }}"
                                                                                            class="chosenoptgroup w-100 select-search-chosen border-start-0">
                                                                                            @foreach ($formations_options as $formation_option)
                                                                                                <option class="translated_text"
                                                                                                    value="{{ __($formation_option->id) }}"
                                                                                                    {{ old("formations.{$key}.option_id_job_offer_formations", $job_offer_formation->option_id) == $formation_option->id ? 'selected' : '' }}>
                                                                                                    {{ __($formation_option->label) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Pourcentage de tolérance weight_option -->
                                                                            <div class="col-12 col-md-4 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input disabled type="number"
                                                                                                name="formations[{{ $key }}][weight_option_job_offer_formations]"
                                                                                                id="weight_option_job_offer_formations-{{ $key }}"
                                                                                                class="form-control text-center border-start-0"
                                                                                                value="{{ old('weight_option', optional($job_offer_formation)->weight_option) }}">
                                                                                            <label
                                                                                                for="weight_option_job_offer_formations-{{ $key }}">{{ __("generated.% Tolérance option") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mb-3">
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-header bg-gradient-theme-light">
                                                            <div class="row align-items-center">
                                                                <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Expérience") }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-3">
                                                            <div class="container">
                                                                <div id="form-rows-experience">
                                                                    @foreach ($job_offer_experiences as $key => $job_offer_experience)
                                                                        <div id="job-offer-experience-row-{{ $key }}"
                                                                            class="job-offer-experience-row row justify-content-center align-items-center mb-4">
                                                                            <!-- Sélection Poste -->
                                                                            <div class="col-12 col-md-8 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div id="profession-selector"
                                                                                        class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                        style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                                        <input type="hidden"
                                                                                            value="{{ __($job_offer_experience->id) }}"
                                                                                            name="experiences[{{ $key }}][job_offer_experience_id]" />
                                                                                        <input type="hidden"
                                                                                            value="0"
                                                                                            name="experiences[{{ $key }}][deleted]" />
                                                                                        <label
                                                                                            >{{ __("generated.Poste") }}</label>
                                                                                        <select disabled
                                                                                            name="experiences[{{ $key }}][profession_id_job_offer_experiences]"
                                                                                            id="profession_id_job_offer_experiences-{{ $key }}"
                                                                                            class="chosenoptgroup w-100 select-search-chosen">
                                                                                            @foreach ($professions as $profession)
                                                                                                <option class="translated_text"
                                                                                                    value="{{ __($profession->id) }}"
                                                                                                    {{ old("experiences.{$key}.job_offer_experience_id", $job_offer_experience->profession_id) == $profession->id ? 'selected' : '' }}>
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
                                                                                            <input disabled type="number"
                                                                                                name="experiences[{{ $key }}][weight_profession_job_offer_experiences]"
                                                                                                id="weight_profession_job_offer_experiences-{{ $key }}"
                                                                                                value="{{ __($job_offer_experience->weight_profession) }}"
                                                                                                class="form-control text-center border-start-0">
                                                                                            <label
                                                                                                for="weight_profession_job_offer_experiences-{{ $key }}">{{ __("generated.% Tolérance poste") }}</label>
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
                                                                                            <input disabled type="number"
                                                                                                name="experiences[{{ $key }}][years_job_offer_experiences]"
                                                                                                id="years_job_offer_experiences-{{ $key }}"
                                                                                                value="{{ __($job_offer_experience->years) }}"
                                                                                                class="form-control border-start-0 translated_text"
                                                                                                placeholder="Saisir le nombre d'années d'expérience">
                                                                                            <label
                                                                                                for="years_job_offer_experiences-{{ $key }}">{{ __("generated.Nombre d'années d'expérience") }}</label>
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
                                                                                            <input disabled type="number"
                                                                                                name="experiences[{{ $key }}][weight_experience_job_offer_experiences]"
                                                                                                id="weight_experience_job_offer_experiences-{{ $key }}"
                                                                                                value="{{ __($job_offer_experience->weight_experience) }}"
                                                                                                class="form-control text-center border-start-0">
                                                                                            <label
                                                                                                for="weight_experience_job_offer_experiences-{{ $key }}">{{ __("generated.% Tolérance expérience") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
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
                            {{-- end for Formation & Expérience --}}

                            {{-- star for Expérience --}}
                            {{-- <div class="row justify-content-center mb-4 ">
                                <div class="col-12 col-md-12">
                                    <div class="card border-0">
                                        <div class="card-body" style="background-color: #e4e8ee54">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row justify-content-center py-3 px-4">
                                                                <h5 class="title mb-3 custom-title ">{{ __("generated.Expérience") }}</h5>
                                                            </div>
                                                            <div class="container">
                                                                <div id="form-rows-experience">
                                                                    @foreach ($job_offer_experiences as $key => $job_offer_experience)
                                                                        <div id="job-offer-experience-row-{{ $key }}"
                                                                            class="job-offer-experience-row row justify-content-center align-items-center mb-3">
                                                                            <!-- Sélection Poste -->
                                                                            <div class="col-12 col-md-4 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div id="profession-selector"
                                                                                        class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                        style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                                        <input type="hidden"
                                                                                            value="{{ __($job_offer_experience->id) }}"
                                                                                            name="experiences[{{ $key }}][job_offer_experience_id]" />
                                                                                        <input type="hidden"
                                                                                            value="0"
                                                                                            name="experiences[{{ $key }}][deleted]" />
                                                                                        <label
                                                                                            >{{ __("generated.Poste") }}</label>
                                                                                        <select disabled
                                                                                            name="experiences[{{ $key }}][profession_id_job_offer_experiences]"
                                                                                            id="profession_id_job_offer_experiences-{{ $key }}"
                                                                                            class="chosenoptgroup w-100 select-search-chosen">
                                                                                            @foreach ($professions as $profession)
                                                                                                <option class="translated_text"
                                                                                                    value="{{ __($profession->id) }}"
                                                                                                    {{ old("experiences.{$key}.job_offer_experience_id", $job_offer_experience->profession_id) == $profession->id ? 'selected' : '' }}>
                                                                                                    {{ __($profession->label) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-3 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input disabled type="number"
                                                                                                name="experiences[{{ $key }}][years_job_offer_experiences]"
                                                                                                id="years_job_offer_experiences-{{ $key }}"
                                                                                                value="{{ __($job_offer_experience->years) }}"
                                                                                                class="form-control border-start-0 translated_text"
                                                                                                placeholder="Saisir le nombre d'années d'expérience">
                                                                                            <label
                                                                                                for="years_job_offer_experiences-{{ $key }}">{{ __("generated.Nombre d'années d'expérience") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-2 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input disabled type="number"
                                                                                                name="experiences[{{ $key }}][weight_profession_job_offer_experiences]"
                                                                                                id="weight_profession_job_offer_experiences-{{ $key }}"
                                                                                                value="{{ __($job_offer_experience->weight_profession) }}"
                                                                                                class="form-control text-center border-start-0">
                                                                                            <label
                                                                                                for="weight_profession_job_offer_experiences-{{ $key }}">{{ __("generated.% Tolérance Poste") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-2 mb-3">
                                                                                <div
                                                                                    class="form-group position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input disabled type="number"
                                                                                                name="experiences[{{ $key }}][weight_experience_job_offer_experiences]"
                                                                                                id="weight_experience_job_offer_experiences-{{ $key }}"
                                                                                                value="{{ __($job_offer_experience->weight_experience) }}"
                                                                                                class="form-control text-center border-start-0">
                                                                                            <label
                                                                                                for="weight_experience_job_offer_experiences-{{ $key }}">{{ __("generated.% Tolérance Expérience") }}</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
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
                                                                <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Compétences techniques") }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-3">
                                                            <div class="row justify-content-center">
                                                                <div class="col-12 mb-4">
                                                                    <div id="form-rows-technical-skills">
                                                                        @foreach ($technical_skills as $key => $technical_skill)
                                                                            <div id="job-offer-technical-skill-row-{{ $key }}"
                                                                                class="job-offer-technical-skill-row row justify-content-center align-items-center">
                                                                                <div class="col-12 col-md-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div id="profession-selector"
                                                                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                            style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                                            <input type="hidden"
                                                                                                value="{{ __($technical_skill->id) }}"
                                                                                                name="technical_skills[{{ $key }}][skill_id]" />
                                                                                            <input type="hidden"
                                                                                                value="0"
                                                                                                name="technical_skills[{{ $key }}][deleted]" />
                                                                                            <label
                                                                                                >{{ __("generated.Catégorie") }}</label>
                                                                                            <select disabled
                                                                                                id="technical_label_skill_types-{{ $key }}"
                                                                                                name="technical_skills[{{ $key }}][label_skill_types]"
                                                                                                class="chosenoptgroup w-100 select-search-chosen">
                                                                                                @foreach ($skillType_technicals as $skillType_technical)
                                                                                                    <option class="translated_text"
                                                                                                        @selected($technical_skill->skill_type_id == $skillType_technical->id)
                                                                                                        value="{{ __($skillType_technical->id) }}">
                                                                                                        {{ __($skillType_technical->label) }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select disabled
                                                                                                    id="technical_label_skills-{{ $key }}"
                                                                                                    name="technical_skills[{{ $key }}][label_skills]"
                                                                                                    class="form-select border-start-0">
                                                                                                    <option  value=""
                                                                                                        disabled selected>{{ __("generated.Sélectionner un détail") }}</option>
                                                                                                    @foreach ($skillType_technicals->where('id', $technical_skill->skill_type_id)->first()->skills as $skill)
                                                                                                        <option class="translated_text"
                                                                                                            @selected($technical_skill->id == $skill->id)
                                                                                                            value="{{ __($skill->id) }}">
                                                                                                            {{ __($skill->label) }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <label
                                                                                                    for="technical_label_skills-{{ $key }}">{{ __("generated.Détail") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select disabled
                                                                                                    id="technical_level_job_offers_skills-{{ $key }}"
                                                                                                    name="technical_skills[{{ $key }}][level_job_offers_skills]"
                                                                                                    class="form-select border-0">
                                                                                                    <option  value=""
                                                                                                        disabled selected>{{ __("generated.Sélectionner un Niveau") }}</option>
                                                                                                    <option
                                                                                                        @selected($technical_skill->pivot->level == 1) value="1"> {{ __("generated.Débutant") }}</option>
                                                                                                    <option
                                                                                                        @selected($technical_skill->pivot->level == 2) value="2"> {{ __("generated.Intermédiaire") }}</option>
                                                                                                    <option
                                                                                                        @selected($technical_skill->pivot->level == 3) value="3"> {{ __("generated.Avancé") }}</option>
                                                                                                    <option
                                                                                                        @selected($technical_skill->pivot->level == 4) value="4"> {{ __("generated.Expert") }}</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="technical_level_job_offers_skills-{{ $key }}">{{ __("generated.Niveau") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-2">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select disabled
                                                                                                    id="technical_weight_job_offers_skills-{{ $key }}"
                                                                                                    name="technical_skills[{{ $key }}][weight_job_offers_skills]"
                                                                                                    class="form-select border-0">
                                                                                                    <option  value=""
                                                                                                        disabled selected>{{ __("generated.Sélectionner une Échelle") }}</option>
                                                                                                    <option
                                                                                                        @selected($technical_skill->pivot->weight == 1) value="1"> 1</option>
                                                                                                    <option
                                                                                                        @selected($technical_skill->pivot->weight == 2) value="2"> 2</option>
                                                                                                    <option
                                                                                                        @selected($technical_skill->pivot->weight == 3) value="3"> 3</option>
                                                                                                    <option
                                                                                                        @selected($technical_skill->pivot->weight == 4) value="4"> 4</option>
                                                                                                    <option
                                                                                                        @selected($technical_skill->pivot->weight == 5) value="5"> 5</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="technical_weight_job_offers_skills-{{ $key }}">{{ __("generated.Échelle") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
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
                                                                <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Compétences personnelles") }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-3">
                                                            <div class="row justify-content-center">
                                                                <div class="col-12">
                                                                    <div id="form-rows-personal-skills">
                                                                        @foreach ($personal_skills as $key => $personal_skill)
                                                                            <div id="job-offer-personal-skill-row-{{ $key }}"
                                                                                class="job-offer-personal-skill-row row justify-content-center align-items-center">
                                                                                <div class="col-12 col-md-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div id="profession-selector"
                                                                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                            style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                                            <input type="hidden"
                                                                                                value="{{ __($personal_skill->id) }}"
                                                                                                name="personal_skills[{{ $key }}][skill_id]" />
                                                                                            <input type="hidden"
                                                                                                value="0"
                                                                                                name="personal_skills[{{ $key }}][deleted]" />
                                                                                            <label
                                                                                                >{{ __("generated.Catégorie") }}</label>
                                                                                            <select disabled
                                                                                                id="personal_label_skill_types-{{ $key }}"
                                                                                                name="personal_skills[{{ $key }}][label_skill_types]"
                                                                                                class="chosenoptgroup w-100 select-search-chosen">
                                                                                                <option  value=""
                                                                                                    disabled selected>{{ __("generated.Sélectionner une compétence personnelle") }}</option>
                                                                                                @foreach ($skillType_personals as $skillType_personal)
                                                                                                    <option class="translated_text"
                                                                                                        value="{{ __($skillType_personal->id) }}"
                                                                                                        @selected($personal_skill->skill_type_id == $skillType_personal->id)>
                                                                                                        {{ __($skillType_personal->label) }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select disabled
                                                                                                    id="personal_label_skills-{{ $key }}"
                                                                                                    name="personal_skills[{{ $key }}][label_skills]"
                                                                                                    class="form-select border-start-0">
                                                                                                    <option  value=""
                                                                                                        disabled selected>{{ __("generated.Sélectionner un détail") }}</option>

                                                                                                    @foreach ($skillType_personals->where('id', $personal_skill->skill_type_id)->first()->skills as $skill)
                                                                                                        <option class="translated_text"
                                                                                                            @selected($personal_skill->id == $skill->id)
                                                                                                            value="{{ __($skill->id) }}">
                                                                                                            {{ __($skill->label) }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <label
                                                                                                    for="personal_label_skills-{{ $key }}">{{ __("generated.Détail") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-3">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select disabled
                                                                                                    id="personal_level_job_offers_skills-{{ $key }}"
                                                                                                    name="personal_skills[{{ $key }}][level_job_offers_skills]"
                                                                                                    class="form-select border-0">
                                                                                                    <option  value=""
                                                                                                        disabled selected>{{ __("generated.Sélectionner un Niveau") }}</option>
                                                                                                    <option
                                                                                                        @selected($personal_skill->pivot->level == 1) value="1"> {{ __("generated.Débutant") }}</option>
                                                                                                    <option
                                                                                                        @selected($personal_skill->pivot->level == 2) value="2"> {{ __("generated.Intermédiaire") }}</option>
                                                                                                    <option
                                                                                                        @selected($personal_skill->pivot->level == 3) value="3"> {{ __("generated.Avancé") }}</option>
                                                                                                    <option
                                                                                                        @selected($personal_skill->pivot->level == 4) value="4"> {{ __("generated.Expert") }}</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="personal_level_job_offers_skills-{{ $key }}">{{ __("generated.Niveau") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-md-2">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select disabled
                                                                                                    id="personal_weight_job_offers_skills-{{ $key }}"
                                                                                                    name="personal_skills[{{ $key }}][weight_job_offers_skills]"
                                                                                                    class="form-select border-0">
                                                                                                    <option  value=""
                                                                                                        disabled selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                    <option
                                                                                                        @selected($personal_skill->pivot->weight == 1) value="1"> 1</option>
                                                                                                    <option
                                                                                                        @selected($personal_skill->pivot->weight == 2) value="2"> 2</option>
                                                                                                    <option
                                                                                                        @selected($personal_skill->pivot->weight == 3) value="3"> 3</option>
                                                                                                    <option
                                                                                                        @selected($personal_skill->pivot->weight == 4) value="4"> 4</option>
                                                                                                    <option
                                                                                                        @selected($personal_skill->pivot->weight == 5) value="5"> 5</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="personal_weight_job_offers_skills-{{ $key }}">{{ __("generated.Échelle") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
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
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-header bg-gradient-theme-light">
                                                            <div class="row align-items-center">
                                                                <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Compétences Linguistiques") }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-3">
                                                            <div class="row justify-content-center">
                                                                <div class="col-12">
                                                                    <div id="form-rows-language-skills">
                                                                        @foreach ($linguistic_skills as $key => $linguistic_skill)
                                                                            <div
                                                                                class="language_label_skill_types_row row mb-4">
                                                                                <div class="col-12 col-md-3 mb-2">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                            <div
                                                                                                class="form-group position-relative is-valid check-valid is-valid">
                                                                                                <div id="profession-selector"
                                                                                                    class="custom-multiple-select rounded border poste-chosen select-search"
                                                                                                    style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                                                                                    <input type="hidden"
                                                                                                        value="true"
                                                                                                        name="language_skills[{{ __($loop->index) }}][job_offer_skills]" />
                                                                                                    <input type="hidden"
                                                                                                        value="0"
                                                                                                        name="language_skills[{{ __($loop->index) }}][deleted]" />
                                                                                                    <label
                                                                                                        >{{ __("generated.Langue") }}</label>
                                                                                                    <select disabled
                                                                                                        class="language_label_skill_types chosenoptgroup w-100 select-search-chosen"
                                                                                                        data-id="0"
                                                                                                        id="language_label_skill_types-{{ __($loop->index) }}"
                                                                                                        name="language_skills[{{ __($loop->index) }}][label_skill_types]">
                                                                                                        @foreach ($skillType_linguistiques as $skillType_linguistique)
                                                                                                            <option class="translated_text"
                                                                                                                @selected($skillType_linguistique->id == $key)
                                                                                                                value="{{ __($skillType_linguistique->id) }}">
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
                                                                                    @foreach ($linguistic_skill as $linguistic_skill_item)
                                                                                        <div class="row g-2">
                                                                                            <div
                                                                                                class="col-12 col-md-6 col-lg-5 mb-3">
                                                                                                <div
                                                                                                    class="form-group position-relative is-valid check-valid is-valid">
                                                                                                    <div
                                                                                                        class="input-group input-group-lg">
                                                                                                        <div
                                                                                                            class="form-floating">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                value="{{ __($linguistic_skill_item->id) }}"
                                                                                                                name="language_skills[{{ __($loop->parent->index) }}][multiple_skills][{{ __($loop->index) }}][job_offer_skill_id]" />
                                                                                                            <select disabled
                                                                                                                id="language_label_skills-{{ __($loop->parent->index) }}-{{ __($loop->index) }}"
                                                                                                                name="language_skills[{{ __($loop->parent->index) }}][multiple_skills][{{ __($loop->index) }}][label_skills]"
                                                                                                                class="form-select border-start-0">
                                                                                                                @foreach ($skillType_linguistiques->where('id', $key)->first()->skills as $skill)
                                                                                                                    <option class="translated_text"
                                                                                                                        @selected($linguistic_skill_item->id == $skill->id)
                                                                                                                        value="{{ __($skill->id) }}">
                                                                                                                        {{ __($skill->label) }}
                                                                                                                    </option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                            <label class="translated_text"
                                                                                                                for="language_label_skills-{{ __($loop->parent->index) }}-{{ __($loop->index) }}">Compétence</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-md-4 col-lg-4 mb-3">
                                                                                                <div
                                                                                                    class="form-group position-relative is-valid check-valid is-valid">
                                                                                                    <div
                                                                                                        class="input-group input-group-lg">
                                                                                                        <div
                                                                                                            class="form-floating">
                                                                                                            <select disabled
                                                                                                                class="form-select border-0"
                                                                                                                id="language_level_job_offers_skills-{{ __($loop->parent->index) }}-{{ __($loop->index) }}"
                                                                                                                name="language_skills[{{ __($loop->parent->index) }}][multiple_skills][{{ __($loop->index) }}][level_job_offers_skills]">
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->level == 5) value="5"> {{ __("generated.A1 : Débutant") }}</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->level == 6) value="6"> {{ __("generated.A2 : Intermédiaire bas") }}</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->level == 7) value="7"> {{ __("generated.B1 : Intermédiaire") }}</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->level == 8) value="8"> {{ __("generated.B2 : Intermédiaire avancé") }}</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->level == 9) value="9"> {{ __("generated.C1 : Avancé") }}</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->level == 10) value="10"> {{ __("generated.C2 : Maîtrise") }}</option>
                                                                                                            </select>
                                                                                                            <label class="translated_text"
                                                                                                                for="language_level_job_offers_skills-{{ __($loop->parent->index) }}-{{ __($loop->index) }}">{{ __("generated.Niveau") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-12 col-md-3 col-lg-3 mb-3">
                                                                                                <div
                                                                                                    class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                                    <div
                                                                                                        class="input-group input-group-lg">
                                                                                                        <div
                                                                                                            class="form-floating">
                                                                                                            <select disabled
                                                                                                                id="language_weight_job_offers_skills-{{ __($loop->parent->index) }}-{{ __($loop->index) }}"
                                                                                                                name="language_skills[{{ __($loop->parent->index) }}][multiple_skills][{{ __($loop->index) }}][weight_job_offers_skills]"
                                                                                                                class="form-select border-0">
                                                                                                                <option
                                                                                                                    value=""
                                                                                                                    disabled
                                                                                                                    selected>{{ __("generated.Sélectionner une échelle") }}</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->weight == 1) value="1"> 1</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->weight == 2) value="2"> 2</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->weight == 3) value="3"> 3</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->weight == 4) value="4"> 4</option>
                                                                                                                <option
                                                                                                                    @selected($linguistic_skill_item->pivot->weight == 5) value="5"> 5</option>
                                                                                                            </select>
                                                                                                            <label class="translated_text"
                                                                                                                for="language_weight_job_offers_skills-{{ __($loop->parent->index) }}-{{ __($loop->index) }}">{{ __("generated.Échelle") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
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
                                                                <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Prétention salariale") }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-3">
                                                            <div class="container">
                                                                <div id="form-rows-salaire">
                                                                    @foreach ($job_offer_salary_expectations as $key => $job_offer_salary_expectation)
                                                                        <div id="job-offer-salary_expectation-row-{{ $key }}" class="job-offer-salary_expectation-row row justify-content-center align-items-center mb-3">
                                                                            <div class="col-12 col-md-3 mb-3">
                                                                                <div class="position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input disabled type="number" name="salaires[{{ $key }}][montant_min]" id="montant_min-salaires-{{ $key }}" class="form-control text-right border-start-0" value="{{ old('montant_min', optional($job_offer_salary_expectation)->min_salary) }}">
                                                                                            <label for="montant_min-{{ $key }}"><span >{{ __("generated.Montant minimum") }}</span> <span class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-3 mb-3">
                                                                                <div class="position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input disabled type="number" name="salaires[{{ $key }}][montant_max]" id="montant_max-salaires-{{ $key }}" class="form-control text-right border-start-0" value="{{ old('montant_max', optional($job_offer_salary_expectation)->max_salary) }}">
                                                                                            <label for="montant_max-{{ $key }}"><span >{{ __("generated.Montant maximum") }}</span> <span class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-3 mb-3">
                                                                                <div class="position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input disabled type="number" name="salaires[{{ $key }}][weight]" id="weight-salaires-{{ $key }}" class="form-control text-right border-start-0" value="{{ old('montant_max', optional($job_offer_salary_expectation)->weight) }}">
                                                                                            <label for="weight-{{ $key }}"><span >{{ __("generated.% Tolérance") }}</span> <span class="text-themeColor">*</span></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
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
                                                                <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Mobilité") }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-3">
                                                            <div class="row justify-content-center">
                                                                {{-- star Mobilité géographique = Geographic_mobility --}}
                                                                <div class="col-12 col-lg-5 mt-2 mb-2">
                                                                    <div class="row">
                                                                        <div class="col-md-auto">
                                                                            <div id="mobilitys-geographic-label" class="mobilitys-label">
                                                                                <div class="form-group mb-3 mt-4 position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg"
                                                                                        style="padding: 10px 26px; background-color: var(--adminux-theme-bg); min-width: 210px;">
                                                                                        <label >{{ __("generated.Mobilité géographique") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="row">
                                                                                <div class="col-7"></div>
                                                                                <div class="col"
                                                                                    style="text-align: left; margin-bottom: 10px; font-size: 12px; color: #706f6f;">
                                                                                    <span style="margin-right: 23px;" >{{ __("generated.Échelle") }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-switch">
                                                                                        <input disabled class="form-check-input" type="checkbox" id="local"
                                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][local][is_active]"

                                                                                            @checked(isset($mobilityOptionsByParent[1]) &&
                                                                                            $mobilityOptionsByParent[1]->where('slug', 'local')->first()?->pivot?->is_active)>
                                                                                        <label class="form-check-label " for="local">{{ __("generated.Locale") }}</label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-2" style="width: 34%;margin-top: -4px;">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating">
                                                                                                <input disabled type="text"
                                                                                                name="mobilitys[with_echelle][Geographic_mobilitys][local][weight]"
                                                                                                    {{-- class="form-control border-start-0" value="{{ optional(optional($mobilityOptionsByParent[1]->where('slug', 'local')->first())->pivot)->weight }}" --}}
                                                                                                    class="form-control border-start-0" value="{{ isset($mobilityOptionsByParent[1]) ? optional(optional($mobilityOptionsByParent[1]->where('slug', 'local')->first())->pivot)->weight : '' }}"
                                                                                                    style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                            </div>
                                                                                            <span class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-switch">
                                                                                        <input disabled class="form-check-input" type="checkbox" role="switch" id="regionale"
                                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][regional][is_active]"
                                                                                            @checked(isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'regional')->first()?->pivot?->is_active)>

                                                                                        <label class="form-check-label "
                                                                                            for="regionale">{{ __("generated.Régionale") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2" style="width: 34%;margin-top: -4px;">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating">
                                                                                                <input disabled type="text"
                                                                                                    name="mobilitys[with_echelle][Geographic_mobilitys][regional][weight]"
                                                                                                    value="{{ isset($mobilityOptionsByParent[1]) ? optional(optional($mobilityOptionsByParent[1]->where('slug', 'regional')->first())->pivot)->weight : '' }}"
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                            </div>
                                                                                            <span class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-switch">
                                                                                        <input disabled class="form-check-input" type="checkbox" id="nationale"
                                                                                            role="switch" name="mobilitys[with_echelle][Geographic_mobilitys][national][is_active]"
                                                                                            @checked(isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'national')->first()?->pivot?->is_active)>
                                                                                        <label class="form-check-label "
                                                                                            for="nationale">{{ __("generated.Nationale") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2" style="width: 34%;margin-top: -4px;">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating">
                                                                                                <input disabled type="text"
                                                                                                    name="mobilitys[with_echelle][Geographic_mobilitys][national][weight]"
                                                                                                    value="{{ isset($mobilityOptionsByParent[1]) ? optional(optional($mobilityOptionsByParent[1]->where('slug', 'national')->first())->pivot)->weight : '' }}"
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                            </div>
                                                                                            <span class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-switch">
                                                                                        <input disabled class="form-check-input" type="checkbox"
                                                                                            role="switch" id="internationale"
                                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][international][is_active]"
                                                                                            @checked(isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'international')->first()?->pivot?->is_active)>
                                                                                        <label class="form-check-label "
                                                                                            for="internationale">{{ __("generated.Internationale") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2" style="width: 34%;margin-top: -4px;">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating">
                                                                                                <input disabled type="text"
                                                                                                    name="mobilitys[with_echelle][Geographic_mobilitys][international][weight]"
                                                                                                    value="{{ isset($mobilityOptionsByParent[1]) ? optional(optional($mobilityOptionsByParent[1]->where('slug', 'international')->first())->pivot)->weight  : '' }}"
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                            </div>
                                                                                            <span class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i class="bi bi-">%</i></span>
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
                                                                            <div id="mobilitys-work-mode-label" class="mobilitys-label">
                                                                                <div class="form-group mb-3 mt-4 position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg"
                                                                                        style="padding: 10px 26px; background-color: var(--adminux-theme-bg); min-width: 210px;">
                                                                                        <label >{{ __("generated.Mode de travail") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="row">
                                                                                <div class="col-7"></div>
                                                                                <div class="col"
                                                                                    style="text-align: left; margin-bottom: 10px; font-size: 12px; color: #706f6f;">
                                                                                    <span style="margin-right: 23px;" >{{ __("generated.Échelle") }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-switch">
                                                                                        <input disabled class="form-check-input" type="checkbox" id="onsite"
                                                                                            role="switch" name="mobilitys[with_echelle][work_modes][onsite][is_active]"
                                                                                            @checked(isset($mobilityOptionsByParent[6]) && $mobilityOptionsByParent[6]->where('slug', 'onsite')->first()?->pivot?->is_active)>
                                                                                        <label class="form-check-label "
                                                                                            for="onsite">{{ __("generated.Présentiel") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2" style="width: 34%;margin-top: -4px;">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating">
                                                                                                <input disabled type="text"
                                                                                                    name="mobilitys[with_echelle][work_modes][onsite][weight]"
                                                                                                    value="{{ isset($mobilityOptionsByParent[6]) ?  optional(optional($mobilityOptionsByParent[6]->where('slug', 'onsite')->first())->pivot)->weight : '' }}"
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                            </div>
                                                                                            <span class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-switch">
                                                                                        <input disabled class="form-check-input" type="checkbox" id="remote"
                                                                                            role="switch" name="mobilitys[with_echelle][work_modes][remote][is_active]"
                                                                                            @checked(isset($mobilityOptionsByParent[6]) && $mobilityOptionsByParent[6]->where('slug', 'remote')->first()?->pivot?->is_active)>
                                                                                        <label class="form-check-label "
                                                                                            for="remote">{{ __("generated.Distanciel") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2" style="width: 34%;margin-top: -4px;">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating">
                                                                                                <input disabled type="text"
                                                                                                    name="mobilitys[with_echelle][work_modes][remote][weight]"
                                                                                                    value="{{ isset($mobilityOptionsByParent[6]) ? optional(optional($mobilityOptionsByParent[6]->where('slug', 'remote')->first())->pivot)->weight  : '' }}"
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                            </div>
                                                                                            <span class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-switch">
                                                                                        <input disabled class="form-check-input" type="checkbox" id="hybrid"
                                                                                            role="switch" name="mobilitys[with_echelle][work_modes][hybrid][is_active]"
                                                                                            @checked(isset($mobilityOptionsByParent[6]) && $mobilityOptionsByParent[6]->where('slug', 'hybrid')->first()?->pivot?->is_active)>
                                                                                        <label class="form-check-label "
                                                                                            for="hybrid">{{ __("generated.Hybride") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2" style="width: 34%;margin-top: -4px;">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating">
                                                                                                <input disabled type="text"
                                                                                                    name="mobilitys[with_echelle][work_modes][hybrid][weight]"
                                                                                                    value="{{ isset($mobilityOptionsByParent[6]) ? optional(optional($mobilityOptionsByParent[6]->where('slug', 'hybrid')->first())->pivot)->weight : '' }}"
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;">
                                                                                            </div>
                                                                                            <span class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i class="bi bi-">%</i></span>
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
                                                                            <div id="mobilitys-working-hours-label" class="mobilitys-label">
                                                                                <div class="form-group mb-3 mt-4 position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg"
                                                                                        style="padding: 10px 26px; background-color: var(--adminux-theme-bg); min-width: 210px;">
                                                                                        <label >{{ __("generated.Temps de travail") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="row">
                                                                                <div class="col-7" style="min-width: 135px"></div>
                                                                                <div class="col"
                                                                                    style="text-align: left; margin-bottom: 10px; font-size: 12px; color: #706f6f;">
                                                                                    <span style="margin-right: 23px;" >{{ __("generated.Échelle") }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <!-- Full-Time -->
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-switch">
                                                                                        <input disabled class="form-check-input" type="checkbox"
                                                                                            id="full_time" name="mobilitys[with_echelle][working_hours][full_time][is_active]"
                                                                                            @checked(isset($mobilityOptionsByParent[10]) && $mobilityOptionsByParent[10]->where('slug', 'full_time')->first()?->pivot?->is_active)>
                                                                                        <label class="form-check-label "
                                                                                            for="full_time">{{ __("generated.Plein") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2" style="width: 34%;margin-top: -4px;">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating">
                                                                                                <input disabled type="text"
                                                                                                    name="mobilitys[with_echelle][working_hours][full_time][weight]"
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;"
                                                                                                    value="{{ isset($mobilityOptionsByParent[10]) ? optional(optional($mobilityOptionsByParent[10]->where('slug', 'full_time')->first())->pivot)->weight : '' }}">
                                                                                            </div>
                                                                                            <span class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Part-Time -->
                                                                            <div class="row">
                                                                                <div class="col-7">
                                                                                    <div class="form-check form-switch">
                                                                                        <input disabled class="form-check-input" type="checkbox"
                                                                                            id="part_time" name="mobilitys[with_echelle][working_hours][part_time][is_active]"
                                                                                            @checked(isset($mobilityOptionsByParent[10]) && $mobilityOptionsByParent[10]->where('slug', 'part_time')->first()?->pivot?->is_active)>

                                                                                        <label class="form-check-label "
                                                                                            for="part_time">{{ __("generated.Partiel") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2" style="width: 34%;margin-top: -4px;">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px; width: 56px; border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating">
                                                                                                <input disabled type="text"
                                                                                                    name="mobilitys[with_echelle][working_hours][part_time][weight]"
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 4px; text-align: right;"
                                                                                                    value="{{ isset($mobilityOptionsByParent[10]) ? optional(optional($mobilityOptionsByParent[10]->where('slug', 'part_time')->first())->pivot)->weight : '' }}">
                                                                                            </div>
                                                                                            <span class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i class="bi bi-">%</i></span>
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
                                                                            <div id="mobilitys-availabilitys-label" class="mobilitys-label">
                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div class="input-group input-group-lg"
                                                                                        style="padding: 10px 26px; background-color: var(--adminux-theme-bg); min-width: 210px;">
                                                                                        <label >{{ __("generated.Disponibilité") }}</label>
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
                                                                                                <input disabled class="form-check-input" type="radio"
                                                                                                    id="immediate" value="immediate" name="mobilitys[availabilitys][type]"
                                                                                                    @checked(isset($mobilityOptionsByParent[13]) && $mobilityOptionsByParent[13]->first()?->slug == "immediate")>
                                                                                                <label class="form-check-label "
                                                                                                    for="immediate">{{ __("generated.Immédiate") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- Notice Option -->
                                                                                        <div class="col-12">
                                                                                            <div class="form-check">
                                                                                                <input disabled class="form-check-input" type="radio"
                                                                                                    id="notice" value="notice" name="mobilitys[availabilitys][type]"
                                                                                                    @checked(isset($mobilityOptionsByParent[13]) && $mobilityOptionsByParent[13]->first()?->slug == "notice")>
                                                                                                <label class="form-check-label "
                                                                                                    for="notice">{{ __("generated.Préavis") }}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                @php
                                                                                $selectedNoticeValue = isset($mobilityOptionsByParent[13])
                                                                                    ? $mobilityOptionsByParent[13]->first()?->pivot?->notice_period_per_month
                                                                                    : null;
                                                                                @endphp

                                                                                <div class="col-6" id="notice-duration-container">
                                                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;">
                                                                                        {{-- <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;"></label> --}}
                                                                                        <select disabled class="chosenoptgroup w-100" id="notice_duration" name="mobilitys[availabilitys][notice_duration]">
                                                                                            @foreach($noticePeriodEnum as $value => $label)
                                                                                                <option class="translated_text" value="{{ __($value) }}" @selected($selectedNoticeValue === $value)>
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
                                                                            <div class="form-group position-relative check-valid is-valid">
                                                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                                                    style="border-radius: 8px !important;">
                                                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" class="translated_text">Permis de conduire <span class="text-themeColor">*</span></label>
                                                                                    <select disabled class="chosenoptgroup w-100" name="has_driving_license" id="has_driving_license" onchange="toggleLicenseType()">
                                                                                        <option  value="" selected disabled>{{ __("generated.Sélectionnez une option") }}</option>
                                                                                        <option  value="1" {{ old('has_driving_license', $jobOffer->has_driving_license) == 1 ? 'selected' : '' }}>{{ __("generated.Oui") }}</option>
                                                                                        <option  value="0" {{ old('has_driving_license', $jobOffer->has_driving_license) == 0 ? 'selected' : '' }}>{{ __("generated.Non") }}</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6 col-md-3 mt-3" id="licenseTypeContainer">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg"
                                                                            style="padding: 16px 15px 6px; background-color: var(--adminux-theme-bg);">
                                                                            <div class="form-floating">
                                                                                <div class="dropdown d-inline-block" style="width: 100%;">
                                                                                    <a class="text-secondary dd-arrow-none"
                                                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                                                        data-bs-display="static" role="button"
                                                                                        style="color: #111111 !important;">
                                                                                        <label
                                                                                            style="transform: scale(0.75) translateY(-0.5rem) translateX(0.15rem); position: absolute; top: -7px; left: -18px; color: #5f6165;">{{ __("generated.Type de permis") }}</label>
                                                                                        <span id="selected-license"
                                                                                            style="margin-top: 10px; float: left; width: calc(100% - 20px);">
                                                                                            @php
                                                                                                $licenseKeys = json_decode(
                                                                                                    $jobOffer->license_types,
                                                                                                    true,
                                                                                                );
                                                                                                $licenseLabels = [];

                                                                                                if (is_array($licenseKeys)) {
                                                                                                    foreach ($licenseKeys as $key) {
                                                                                                        $licenseLabels[] = \App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getValue(
                                                                                                            $key,
                                                                                                        );
                                                                                                    }
                                                                                                }
                                                                                            @endphp

                                                                                            {{ implode(', ', array_filter($licenseLabels)) }}
                                                                                        </span>
                                                                                        <i class="bi bi-chevron-down"
                                                                                            style="float: right;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        style="top: auto; left: 0; width: 100%;">
                                                                                        @foreach (App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getAll() as $key => $license)
                                                                                            <li class="dropdown-item">
                                                                                                <label>
                                                                                                    <input disabled type="checkbox"
                                                                                                        name="driving_license_types[]"
                                                                                                        class="license-option"
                                                                                                        value="{{ $key }}"
                                                                                                        @if (in_array($key, json_decode($jobOffer->license_types ?? '[]', true) ?? [])) checked @endif>

                                                                                                    <span class=" translated_text">{{ __($license) }}</span>
                                                                                                </label>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
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
                                            <div class="col d-flex justify-content-end">
                                                <button class="btn btn-theme " type="button" id="btn-prev">{{ __("generated.Précédent") }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- star for btn_Enregister JobOffre --}}
                        </div>
                        {{-- end partie Echelle --}}
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('js_footer')

    {{-- for select search ( ville ) --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendor/chosen_v1.8.7/chosen.jquery.min.js') }}"></script>

    <script>
        // Aller à la partie Echelle
        document.getElementById('btn-suivant').addEventListener('click', function() {
            var personal2Tab = new bootstrap.Tab(document.getElementById('personal2-tab'));
            personal2Tab.show();  // Passe à l'onglet "Echelle"
        });

        // Retourner à la partie Recrutement
        document.getElementById('btn-prev').addEventListener('click', function() {
            var personalTab = new bootstrap.Tab(document.getElementById('personal-tab'));
            personalTab.show();  // Retourne à l'onglet "Recrutement"
        });
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
                .then(editor => {
                    editor.isReadOnly = true; // Désactive CKEditor
                })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 2 */
            ClassicEditor
                .create(document.querySelector('#Responsibilitiess_details2'), {
                    language: 'fr'
                })
                .then(editor => {
                    editor.isReadOnly = true; // Désactive CKEditor
                })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 2 */
            ClassicEditor
                .create(document.querySelector('#mission_details'), {
                    language: 'fr'
                })
                .then(editor => {
                    editor.isReadOnly = true; // Désactive CKEditor
                })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 3 */
            ClassicEditor
                .create(document.querySelector('#Responsibilities_details'), {
                    language: 'fr'
                })
                .then(editor => {
                    editor.isReadOnly = true; // Désactive CKEditor
                })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 4 */
            ClassicEditor
                .create(document.querySelector('#technical_skills_details'), {
                    language: 'fr'
                })
                .then(editor => {
                    editor.isReadOnly = true; // Désactive CKEditor
                })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 5 */
            ClassicEditor
                .create(document.querySelector('#formation_details'), {
                    language: 'fr'
                })
                .then(editor => {
                    editor.isReadOnly = true; // Désactive CKEditor
                })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 6 */
            ClassicEditor
                .create(document.querySelector('#experience_details'), {
                    language: 'fr'
                })
                .then(editor => {
                    editor.isReadOnly = true; // Désactive CKEditor
                })
                .catch(error => {
                    console.error(error);
                });

            /* ck editor 7 */
            ClassicEditor
                .create(document.querySelector('#personal_skills_details'), {
                    language: 'fr'
                })
                .then(editor => {
                    editor.isReadOnly = true; // Désactive CKEditor
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
