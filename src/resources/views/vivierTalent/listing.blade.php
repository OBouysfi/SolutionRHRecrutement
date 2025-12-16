@extends('layouts.master')

@section('title', __('generated.Vivier talent'))

@section('css_header')

    <style>
        .vue-folder .dragzonecard {
            max-height: 40vh;
            overflow-y: auto;
            scrollbar-width: none;
        }

        .vue-folder .dragzonecard::-webkit-scrollbar {
            display: none;
        }

        .folder-dropdown-menu {
            position: relative !important;
            width: 100%;
        }


        .dropdown-submenu>.dropdown-menu {
            height: 100% !important;
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
            transform: translate(0, 0) !important;
        }

        .nav-pills {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        .dropdown-menu {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        .nav {
            max-height: 100%;
            overflow-y: auto;
        }

        .dragzonecard {
            max-height: 100%;
        }

        .dropdown-menu {
            height: auto !important;
        }

        .select-avatar select {
            background-image: none !important;
        }

        .subfolder-list {
            margin-left: 30px;
            padding-left: 10px;
        }
        .dataTables_wrapper .dataTables_info {
            margin: 10px 0px;
            padding: 7px
        }

    @media ((min-width: 1200px)) {
        .container-xxl, .container-xl, 
        .container-lg, .container-md, 
        .container-sm, .container {
            max-width: 1625px !important;  }
    }
    </style>


@endsection

@section('content')

    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 text-bw">{{ __('generated.talent_pool') }}</h5>
                </div>
                {{-- <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div> --}}
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __('generated.Vue d\'ensemble') }}
                    </li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body filter-block">
                                            <div class="row mt-3">

                                                <!-- Pays -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div  class="custom-multiple-select poste-chosen rounded border select-search"
                                                        style="border-radius: 8px !important;">
                                                        <label class=" text-bw">{{ __("generated.Pays") }}</label>
                                                        <select class="chosenoptgroup   w-100" id="filter-pays">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ __($country->id) }}"
                                                                    data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png">
                                                                    {{ __($country->name) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- Ville -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                            <div  class="custom-multiple-select poste-chosen rounded border select-search"
                                                                style="border-radius: 8px !important;">
                                                                <label class=" text-bw">{{ __("generated.Ville") }}</label>
                                                                <select class="chosenoptgroup w-100" id="filter-ville">
                                                                    <option value="Tous" selected >{{ __("generated.Tous") }}</option>
                                                                    @if (isset($cities))
                                                                        @foreach ($cities as $city)
                                                                            <option value="{{ $city->id ?? '' }}"
                                                                                data-country="{{ $city->country?->id ?? '' }}">
                                                                                {{ __($city->name ?? '_') }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                    </div>
                                                </div>

                                                <!-- Poste -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div  class="custom-multiple-select poste-chosen rounded border select-search"
                                                            style="border-radius: 8px !important;">
                                                            <label class="text-bw ">{{ __("generated.Poste") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-poste">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @foreach ($posts as $post)
                                                                    <option value="{{ $post->id ?? '' }}">
                                                                        {{ __($post->label ?? '_') }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Diplôme -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div  class="custom-multiple-select poste-chosen rounded border select-search"
                                                            style="border-radius: 8px !important;">
                                                            <label >{{ __("generated.Diplôme") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-diplome">
                                                                <option value="Tous" selected >{{ __("generated.Tous") }}</option>
                                                                @if (isset($diplomas))
                                                                    @foreach ($diplomas as $diploma)
                                                                        <option value="{{ $diploma->id ?? '' }}">
                                                                            {{ __($diploma->label ?? '_') }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Expérience -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div  class="custom-multiple-select poste-chosen rounded border select-search"
                                                            style="border-radius: 8px !important;">
                                                            <label class="text-bw ">{{ __("generated.Expérience") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-experience">
                                                                <option value="Tous" >{{ __("generated.Tous") }}</option>
                                                                @foreach ($levelExperience as $key => $levelexper)
                                                                    <option value="{{ $key }}">
                                                                        {{ __($levelexper) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Type de contrat -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div  class="custom-multiple-select poste-chosen rounded border select-search"
                                                            style="border-radius: 8px !important;">
                                                            <label class="text-bw ">{{ __("generated.Type de contrat") }}</label>
                                                            <select class="chosenoptgroup w-100" name="poste"
                                                                id="filter-contrat-type">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @foreach ($contractsTypes as $key => $contract)
                                                                    <option value="{{ $key ?? '' }}">
                                                                        {{ $contract ?? '_' }}
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
            <div class="row ">
                <div class="col-12">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body bg-gradient-theme-light">
                                            <div class="row justify-content-center align-items-center">
                                                <!-- Titre -->
                                                <div class="col-12 col-md-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-bw">
                                                                {{ __('generated.talent_pool') }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Icônes -->
                                                <div class="col-12 col-md-8 ms-md-auto">
                                                    <div class="row g-2 justify-content-end align-items-center">
                                                        <!-- Icône Aperçu -->
                                                        @can('vivierTalent-preview')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __("generated.Aperçu") }}">
                                                                    <a href="{{ route('vivierTalent.preview') }}"
                                                                        target="_blank">
                                                                        <i class="bi bi-binoculars avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        <!-- Icône Partager -->
                                                        @can('vivierTalent-share')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme  translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __("generated.Partager") }}">
                                                                    <a href="#" type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#emailcompose">
                                                                        <i class="bi bi-share avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        <!-- Icône Télécharger -->
                                                        @can('vivierTalent-download')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __("generated.Télécharger") }}" id="downloadExcel">
                                                                    <a href="#" type="button">
                                                                        <i
                                                                            class="bi bi-cloud-download avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        <!-- Icône Imprimer -->
                                                        @can('vivierTalent-print')
                                                            <div class="col-auto" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ __("generated.Imprimer") }}">
                                                                <div class="avatar avatar-50 rounded bg-light-theme"
                                                                    target="_blank" onclick="printSection()">
                                                                    <i class="bi bi-printer avatar icon-bw rounded h5 "></i>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        <div class="col-auto">
                                                            <div class="select-avatar avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ __("generated.Nombre d'éléments par page") }}">
                                                                <select id="customLength"
                                                                    style="border: 0;background-color: transparent;color: var(--adminux-theme); width: 49px;">
                                                                    <option selected>10</option>
                                                                    <option>25</option>
                                                                    <option>50</option>
                                                                    <option>100</option>
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
            </div>
            <div class="row mb-3">
                <!-- Colonne 1 -->
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 column-set">
                                    <div class="card border-0 h-100">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-person h5 avatar avatar-40 bg-light-green text-green rounded"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 translated_text text-bw">
                                                        {{ __('generated.Taux de conversion candidats') }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mediumchart">
                                                <canvas id="mediumchartgreen1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne 2 -->
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 column-set">
                                    <div class="card border-0 h-100">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-trophy h5 avatar avatar-40 bg-light-blue text-blue rounded"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 translated_text text-bw">
                                                        {{ __('generated.Taux de satisfaction recruteurs') }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mediumchart">
                                                <canvas id="mediumchartgreen2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne 3 -->
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 column-set">
                                    <div class="card border-0 h-100">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-ticket-perforated h5 avatar avatar-40 bg-light-yellow text-yellow rounded"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 translated_text text-bw">
                                                        {{ __('generated.Taux de diversité du vivier') }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mediumchart">
                                                <canvas id="mediumchartgreen3"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne 4 -->
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 column-set">
                                    <div class="card border-0 h-100">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-person-up h5 avatar avatar-40 bg-light-red text-red rounded"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 translated_text text-bw">
                                                        {{ __('generated.Taux de rentabilité du vivier') }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mediumchart">
                                                <canvas id="mediumchartgreen4"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row inner-sidebar-wrap">

                <div class="col-3">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="inner-sidebar"
                                style="background-color: transparent;border: 0;width: 100%;min-height: 100px;">
                                @can('vivierTalent-dossier-create')
                                    <div class="row mx-0 my-3">
                                        <div class="col d-grid p-0">
                                            <button style="background-color: var(--adminux-theme); text-align: left"
                                                class="btn btn-theme border" type="button" data-bs-toggle="modal" 
                                                data-bs-target="#addTalentFolderModal">
                                                <i class="bi bi-plus-square" style="margin-right: 20px;"></i> <span   >{{ __("generated.Ajouter un dossier") }}</span></button>
                                        </div>
                                    </div>
                                @endcan
                                <div class="row mx-0 my-3">
                                    <div class="col d-grid p-0">
                                        <button id="clearFoldersFillter" class="btn btn-outline-theme btn-annuler" style="text-align: left"
                                            type="button" data-bs-toggle="modal">
                                            <i class="bi bi-trash " style="margin-right: 15px;"></i> <span >{{ __("generated.Effacer le filtre") }}</span></button>
                                    </div>
                                </div>
                                <div class="input-group input-group-md">
                                    <input type="text" id="folderSearch" class="form-control p-25"
                                        placeholder="{{ __("generated.Rechercher un dossier...") }}">
                                </div>
                                <br>
                                <ul class="nav nav-pills mb-3">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle show change-befor " data-bs-toggle="dropdown"
                                            data-bs-auto-close="false" data-bs-display="static" href="#" style="background: var(--adminux-theme-bg)"
                                            role="button" aria-expanded="false">
                                            <div class="avatar avatar-40 icon">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="col  text-bw">{{ __("generated.Dossiers") }}</div>
                                            <div class="arrow  change-befor show"><i class="bi bi-chevron-down plus">
                                                </i> <i class="bi bi-chevron-up minus"></i>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu dragzonecard show folder-dropdown-menu "
                                            style="background-color: transparent;">
                                            @foreach ($talentFolders as $folder)
                                                <li class="nav-item dropdown position-relative nav-folder">
                                                    <a class="dropdown-item nav-link folder-item toggle-subfolders"
                                                        href="#" data-folder-id="{{ __($folder->id) }}">
                                                        <div class="avatar avatar-40 icon"><i class="bi bi-folder"></i>
                                                        </div>
                                                        <div class="col align-self-center">{{ __($folder->name) }}</div>
                                                        <div class="col-auto align-items-center">
                                                            <figure
                                                                class="avatar avatar-24 bg-light-theme rounded-circle me-1">
                                                                <small
                                                                    class="fs-10 vm">{{ $folder->profiles->count() }}</small>
                                                            </figure>
                                                        </div>
                                                        <div class="arrow"><i class="bi bi-chevron-down"></i></div>
                                                    </a>
                                                    @if ($folder->subFolders->count() > 0)
                                                        <ul class="subfolder-list nav-folder"
                                                            style="display: none; list-style: none;">
                                                            @foreach ($folder->subFolders as $subFolder)
                                                                <li style="list-style: none;">
                                                                    <a class="dropdown-item nav-link folder-item"
                                                                        href="#"
                                                                        data-folder-id="{{ __($subFolder->id) }}">
                                                                        <div class="avatar avatar-40 icon"><i
                                                                                class="bi bi-folder"></i></div>
                                                                        <div class="col align-self-center">
                                                                            {{ __($subFolder->name) }}</div>
                                                                        <div class="col-auto align-items-center">
                                                                            <figure
                                                                                class="avatar avatar-24 bg-light-theme rounded-circle me-1">
                                                                                <small
                                                                                    class="fs-10 vm">{{ $subFolder->profiles->count() }}</small>
                                                                            </figure>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card border-0">
                        <div class="card-body p-0 ">
                            <div class="card-header bg-gradient-theme-light ">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <h5 >{{ __("generated.talent_pool") }}</h5>
                                    </div>
                                    <div class="col-12 col-md-3 mt-2 mt-md-0 ms-auto">
                                        <div class="input-group searchbar-full">
                                            <span class="input-group-text text-theme">
                                                <i class="bi bi-search"></i>
                                            </span>
                                            <input type="text" class="form-control form-control-sm" id="customSearchBoxVivier" placeholder="{{ __("generated.Search...") }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------------All Profils Table-------------------------->
                            <div class="card-body p-0">
                                <div class="tableall alltable" >
                                    <!-- Ajout de la classe table-responsive pour permettre le défilement horizontal -->
                                    <div class="table table-responsive" >
                                        <table id="vivierTalent-listing-table" class="table offres-table Intégrale mt-1"
                                            data-show-toggle="true " style="width:100%; border-top: 1px solid #e9e9e9  !important;">
                                            <thead style="font-size: 13px;">
                                                <tr style="vertical-align: middle;text-align: center">
                                                    <th  rowspan="2"
                                                        style="font-weight: 600;">#</th>
                                                    {{-- <th  rowspan="2" style="font-weight: 600;">{{ __("generated.Dossier") }}</th> --}}
                                                    <th  rowspan="2" style="font-weight: 600;">{{ __("generated.Matricule") }}</th>
                                                    <th  rowspan="2" style="font-weight: 600;">{{ __("generated.Prénom") }}</th>
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
                                                    {{-- <th class="translated_text" rowspan="2"
                                                    style="font-weight: 600;text-align: center;width: 10px;">
                                                </th> --}}
                                                    <th  colspan="2"
                                                        style="font-weight: 600;text-align: center;">{{ __("generated.Date") }}</th>
                                                    {{-- <th  rowspan="2"
                                                    style="font-weight: 600;text-align: right;width: 71px;">{{ __("generated.Action") }}</th> --}}
                                                </tr>
                                                <tr style="vertical-align: middle;">
                                                    <th  style="font-weight: 600;width: 100px;">{{ __("generated.Dépôt CV") }}</th>
                                                    <th  style="font-weight: 600;">{{ __("generated.Modification") }}</th>
                                                </tr>
                                            </thead>
                                            <tbody style="vertical-align: middle;font-size: 13px; text-align:center">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row align-items-center mx-0 mb-4">
                                        <div class="col-5 ">

                                        </div>
                                        <div class="col-7  footable-paging-external footable-paging-right"
                                            id="footable-pagination">
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

                                                </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </main>

    @include('vivierTalent.inc.addFolder')
    @include('vivierTalent.inc.share')
    <div id="print-section" class="d-none">
        @include('vivierTalent.inc.print')
    </div>
     @include('profile.inc.translation')
   

@endsection

@section('js_footer')


    <script>
        document.querySelectorAll('.toggle-subfolders').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const nextUl = this.nextElementSibling;
                if (nextUl && nextUl.classList.contains('subfolder-list')) {
                    nextUl.style.display = nextUl.style.display === 'none' ? 'block' : 'none';
                }
            });
        });
    </script>

    <script>
        var vivierTalentListingData = "{{ route('profile.listing.vivierTalent') }}";
        const storeTalentFolderRoute = "{{ route('talent-folders.store') }}";
    </script>

    <script>
        window.printSection = function() {
            var printContent = document.getElementById('print-section').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();

            setTimeout(function () {
            document.body.innerHTML = originalContent;
            window.location.reload();
            }, 1000); 
        }
    </script>
    <script>
        // Get conversion rates data from PHP
        const conversionData = @json($conversionRates);

        /* area chart green medium size */
        var areachartmediumgreen = document.getElementById('mediumchartgreen1').getContext('2d');
        var gradientmediumgreen = areachartmediumgreen.createLinearGradient(0, 0, 0, 150);
        gradientmediumgreen.addColorStop(0, 'rgba(145, 195, 0, 0.85)');
        gradientmediumgreen.addColorStop(1, 'rgba(176, 197, 0, 0)');

        var myareachartmediumgreenConfig = {
            type: 'line',
            data: {
                labels: conversionData.months,
                datasets: [{
                    label: 'Taux de conversion (%)',
                    data: conversionData.rates,
                    radius: 0,
                    backgroundColor: gradientmediumgreen,
                    borderColor: '#91C300',
                    borderWidth: 1,
                    fill: true,
                    tension: 0.5,
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.parsed.y.toFixed(2)}%`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            color: '#999999',
                            callback: function(value) {
                                return value + '%';
                            }
                        },
                        display: true,
                        beginAtZero: true,
                        grid: {
                            display: false,
                            zeroLineColor: 'rgba(0,0,0,0.3)',
                            drawBorder: true,
                            lineWidth: 1,
                            zeroLineWidth: 1
                        }
                    },
                    x: {
                        ticks: {
                            color: '#999999'
                        },
                        display: true,
                        grid: {
                            display: false,
                            zeroLineColor: 'rgba(0,0,0,0.3)',
                            drawBorder: true,
                            lineWidth: 1,
                            zeroLineWidth: 1
                        }
                    }
                }
            }
        }

        var myAreaChartmediumgreen = new Chart(areachartmediumgreen, myareachartmediumgreenConfig);
    </script>
  
    <script>
        // Get satisfaction rates data from PHP
        const satisfactionData = @json($recruiterSatisfactionRates);

        /* area chart blue medium size for recruiter satisfaction */
        var recruiterSatisfactionChart = document.getElementById('mediumchartgreen2').getContext('2d');
        var gradientBlue = recruiterSatisfactionChart.createLinearGradient(0, 0, 0, 150);
        gradientBlue.addColorStop(0, 'rgba(1, 94, 194, 0.85)');
        gradientBlue.addColorStop(1, 'rgba(0, 197, 221, 0)');

        var recruiterSatisfactionConfig = {
            type: 'line',
            data: {
                labels: satisfactionData.months,
                datasets: [{
                    label: 'Taux de satisfaction (%)',
                    data: satisfactionData.rates,
                    radius: 0,
                    backgroundColor: gradientBlue,
                    borderColor: '#015EC2',
                    borderWidth: 1,
                    fill: true,
                    tension: 0.5,
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.parsed.y.toFixed(2)}%`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            color: '#999999',
                            callback: function(value) {
                                return value + '%';
                            }
                        },
                        display: true,
                        beginAtZero: true,
                        grid: {
                            display: false,
                            zeroLineColor: 'rgba(0,0,0,0.3)',
                            drawBorder: true,
                            lineWidth: 1,
                            zeroLineWidth: 1
                        }
                    },
                    x: {
                        ticks: {
                            color: '#999999'
                        },
                        display: true,
                        grid: {
                            display: false,
                            zeroLineColor: 'rgba(0,0,0,0.3)',
                            drawBorder: true,
                            lineWidth: 1,
                            zeroLineWidth: 1
                        }
                    }
                }
            }
        }

        var recruiterSatisfactionChartInstance = new Chart(recruiterSatisfactionChart, recruiterSatisfactionConfig);
    </script>


    <script>
        //js for chart
        function randomScalingFactor() {
            return Math.floor(Math.random() * 100);
        }
        /* area chart green medium size */
        var areachartmediumgreen3 = document.getElementById('mediumchartgreen3').getContext('2d');
        var gradientmediumgreen3 = areachartmediumgreen3.createLinearGradient(0, 0, 0, 150);
        gradientmediumgreen3.addColorStop(0, 'rgba(253, 100, 0, 0.85)');
        gradientmediumgreen3.addColorStop(1, 'rgba(253, 186, 0, 0)');
        var myareachartmediumgreenConfig3 = {
            type: 'line',
            data: {
                labels: ['   Jan', '   Fév', '   Mar', '   Avr', '   Mai', '   Jun', '   Jul', '   Aoû', '   Sep',
                    '   Oct', '   Nov', '   Déc'
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                    ],
                    radius: 0,
                    backgroundColor: gradientmediumgreen3,
                    borderColor: '#fdba00',
                    borderWidth: 1,
                    fill: true,
                    tension: 0.5,
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        ticks: {
                            color: '#999999'
                        },
                        display: true,
                        beginAtZero: true,
                        grid: {
                            display: false,
                            zeroLineColor: 'rgba(0,0,0,0.3)',
                            drawBorder: true,
                            lineWidth: 1,
                            zeroLineWidth: 1
                        }
                    },
                    x: {
                        ticks: {
                            color: '#999999'
                        },
                        display: true,
                        grid: {
                            display: false,
                            zeroLineColor: 'rgba(0,0,0,0.3)',
                            drawBorder: true,
                            lineWidth: 1,
                            zeroLineWidth: 1
                        }
                    }
                }
            }
        }
        var myAreaChartmediumgreen3 = new Chart(areachartmediumgreen3, myareachartmediumgreenConfig3);

        /* area chart green medium size */
        var areachartmediumgreen4 = document.getElementById('mediumchartgreen4').getContext('2d');
        var gradientmediumgreen4 = areachartmediumgreen4.createLinearGradient(0, 0, 0, 150);
        gradientmediumgreen4.addColorStop(0, 'rgba(240, 61, 79, 0.85)');
        gradientmediumgreen4.addColorStop(1, 'rgba(255, 223, 220, 0)');
        var myareachartmediumgreenConfig4 = {
            type: 'line',
            data: {
                labels: ['   Jan', '   Fév', '   Mar', '   Avr', '   Mai', '   Jun', '   Jul', '   Aoû', '   Sep',
                    '   Oct', '   Nov', '   Déc'
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                    ],
                    radius: 0,
                    backgroundColor: gradientmediumgreen4,
                    borderColor: '#f03d4f',
                    borderWidth: 1,
                    fill: true,
                    tension: 0.5,
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        ticks: {
                            color: '#999999'
                        },
                        display: true,
                        beginAtZero: true,
                        grid: {
                            display: false,
                            zeroLineColor: 'rgba(0,0,0,0.3)',
                            drawBorder: true,
                            lineWidth: 1,
                            zeroLineWidth: 1
                        }
                    },
                    x: {
                        ticks: {
                            color: '#999999'
                        },
                        display: true,
                        grid: {
                            display: false,
                            zeroLineColor: 'rgba(0,0,0,0.3)',
                            drawBorder: true,
                            lineWidth: 1,
                            zeroLineWidth: 1
                        }
                    }
                }
            }
        }
        var myAreaChartmediumgreen4 = new Chart(areachartmediumgreen4, myareachartmediumgreenConfig4);
    </script>

    <script>
        var exportUrl = '{{ route('export') }}';

        $(document).on('click', '#downloadExcel', function(event) {
            event.preventDefault();
            Swal.fire({
                title: "{{ __('generated.Quel type de fichier souhaitez-vous ?') }}",
                icon: "question",
                showCancelButton: true,
                confirmButtonText:  "{{ __('generated.Excel') }}",
                cancelButtonText: "{{ __('generated.Annuler') }}",
                showDenyButton: true,
                denyButtonText:"{{ __('generated.CSV') }}",
                focusCancel: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // L'utilisateur a choisi Excel
                    window.location.href = exportUrl + '?type=excel';
                } else if (result.isDenied) {
                    // L'utilisateur a choisi CSV
                    window.location.href = exportUrl + '?type=csv';
                }
            });
        });
    </script>

    @vite(['resources/js/profile/listing-vivier-talents.js'])
    @vite(['resources/js/profile/dateFillter.js'])

    {{-- Script pour ajouter Dossier vivier talent  --}}
    <script>
        function assignToTalentFolder(selectElement, profileId) {
            const talentFolderId = selectElement.value;

            fetch(`/api/profiles/${profileId}/assign-talent-folder`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        talent_folder_id: talentFolderId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: "{{ __('generated.Succès!') }}",
                            text: data.message,
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: "{{ __('generated.Erreur') }}",
                        text: "{{ __('generated.Une erreur s’est produite lors de l’affectation du profil.') }}",
                    });
                });
        }
    </script>




@endsection
