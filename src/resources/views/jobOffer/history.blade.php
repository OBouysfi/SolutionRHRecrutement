@extends('layouts.master')

@section('title', __('generated.HumanJobs - Historique des missions'))

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
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Historique des offres d'emploi") }}</li>
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
                                            <div class="row p-1">

                                                <!-- Countries -->
                                                <div class="col-3 ">
                                                    <div class="form-group check-valid is-valid">
                                                        <div id="country-selector"
                                                            class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.Pays") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-pays">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @foreach ($countries as $country)
                                                                    <option class=" translated_text" value="{{ __($country->id) }}"
                                                                        data-image="https://flagcdn.com/20x15/{{ strtolower($country->code) }}.png">
                                                                        {{ __($country->name) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Cities -->
                                                <div class="col-3 ">
                                                    <div class="form-group check-valid is-valid">
                                                        <div id="city-selector"
                                                            class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.Ville") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-ville">
                                                                <option  value="Tous" selected>{{ __("generated.Tous") }}</option>
                                                                @if (isset($cities))
                                                                    @foreach ($cities as $city)
                                                                        <option class=" translated_text"
                                                                            value="{{ $city->id ?? '' }}"
                                                                            data-country="{{ $city->country?->id ?? '' }}">
                                                                            {{ __($city->name ?? '_' )}}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Client -->
                                                <div class="col-3 ">
                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.Client") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-client">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @foreach ($clients as $client)
                                                                    <option class=" translated_text"
                                                                        value="{{ __($client->id) }}">
                                                                        {{ $client->name ?? ' - ' }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Statut du client -->
                                                {{-- <div class="col-12 col-md-6 col-lg-2 mb-3">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: #e2e6f1 !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Statut
                                                            du client</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Actif</option>
                                                            <option>En attente</option>
                                                            <option>Inactif</option>
                                                            <option selected>Prospect</option>
                                                            <option>En négociation</option>
                                                            <option>Suspendu</option>
                                                            <option>Rupture de collaboration</option>
                                                            <option>Réactivation</option>
                                                            <option>A surveiller</option>
                                                            <option>Retardé</option>
                                                            <option>Gagné</option>
                                                            <option>Non intéressé</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                <!-- Missions en cours -->
                                                <div class="col-3 ">
                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.Missions en cours") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-status-jobOffre">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @foreach ($status_jobOffres as $key => $status_jobOffre)
                                                                    <option class=" translated_text"
                                                                        value="{{ $key }}">
                                                                        {{ $status_jobOffre ?? ' - ' }}
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
            {{-- <div class="row mb-4 justify-content-center">
                <div class="col-10">
                    <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a style="font-size: 14px" class="nav-link " href="gestion-clients.html">Informations
                                générales</a>
                        </li>
                        <li class="nav-item" role="presentation2">
                            <a style="font-size: 14px" href="historique-tab.html" class="nav-link active">Historique</a>
                        </li>
                        <li class="nav-item" role="presentation3">
                            <a style="font-size: 14px" href="mission-tab.html" class="nav-link ">Missions</a>
                        </li>
                        <li class="nav-item" role="presentation6">
                            <a style="font-size: 14px" href="facturation-tab.html" class="nav-link ">Facturations et
                                paiements</a>
                        </li>
                        <li class="nav-item" role="presentation7">
                            <a style="font-size: 14px" href="rapports-financiers.html" class="nav-link ">Rapports
                                financiers</a>
                        </li>
                    </ul>
                </div>
            </div> --}}
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
                                                            <h5 >{{ __("generated.Missions précédentes") }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Icônes -->
                                                <div class="col-12 col-md-8 ms-md-auto">
                                                    <div class="row g-2 justify-content-end align-items-center">
                                                        <!-- Icône Aperçu -->
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ __("generated.Aperçu") }}">
                                                                <a href="{{ route('jobOffer.previewHistory') }}"
                                                                    target="_blank">
                                                                    <i
                                                                        class="bi bi-binoculars avatar icon-bw rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- Icône Télécharger -->
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ __("generated.Télécharger") }}" id="downloadExcel">
                                                                <a href="{{ route('export.job.offers') }}"
                                                                        type="button">
                                                                        <i
                                                                            class="bi bi-cloud-download avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                            </div>
                                                        </div>
                                                        <!-- Icône Imprimer -->
                                                        <div class="col-auto" data-bs-toggle="tooltip translated_text"
                                                            data-bs-placement="top" title="{{ __("generated.Imprimer") }}">
                                                            <div class="avatar avatar-50 rounded bg-light-theme text-bw"
                                                                target="_blank" onclick="printSection()">
                                                                <i
                                                                    class="bi bi-printer avatar icon-bw rounded h5 "></i>
                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <div class="select-avatar avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ __("generated.Nombre d'éléments par page") }}">
                                                                <select id="customLength"
                                                                    style="border: 0;background-color: transparent; color: var(--adminux-theme); width: 49px;">
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
            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="tab-content py-3" id="myTabContent">
                                                <!-- personal info tab-->
                                                <div class="tab-pane fade active show" id="personalB" role="tabpanel"
                                                    aria-labelledby="personalB-tab" style="padding: 0px 17px">
                                                    <div class="row mb-4">

                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <table
                                                                class="table table-mission table-responsive tous mission-history-table"
                                                                data-show-toggle="true" style="width: 100%;">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;text-align: center;">
                                                                    <tr>
                                                                        <th style="width: 78px;padding: 12px 8px;"
                                                                            >{{ __("generated.N°") }}</th>
                                                                        <th style="width: 186px;padding: 12px 8px;"
                                                                            >{{ __("generated.Client") }}</th>
                                                                        <th style="width: 111px;padding: 12px 8px;"
                                                                            >{{ __("generated.Date début") }}</th>
                                                                        <th style="width: 111px;padding: 12px 8px;"
                                                                            >{{ __("generated.Date fin") }}</th>
                                                                        <th style="padding: 12px 8px;width: 200px;"
                                                                            >{{ __("generated.Poste") }}</th>
                                                                        <th style="width: 83px;padding: 12px 8px;"
                                                                            >{{ __("generated.Durée") }}</th>
                                                                        <th style="text-align: center;width: 165px;padding: 12px 8px;"
                                                                            >{{ __("generated.Présélectionnés") }}</th>
                                                                        <th style="text-align: center;width: 133px;padding: 12px 8px;"
                                                                            >{{ __("generated.En entretien") }}</th>
                                                                        <th style="text-align: center;width: 128px;padding: 12px 8px;"
                                                                            >{{ __("generated.Retenus") }}</th>
                                                                        <th style="text-align: center;width: 136px;padding: 12px 8px;"
                                                                            >{{ __("generated.Embauchés") }}</th>
                                                                        <th style="text-align: center;width: 127px;padding: 12px 8px;"
                                                                            >{{ __("generated.Rejetés") }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px; text-align: center;">

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
                                                                        <li class="footable-page-nav disabled"
                                                                            data-page="first">
                                                                            <a class="footable-page-link"
                                                                                href="#">«</a>
                                                                        </li>
                                                                        <li class="footable-page-nav disabled"
                                                                            data-page="prev">
                                                                            <a class="footable-page-link"
                                                                                href="#">‹</a>
                                                                        </li>
                                                                        <li class="footable-page visible active"
                                                                            data-page="1"><a class="footable-page-link"
                                                                                href="#">1</a>
                                                                        </li>
                                                                        <li class="footable-page visible" data-page="2">
                                                                            <a class="footable-page-link"
                                                                                href="#">2</a>
                                                                        </li>
                                                                        <li class="footable-page-nav" data-page="next"><a
                                                                                class="footable-page-link"
                                                                                href="#">›</a>
                                                                        </li>
                                                                        <li class="footable-page-nav" data-page="last"><a
                                                                                class="footable-page-link"
                                                                                href="#">»</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="divider"></div><span
                                                                        class="label label-default">1
                                                                        <span >{{ __("generated.sur") }}</span> 2</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="tab-pane fade" id="personalB2" role="tabpanel"
                                                    aria-labelledby="personalB2-tab" style="padding: 0px 17px">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h5 class="title custom-title">Résultats des recrutements
                                                                précédents</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <table class="table">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr>
                                                                        <th style="width: 78px;padding: 12px 8px;">N°</th>
                                                                        <th style="width: 186px;padding: 12px 8px;">Client
                                                                        </th>
                                                                        <th style="width: 186px;padding: 12px 8px;">Poste
                                                                        </th>
                                                                        <th style="width: 83px;padding: 12px 8px;">Durée
                                                                        </th>
                                                                        <th
                                                                            style="text-align: center;width: 111px;padding: 12px 8px;">
                                                                            Taux de placement</th>
                                                                        <th style="width: 111px;padding: 12px 8px;">
                                                                            Candidats placés</th>
                                                                        <th
                                                                            style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                            Performances des candidats</th>
                                                                        <th
                                                                            style="text-align: center;padding: 12px 8px;width: 200px;">
                                                                            Satisfaction client</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27034</td>
                                                                        <td style="vertical-align: middle">AAT</td>
                                                                        <td style="vertical-align: middle">Développeur Full
                                                                            Stack</td>
                                                                        <td style="vertical-align: middle">2 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 82%;">85%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 85%"
                                                                                    aria-valuenow="85" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27106</td>
                                                                        <td style="vertical-align: middle">Agricultura
                                                                            España</td>
                                                                        <td style="vertical-align: middle">Chef de projet
                                                                            IT</td>
                                                                        <td style="vertical-align: middle">3 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 64%;">75%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 75%"
                                                                                    aria-valuenow="75" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27442</td>
                                                                        <td style="vertical-align: middle">Arthur Benson
                                                                        </td>
                                                                        <td style="vertical-align: middle">Responsable
                                                                            Marketing</td>
                                                                        <td style="vertical-align: middle">1 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 43%;">65%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 65%"
                                                                                    aria-valuenow="65" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27056</td>
                                                                        <td style="vertical-align: middle">Consortium Delta
                                                                        </td>
                                                                        <td style="vertical-align: middle">Analyste
                                                                            financier</td>
                                                                        <td style="vertical-align: middle">3 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 97%;">92%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 92%"
                                                                                    aria-valuenow="92" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27100</td>
                                                                        <td style="vertical-align: middle">VECTORIA LLC
                                                                        </td>
                                                                        <td style="vertical-align: middle">Commercial B2B
                                                                        </td>
                                                                        <td style="vertical-align: middle">2 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 53%;">70%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 70%"
                                                                                    aria-valuenow="70" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27089</td>
                                                                        <td style="vertical-align: middle">Agricultura
                                                                            España</td>
                                                                        <td style="vertical-align: middle">Designer UX/UI
                                                                        </td>
                                                                        <td style="vertical-align: middle">1 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM6">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM6">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 102%;">95%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 95%"
                                                                                    aria-valuenow="95" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="personalB3" role="tabpanel"
                                                    aria-labelledby="personalB3-tab" style="padding: 0px 17px">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h5 class="title custom-title">Candidats précédemment recrutés
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <table class="table table-mission tous">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr>
                                                                        <th style="width: 218px;padding: 12px 8px;">Prénom
                                                                            et Nom du candidat</th>
                                                                        <th style="width: 78px;padding: 12px 8px;">
                                                                            Référence</th>
                                                                        <th style="width: 135px;padding: 12px 8px;">Client
                                                                        </th>
                                                                        <th style="padding: 12px 8px;width: 200px;">Poste
                                                                        </th>
                                                                        <th
                                                                            style="width: 134px;padding: 12px 8px;text-align: center">
                                                                            Date de placement</th>
                                                                        <th
                                                                            style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                            Durée dans le poste</th>
                                                                        <th style="width: 174px;padding: 12px 8px;">
                                                                            Évaluation de performance</th>
                                                                        <th
                                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                            Objectifs atteints</th>
                                                                        <th
                                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                            Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                                                                                <img src="assets/img/icon/59902.jpg"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Nouhaila
                                                                                SAOUD</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">19872</td>
                                                                        <td style="vertical-align: middle">AAT</td>
                                                                        <td style="vertical-align: middle">Chef de projet
                                                                            senior</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            01/03/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            6 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv19.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv19.jpg"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Yassine EL
                                                                                ALAMI</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">12759</td>
                                                                        <td style="vertical-align: middle">Agricultura
                                                                            España</td>
                                                                        <td style="vertical-align: middle">Consultant Cloud
                                                                            Computing</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            15/04/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            3 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv20.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv20.jpg"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Hicham
                                                                                KABBAJ</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">10659</td>
                                                                        <td style="vertical-align: middle">Arthur Benson
                                                                        </td>
                                                                        <td style="vertical-align: middle">Ingénieur
                                                                            BigData</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            10/05/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            4 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv21.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv21.jpg"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Fatima Zahra
                                                                                BENSOUDA</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">10959</td>
                                                                        <td style="vertical-align: middle">Consortium Delta
                                                                        </td>
                                                                        <td style="vertical-align: middle">Gestion de
                                                                            projets IT</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            01/06/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            12 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv22.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv22.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Karim
                                                                                BENKIRAN</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">11752</td>
                                                                        <td style="vertical-align: middle">VECTORIA LLC
                                                                        </td>
                                                                        <td style="vertical-align: middle">Consultant
                                                                            Cloud</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            20/06/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                            <table class="table table-mission client-1 hidden">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr>
                                                                        <th style="width: 180px;padding: 12px 8px;">Prénom
                                                                            et Nom du candidat</th>
                                                                        <th style="padding: 12px 8px;width: 122px;">Poste
                                                                        </th>
                                                                        <th
                                                                            style="width: 134px;padding: 12px 8px;text-align: center">
                                                                            Date de placement</th>
                                                                        <th
                                                                            style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                            Durée dans le poste</th>
                                                                        <th
                                                                            style="width: 155px;padding: 12px 8px;text-align: center;">
                                                                            Évaluation de performance</th>
                                                                        <th
                                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                            Objectifs atteints</th>
                                                                        <th
                                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                            Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv1.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv1.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Ahmed EL
                                                                                MANSOURI</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Analyste
                                                                            financier</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            01/03/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            6 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv4.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv4.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Fatima
                                                                                BENYAHIA</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Architecte
                                                                            Cloud</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            15/04/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            3 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv2.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv2.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Youssef
                                                                                AMRANI</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Comptable</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            10/05/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            4 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv5.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv5.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Hind
                                                                                TAZI</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Chef comptable
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            01/06/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            12 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv3.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv3.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Khalid
                                                                                OULHAJ</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Technicien
                                                                            junior</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            20/06/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div> --}}
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
    <div class="d-none" id="print-section">
        @include('jobOffer.inc.printhistory')
    </div>
@endsection

<!-- Ajouter l'inclusion du modal pour le changement de statut -->
{{-- @include('jobOffer.inc.ModalStatusAnnuler') --}}

@section('js_footer')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    {{-- <script src="{{ asset('assets/js/jobOffer/history.js') }}"></script> --}}
    @vite('resources/js/jobOffer/history.js')
    <script>
        var jobOfferHistoryData = "{{ route('jobOffer.data.history') }}";
    </script>
    <script>
        window.printSection = function() {
            var printContent = document.getElementById('print-section').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();

            window.onafterprint = function() {
                document.body.innerHTML = originalContent;
                window.location.reload();
            };
        }
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            function addImagesToChosen() {
                $('.chosen-results li').each(function() {
                    var $chosenOption = $(this);
                    var index = $chosenOption.data('option-array-index');
                    var imageSrc = $('.Flag_Country option').eq(index).data('image');
                    if (imageSrc) {
                        if (!$chosenOption.find('img').length) {
                            $chosenOption.prepend('<img src="' + imageSrc + '" />');
                        }
                    }
                });
            }
            $('.Flag_Country').on('chosen:showing_dropdown', addImagesToChosen);
        });
    </script>
@endsection
