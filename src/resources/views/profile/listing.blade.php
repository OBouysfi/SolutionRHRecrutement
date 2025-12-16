@extends('layouts.master')

@section('title', __('generated.CVthèque'))

@section('css_header')
    <link rel="stylesheet" href="{{ asset('assets/css/custom-print.css') }}" media="print">

    <style>
        .dataTables_paginate {
            display: none !important;
        }

        .custom-avatar {

            position: relative;
            display: inline-flex;
            overflow: hidden;
            margin: 0;
            text-align: center;
            vertical-align: middle;
            align-items: center;
            justify-content: center;
        }

        .custom-avatar>.icons {
            line-height: normal;
            display: flex;
            align-content: center;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
        }

        .custom-avatar>i {
            display: inline-block;
            vertical-align: middle;
        }

        .custom-avatar>img {
            width: 100%;
            vertical-align: top;
        }

        .custom-avatar select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='%23005dc7' d='M3.204 5h9.592c.461 0 .692.56.365.89l-4.796 5.006a.5.5 0 0 1-.73 0L2.84 5.89c-.327-.33-.097-.89.364-.89z'/%3e%3c/svg%3e") !important;
            background-repeat: no-repeat;
            background-position: right;
            background-size: 16px;
        }

        .select-avatar select {
            background-image: none !important;
        }

        .dark-mode table.dataTable thead th,
        table.dataTable thead td {
            border-bottom: 1px solid #e9e9e9 !important;
        }

        @media (min-width: 1400px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1495px;
            }
        }
    </style>

    <style>
        table.dataTable thead th.sorting:after,
        table.dataTable thead th.sorting_asc:after,
        table.dataTable thead th.sorting_desc:after {
            display: none !important;
            content: none !important;
        }

        table.dataTable thead .sorting {
            background-image: none !important;
        }

        table.dataTable thead .sorting_asc {
            background-image: none !important;
        }

        table.dataTable thead .sorting_des {
            background-image: none !important;
        }

        .card {
            box-shadow: none !important;
        }

        .rounded.poste-chosen .chosen-single {
            background: none !important;
        }

        .dataTables_wrapper {
            padding: 10px !important;
        }

        #profile-listing-table {
            border-collapse: collapse;
            /* width: 100%; */
            table-layout: fixed;
        }

        #profile-listing-table th,
        #profile-listing-table td {
            padding: 8px 12px;
            vertical-align: middle;
        }

        #profile-listing-table td {
            white-space: nowrap;
            word-wrap: break-word;
        }

        /* Specific column widths if needed */
        #profile-listing-table th:nth-child(1) {
            width: 5%;
        }

        /* ID */
        #profile-listing-table th:nth-child(2) {
            width: 20%;
        }

        /* Poste */
        #profile-listing-table th:nth-child(3) {
            width: 15%;
        }

        /* Diplôme */
        #profile-listing-table th:nth-child(4) {
            width: 20%;
        }

        /* Option */
        #profile-listing-table th:nth-child(5) {
            width: 10%;
        }

        /* Expérience */
        #profile-listing-table th:nth-child(6) {
            width: 15%;
        }

        /* Langue */
        #profile-listing-table th:nth-child(7) {
            width: 5%;
        }

        /* Total */
        #profile-listing-table th:nth-child(8) {
            width: 10%;
        }

        /* Action */

        /* @media (min-width: 1400px) {

                .container-xxl,
                .container-xl,
                .container-lg,
                .container-md,
                .container-sm,
                .container {
                    max-width: 88%;
                }
            } */

        .table-responsive,
        [style*="overflow-x: scroll"] {
            overflow-x: hidden !important;
            overscroll-behavior-x: none !important;
        }

        [style*="overflow-x: scroll"]::-webkit-scrollbar {
            height: 8px;
            background: transparent;
        }

        [style*="overflow-x: scroll"]::-webkit-scrollbar-thumb {
            background: transparent;
        }

        [style*="overflow-x: scroll"] {
            scrollbar-color: transparent transparent;
            scrollbar-width: thin;
        }
        thead{
            border-top: 1px solid #e9e9e9;
        }
        table.dataTable tbody td {
            padding: 8px 20px !important;
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">{{ __('generated.CVthèque') }}</h5>
                </div>
                {{-- <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div> --}}
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __('generated.contact') }}">
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
            <nav aria-label="breadcrumb " class="breadcrumb-theme">
                <ol class="breadcrumb d-flex justify-content-between align-items-center">
                    <li class="breadcrumb-item active" aria-current="page">{{ __("generated.Vue d'ensemble") }}</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">
            <div class="row mb-4 d-none" id="ProfileMainFillter">
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
                                                    <div id="country-selector"
                                                        class="custom-multiple-select rounded border poste-chosen "
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label class="">{{ __('generated.Pays') }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-pays">
                                                            <option value="Tous">{{ __('generated.Tous') }}</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ __($country->id) }}"
                                                                    class="translated_var"
                                                                    data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png">
                                                                    {{ __($country->name) ?? '_' }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Ville -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div id="city-selector"
                                                        class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label class="">{{ __('generated.Ville') }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-ville">
                                                            <option value="Tous" selected class="">
                                                                {{ __('generated.Tous') }}</option>
                                                            @if (isset($cities))
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id ?? '' }}"
                                                                        class="translated_var"
                                                                        data-country="{{ $city->country?->id ?? '' }}">
                                                                        {{ __($city->name) ?? '_' }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Diplôme -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label class="">{{ __('generated.Diplôme') }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-diplome">
                                                            <option value="Tous" selected class="">
                                                                {{ __('generated.Tous') }}</option>
                                                            @if (isset($diplomas))
                                                                @foreach ($diplomas as $diploma)
                                                                    <option value="{{ $diploma->id ?? '' }}"
                                                                        class="translated_var">
                                                                        {{ __($diploma->label ?? '_') }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Expérience -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen filter-block"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label class="">{{ __('generated.Expérience') }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-experience">
                                                            <option value="Tous" class="">
                                                                {{ __('generated.Tous') }}</option>
                                                            @foreach ($levelExperience as $key => $levelexper)
                                                                <option value="{{ $key }}"
                                                                    class="translated_var">
                                                                    {{ __($levelexper) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Poste -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen filter-block"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label class="">{{ __('generated.Poste') }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-poste">
                                                            <option value="Tous" selected class="">
                                                                {{ __('generated.Tous') }}</option>
                                                            @if (isset($posts))
                                                                @foreach ($posts as $post)
                                                                    <option value="{{ $post->id ?? '' }}"
                                                                        class="translated_var">
                                                                        {{ __($post->label) ?? '_' }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Type de contrat -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen filter-block"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label
                                                            class="">{{ __('generated.Type de contrat') }}</label>
                                                        <select class="chosenoptgroup w-100" name="poste"
                                                            id="filter-contrat-type">
                                                            <option value="Tous">{{ __('generated.Tous') }}</option>
                                                            @foreach ($contractsTypes as $key => $contract)
                                                                <option value="{{ $key ?? '' }}"
                                                                    class="translated_var">
                                                                    {{ __($contract) ?? '_' }}
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

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body bg-gradient-theme-light">
                                            <div class="row justify-content-center align-items-center">
                                                <!-- Ajout de align-items-center pour aligner verticalement -->
                                                <!-- Titre CVthèque -->
                                                <div class="col-auto"> <!-- Utilisation de col-auto pour le titre -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="">{{ __('generated.CVthèque') }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Icônes et sélecteur -->
                                                <div class="col-auto ms-md-auto">
                                                    <!-- Utilisation de col-auto et ms-md-auto pour aligner à droite -->
                                                    <div class="row g-2 align-items-center">
                                                        <!-- Ajout de align-items-center pour aligner verticalement -->
                                                        <!-- Icône Aperçu -->
                                                        @can('profile-preview')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __('generated.Aperçu') }}">
                                                                    <a href="{{ route('profile.inc.cvPreview') }}"
                                                                        target="_blank">
                                                                        <i
                                                                            class="bi bi-binoculars avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan

                                                        <!-- Icône Partager -->
                                                        @can('profile-share')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __('generated.Partager') }}">
                                                                    <a href="#" type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#emailcompose">
                                                                        <i class="bi bi-share avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan

                                                        @can('profile-export')
                                                            <!-- Icône Télécharger -->
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __('generated.Télécharger') }}"
                                                                    id="downloadExcel">
                                                                    <a href="#" type="button">
                                                                        <i
                                                                            class="bi bi-cloud-download avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        <!-- Icône Imprimer -->

                                                        @can('profile-print')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __('generated.Imprimer') }}">
                                                                    <a href="#" onclick="printSection()"
                                                                        data-format="A4">
                                                                        <i class="bi bi-printer avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan

                                                        <div class="col col-4 col-md-2 d-none translated_text"
                                                            style="cursor: pointer" id="ProfileReturnToPreview">
                                                            <div class="avatar avatar-50 rounded bg-light-theme show-detail d-flex align-items-center"
                                                                data-detail="0" title="Retour à l'aperçu">
                                                                <a><i class="bi bi-arrow-return-left icon-bw"></i></a>
                                                            </div>
                                                        </div>

                                                        <!-- Sélecteur de longueur -->
                                                        <div class="col col-4 col-md-2" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="">
                                                            <div
                                                                class="avatar avatar-50 rounded bg-light-theme select-avatar">
                                                                <select id="customLength"
                                                                    style="border: 0;background-color: transparent;width: 49px;color: var(--adminux-theme); display: block !important;">
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

            <div class="row mt-3 mb-3">
                <div class="col-12 col-md-6 col-xl-3 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="card border-0  ">
                                        <div class="card-header " style="padding: 15px 9px 9px 9px">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-database h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0">{{ __('generated.CVthèque') }}</h6>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"
                                                                style="font-size: 21px;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0px; min-width: 99px !important;">
                                                            <li>
                                                                <a class="dropdown-item show-detail" data-detail="1"
                                                                    href="javascript:void(0)"
                                                                    id="flt-chartall">{{ __('generated.Détail') }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col text-center">
                                                    <a href="#" class="card border-0" data-bs-toggle="modal"
                                                        data-bs-target="#billpay">
                                                        <div class="card-body "
                                                            style="height: 69px !important;background-color: var(--adminux-theme-bg)">
                                                            <div class="row justify-content-center">
                                                                <div class="col-3">
                                                                    <div class="circle-small circleprogressgreen11">
                                                                        <div id="circleprogressgreen11">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3" style="margin-right: 0px;">
                                                                    <p class="bi bi- h4 avatar avatar-40 rounded text-bw  cvthequeTotal"
                                                                        style="width: 100%;">
                                                                        {{-- {{ __($statsComparison['cvtheque']['total']) }}&nbsp; --}}
                                                                    </p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-auto"
                                                                            style="margin-top: 8px;margin-right: -16px;">
                                                                            <span class="text-green cvthequeChange"
                                                                                id="cvthequeChange"
                                                                                style="font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                {{-- {{ abs($statsComparison['cvtheque']['change']) }}% --}}
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-auto cvthequeIcon"
                                                                            id="cvthequeIcon">
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
                <div class="col-12 col-md-6 col-xl-3 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="card border-0  ">
                                        <div class="card-header " style="padding: 15px 9px 9px 9px">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-green">
                                                        <i class="bi bi-people h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0">{{ __('generated.Profils actifs') }}</h6>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"
                                                                style="font-size: 21px;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0px; min-width: 99px !important;">
                                                            <li><a class="dropdown-item show-detail" data-detail="2"
                                                                    href="javascript:void(0)"
                                                                    id="flt-chart1">{{ __('generated.Détail') }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">

                                                <div class="col text-center">
                                                    <a href="#" class=" border-0" data-bs-toggle="modal"
                                                        data-bs-target="#billpay">
                                                        <div class="card-body "
                                                            style="height: 69px !important;background-color: var(--adminux-theme-bg)">
                                                            <div class="row justify-content-center">
                                                                <div class="col-3">
                                                                    <div class="circle-small circleprogressgreen22">
                                                                        <div id="circleprogressgreen22">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3" style="margin-right: 0px;">
                                                                    <p class="bi bi- h4 avatar avatar-40 rounded text-bw activeProfilesTotal"
                                                                        style="width: 100%;">
                                                                        {{-- {{ __($statsComparison['active_profiles']['total']) }}&nbsp; --}}
                                                                    </p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-auto"
                                                                            style="margin-top: 8px;margin-right: -16px;">
                                                                            <span class="text-green activeProfilesChange"
                                                                                id="activeProfilesChange"
                                                                                style="font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                {{-- {{ abs($statsComparison['active_profiles']['change']) }}% --}}
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-auto activeProfilesIcon"
                                                                            id="activeProfilesIcon">
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
                <div class="col-12 col-md-6 col-xl-3 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="card border-0  ">
                                        <div class="card-header " style="padding: 15px 9px 9px 9px">
                                            <div class="row align-items-center">
                                                <div class="col-auto">

                                                    <div class="avatar avatar-40 rounded bg-danger bg-opacity-10">
                                                        <i class="bi bi-person-check h5 text-danger"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0">{{ __('generated.Profils qualifiés') }}
                                                    </h6>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"
                                                                style="font-size: 21px;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0px; min-width: 99px !important;">
                                                            <li><a class="dropdown-item show-detail" data-detail="3"
                                                                    href="javascript:void(0)"
                                                                    id="flt-chart2">{{ __('generated.Détail') }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">

                                                <div class="col text-center">
                                                    <a href="#" class="card border-0" data-bs-toggle="modal"
                                                        data-bs-target="#billpay">
                                                        <div class="card-body "
                                                            style="height: 69px !important;background-color: var(--adminux-theme-bg)">
                                                            <div class="row justify-content-center">
                                                                <div class="col-3">
                                                                    <div class="circle-small circleprogressgreen33">
                                                                        <div id="circleprogressgreen33">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3" style="margin-right: 0px;">
                                                                    <p class="bi bi- h4 avatar avatar-40 rounded text-bw qualifiedProfilesTotal"
                                                                        style="width: 100%;">
                                                                        {{-- {{ __($statsComparison['qualified_profiles']['total']) }}&nbsp; --}}
                                                                    </p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-auto"
                                                                            style="margin-top: 8px;margin-right: -16px;">
                                                                            <span
                                                                                class="text-green qualifiedProfilesChange"
                                                                                id="qualifiedProfilesChange"
                                                                                style="font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                {{-- {{ abs($statsComparison['qualified_profiles']['change']) }}% --}}
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-auto qualifiedProfilesIcon"
                                                                            id="qualifiedProfilesIcon">
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
                <div class="col-12 col-md-6 col-xl-3 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="card border-0  ">
                                        <div class="card-header " style="padding: 15px 9px 9px 9px">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-primary bg-opacity-10">
                                                        <i class="bi bi-person-check-fill h5 text-primary"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0">{{ __('generated.Profils pertinents') }}
                                                    </h6>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical"
                                                                style="font-size: 21px;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0px; min-width: 99px !important;">
                                                            <li><a class="dropdown-item show-detail" data-detail="4"
                                                                    href="javascript:void(0)"
                                                                    id="flt-chart3">{{ __('generated.Détail') }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">

                                                <div class="col text-center">
                                                    <a href="#" class="card border-0" data-bs-toggle="modal"
                                                        data-bs-target="#billpay">
                                                        <div class="card-body "
                                                            style="height: 69px !important;background-color: var(--adminux-theme-bg)">
                                                            <div class="row justify-content-center">
                                                                <div class="col-3">
                                                                    <div class="circle-small circleprogressgreen44">
                                                                        <div id="circleprogressgreen44">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <p class="bi bi- h4 avatar avatar-40 rounded text-bw validationProfilesTotal"
                                                                        style="width: 100%;">
                                                                        {{-- {{ __($statsComparison['validation_profiles']['total']) }}&nbsp; --}}
                                                                    </p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-auto"
                                                                            style="margin-top: 8px;margin-right: -16px;">
                                                                            <span
                                                                                class="text-green validationProfilesChange"
                                                                                id="validationProfilesChange"
                                                                                style="font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                {{-- {{ abs($statsComparison['validation_profiles']['change']) }}% --}}
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-auto validationProfilesIcon"
                                                                            id="validationProfilesIcon">
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
            <div class="row">
                <div class="col-12 mx-auto">
                    <h4 class="title graph-title hidden"></h4>
                    <div class="bigchart250 cut-5 mb-4">
                        <canvas id="listingProfileChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 p-0">
                                        <div class="card-body p-0">
                                            <!------------------------All Profils Table-------------------------->
                                            <!-- ====================================== START ===================================== -->
                                            <!-- =================================  ALL CVthèque  ================================ -->
                                            <div class="table0 tableall alltable dataTable table-responsive"
                                                id="profile-0">
                                                <div class="row" style="padding-left: 13px;">
                                                    {{-- <h6 class="title custom-title">CVthèque</h6> --}}
                                                    <div class="card-header bg-gradient-theme-light">
                                                        <div class="row align-items-center">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.CVthèque') }}</h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div style="overflow-x: scroll !important;">
                                                    <table class="table" id="profile-listing-table"
                                                        style="width: 97%; margin: 1.5rem;border-collapse:collapse">
                                                        <thead class="translated_text"
                                                            style="font-size: 14px;border-top: 1px solid #e9e9e9;">
                                                            <tr style="vertical-align: middle;">
                                                                <th class="" style="font-weight: 600">
                                                                    {{ __('generated.id') }}</th>
                                                                <th class="" style="font-weight: 600">
                                                                    {{ __('generated.Poste') }}</th>
                                                                <th class="" style="font-weight: 600">
                                                                    {{ __('generated.Diplôme') }}</th>
                                                                <th class="" style="font-weight: 600">
                                                                    {{ __('generated.Option') }}</th>
                                                                <th class="" style="font-weight: 600">
                                                                    {{ __('generated.Expérience') }}</th>
                                                                <th class="" style="font-weight: 600">
                                                                    {{ __('generated.Langue') }}</th>
                                                                <th class=""
                                                                    style="font-weight: 600; text-align: right">
                                                                    {{ __('generated.Total') }}</th>
                                                                <th class=""
                                                                    style="font-weight: 600; text-align: right; width: 160px;">
                                                                    {{ __('generated.Action') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="profilesTableBody" style="font-size: 14px"></tbody>
                                                    </table>
                                                </div>
                                                <!-- <table class="table" id="profile-listing-table" style="width: 100%">
                                                                    <thead class="translated_text"
                                                                        style="font-size: 14px;border-top: 1px solid #e9e9e9;">
                                                                        <tr style="vertical-align: middle;">
                                                                            <th class="" rowspan="1"
                                                                                style="font-weight: 600">{{ __('generated.id') }}</th>
                                                                            <th class="" rowspan="1"
                                                                                style="font-weight: 600">{{ __('generated.Poste') }}</th>
                                                                            <th class="" style="font-weight: 600">{{ __('generated.Diplôme') }}</th>
                                                                            <th class="translated_text" rowspan="2"
                                                                                style="vertical-align: middle;width: 20px">
                                                                            </th>
                                                                            <th class="" style="font-weight: 600">{{ __('generated.Option') }}</th>
                                                                            <th class="" rowspan="1"
                                                                                style="font-weight: 600">{{ __('generated.Expérience') }}</th>
                                                                            <th class="" rowspan="1"
                                                                                style="font-weight: 600">{{ __('generated.Langue') }}</th>
                                                                            <th class="" rowspan="1"
                                                                                style="font-weight: 600;text-align: right">{{ __('generated.Total') }}</th>
                                                                            <th class="" rowspan="1" style="font-weight: 600;text-align: right;width: 160px;">{{ __('generated.Action') }}</th>
                                                                            </tr>
                                                                    </thead>
                                                                    <tbody id="profilesTableBody" style="font-size: 14px">
                                                                    </tbody>
                                                                </table> -->
                                                <div class="row align-items-center mx-0 mb-3 mt-3">
                                                    <div class="col-6"></div>
                                                    {{-- <div id="paginationContainer" class="mt-3"></div> --}}

                                                    <div class="col-6 footable-paging-external footable-paging-right footable-pagination"
                                                        id="profile-listing-table-pagination">
                                                        <div class="footable-pagination-wrapper">
                                                            <ul class="pagination"></ul>
                                                            <div class="divider"></div>
                                                            <span class="label label-default">1 <span
                                                                    class="">{{ __('generated.sur') }}</span>
                                                                1</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- =================================  ALL CVthèque  ================================ -->
                                            <!-- ====================================== END ===================================== -->


                                            <!-- ====================================== START ===================================== -->
                                            <!-- =================================  CVthèque ROW  ================================ -->
                                            <div class="table5 d-none alltable dataTable  table-responsive"
                                                id="profile-5">
                                                <div class="row" style="padding-left: 13px;">
                                                    <div class="card-header bg-gradient-theme-light">
                                                        <div class="row align-items-center">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.CVthèque') }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table id="custom-profile-listing-table" class="display"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{ __('generated.Matricule') }}</th>
                                                            <th>{{ __('generated.Prénom') }}</th>
                                                            <th>{{ __('generated.Nom') }}</th>
                                                            <th>{{ __('generated.Diplôme') }}</th>
                                                            <th>{{ __('generated.Option') }}</th>
                                                            <th>{{ __('generated.Expérience') }}</th>
                                                            <th>{{ __('generated.Langues') }}</th>
                                                            <th>{{ __('generated.Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                                <!-- <table id="custom-profile-listing-table"
                                                                class="table offres-table Intégrale w-100" data-show-toggle="true"
                                                                style="width: 100%">
                                                                <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                <tr style="vertical-align: middle;">
                                                                    <th rowspan="2" style="font-weight: 600;text-align: center;width: 12px;">#</th>
                                                                    <th rowspan="2" style="font-weight: 600;width: 120px;">Matricule</th>
                                                                    <th rowspan="2" style="font-weight: 600;width: 134px;">Prénom</th>
                                                                    <th rowspan="2" style="font-weight: 600;width: 147px;">Nom</th>
                                                                    <th rowspan="2" style="font-weight: 600;width: 123px;">Diplôme</th>
                                                                    <th rowspan="2" style="font-weight: 600;width: 191px;">Option</th>
                                                                    <th rowspan="2" style="font-weight: 600;width: 130px;">Expérience</th>
                                                                    <th rowspan="2" style="font-weight: 600;width: 135px;">Langue</th>
                                                                    <th rowspan="2" style="font-weight: 600;text-align: right;width: 71px;">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody style="vertical-align: middle;font-size: 13px;}">

                                                                </tbody>
                                                            </table> -->

                                                <div class="row align-items-center mx-0 mb-3">
                                                    <div class="col-6"></div>
                                                    <div class="col-6 footable-paging-external footable-paging-right footable-pagination"
                                                        id="custom-profile-listing-table-pagination">
                                                        <div class="footable-pagination-wrapper">
                                                            <ul class="pagination"></ul>
                                                            <div class="divider"></div>
                                                            <span class="label label-default">1 <span
                                                                    class="">{{ __('generated.sur') }}</span>
                                                                1</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- =================================  CVthèque ROW  ================================ -->
                                            <!-- ====================================== END ===================================== -->


                                            <!-- ====================================== START ===================================== -->
                                            <!-- =================================  Active Profiles  ================================ -->

                                            <div class="table1 d-none alltable dataTable  table-responsive"
                                                id="profile-1">
                                                {{-- <div class="row" style="padding-left: 13px;"> --}}
                                                {{-- <h6 class="title custom-title">CVthèque</h6> --}}
                                                {{-- <div class="card-header bg-gradient-theme-light">
                                                        <div class="row align-items-center">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.CVthèque') }}</h6>
                                                        </div>
                                                    </div> --}}
                                                {{-- </div> --}}
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center px-3">
                                                        <!-- Colonne pour le titre -->
                                                        <div class="col-12 col-md-6">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.CVthèque') }}</h6>
                                                        </div>

                                                        <div class="col-12 col-md-3 mt-2 mt-md-0 ms-auto">
                                                            <div class="input-group searchbar-full">
                                                                <span class="input-group-text text-theme">
                                                                    <i class="bi bi-search"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-sm customSearchBox"
                                                                     placeholder="Recherche...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <table id="all-profile-listing-table"
                                                    class="table offres-table Intégrale " data-show-toggle="true"
                                                    style="border-collapse:collapse ; width: 77%">
                                                    <thead style="font-size: 13px;">
                                                        <tr style="vertical-align: middle;">
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;text-align: center">#</th>
                                                            <th class="" rowspan="2" style="font-weight: 600;">
                                                                {{ __('generated.Matricule') }}</th>
                                                            <th class="" rowspan="2" style="font-weight: 600;">
                                                                {{ __('generated.Prénom') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 147px;">
                                                                {{ __('generated.Nom') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 147px;">
                                                                {{ __('generated.Diplôme') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 181px;">
                                                                {{ __('generated.Option') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 105px;">
                                                                {{ __('generated.Expérience') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 172px;">
                                                                {{ __('generated.Poste actuel') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 178px;">
                                                                {{ __('generated.Poste souhaité') }}</th>
                                                            <th class="" colspan="2"
                                                                style="font-weight: 600;text-align: center;width: 71px;">
                                                                {{ __('generated.Profils') }}</th>
                                                            <th class="translated_text" rowspan="2"
                                                                style="font-weight: 600;text-align: center;width: 10px;">
                                                            </th>
                                                            <th class="" colspan="2"
                                                                style="font-weight: 600;text-align: center;/* width: 117px; */">
                                                                {{ __('generated.Date') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;text-align: right;width: 71px;">
                                                                {{ __('generated.Action') }}</th>
                                                        </tr>
                                                        <tr style="vertical-align: middle; text-align: center;">
                                                            <th class="" style="font-weight: 600;width: 51px;">
                                                                {{ __('generated.Actif') }}</th>
                                                            <th class="" style="font-weight: 600;">
                                                                {{ __('generated.Qualifié') }}</th>
                                                            <th class="" style="font-weight: 600;width: 100px;">
                                                                {{ __('generated.Dépôt CV') }}</th>
                                                            <th class="" style="font-weight: 600;">
                                                                {{ __('generated.Modification') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="vertical-align: middle;font-size: 13px; white-space: nowrap;">

                                                    </tbody>
                                                </table>

                                                <div class="row align-items-center mx-0 mb-3 mt-2">
                                                    <div class="col-6"></div>
                                                    <div class="col-6 footable-paging-external footable-paging-right footable-pagination"
                                                        id="all-profile-listing-table-pagination">
                                                        <div class="footable-pagination-wrapper">
                                                            <ul class="pagination"></ul>
                                                            <div class="divider"></div>
                                                            <span class="label label-default">1 <span
                                                                    class="">{{ __('generated.sur') }}</span>
                                                                1</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- =================================  Active profiles  ================================ -->
                                            <!-- ====================================== END ===================================== -->
                                            <div class="table2 d-none alltable dataTable table-responsive" id="profile-2">
                                                 <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center px-3">
                                                        <!-- Colonne pour le titre -->
                                                        <div class="col-12 col-md-6">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.Profils actifs') }}</h6>
                                                        </div>

                                                        <div class="col-12 col-md-3 mt-2 mt-md-0 ms-auto">
                                                            <div class="input-group searchbar-full">
                                                                <span class="input-group-text text-theme">
                                                                    <i class="bi bi-search"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-sm customSearchBox"
                                                                     placeholder="Recherche...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table id="activated-profile-listing-table"
                                                    class="table offres-table Intégrale w-100" data-show-toggle="true"
                                                    style="width: 100%;border-collapse:collapse">
                                                    <thead style="font-size: 13px; white-space: nowrap;">
                                                        <tr style="vertical-align: middle;">
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;text-align: center">#</th>
                                                            <th class="" rowspan="2" style="font-weight: 600;">
                                                                {{ __('generated.Matricule') }}</th>
                                                            <th class="" rowspan="2" style="font-weight: 600;">
                                                                {{ __('generated.Prénom') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 147px;">
                                                                {{ __('generated.Nom') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 181px;">
                                                                {{ __('generated.Diplôme') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 147px;">
                                                                {{ __('generated.Option') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 105px;">
                                                                {{ __('generated.Expérience') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 172px;">
                                                                {{ __('generated.Poste actuel') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 178px;">
                                                                {{ __('generated.Poste souhaité') }}</th>
                                                            <th class="" colspan="2"
                                                                style="font-weight: 600;text-align: center;width: 71px;">
                                                                {{ __('generated.Profils') }}</th>
                                                            <th class="translated_text" rowspan="2"
                                                                style="font-weight: 600;text-align: center;width: 10px;">
                                                            </th>
                                                            <th class="" colspan="2"
                                                                style="font-weight: 600;text-align: center;/* width: 117px; */">
                                                                {{ __('generated.Date') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;text-align: right;width: 71px;">
                                                                {{ __('generated.Action') }}</th>
                                                        </tr>
                                                        <tr style="vertical-align: middle; text-align: center;">
                                                            <th class="" style="font-weight: 600;width: 51px;">
                                                                {{ __('generated.Actif') }}</th>
                                                            <th class="" style="font-weight: 600;">
                                                                {{ __('generated.Qualifié') }}</th>
                                                            <th class="" style="font-weight: 600;width: 100px;">
                                                                {{ __('generated.Dépôt CV') }}</th>
                                                            <th class="" style="font-weight: 600;">
                                                                {{ __('generated.Modification') }}</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                    <tbody style="vertical-align: middle;font-size: 13px; white-space: nowrap;">
                                                    </tbody>
                                                <div class="row align-items-center mx-0 mb-3 mt-2">
                                                    <div class="col-6"></div>
                                                    <div class="col-6 footable-paging-external footable-paging-right footable-pagination"
                                                        id="activated-profile-listing-table-pagination">
                                                        <div class="footable-pagination-wrapper">
                                                            <ul class="pagination"></ul>
                                                            <div class="divider"></div>
                                                            <span class="label label-default">1 <span
                                                                    class="">{{ __('generated.sur') }}</span>
                                                                1</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="table3 d-none alltable dataTable table-responsive" id="profile-3">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center px-3">
                                                        <!-- Colonne pour le titre -->
                                                        <div class="col-12 col-md-6">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.Profils qualifiés') }}</h6>
                                                        </div>

                                                        <div class="col-12 col-md-3 mt-2 mt-md-0 ms-auto">
                                                            <div class="input-group searchbar-full">
                                                                <span class="input-group-text text-theme">
                                                                    <i class="bi bi-search"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-sm customSearchBox"
                                                                   placeholder="Recherche...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table id="qualified-profile-listing-table"
                                                    class="table offres-table Intégrale w-100" data-show-toggle="true"
                                                    style="width: 100%;border-collapse:collapse">
                                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9; white-space: nowrap;">
                                                        <tr style="vertical-align: middle;">
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;text-align: center">#</th>
                                                            <th class="" rowspan="2" style="font-weight: 600;">
                                                                {{ __('generated.Matricule') }}</th>
                                                            <th class="" rowspan="2" style="font-weight: 600;">
                                                                {{ __('generated.Prénom') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 147px;">
                                                                {{ __('generated.Nom') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 181px;">
                                                                {{ __('generated.Diplôme') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 147px;">
                                                                {{ __('generated.Option') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 105px;">
                                                                {{ __('generated.Expérience') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 172px;">
                                                                {{ __('generated.Poste actuel') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 178px;">
                                                                {{ __('generated.Poste souhaité') }}</th>
                                                            <th class="" colspan="2"
                                                                style="font-weight: 600;text-align: center;width: 71px;">
                                                                {{ __('generated.Profils') }}</th>
                                                            <th class="translated_text" rowspan="2"
                                                                style="font-weight: 600;text-align: center;width: 10px;">
                                                            </th>
                                                            <th class="" colspan="2"
                                                                style="font-weight: 600;text-align: center;/* width: 117px; */">
                                                                {{ __('generated.Date') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;text-align: right;width: 71px;">
                                                                {{ __('generated.Action') }}</th>
                                                        </tr>
                                                        <tr style="vertical-align: middle; text-align: center;">
                                                            <th class="" style="font-weight: 600;width: 51px;">
                                                                {{ __('generated.Actif') }}</th>
                                                            <th class="" style="font-weight: 600;">
                                                                {{ __('generated.Qualifié') }}</th>
                                                            <th class="" style="font-weight: 600;width: 100px;">
                                                                {{ __('generated.Dépôt CV') }}</th>
                                                            <th class="" style="font-weight: 600;">
                                                                {{ __('generated.Modification') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="vertical-align: middle;font-size: 13px; white-space: nowrap;">
                                                    </tbody>
                                                </table>
                                                <div class="row align-items-center mx-0 mb-3 mt-2">
                                                    <div class="col-6"></div>
                                                    <div class="col-6 footable-paging-external footable-paging-right footable-pagination"
                                                        id="qualified-profile-listing-table-pagination">
                                                        <div class="footable-pagination-wrapper">
                                                            <ul class="pagination"></ul>
                                                            <div class="divider"></div>
                                                            <span class="label label-default">1 <span
                                                                    class="">{{ __('generated.sur') }}</span>
                                                                1</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="table4 d-none alltable dataTable table-responsive" id="profile-4">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center px-3">
                                                        <!-- Colonne pour le titre -->
                                                        <div class="col-12 col-md-6">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.Profils pertinents') }}</h6>
                                                        </div>

                                                        <div class="col-12 col-md-3 mt-2 mt-md-0 ms-auto">
                                                            <div class="input-group searchbar-full">
                                                                <span class="input-group-text text-theme">
                                                                    <i class="bi bi-search"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-sm customSearchBox "
                                                                  placeholder="Recherche...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table id="validated-profile-listing-table"
                                                    class="table offres-table Intégrale w-100" data-show-toggle="true"
                                                    style="width: 100%">
                                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9; white-space: nowrap;">
                                                        <tr style="vertical-align: middle;">
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;text-align: center">#</th>
                                                            <th class="" rowspan="2" style="font-weight: 600;">
                                                                {{ __('generated.Matricule') }}</th>
                                                            <th class="" rowspan="2" style="font-weight: 600;">
                                                                {{ __('generated.Prénom') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 147px;">
                                                                {{ __('generated.Nom') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 147px;">
                                                                {{ __('generated.Diplôme') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 181px;">
                                                                {{ __('generated.Option') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 105px;">
                                                                {{ __('generated.Expérience') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 172px;">
                                                                {{ __('generated.Poste actuel') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;width: 178px;">
                                                                {{ __('generated.Poste souhaité') }}</th>
                                                            <th class="" colspan="2"
                                                                style="font-weight: 600;text-align: center;width: 71px;">
                                                                {{ __('generated.Profils') }}</th>
                                                            <th class="translated_text" rowspan="2"
                                                                style="font-weight: 600;text-align: center;width: 10px;">
                                                            </th>
                                                            <th class="" colspan="2"
                                                                style="font-weight: 600;text-align: center;/* width: 117px; */">
                                                                {{ __('generated.Date') }}</th>
                                                            <th class="" rowspan="2"
                                                                style="font-weight: 600;text-align: right;width: 71px;">
                                                                {{ __('generated.Action') }}</th>
                                                        </tr>
                                                        <tr style="vertical-align: middle; text-align: center;">
                                                            <th class="" style="font-weight: 600;width: 51px;">
                                                                {{ __('generated.Actif') }}</th>
                                                            <th class="" style="font-weight: 600;">
                                                                {{ __('generated.Qualifié') }}</th>
                                                            <th class="" style="font-weight: 600;width: 100px;">
                                                                {{ __('generated.Dépôt CV') }}</th>
                                                            <th class="" style="font-weight: 600;">
                                                                {{ __('generated.Modification') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="vertical-align: middle;font-size: 13px; white-space: nowrap;">
                                                    </tbody>
                                                </table>
                                                <div class="row align-items-center mx-0 mb-3 mt-2">
                                                    <div class="col-6"></div>
                                                    <div class="col-6 footable-paging-external footable-paging-right footable-pagination"
                                                        id="validated-profile-listing-table-pagination">
                                                        <div class="footable-pagination-wrapper">
                                                            <ul class="pagination"></ul>
                                                            <div class="divider"></div>
                                                            <span class="label label-default">1 <span
                                                                    class="">{{ __('generated.sur') }}</span>
                                                                1</span>
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
    <!-- page to print -->
    <div id="print-section" class="d-none">
        @include('profile.print')
    </div>
    <!-- Modal Partager -->
    <div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Utilisation de modal-lg -->
            <div class="modal-content">
                <div class="modal-body p-4"> <!-- Ajout de padding pour un meilleur espacement -->
                    <h6 class="mb-4 text-center">{{ __('generated.Envoyez un lien de cette page par email.') }}</h6>
                    <!-- Formulaire pour envoyer l'email -->
                    <form action="{{ route('send.share.email') }}" method="POST">
                        @csrf
                        <input type="hidden" name="page_url" value="{{ url()->current() }}">
                        <input type="hidden" name="message" value="Voici le lien de la page que vous m'avez demandé :">

                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('generated.À :') }}</label>
                            <input type="text" name="to" class="form-control"
                                placeholder="Entrez les adresses email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('generated.CC :') }}</label>
                            <input type="text" name="cc" class="form-control"
                                placeholder="Entrez les adresses en CC">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('generated.Objet :') }}</label>
                            <input type="text" name="subject" class="form-control"
                                placeholder="Entrez le sujet de l'email" required>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-link text-danger" type="button" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="bi bi-trash h4 me-2"></i> <span>{{ __('generated.Annuler') }}</span>
                            </button>
                            <button class="btn btn-theme" type="submit">
                                <i class="bi bi-send me-2"></i> <span>{{ __('generated.Envoyer') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Selecting Folders -->
    <div class="modal fade" id="selectFolderModal" tabindex="-1" aria-labelledby="selectFolderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('generated.Sélectionner un dossier') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="folderSelectionForm">
                        @csrf
                        <input type="hidden" id="selectedProfileId" name="profile_id">

                        <div class="mb-3">
                            <label for="parentFolderSelect"
                                class="form-label">{{ __('generated.Sélectionner un dossier :') }}</label>
                            <select class="form-select" id="parentFolderSelect" name="parent_folder_id" required>
                                <option value="" class="">{{ __('generated.Sélectionner un dossier') }}
                                </option>
                                @foreach ($talentFolders as $folder)
                                    <option value="{{ __($folder->id) }}">{{ __($folder->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="subFolderSelect"
                                class="form-label">{{ __('generated.Sélectionner un sous-dossier :') }}</label>
                            <select class="form-select" id="subFolderSelect" name="folder_id" required disabled>
                                <option value="" class="">{{ __('generated.Sélectionner un sous-dossier') }}
                                </option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="button" class="btn btn-theme" style="background-color: #26b6ea;"
                                onclick="showCreateFolderModal()">{{ __('generated.Créer un nouveau dossier') }}</button>

                            <button type="button" class="btn btn-theme"
                                onclick="submitFolderSelection()">{{ __('generated.Ajouter') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Creating a New Folder -->
    <div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('generated.Créer un nouveau dossier') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createFolderForm">
                        @csrf
                        <div class="mb-3">
                            <label for="newFolderName" class="form-label">{{ __('generated.Nom du dossier :') }}</label>
                            <input type="text" class="form-control" id="newFolderName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="newFolderParent"
                                class="form-label">{{ __('generated.Sélectionner un dossier parent (optionnel) :') }}</label>
                            <select class="form-select" id="newFolderParent" name="parent_id">
                                <option class="" value="">{{ __('generated.-- Aucun (dossier racine) --') }}
                                </option>
                                @foreach ($talentFolders as $folder)
                                    <option value="{{ __($folder->id) }}">{{ __($folder->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="btn btn-theme"
                            onclick="createFolder()">{{ __('generated.Créer') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('profile.inc.translation')

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js"></script>
@endsection

@section('js_footer')
    <script type="text/javascript" src="{{ asset('assets/js/profile/listing.js') }}"></script>
    <script>
        /**
         * Js For Print
         */
        window.printSection = function() {
            var printContent = document.getElementById('print-section').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();

            // window.onafterprint = function() {
            //     document.body.innerHTML = originalContent;
            //     window.location.reload();
            // };
            //   setTimeout(function () {
            // document.body.innerHTML = originalContent;
            // window.location.reload();
            // }, 1000); 
        }

        $(document).on('order.dt', function() {
            $('.dataTable thead th').each(function() {
                const $th = $(this);
                const icon = $th.find('.sort-icon');

                if ($th.hasClass('sorting_asc')) icon.text('▲');
                else if ($th.hasClass('sorting_desc')) icon.text('▼');
                else icon.text('⇅');
            });
        });
    </script>

    <script>
        var statsChangesData = "{{ route('profile.listing.change-chart.data') }}";
        var statsPersentageData = "{{ route('profile.listing.persentage-chart.data') }}";
        var mainprofileListingData = "{{ route('profile.main-listing.data') }}";
        var allProfileListingData = "{{ route('profile.listing.data', '0') }}";
        var customProfilesListingData = "{{ route('profile.custom.listing.data') }}";
        var activatedProfileListingData = "{{ route('profile.listing.data', '1') }}";
        var qualifiedProfileListingData = "{{ route('profile.listing.data', '2') }}";
        var validatedProfileListingData = "{{ route('profile.listing.data', '3') }}";
        var talentFolderStoreRoute = "{{ route('talent-folders.store') }}";
    </script>
    <script>
        var addToVivierRoute = "{{ route('profile.addToVivier') }}";
    </script>
    <script>
        var exportUrl = '{{ route('exportCVtheque') }}';

        $(document).on('click', '#downloadExcel', function(event) {
            event.preventDefault();
            Swal.fire({
                title: "{{ __('generated.Quel type de fichier souhaitez-vous ?') }}",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "{{ __('generated.Excel') }}",
                cancelButtonText: "{{ __('generated.Annuler') }}",
                showDenyButton: true,
                denyButtonText: "{{ __('generated.CSV') }}",
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
    @vite(['resources/js/profile/listing.js'])
    @vite(['resources/js/profile/dateFillter.js'])
@endsection
