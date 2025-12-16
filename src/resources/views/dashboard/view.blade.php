@extends('layouts.master')
@section('title', __('generated.Tableau de bord'))

@section('css_header')

<style>
    table.dataTable tbody tr, table.dataTable tbody td, table.dataTable tbody *, table.dataTable thead *, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_processing{
        background-color: #ffffff00!important;
    }
</style>
<style>
    .fullscreen-modal {
        width: 100vw !important;
        height: 100vh !important;
        margin: 0 !important;
        max-width: 100vw !important;
    }

    .fullscreen-modal .modal-content {
        height: 100% !important;
        border-radius: 0 !important;
    }
    .modal-backdrop {
        z-index: 1050 !important;
    }
    .modal {
        z-index: 1055 !important;
    }

    @media (min-width: 1400px) {

.container-xxl,
.container-xl,
.container-lg,
.container-md,
.container-sm,
.container {
    max-width: 1372px !important;
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
                <h5 class="mb-0 ">{{ __("generated.Tableau de bord") }}</h5>
            </div>
            <div class="col col-sm-auto">
                <div class="input-group input-group-md">
                    <form id="date-range-form" method="GET" action="{{ route('dashboard') }}">
                        <input type="hidden" name="start_date" id="start_date">
                        <input type="hidden" name="end_date" id="end_date">
                        <div class="input-group input-group-md">
                            <input type="text" class="form-control bg-none px-0" value="" id="dashboard-date-filter" />
                            <span class="input-group-text text-secondary bg-none" id="titlecalandershow">
                                <i class="bi bi-calendar-event"></i>
                            </span>
                        </div>
                    </form>
                    <!-- <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" name="test"/>
                    <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                            class="bi bi-calendar-event"></i></span> -->
                </div>
            </div>
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __("generated.contact") }}">
                <a href="{{ route('support.index') }}" class="text-decoration-none">
                    <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
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
                <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                    <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                        <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                    </span>
                </figure>
            </div>
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __("generated.Chatbot") }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
            </div>
            <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}"
                style="margin-right: 40px;">
                <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                    id="showNotificationFaciliti">
                    <i class="bi bi-" style="font-size: 26px;">
                        <img src="{{asset('assets/img/icon/faciliti.png')}}"
                            style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                    </i>
                </button>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Vue d'ensemble") }}</li>
            </ol>
        </nav>
    </div>
    <!-- content -->
    <div class="container mt-4">
        <div class="row mb-4">
            <!-- Colonne 1 : CVthèque -->
            <div class="col-12 col-md-5 mb-4">
                <div class="card border-0"  >
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0   bg-gradient-theme-light">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme">
                                                    <i class="bi bi-database h5"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-0 ">{{ __("generated.CVthèque") }}</h6>
                                            </div>
                                            <div class="col-auto">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                        aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical" style="font-size: 21px;  color: var(--adminux-theme) !important"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="static"
                                                        style="padding: 0;min-width: 99px !important;">
                                                        <li>
                                                            <a class="dropdown-item " href="{{route('profile.listing')}}" target="_blank">{{ __("generated.Détail") }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="min-height: 238px;" class="card-body">
                                        <div style="margin-top: 13%" class="row">
                                            <!-- Profils actifs -->
                                            <div class="col-12 col-sm-4 text-center mb-3">

                                                <a href="#" class="card border-0" data-bs-toggle="modal" data-bs-target="#billpay">
                                                    <div class="card-header card-body" style="height: 91px !important;">
                                                        <div class="row">
                                                            <div class="col-auto ms-auto" style="/* margin-left: -20px !important; */margin-top: -19px;margin-bottom: -24px;margin-right: -19px;">
                                                                <div class="dropdown d-inline-block">
                                                                    <span class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                        <i class="bi bi-info-circle" style="font-size: 15px; "></i>
                                                                    </span>
                                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light text-custom" style="left: 10px;padding: 0px; width: 483px; font-size: 13px; background-color: rgb(155, 221, 246);">
                                                                        <li style="padding: 20px;">
                                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                            <p style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.L’indicateur Profils actifs permet de mesurer le nombre de candidats qui ont interagi avec la CVthèque sur une période donnée. Il reflète l’engagement des talents et l’actualisation des profils, ce qui est essentiel pour évaluer la pertinence et l’attractivité de la base de données.") }}</p>
                                                                            <span style="font-weight: 700 translated_text">{{ __("generated.Formule") }} :</span>
                                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                  <span class="katex-display" style="font-size: 12px">
                                                                    <span class="katex translated_function"><span class="katex-mathml"><math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><semantics><mrow><mtext>Profils&nbsp;actifs</mtext><mo>=</mo><mrow><mtext>Nombre&nbsp;de&nbsp;connexions&nbsp;uniques&nbsp;des&nbsp;candidats&nbsp;sur&nbsp;la&nbsp;CVth</mtext><mover accent="true"><mtext>e</mtext><mo>ˋ</mo></mover><mtext>que</mtext></mrow></mrow><annotation encoding="application/x-tex">\text{Profils actifs} = \text{Nombre de connexions uniques des candidats sur la CVthèque}</annotation></semantics></math></span></span>
                                                                    </span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="bi bi- h4 avatar avatar-40 rounded text-bw"
                                                            style="width: 100%; ">
                                                            <!-- Nombre de profils actifs -->
                                                            {{ $stats['countActive'] ?? 0 }}
                                                            &nbsp;
                                                            @if($stats['growthRateIsActive'] > 0)
                                                                <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['growthRateIsActive'], 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateIsActive'] < 0)
                                                                <strong class="text-red" style="color: #f6525a !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['growthRateIsActive']), 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateIsActive'] == 0 && $stats['previousCountActive'] != 0)
                                                                <!-- Affiche "arrows-collapse" si le taux est 0 mais que previousCountActive n'est pas 0 -->
                                                                <strong class="text-blue" style="font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                </strong>
                                                            @else
                                                                <!-- Cas où previousCountActive = 0 (vide ou message personnalisé) -->
                                                                <span style="font-size: 15px; font-weight: 100; margin-top: 8px;">
                                                                    {{-- <small>previous = 0</small> --}}
                                                                    {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}</span>
                                                            @endif
                                                        </p>
                                                        <p class="text-secondary small ">{{ __("generated.Profils actifs") }}</p>
                                                    </div>
                                                </a>
                                            </div>

                                            <!-- Profils qualifiés -->
                                            <div class="col-12 col-sm-4 text-center mb-3">
                                                <a href="#" class="card border-0" data-bs-toggle="modal" data-bs-target="#billpay">
                                                    <div class="card-header card-body" style="height: 91px !important;">
                                                        <div class="row">
                                                            <div class="col-auto ms-auto" style="/* margin-left: -20px !important; */margin-top: -19px;margin-bottom: -24px;margin-right: -19px;">
                                                                <div class="dropdown d-inline-block">
                                                                    <span class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                        <i class="bi bi-info-circle" style="font-size: 15px; "></i>
                                                                    </span>
                                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light" style="padding: 0px; width: 483px; font-size: 13px; background-color: rgb(155, 221, 246);">
                                                                        <li style="padding: 20px;">
                                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                            <p style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.L’indicateur Profils qualifiés permet de mesurer le nombre de candidats qui répondent aux critères définis pour un poste ou un secteur d’activité. Il évalue la pertinence des talents présents dans la CVthèque par rapport aux besoins de recrutement.") }}</p>
                                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                <span class="katex-display" style="font-size: 12px">
                                                                    <span class="katex translated_function"><span class="katex-mathml"><math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><semantics><mrow><mrow><mtext>Profils&nbsp;qualifi</mtext><mover accent="true"><mtext>e</mtext><mo>ˊ</mo></mover><mtext>s</mtext></mrow><mo>=</mo><mfrac><mrow><mtext>Nombre&nbsp;de&nbsp;profils&nbsp;correspondant&nbsp;aux&nbsp;crit</mtext><mover accent="true"><mtext>e</mtext><mo>ˋ</mo></mover><mtext>res&nbsp;d</mtext><mover accent="true"><mtext>e</mtext><mo>ˊ</mo></mover><mtext>finis</mtext></mrow><mrow><mtext>Nombre&nbsp;total&nbsp;de&nbsp;profils&nbsp;dans&nbsp;la&nbsp;CVth</mtext><mover accent="true"><mtext>e</mtext><mo>ˋ</mo></mover><mtext>que</mtext></mrow></mfrac><mo>×</mo><mn>100</mn></mrow><annotation encoding="application/x-tex">\text{Profils qualifiés} = \frac{\text{Nombre de profils correspondant aux critères définis}}{\text{Nombre total de profils dans la CVthèque}} \times 100</annotation></semantics></math></span></span>
                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="bi bi- h4 avatar avatar-40 rounded text-bw"
                                                            style="width: 100%; ">
                                                            <!-- Nombre de profils qualifiés -->
                                                            {{ $stats['countQualified'] ?? 0 }}
                                                            &nbsp;
                                                            @if($stats['growthRateQualified'] > 0)
                                                                <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['growthRateQualified'], 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateQualified'] < 0)
                                                                <strong class="text-red" style="color: #f6525a !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['growthRateQualified']), 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateQualified'] == 0 && $stats['previousCountQualified'] != 0)
                                                                <!-- Affiche "arrows-collapse" si le taux est 0 mais que previousCountQualified n'est pas 0 -->
                                                                <strong class="text-blue" style="font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                </strong>
                                                            @else
                                                                <!-- Cas où previousCountQualified = 0 (vide ou message personnalisé) -->
                                                                <span style="font-size: 15px; font-weight: 100; margin-top: 8px;">
                                                                    {{-- <small>previous = 0</small> --}}
                                                                    {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}</span>
                                                            @endif
                                                        </p>
                                                        <p class="text-secondary small ">{{ __("generated.Profils qualifiés") }}</p>
                                                    </div>
                                                </a>
                                            </div>

                                            <!-- Profils pertinents -->
                                            <div class="col-12 col-sm-4 text-center mb-3">
                                                <a href="#" class="card border-0" data-bs-toggle="modal" data-bs-target="#billpay">
                                                    <div class="card-header card-body" style="height: 91px !important;">
                                                        <div class="row">
                                                            <div class="col-auto ms-auto" style="/* margin-left: -20px !important; */margin-top: -19px;margin-bottom: -24px;margin-right: -19px;">
                                                                <div class="dropdown d-inline-block">
                                                                    <span class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                        <i class="bi bi-info-circle" style="font-size: 15px; "></i>
                                                                    </span>
                                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light" style="padding: 0px; width: 512px; font-size: 13px; background-color: rgb(155, 221, 246);">
                                                                        <li style="padding: 20px;">
                                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                            <p style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px">
                                                                                L’indicateur Profils pertinents mesure le nombre de candidats qui correspondent étroitement aux exigences d’un poste spécifique ou à une recherche de recrutement. Il permet d’évaluer la capacité de la CVthèque à fournir des profils immédiatement exploitables par les recruteurs.
                                                                            </p>
                                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                <span class="katex-display" style="font-size: 12px">
                                                                    <span class="katex translated_function"><span class="katex-mathml"><math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><semantics><mrow><mtext>Profils&nbsp;pertinents</mtext><mo>=</mo><mfrac><mrow><mtext>Nombre&nbsp;de&nbsp;profils&nbsp;correspondant&nbsp;aux&nbsp;crit</mtext><mover accent="true"><mtext>e</mtext><mo>ˋ</mo></mover><mtext>res&nbsp;avanc</mtext><mover accent="true"><mtext>e</mtext><mo>ˊ</mo></mover><mtext>s&nbsp;d’un&nbsp;poste</mtext></mrow><mrow><mtext>Nombre&nbsp;total&nbsp;de&nbsp;profils&nbsp;analys</mtext><mover accent="true"><mtext>e</mtext><mo>ˊ</mo></mover><mtext>s</mtext></mrow></mfrac><mo>×</mo><mn>100</mn></mrow><annotation encoding="application/x-tex">\text{Profils pertinents} = \frac{\text{Nombre de profils correspondant aux critères avancés d’un poste}}{\text{Nombre total de profils analysés}} \times 100</annotation></semantics></math></span></span>
                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="bi bi- h4 avatar avatar-40 rounded text-bw"
                                                            style="width: 100%; ">
                                                            <!-- Nombre de profils pertinents -->
                                                            {{ $stats['countPertinent'] ?? 0 }}
                                                            &nbsp;
                                                            @if($stats['growthRatePertinent'] > 0)
                                                                <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['growthRatePertinent'], 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRatePertinent'] < 0)
                                                                <strong class="text-red" style="color: #f6525a !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['growthRatePertinent']), 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRatePertinent'] == 0 && $stats['previousCountPertinent'] != 0)
                                                                <!-- Affiche "arrows-collapse" si le taux est 0 mais que previousCountPertinent n'est pas 0 -->
                                                                <strong class="text-blue" style="font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                </strong>
                                                            @else
                                                                <!-- Cas où previousCountPertinent = 0 (vide ou message personnalisé) -->
                                                                <span style="font-size: 15px; font-weight: 100; margin-top: 8px;">
                                                                    {{-- <small>previous = 0</small> --}}
                                                                    {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}</span>
                                                            @endif
                                                        </p>
                                                        <p class="text-secondary small ">{{ __("generated.Profils pertinents") }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="circle-small">
                                                    <div id="circleprogressProfile"></div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="mb-0" >
                                                    <!-- Total des CV -->
                                                    {{ $stats['countTotalProfile'] ?? 0 }}
                                                </h5>
                                                <p class="small" >
                                                    {{ __("generated.Total CVs") }}
                                                    @if($stats['growthRateTotalProfile'] > 0)
                                                        <strong class="text-green" style="color: #558706 !important;">
                                                            <i class="bi bi-arrow-up fs-10"></i>
                                                            {{ round($stats['growthRateTotalProfile'], 2) }}%
                                                        </strong>
                                                    @elseif($stats['growthRateTotalProfile'] < 0)
                                                        <strong class="text-red" style="color: #f6525a !important;">
                                                            <i class="bi bi-arrow-down fs-10"></i>
                                                            {{ round(abs($stats['growthRateTotalProfile']), 2) }}%
                                                        </strong>
                                                    @elseif($stats['growthRateTotalProfile'] == 0 && $stats['previousCountTotalProfile'] != 0)
                                                        <!-- Affiche "arrows-collapse" si le taux est 0 mais que previousCountPertinent n'est pas 0 -->
                                                        <strong class="text-blue">
                                                            <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                        </strong>

                                                    @else
                                                        <!-- Cas où previousCountPertinent = 0 (vide ou message personnalisé) -->
                                                        <span style="font-size: 15px;">
                                                            <i class="bi bi-arrow-collapse fs-10"></i> {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                        </span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Colonne 2 : Espace vide (pour les écrans moyens et grands) -->
                <div class="col-12 col-md-2 d-none d-md-block"></div>

            <!-- Colonne 3 : Vivier talent -->
            <div class="col-12 col-md-5">
                <div class="card border-0"  >
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0 bg-gradient-theme-light">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme">
                                                    <i class="bi bi-ticket-perforated h5"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Vivier talent") }}</h6>
                                            </div>
                                            <div class="col-auto">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                        aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical" style="font-size: 21px;  color: var(--adminux-theme) !important"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="static"
                                                        style="padding: 0;min-width: 99px !important;">
                                                        <li>
                                                            <a class="dropdown-item " href="{{route('vivierTalent.listing')}}">{{ __("generated.Détail") }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="min-height: 238px;" class="card-body">
                                        <div style="margin-top: 13%" class="row">
                                            <!-- Profils actifs -->
                                            <div class="col-12 col-sm-4 text-center mb-3">
                                                <a href="#" class="card border-0" data-bs-toggle="modal" data-bs-target="#billpay">
                                                    <div class="card-header card-body" style="height: 91px !important;">
                                                        <div class="row">
                                                            <div class="col-auto ms-auto" style="/* margin-left: -20px !important; */margin-top: -19px;margin-bottom: -24px;margin-right: -19px;">
                                                                <div class="dropdown d-inline-block">
                                                                        <span class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                            <i class="bi bi-info-circle" style="font-size: 15px; "></i>
                                                                        </span>
                                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light" style="padding: 0px; width: 483px; font-size: 13px; background-color: rgb(155, 221, 246);">
                                                                        <li style="padding: 20px;">
                                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                            <p style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.L’indicateur Profils actifs permet de mesurer le nombre de candidats qui ont interagi avec la Vivier talent sur une période donnée. Il reflète l’engagement des talents et l’actualisation des profils, ce qui est essentiel pour évaluer la pertinence et l’attractivité de la base de données.") }}</p>
                                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function"><span class="katex-mathml"><math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><semantics><mrow><mtext>Profils&nbsp;actifs</mtext><mo>=</mo><mrow><mtext>Nombre&nbsp;de&nbsp;connexions&nbsp;uniques&nbsp;des&nbsp;candidats&nbsp;sur&nbsp;le&nbsp;Vivier talent</mtext></mrow></mrow><annotation encoding="application/x-tex">\text{Profils actifs} = \text{Nombre de connexions uniques des candidats sur le Vivier talent}</annotation></semantics></math></span></span>
                                                                    </span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="bi bi- h4 avatar avatar-40 rounded text-bw"
                                                            style="width: 100%; ">
                                                            {{ $stats['countActiveTalent'] ?? 0 }}
                                                            &nbsp;
                                                            @if($stats['growthRateIsActiveTalent'] > 0)
                                                                <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['growthRateIsActiveTalent'], 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateIsActiveTalent'] < 0)
                                                                <strong class="text-red" style="color: #f6525a !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['growthRateIsActiveTalent']), 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateIsActiveTalent'] == 0 && $stats['previousCountActiveTalent'] != 0)
                                                                <strong class="text-blue" style="font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                </strong>
                                                            @else
                                                                <span style="font-size: 15px; font-weight: 100; margin-top: 8px;">{{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}</span>
                                                            @endif
                                                        </p>
                                                        <p class="text-secondary small ">{{ __("generated.Profils actifs") }}</p>
                                                    </div>
                                                </a>
                                            </div>

                                            <!-- Profils qualifiés -->
                                            <div class="col-12 col-sm-4 text-center mb-3">
                                                <a href="#" class="card border-0" data-bs-toggle="modal" data-bs-target="#billpay">
                                                    <div class="card-header card-body" style="height: 91px !important;">
                                                        <div class="row">
                                                            <div class="col-auto ms-auto" style="/* margin-left: -20px !important; */margin-top: -19px;margin-bottom: -24px;margin-right: -19px;">
                                                                <div class="dropdown d-inline-block">
                                                                        <span class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                            <i class="bi bi-info-circle" style="font-size: 15px; "></i>
                                                                        </span>
                                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light" style="padding: 0px; width: 483px; font-size: 13px; background-color: rgb(155, 221, 246);">
                                                                        <li style="padding: 20px;">
                                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                            <p style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.L’indicateur Profils qualifiés permet de mesurer le nombre de candidats qui répondent aux critères définis pour un poste ou un secteur d’activité. Il évalue la pertinence des talents présents dans le Vivier talent par rapport aux besoins de recrutement.") }}</p>
                                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function"><span class="katex-mathml"><math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><semantics><mrow><mrow><mtext>Profils&nbsp;qualifi</mtext><mover accent="true"><mtext>e</mtext><mo>ˊ</mo></mover><mtext>s</mtext></mrow><mo>=</mo><mfrac><mrow><mtext>Nombre&nbsp;de&nbsp;profils&nbsp;correspondant&nbsp;aux&nbsp;crit</mtext><mover accent="true"><mtext>e</mtext><mo>ˋ</mo></mover><mtext>res&nbsp;d</mtext><mover accent="true"><mtext>e</mtext><mo>ˊ</mo></mover><mtext>finis</mtext></mrow><mrow><mtext>Nombre&nbsp;total&nbsp;de&nbsp;profils&nbsp;dans&nbsp;le&nbsp;Vivier talent</mtext></mrow></mfrac><mo>×</mo><mn>100</mn></mrow><annotation encoding="application/x-tex">\text{Profils qualifiés} = \frac{\text{Nombre de profils correspondant aux critères définis}}{\text{Nombre total de profils dans le Vivier talent}} \times 100</annotation></semantics></math></span></span>
                                                                    </span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                    </div>
                                                        <p class="bi bi- h4 avatar avatar-40 rounded text-bw"
                                                            style="width: 100%; ">
                                                            {{ $stats['countQualifiedTalent'] ?? 0 }}
                                                            &nbsp;
                                                            @if($stats['growthRateIsQualifiedTalent'] > 0)
                                                                <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['growthRateIsQualifiedTalent'], 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateIsQualifiedTalent'] < 0)
                                                                <strong class="text-red" style="color: #f6525a !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['growthRateIsQualifiedTalent']), 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateIsQualifiedTalent'] == 0 && $stats['previousCountQualifiedTalent'] != 0)
                                                                <strong class="text-blue" style="font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                </strong>
                                                            @else
                                                                <span style="font-size: 15px; font-weight: 100; margin-top: 8px;">{{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}</span>
                                                            @endif
                                                        </p>
                                                        <p class="text-secondary small ">{{ __("generated.Profils qualifiés") }}</p>
                                                    </div>
                                                </a>
                                            </div>

                                            <!-- Profils pertinents -->
                                            <div class="col-12 col-sm-4 text-center mb-3">
                                                <a href="#" class="card border-0" data-bs-toggle="modal" data-bs-target="#billpay">
                                                    <div class="card-header card-body" style="height: 91px !important;">
                                                        <div class="row">
                                                            <div class="col-auto ms-auto" style="/* margin-left: -20px !important; */margin-top: -19px;margin-bottom: -24px;margin-right: -19px;">
                                                                <div class="dropdown d-inline-block">
                                                                        <span class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                            <i class="bi bi-info-circle" style="font-size: 15px; "></i>
                                                                        </span>
                                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light" style="padding: 0px; width: 512px; font-size: 13px; background-color: rgb(155, 221, 246);">
                                                                        <li style="padding: 20px;">
                                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                            <p style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.L’indicateur Profils pertinents mesure le nombre de candidats qui correspondent étroitement aux exigences d’un poste spécifique ou à une recherche de recrutement. Il permet d’évaluer la capacité de le Vivier talent à fournir des profils immédiatement exploitables par les recruteurs.") }}</p>
                                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function"><span class="katex-mathml"><math xmlns="http://www.w3.org/1998/Math/MathML" display="block"><semantics><mrow><mtext>Profils&nbsp;pertinents</mtext><mo>=</mo><mfrac><mrow><mtext>Nombre&nbsp;de&nbsp;profils&nbsp;correspondant&nbsp;aux&nbsp;crit</mtext><mover accent="true"><mtext>e</mtext><mo>ˋ</mo></mover><mtext>res&nbsp;avanc</mtext><mover accent="true"><mtext>e</mtext><mo>ˊ</mo></mover><mtext>s&nbsp;d’un&nbsp;poste</mtext></mrow><mrow><mtext>Nombre&nbsp;total&nbsp;de&nbsp;profils&nbsp;analys</mtext><mover accent="true"><mtext>e</mtext><mo>ˊ</mo></mover><mtext>s</mtext></mrow></mfrac><mo>×</mo><mn>100</mn></mrow><annotation encoding="application/x-tex">\text{Profils pertinents} = \frac{\text{Nombre de profils correspondant aux critères avancés d’un poste}}{\text{Nombre total de profils analysés}} \times 100</annotation></semantics></math></span></span>
                                                                    </span>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                    </div>
                                                        <p class="bi bi- h4 avatar avatar-40 rounded text-bw"
                                                            style="width: 100%; ">
                                                            {{ $stats['countPertinentTalent'] ?? 0 }}
                                                            &nbsp;
                                                            @if($stats['growthRateIsPertinentTalent'] > 0)
                                                                <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['growthRateIsPertinentTalent'], 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateIsPertinentTalent'] < 0)
                                                                <strong class="text-red" style="color: #f6525a !important; font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['growthRateIsPertinentTalent']), 2) }}%
                                                                </strong>
                                                            @elseif($stats['growthRateIsPertinentTalent'] == 0 && $stats['previousCountPertinentTalent'] != 0)
                                                                <strong class="text-blue" style="font-size: 12px; font-weight: 100; margin-top: 8px;">
                                                                    <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                </strong>
                                                            @else
                                                                <span style="font-size: 15px; font-weight: 100; margin-top: 8px;">{{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}</span>
                                                            @endif
                                                        </p>
                                                        <p class="text-secondary small ">{{ __("generated.Profils qualifiés") }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="circle-small">
                                                    <div id="circleprogressVivierTalent"></div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <h5 class="mb-0" >
                                                    {{ $stats['countTotalTalentByDate'] ?? 0 }}
                                                </h5>
                                                <p class="small" >
                                                    {{ __("generated.Total CVs") }}
                                                    @if($stats['growthRateTotalProfileTalent'] > 0)
                                                        <strong class="text-green" style="color: #558706 !important;">
                                                            <i class="bi bi-arrow-up fs-10"></i>
                                                            {{ round($stats['growthRateTotalProfileTalent'], 2) }}%
                                                        </strong>
                                                    @elseif($stats['growthRateTotalProfileTalent'] < 0)
                                                        <strong class="text-red" style="color: #f6525a !important;">
                                                            <i class="bi bi-arrow-down fs-10"></i>
                                                            {{ round(abs($stats['growthRateTotalProfileTalent']), 2) }}%
                                                        </strong>
                                                    @elseif($stats['growthRateTotalProfileTalent'] == 0 && $stats['previousCountTotalProfileTalent'] != 0)
                                                        <strong class="text-blue">
                                                            <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                        </strong>

                                                    @else
                                                        <span style="font-size: 15px;">
                                                            <i class="bi bi-arrow-collapse fs-10"></i> {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                        </span>
                                                    @endif
                                                </p>
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
        <div class="row mb-4">
            <!-- Colonne 1 : Taux d'interaction Cvthèque -->
            <div class="col-12 col-md-6 mb-4">
                <div class="card border-0"  >
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0 ">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme"
                                                     >
                                                    <i class="bi bi-bar-chart h5"  ></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Taux d'interaction Cvthèque") }}</h6>
                                            </div>
                                            <div class="col-auto ms-auto">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-three-dots"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        style="padding: 0;min-width: 76px;margin-top: 0;"
                                                        data-bs-popper="static">
                                                        <li>
                                                            <a data-bs-toggle="modal" data-bs-target="#interactionCvthequemodal"
                                                                class="modal-click-show dropdown-item "
                                                                style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @include('dashboard.inc.interactionCvtheque')
                                            <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-info-circle"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                        style="padding: 0;max-width: 576px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                        data-bs-popper="static">
                                                        <li style="padding: 20px;">
                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                            <p style="text-align: justify;padding: 6px 10px 6px 6px" >{{ __("generated.Mesure le niveau d’utilisation et l’engagement des équipes de recrutement vis-à-vis de la base interne de CV (CVthèque). Il reflète dans quelle mesure cette ressource est exploitée pour trouver des profils et réduire les coûts/temps de sourcing externe.") }}</p>
                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                <span class="katex-display translated_text" style="font-size: 12px">
                                                                    <span class="katex translated_function"><span class="katex-mathml"><math
                                                                                xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                display="block">
                                                                                <semantics>
                                                                                    <mrow>
                                                                                        <mrow>
                                                                                            <mtext>
                                                                                                Taux&nbsp;d’interaction&nbsp;CVth
                                                                                            </mtext>
                                                                                            <mover accent="true">
                                                                                                <mtext>e</mtext>
                                                                                                <mo>ˋ</mo>
                                                                                            </mover>
                                                                                            <mtext>que</mtext>
                                                                                        </mrow>
                                                                                        <mo>=</mo>
                                                                                        <mfrac>
                                                                                            <mrow>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;total&nbsp;de&nbsp;consultations&nbsp;(ou&nbsp;recherches)&nbsp;dans&nbsp;la&nbsp;CVth
                                                                                                </mtext>
                                                                                                <mover accent="true">
                                                                                                    <mtext>e</mtext>
                                                                                                    <mo>ˋ</mo>
                                                                                                </mover>
                                                                                                <mtext>que</mtext>
                                                                                            </mrow>
                                                                                            <mtext>
                                                                                                Nombre&nbsp;total&nbsp;de&nbsp;recruteurs&nbsp;(ou&nbsp;de&nbsp;sessions&nbsp;de&nbsp;recrutement)
                                                                                            </mtext>
                                                                                        </mfrac>
                                                                                        <mo>×</mo>
                                                                                        <mn>100</mn>
                                                                                    </mrow>
                                                                                    <annotation encoding="application/x-tex">
                                                                                        \text{Taux d’interaction
                                                                                        CVthèque}
                                                                                        = \frac{\text{Nombre total de
                                                                                        consultations (ou recherches)
                                                                                        dans la CVthèque}}{\text{Nombre
                                                                                        total de recruteurs (ou de
                                                                                        sessions de recrutement)}}
                                                                                        \times 100</annotation>
                                                                                </semantics>
                                                                            </math></span></span></span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="height: 236px;">
                                            <canvas id="areachartblue13"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Colonne 2 : Taux d'interaction vivier talents -->
                <div class="col-12 col-md-6">
                    <div class="card border-0"  >
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme"
                                                         >
                                                        <i class="bi bi-bar-chart h5"  ></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Taux d'interaction vivier talents") }}</h6>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#interactionTalentmodal"
                                                                    class="modal-click-show dropdown-item"
                                                                    style="cursor: pointer">
                                                                    {{ __("generated.Détail") }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @include('dashboard.inc.interactionTalents')
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;max-width: 590px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p style="text-align: justify;padding: 6px 10px 6px 6px" >{{ __("generated.Évalue l’utilisation effective du “vivier de talents” (pool de candidats présélectionnés ou intéressants) comme ressource prioritaire ou complémentaire pour pourvoir les postes vacants. Un fort taux signifie que ce vivier est un levier stratégique pour réduire les temps et coûts de recrutement.") }}</p>
                                                                <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function"><span
                                                                                class="katex-mathml"><math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <mtext>
                                                                                                Taux&nbsp;d’interaction&nbsp;vivier&nbsp;talents
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;de&nbsp;consultations&nbsp;(ou&nbsp;de&nbsp;candidats&nbsp;contact
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>
                                                                                                        s)&nbsp;via&nbsp;le&nbsp;vivier
                                                                                                    </mtext>
                                                                                                </mrow>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;total&nbsp;de&nbsp;recruteurs&nbsp;(ou&nbsp;de&nbsp;missions)
                                                                                                </mtext>
                                                                                            </mfrac>
                                                                                            <mo>×</mo>
                                                                                            <mn>100</mn>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Taux d’interaction vivier
                                                                                            talents}
                                                                                            = \frac{\text{Nombre de
                                                                                            consultations (ou de candidats
                                                                                            contactés) via le
                                                                                            vivier}}{\text{Nombre total de
                                                                                            recruteurs (ou de missions)}}
                                                                                            \times 100</annotation>
                                                                                    </semantics>
                                                                                </math></span></span></span>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" style="height: 236px;">
                                                <canvas id="areachartblue133"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row mb-4">
            <!-- Colonne 1 : Taux de complétude des CVs -->
            <div class="col-12 col-md-4 mb-2">
                <div class="card border-0"  >
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0   bg-gradient-theme-light ">
                                    <div class="card-header ">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme">
                                                    <i class="bi bi-percent h5"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="fw-medium mb-0 " style="font-size: 15px">{{ __("generated.Taux de complétude des CVs") }}</h5>
                                            </div>
                                            <div class="col-auto ms-auto">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-three-dots"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        style="padding: 0;min-width: 76px;margin-top: 0;"
                                                        data-bs-popper="static">
                                                        <li>
                                                            <a data-bs-toggle="modal" data-bs-target="#completudeCvsmodal"
                                                                class="modal-click-show dropdown-item "
                                                                style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @include('dashboard.inc.completudeCvs')
                                            <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-info-circle"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                        style="padding: 0;width: 483px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                        data-bs-popper="static">
                                                        <li style="padding: 20px;">
                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                            <p
                                                                style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.Mesurer la qualité et la richesse des informations présentes dans les CVs de la base : un CV complet (expériences, compétences, formation, etc.) est plus facilement exploitable par les recruteurs et augmente les chances d’un bon matching.") }}</p>
                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                <span class="katex-display" style="font-size: 12px">
                                                                    <span class="katex translated_function">
                                                                        <span class="katex-mathml">
                                                                            <math
                                                                                xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                display="block">
                                                                                <semantics>
                                                                                    <mrow>
                                                                                        <mrow>
                                                                                            <mtext>
                                                                                                Taux&nbsp;de&nbsp;compl
                                                                                            </mtext>
                                                                                            <mover accent="true">
                                                                                                <mtext>e</mtext>
                                                                                                <mo>ˊ</mo>
                                                                                            </mover>
                                                                                            <mtext>tude</mtext>
                                                                                        </mrow>
                                                                                        <mo>=</mo>
                                                                                        <mfrac>
                                                                                            <mtext>
                                                                                                Nombre&nbsp;de&nbsp;CV&nbsp;ayant&nbsp;rempli&nbsp;tous&nbsp;les&nbsp;champs&nbsp;obligatoires
                                                                                            </mtext>
                                                                                            <mtext>
                                                                                                Nombre&nbsp;total&nbsp;de&nbsp;CV
                                                                                            </mtext>
                                                                                        </mfrac>
                                                                                        <mo>×</mo>
                                                                                        <mn>100</mn>
                                                                                    </mrow>
                                                                                    <annotation
                                                                                        encoding="application/x-tex">
                                                                                        \text{Taux de complétude}=
                                                                                        \frac{\text{Nombre de CV ayant
                                                                                        rempli tous les champs
                                                                                        obligatoires}}{\text{Nombre
                                                                                        total de CV}}\times 100
                                                                                    </annotation>
                                                                                </semantics>
                                                                            </math>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="height: 236px;">
                                            <div class="col-12">
                                                <div class="doughnutchart mb-4 mt-4">
                                                    <canvas id="doughnutchart30"></canvas>
                                                    <div class="countvalue shadow">
                                                        <div class="w-100">
                                                            <h5 class="mb-1" style="font-size: 17px"><span >{{ __("generated.Total") }}</span> <br>{!! json_encode(round($stats['totalCompletionRate'], 0)) !!}
                                                                {{-- <span style="font-size: 12px; ">14%<i class="bi bi-arrow-up-right" style="color: #005dc7"></i></span> --}}

                                                                @if($stats['completionRateEvolution'] > 0)
                                                                    <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['completionRateEvolution'], 2) }}%
                                                                    </strong>

                                                                @elseif($stats['completionRateEvolution'] < 0)
                                                                    <strong class="text-green" style="color: #f6525a !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['completionRateEvolution']), 2) }}%
                                                                    </strong>

                                                                @elseif($stats['completionRateEvolution'] == 0 && $stats['previousCompletionRate'] != 0)
                                                                    <strong class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                    </strong>

                                                                @else
                                                                    <span style="font-size: 15px; font-weight: 100;">
                                                                        {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                                    </span>
                                                                @endif
                                                            </h5>
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

                <!-- Colonne 2 : Taux d’obsolescence des CVs -->
                <div class="col-12 col-md-4 mb-2">
                    <div class="card border-0"  >
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0   bg-gradient-theme-light ">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-percent h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 " style="font-size: 15px">{{ __("generated.Taux d’obsolescence des CVs") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#obsolescencemodal"
                                                                    class="modal-click-show dropdown-item "
                                                                    style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @include('dashboard.inc.obsolescenceCvs')
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 483px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.Mesurer la qualité et la richesse des informations présentes dans les CVs de la base : un CV complet (expériences, compétences, formation, etc.) est plus facilement exploitable par les recruteurs et augmente les chances d’un bon matching.") }}</p>
                                                                <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function">
                                                                            <span class="katex-mathml">
                                                                                <math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <mtext>Taux&nbsp;d’obsolescence
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;de&nbsp;CV&nbsp;non&nbsp;mis&nbsp;
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>a</mtext>
                                                                                                        <mo>ˋ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>
                                                                                                        &nbsp;jour&nbsp;depuis&nbsp;+&nbsp;de&nbsp;X&nbsp;mois
                                                                                                    </mtext>
                                                                                                </mrow>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;total&nbsp;de&nbsp;CV
                                                                                                </mtext>
                                                                                            </mfrac>
                                                                                            <mo>×</mo>
                                                                                            <mn>100</mn>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Taux d’obsolescence}=
                                                                                            \frac{\text{Nombre de CV non mis
                                                                                            à jour depuis + de X
                                                                                            mois}}{\text{Nombre total de
                                                                                            CV}}\times 100</annotation>
                                                                                    </semantics>
                                                                                </math>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="height: 236px;">
                                            <div class="col-12">
                                                <div class="doughnutchart mb-4 mt-4">
                                                    <canvas id="doughnutchart31"></canvas>
                                                    <div class="countvalue shadow">
                                                        <div class="w-100">
                                                            <h5 class="mb-1" style="font-size: 17px"><span >{{ __("generated.Total") }}</span> <br>{!! json_encode(round($stats['obsoleteRate'] + $stats['updatedRate'], 0)) !!}
                                                                {{-- <span style="font-size: 12px; ">14%<i class="bi bi-arrow-up-right" style="color: #005dc7"></i></span> --}}

                                                                @if($stats['evolutionRate'] > 0)
                                                                <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                    <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['evolutionRate'], 2) }}%
                                                                </strong>

                                                            @elseif($stats['evolutionRate'] < 0)
                                                                <strong class="text-green" style="color: #f6525a !important; font-size: 12px; font-weight: 100;">
                                                                    <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['evolutionRate']), 2) }}%
                                                                </strong>

                                                            @elseif($stats['evolutionRate'] == 0 && $stats['previousTotalCVs'] != 0)
                                                                <strong class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                    <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                </strong>

                                                            @else
                                                                <strong style="font-size: 15px; font-weight: 100;">
                                                                    {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                                </strong>
                                                            @endif
                                                            </h5>
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

            <!-- Colonne 3 : Taux de réussite CVthèque vs. sourcing externe -->
            <div class="col-12 col-md-4 mb-2">
                <div class="card border-0"  >
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0   bg-gradient-theme-light ">
                                    <div class="card-header ">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme">
                                                    <i class="bi bi-percent h5"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="fw-medium mb-0 translated_text" style="font-size: 15px">{{ __("generated.Taux de réussite CVthèque") }}
                                                <br> {{ __("generated.vs. sourcing externe") }}</h5>
                                            </div>
                                            <div class="col-auto ms-auto">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-three-dots"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        style="padding: 0;min-width: 76px;margin-top: 0;"
                                                        data-bs-popper="static">
                                                        <li>
                                                            <a data-bs-toggle="modal" data-bs-target="#reussiteCvthequemodal"
                                                                class="modal-click-show dropdown-item "
                                                                style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @include('dashboard.inc.reussiteCvtheque_externe')
                                            <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-info-circle"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                        style="padding: 0;width: 483px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                        data-bs-popper="static">
                                                        <li style="padding: 20px;">
                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                            <p
                                                                style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.Mesurer la qualité et la richesse des informations présentes dans les CVs de la base : un CV complet (expériences, compétences, formation, etc.) est plus facilement exploitable par les recruteurs et augmente les chances d’un bon matching.") }}</p>
                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                <span class="katex-display" style="font-size: 12px">
                                                                    <span class="katex translated_function">
                                                                        <span class="katex-mathml">
                                                                            <math
                                                                                xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                display="block">
                                                                                <semantics>
                                                                                    <mrow>
                                                                                        <mrow>
                                                                                            <mtext>Taux&nbsp;de&nbsp;r
                                                                                            </mtext>
                                                                                            <mover accent="true">
                                                                                                <mtext>e</mtext>
                                                                                                <mo>ˊ</mo>
                                                                                            </mover>
                                                                                            <mtext>ussite&nbsp;interne
                                                                                            </mtext>
                                                                                        </mrow>
                                                                                        <mo>=</mo>
                                                                                        <mfrac>
                                                                                            <mrow>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;de&nbsp;recrutements&nbsp;issus&nbsp;de&nbsp;la&nbsp;CVth
                                                                                                </mtext>
                                                                                                <mover accent="true">
                                                                                                    <mtext>e</mtext>
                                                                                                    <mo>ˋ</mo>
                                                                                                </mover>
                                                                                                <mtext>que</mtext>
                                                                                            </mrow>
                                                                                            <mtext>
                                                                                                Nombre&nbsp;total&nbsp;de&nbsp;recrutements
                                                                                            </mtext>
                                                                                        </mfrac>
                                                                                        <mo>×</mo>
                                                                                        <mn>100</mn>
                                                                                    </mrow>
                                                                                    <annotation
                                                                                        encoding="application/x-tex">
                                                                                        \text{Taux de réussite interne}=
                                                                                        \frac{\text{Nombre de
                                                                                        recrutements issus de la
                                                                                        CVthèque}}{\text{Nombre total de
                                                                                        recrutements}}\times 100
                                                                                    </annotation>
                                                                                </semantics>
                                                                            </math>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="height: 236px;">
                                            <div class="col-12">
                                                <div class="doughnutchart mb-4 mt-4">
                                                    <canvas id="doughnutchart32"></canvas>
                                                    <div class="countvalue shadow">
                                                        <div class="w-100">
                                                            <h5 class="mb-1" style="font-size: 17px"><span >{{ __("generated.Total") }}</span> <br>
                                                                {{-- {{ __($stats['totalSuccessRate']) }} --}}
                                                                {{ round($stats['totalSuccessRate'], 0) }}

                                                                @if($stats['evolutionTotalCount'] > 0)
                                                                    <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['evolutionTotalCount'], 2) }}%
                                                                    </strong>

                                                                @elseif($stats['evolutionTotalCount'] < 0)
                                                                    <strong class="text-green" style="color: #f6525a !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['evolutionTotalCount']), 2) }}%
                                                                    </strong>

                                                                @elseif($stats['evolutionTotalCount'] == 0 && $stats['previousTotalHired'] != 0)
                                                                    <strong class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                    </strong>

                                                                @else
                                                                    <span style="font-size: 15px; font-weight: 100;">
                                                                        {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                                    </span>
                                                                @endif
                                                            </h5>
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

            {{-- Taux de conversion Candidature / Entretien --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0"  >
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0   bg-gradient-theme-light">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Taux de conversion Candidature / Entretien") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#candidatureEntretienmodal"
                                                                    class="modal-click-show dropdown-item "
                                                                    style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @include('dashboard.inc.candidatureEntretien')
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 536px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 510px;padding: 6px 10px 6px 6px" >{{ __("generated.Indicateur de la pertinence et de la qualité des candidatures reçues : plus il est élevé, plus les candidats correspondent au profil recherché et passent à l’étape suivante (entretien). C’est un marqueur d’efficacité du sourcing et de l’attractivité de l’offre.") }}</p>
                                                                <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function"><span
                                                                                class="katex-mathml"><math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <mtext>
                                                                                                Taux&nbsp;de&nbsp;conversion&nbsp;Candidature&nbsp;→&nbsp;Entretien
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;de&nbsp;candidats&nbsp;invit
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>
                                                                                                        s&nbsp;en&nbsp;entretien
                                                                                                    </mtext>
                                                                                                </mrow>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;total&nbsp;de&nbsp;candidatures&nbsp;re
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>c</mtext>
                                                                                                        <mo>¸</mo>
                                                                                                    </mover>
                                                                                                    <mtext>ues</mtext>
                                                                                                </mrow>
                                                                                            </mfrac>
                                                                                            <mo>×</mo>
                                                                                            <mn>100</mn>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Taux de conversion
                                                                                            Candidature → Entretien}
                                                                                            = \frac{\text{Nombre de
                                                                                            candidats invités en
                                                                                            entretien}}{\text{Nombre total
                                                                                            de candidatures reçues}}
                                                                                            \times 100</annotation>
                                                                                    </semantics>
                                                                                </math></span></span></span>
                                                                    </span>
                                                                </div>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" style="height: 236px;">
                                                <canvas id="areachartblue1"></canvas>
                                            </div>
                                        </div>
                                        <div class="card-footer justify-content-center ">
                                            <div class="row justify-content-center">
                                                <div class="col-3">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <!--
                                                                Taux de candidature à entretien= (Nombre de candidatures / Nombre d’entretiens)  ×100
                                                            -->
                                                            <div class="circle-small">
                                                                <div id="circleprogressblue1"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">{{ __($stats['totalMatching']) }}</h5>
                                                            <p class="small text-secondary ">{{ __("generated.Candidature à entretien") }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="circle-small">
                                                                <!--
                                                                    Taux d’entretien à offre = (Nombre d’offres / Nombre d’entretiens)  ×100
                                                                -->
                                                                <div id="circleprogressblue2"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">{{ __($stats['totalOfferAccepted']) }}</h5>
                                                            <p class="small text-secondary ">{{ __("generated.Entretien à offre") }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="circle-small">
                                                                <!--
                                                                    Taux de présélection = (Nombre de candidatures présélectionnées / Nombre de candidatures)  ×100
                                                                -->
                                                                <div id="circleprogressblue4"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">{{ __($stats['totalPreSelection']) }}</h5>
                                                            <p class="small text-secondary ">{{ __("generated.Présélection") }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="circle-small">
                                                                <!--
                                                                    Taux d’acceptation d’offre = (Nombre d’offres acceptées / Nombre d’offres)  ×100
                                                                -->
                                                                <div id="circleprogressblue3"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="mb-0">{{ __($stats['totalOfferAcceptedStatusId5']) }}
                                                            </h5>
                                                            <p class="small text-secondary ">{{ __("generated.Acceptation d’offre") }}</p>
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

        <div class="row mb-4">
            <!-- Colonne 1 : Recrutement par secteur -->
            <div class="col-12 col-md-4 mb-2">
                <div class="card border-0"  >
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0   bg-gradient-theme-light">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme"
                                                     >
                                                    <i class="bi bi-bar-chart h5"  ></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Recrutement par secteur") }}</h6>
                                            </div>
                                            <div class="col-auto ms-auto">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-three-dots"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        style="padding: 0;min-width: 76px;margin-top: 0;"
                                                        data-bs-popper="static">
                                                        <li>
                                                            <a data-bs-toggle="modal" data-bs-target="#jobOfferSecteurmodal"
                                                                class="modal-click-show dropdown-item "
                                                                style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @include('dashboard.inc.jobOfferSecteur')
                                            <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-info-circle"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                        style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                        data-bs-popper="static">
                                                        <li style="padding: 20px;">
                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                            <p
                                                                style="text-align: justify;width: 500px;padding: 6px 10px 6px 6px" >{{ __("generated.Donne la répartition des embauches selon les secteurs d’activité (IT, Finance, Industrie, etc.). Permet d’orienter la stratégie de développement en identifiant les domaines où l’on recrute le plus, ou qui génèrent la majeure partie du chiffre d’affaires.") }}</p>
                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                <span class="katex-display" style="font-size: 20px">
                                                                    <span class="katex translated_function">
                                                                        <span class="katex-mathml">
                                                                            <math
                                                                                xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                display="block">
                                                                                <semantics>
                                                                                    <mrow>
                                                                                        <munder>
                                                                                            <mo>∑</mo>
                                                                                            <mrow>
                                                                                                <mi>r</mi>
                                                                                                <mo>∈</mo>
                                                                                                <mi>R</mi>
                                                                                            </mrow>
                                                                                        </munder>
                                                                                        <mn>1</mn>
                                                                                        <mo>=</mo>
                                                                                        <mi mathvariant="normal">∣</mi>
                                                                                        <mi>R</mi>
                                                                                        <mi mathvariant="normal">∣</mi>
                                                                                        <mspace width="1em"></mspace>
                                                                                        <mo stretchy="false">(</mo>
                                                                                        <mrow>
                                                                                            <mtext>la&nbsp;cardinalit
                                                                                            </mtext>
                                                                                            <mover accent="true">
                                                                                                <mtext>e</mtext>
                                                                                                <mo>ˊ</mo>
                                                                                            </mover>
                                                                                            <mtext>&nbsp;de&nbsp;
                                                                                            </mtext>
                                                                                        </mrow>
                                                                                        <mi>R</mi>
                                                                                        <mo stretchy="false">)</mo>
                                                                                    </mrow>
                                                                                    <annotation
                                                                                        encoding="application/x-tex">
                                                                                        \sum_{r \in R} 1 =
                                                                                        |R|\quad(\text{la cardinalité de
                                                                                        } R)</annotation>
                                                                                </semantics>
                                                                            </math>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="doughnutchart mb-4 mt-4">
                                                    <canvas id="doughnutchart"></canvas>
                                                    <div class="countvalue shadow">
                                                        <div class="w-100">
                                                            <h5 class="mb-1" style="font-size: 17px"><span >{{ __("generated.Total") }}</span> <br>{{ round($stats['totalMissionsByActivityArea'], 0) }}
                                                                {{-- <span style="font-size: 12px; ">14%<i class="bi bi-arrow-up-right" style="color: #005dc7"></i></span> --}}

                                                                @if($stats['tauxEvolutionGlobalActivityArea'] > 0)
                                                                    <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['tauxEvolutionGlobalActivityArea'], 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionGlobalActivityArea'] < 0)
                                                                    <strong class="text-green" style="color: #f6525a !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['tauxEvolutionGlobalActivityArea']), 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionGlobalActivityArea'] == 0 && $stats['totalMissionsPrevious'] != 0)
                                                                    <strong class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                    </strong>

                                                                @else
                                                                    <span style="font-size: 15px; font-weight: 100;">
                                                                        {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                                    </span>
                                                                @endif

                                                            </h5>
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

                <!-- Colonne 2 : Recrutement par région -->
                <div class="col-12 col-md-4 mb-2">
                    <div class="card border-0"  >
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0   bg-gradient-theme-light">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme"
                                                         >
                                                        <i class="bi bi-bar-chart h5"  ></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Recrutement par région") }}</h6>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#jobOfferRegionmodal"
                                                                    class="modal-click-show dropdown-item "
                                                                    style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @include('dashboard.inc.jobOfferRegoin')
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 471px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.Permet de visualiser la répartition géographique des embauches et de détecter des déséquilibres (sur-représentation ou sous-représentation régionale). Intéressant pour piloter l’implantation d’agences, l’ouverture de nouveaux bureaux, etc.") }}</p>
                                                                <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 20px">
                                                                        <span class="katex translated_function">
                                                                            <span class="katex-mathml">
                                                                                <math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <munder>
                                                                                                <mo>∑</mo>
                                                                                                <mrow>
                                                                                                    <mi>r</mi>
                                                                                                    <mo>∈</mo>
                                                                                                    <mi>R</mi>
                                                                                                </mrow>
                                                                                            </munder>
                                                                                            <msub>
                                                                                                <mn
                                                                                                    mathvariant="double-struck">
                                                                                                    1</mn>
                                                                                                <mrow>
                                                                                                    <mo stretchy="false">(
                                                                                                    </mo>
                                                                                                    <mi>r</mi>
                                                                                                    <mi
                                                                                                        mathvariant="normal">
                                                                                                        .</mi>
                                                                                                    <mi>r</mi>
                                                                                                    <mi>e</mi>
                                                                                                    <mi>g</mi>
                                                                                                    <mi>i</mi>
                                                                                                    <mi>o</mi>
                                                                                                    <mi>n</mi>
                                                                                                    <mo>=</mo>
                                                                                                    <msub>
                                                                                                        <mi>g</mi>
                                                                                                        <mi>j</mi>
                                                                                                    </msub>
                                                                                                    <mo stretchy="false">)
                                                                                                    </mo>
                                                                                                </mrow>
                                                                                            </msub>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \sum_{r \in R}
                                                                                            \mathbb{1}_{(r.region = g_j)}
                                                                                        </annotation>
                                                                                    </semantics>
                                                                                </math>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="doughnutchart mb-4 mt-4">
                                                    <canvas id="doughnutchart2"></canvas>
                                                    <div class="countvalue shadow">
                                                        <div class="w-100">
                                                            <h5 class="mb-1" style="font-size: 17px"><span >{{ __("generated.Total") }}</span> <br>{!! json_encode(round($stats['total_percentage'], 0)) !!}
                                                                {{-- <span style="font-size: 12px; ">14%<i class="bi bi-arrow-up-right" style="color: #005dc7"></i></span> --}}

                                                                @if($stats['tauxEvolutionGlobalRegion'] > 0)
                                                                    <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['tauxEvolutionGlobalRegion'], 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionGlobalRegion'] < 0)
                                                                    <strong class="text-green" style="color: #f6525a !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['tauxEvolutionGlobalRegion']), 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionGlobalRegion'] == 0 && $stats['previousTotalMissionsByRegion'] != 0)
                                                                    <strong class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                    </strong>

                                                                @else
                                                                    <span style="font-size: 15px; font-weight: 100;">
                                                                        {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                                    </span>
                                                                @endif
                                                            </h5>
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

                <!-- Colonne 3 : Recrutement par poste -->
                <div class="col-12 col-md-4 mb-2">
                    <div class="card border-0"  >
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0   bg-gradient-theme-light">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme"
                                                         >
                                                        <i class="bi bi-bar-chart h5"  ></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Recrutement par poste") }}</h6>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#jobOfferPostmodal"
                                                                    class="modal-click-show dropdown-item "
                                                                    style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @include('dashboard.inc.jobOfferPost')
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 481px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.Mesure la distribution des recrutements par type de poste, fonction ou famille de métiers (ex. Ingénieur, Commercial, RH). Donne une vision macro de la typologie des embauches pour anticiper les besoins de formation et de développement de l’entreprise.") }}</p>
                                                                <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 20px">
                                                                        <span class="katex translated_function">
                                                                            <span class="katex-mathml">
                                                                                <math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <munder>
                                                                                                <mo>∑</mo>
                                                                                                <mrow>
                                                                                                    <mi>r</mi>
                                                                                                    <mo>∈</mo>
                                                                                                    <mi>R</mi>
                                                                                                </mrow>
                                                                                            </munder>
                                                                                            <msub>
                                                                                                <mn
                                                                                                    mathvariant="double-struck">
                                                                                                    1</mn>
                                                                                                <mrow>
                                                                                                    <mo stretchy="false">(
                                                                                                    </mo>
                                                                                                    <mi>r</mi>
                                                                                                    <mi
                                                                                                        mathvariant="normal">
                                                                                                        .</mi>
                                                                                                    <mi>m</mi>
                                                                                                    <mi>e</mi>
                                                                                                    <mi>t</mi>
                                                                                                    <mi>i</mi>
                                                                                                    <mi>e</mi>
                                                                                                    <mi>r</mi>
                                                                                                    <mo>=</mo>
                                                                                                    <msub>
                                                                                                        <mi>m</mi>
                                                                                                        <mi
                                                                                                            mathvariant="normal">
                                                                                                            ℓ</mi>
                                                                                                    </msub>
                                                                                                    <mo stretchy="false">)
                                                                                                    </mo>
                                                                                                </mrow>
                                                                                            </msub>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \sum_{r \in R}
                                                                                            \mathbb{1}_{(r.metier = m_\ell)}
                                                                                        </annotation>
                                                                                    </semantics>
                                                                                </math>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="doughnutchart mb-4 mt-4">
                                                    <canvas id="doughnutchart3"></canvas>
                                                    <div class="countvalue shadow">
                                                        <div class="w-100">
                                                            <h5 class="mb-1" style="font-size: 17px"><span >{{ __("generated.Total") }}</span> <br>{{ round($stats['totalMissionsByTitle'], 0) }}
                                                                {{-- <span style="font-size: 12px; ">14%<i class="bi bi-arrow-up-right" style="color: #005dc7"></i></span> --}}

                                                                @if($stats['tauxEvolution'] > 0)
                                                                    <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['tauxEvolution'], 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolution'] < 0)
                                                                    <strong class="text-green" style="color: #f6525a !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['tauxEvolution']), 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolution'] == 0 && $stats['previousTotalMissionsByTitle'] != 0)
                                                                    <strong class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                    </strong>

                                                                @else
                                                                    <span style="font-size: 15px; font-weight: 100;">
                                                                        {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                                    </span>
                                                                @endif
                                                            </h5>
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

            {{-- Card Performance des canaux de sourcing --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0"  >
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0   bg-gradient-theme-light ">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Performance des canaux de sourcing") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#performanceSourcingmodal"
                                                                    class="modal-click-show dropdown-item "
                                                                    style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @include('dashboard.inc.performanceSourcing')
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 2px 10px 6px 6px" class="translated_text">
                                                                <ul>
                                                                    <!-- <li>Indique le volume de candidatures reçues en moyenne
                                                                        pour chaque offre de poste publiée.</li>
                                                                    <li>Permet de mesurer l’attractivité de l’offre et
                                                                        l’efficacité du sourcing (canaux de diffusion,
                                                                        marque employeur, etc.).</li> -->

                                                                        <li>{{ __("generated.Indique le volume de candidatures reçues en moyenne pour chaque offre de poste publiée.") }}</li>
                                                                        <li>{{ __("generated.Permet de mesurer l’attractivité de l’offre et l’efficacité du sourcing (canaux de diffusion, marque employeur, etc.).") }}</li>
                                                                </ul>
                                                                </p>
                                                                <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function">
                                                                            <span class="katex-mathml">
                                                                                <math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <mtext>
                                                                                                Nombre&nbsp;moyen&nbsp;de&nbsp;candidatures&nbsp;par&nbsp;offre
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;total&nbsp;de&nbsp;candidatures&nbsp;re
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>c</mtext>
                                                                                                        <mo>¸</mo>
                                                                                                    </mover>
                                                                                                    <mtext>ues</mtext>
                                                                                                </mrow>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;total&nbsp;d’offres&nbsp;publi
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>es</mtext>
                                                                                                </mrow>
                                                                                            </mfrac>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Nombre moyen de
                                                                                            candidatures par offre}=
                                                                                            \frac{\text{Nombre total de
                                                                                            candidatures
                                                                                            reçues}}{\text{Nombre total
                                                                                            d'offres publiées}}</annotation>
                                                                                    </semantics>
                                                                                </math>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" style="height: 236px;">
                                                <canvas id="areachartblue2"></canvas>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <!-- Colonne 1 : Qualité d’embauche -->
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0"  >
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0   bg-gradient-theme-light ">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Qualité d’embauche") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#qualiteEmbauchemodal"
                                                                    class="modal-click-show dropdown-item "
                                                                    style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @include('dashboard.inc.qualiteEmbauche')
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 616px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.La Qualité d’embauche n’ayant pas de définition universelle, on l’obtient généralement en agrégeant plusieurs critères (performance, satisfaction du manager, taux de rétention, etc.).") }}</p>
                                                                <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function">
                                                                            <span class="katex-mathml">
                                                                                <math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <mrow>
                                                                                                <mtext>Qualit</mtext>
                                                                                                <mover accent="true">
                                                                                                    <mtext>e</mtext>
                                                                                                    <mo>ˊ</mo>
                                                                                                </mover>
                                                                                                <mtext>
                                                                                                    &nbsp;d’embauche&nbsp;(QH)
                                                                                                </mtext>
                                                                                            </mrow>
                                                                                            <mo>=</mo>
                                                                                            <mi>α</mi>
                                                                                            <mo>×</mo>
                                                                                            <mtext>
                                                                                                Score&nbsp;de&nbsp;performance
                                                                                            </mtext>
                                                                                            <mo>+</mo>
                                                                                            <mi>β</mi>
                                                                                            <mo>×</mo>
                                                                                            <mtext>
                                                                                                Satisfaction&nbsp;du&nbsp;manager
                                                                                            </mtext>
                                                                                            <mo>+</mo>
                                                                                            <mi>γ</mi>
                                                                                            <mo>×</mo>
                                                                                            <mrow>
                                                                                                <mtext>Taux&nbsp;de&nbsp;r
                                                                                                </mtext>
                                                                                                <mover accent="true">
                                                                                                    <mtext>e</mtext>
                                                                                                    <mo>ˊ</mo>
                                                                                                </mover>
                                                                                                <mtext>tention</mtext>
                                                                                            </mrow>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Qualité d’embauche (QH)}=
                                                                                            \alpha \times \text{Score de
                                                                                            performance}+ \beta \times
                                                                                            \text{Satisfaction du manager}+
                                                                                            \gamma \times \text{Taux de
                                                                                            rétention}</annotation>
                                                                                    </semantics>
                                                                                </math>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </div>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" style="height: 236px;">
                                                <canvas id="areachartblue3"></canvas>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Colonne 2 : Diversité et inclusion -->
            <div class="col-12 col-md-6 mb-2">
                <div class="card border-0"  >
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0   bg-gradient-theme-light">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-40 rounded bg-light-theme">
                                                    <i class="bi bi-bar-chart h5"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="fw-medium mb-0 ">{{ __("generated.Diversité et inclusion") }}</h5>
                                            </div>
                                            <div class="col-auto ms-auto">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-three-dots"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        style="padding: 0; min-width: 76px; margin-top: 0;"
                                                        data-bs-popper="static">
                                                        <li>
                                                            <a data-bs-toggle="modal" data-bs-target="#diversitemodal"
                                                                class="modal-click-show dropdown-item "
                                                                style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @include('dashboard.inc.diversite')
                                            <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                        role="button" data-bs-toggle="dropdown"
                                                        data-bs-auto-close="outside" aria-expanded="false">
                                                        <i class="bi bi-info-circle"
                                                            style="font-size: 21px;  color: var(--adminux-theme) "></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light"
                                                        style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                        data-bs-popper="static">
                                                        <li style="padding: 20px;">
                                                            <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                            <p
                                                                style="text-align: justify;width: 500px;padding: 6px 10px 6px 6px" >{{ __("generated.Pourcentage de recrutements issus de groupes variés (genre, âge, origine, handicap, etc.), en fonction des objectifs fixés par l’entreprise (respect des législations ou des engagements RSE).") }}</p>
                                                            <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                            <div style="margin-bottom: 16px;margin-top: 10px">
                                                                <span class="katex-display" style="font-size: 12px">
                                                                    <span class="katex translated_function">
                                                                        <span class="katex-mathml">
                                                                            <math xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                display="block">
                                                                                <semantics>
                                                                                    <mrow>
                                                                                        <mrow>
                                                                                            <mtext>
                                                                                                Taux&nbsp;de&nbsp;diversit
                                                                                            </mtext>
                                                                                            <mover accent="true">
                                                                                                <mtext>e</mtext>
                                                                                                <mo>ˊ</mo>
                                                                                            </mover>
                                                                                        </mrow>
                                                                                        <mo>=</mo>
                                                                                        <mfrac>
                                                                                            <mrow>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;de&nbsp;recrutements&nbsp;r
                                                                                                </mtext>
                                                                                                <mover accent="true">
                                                                                                    <mtext>e</mtext>
                                                                                                    <mo>ˊ</mo>
                                                                                                </mover>
                                                                                                <mtext>
                                                                                                    pondant&nbsp;aux&nbsp;crit
                                                                                                </mtext>
                                                                                                <mover accent="true">
                                                                                                    <mtext>e</mtext>
                                                                                                    <mo>ˋ</mo>
                                                                                                </mover>
                                                                                                <mtext>
                                                                                                    res&nbsp;de&nbsp;diversit
                                                                                                </mtext>
                                                                                                <mover accent="true">
                                                                                                    <mtext>e</mtext>
                                                                                                    <mo>ˊ</mo>
                                                                                                </mover>
                                                                                            </mrow>
                                                                                            <mtext>
                                                                                                Nombre&nbsp;total&nbsp;de&nbsp;recrutements
                                                                                            </mtext>
                                                                                        </mfrac>
                                                                                        <mo>×</mo>
                                                                                        <mn>100</mn>
                                                                                    </mrow>
                                                                                    <annotation encoding="application/x-tex">
                                                                                        \text{Taux de diversité}= \frac{\text{Nombre de recrutements répondant aux critères de diversité}}{\text{Nombre total de recrutements}}\times 100
                                                                                    </annotation>
                                                                                </semantics>
                                                                            </math>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="height: 236px;">
                                            <div class="col-12">
                                                <div class="doughnutchart mb-4 mt-4">
                                                    <canvas id="doughnutchart5"></canvas>
                                                    <div class="countvalue shadow">
                                                        <div class="w-100">
                                                            <h5 class="mb-1" style="font-size: 17px"><span >{{ __("generated.Total") }}</span> <br>{{ round($stats['femalePercentage'] + $stats['malePercentage'], 0) }}
                                                                {{-- <span style="font-size: 12px; ">14%<i class="bi bi-arrow-up-right" style="color: #005dc7"></i></span> --}}

                                                                @if($stats['tauxEvolutionMaleFemale'] > 0)
                                                                    <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['tauxEvolutionMaleFemale'], 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionMaleFemale'] < 0)
                                                                    <strong class="text-green" style="color: #f6525a !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['tauxEvolutionMaleFemale']), 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionMaleFemale'] == 0 && $stats['totalMaleFemalePrevious'] != 0)
                                                                    <strong class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                    </strong>

                                                                @else
                                                                    <span style="font-size: 15px; font-weight: 100;">
                                                                        {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                                    </span>
                                                                @endif
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-auto px-5 py-4 position-relative" style="position: absolute !important;top: 46%;">
                                                <div class="row">
                                                    <div class="col-6 text-end" style="width: 30%;margin-right: 40%;">
                                                        <div class="row">
                                                            <div class="col ps-0" style="margin-right: -8px !important;">
                                                                <h5 class="text-dark mb-0" style="padding-right: 14px;">{{ __($stats['femaleCount']) }}</h5>
                                                                {{-- <strong class="text-green small">3,70%<i class="bi bi-arrow-up-right" style="color: #005dc7"></i></strong> --}}

                                                                @if($stats['tauxEvolutionFemale'] > 0)
                                                                    <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['tauxEvolutionFemale'], 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionFemale'] < 0)
                                                                    <strong class="text-green" style="color: #f6525a !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['tauxEvolutionFemale']), 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionFemale'] == 0 && $stats['femaleCountPrevious'] != 0)
                                                                    <strong class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                    </strong>

                                                                @else
                                                                    <span style="font-size: 15px; font-weight: 100;">
                                                                        {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                                    </span>
                                                                @endif

                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="avatar avatar-40 bg-blue rounded text-white">
                                                                    <i class="bi bi-gender-female h5"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6" style="width: 30%;">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <span class="avatar avatar-40 bg-red rounded text-white">
                                                                    <i class="bi bi-gender-male h5"></i>
                                                                </span>
                                                            </div>
                                                            <div class="col ps-0">
                                                                <h5 class="text-dark mb-0" style="padding-left: 3px">{{ __($stats['maleCount']) }}</h5>
                                                                {{-- <strong class="text-red small">2,70%<i class="bi bi-arrow-down-right text-red"></i></strong> --}}

                                                                @if($stats['tauxEvolutionMale'] > 0)
                                                                    <strong class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-up fs-10"></i> {{ round($stats['tauxEvolutionMale'], 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionMale'] < 0)
                                                                    <strong class="text-green" style="color: #f6525a !important; font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($stats['tauxEvolutionMale']), 2) }}%
                                                                    </strong>

                                                                @elseif($stats['tauxEvolutionMale'] == 0 && $stats['maleCountPrevious'] != 0)
                                                                    <strong class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                        <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                    </strong>

                                                                @else
                                                                    <span style="font-size: 15px; font-weight: 100;">
                                                                        {{-- <small>previous = 0</small> --}}
                                                                        {{-- <i class="bi bi-exclamation-triangle-fill text-warning"></i> --}}
                                                                    </span>
                                                                @endif
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
@include('profile.inc.translation')
@endsection


@section('js_footer')

<!-- @vite(['resources/js/profile/dateFillter.js']) -->
@vite(['resources/js/dashboard/dateFilter.js'])

    {{-- <script src="{{asset('assets/js/dashboard-custom.js')}}"></script> --}}
    <script>
        var ratio = totalTalent / totalCV;
    </script>
{{-- CVthèque --}}
<script>
       /* circular progress */
    var globalRateProfile = {!! json_encode($stats['globalRateProfile']) !!} / 100; // Convertir en fraction (0.80 pour 80%)
    var progressCirclesgreen1 = new ProgressBar.Circle(circleprogressProfile, {
        color: 'rgb(255, 255, 255)',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 10,
        trailWidth: 10,
        easing: 'easeInOut',
        trailColor: '#ffffff46',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: { color: 'rgb(255, 255, 255)', width: 10 },
        to: { color: 'rgb(255, 255, 255)', width: 10 },
        // Set default step function for all animate calls
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('0');
            } else {
                circle.setText(value + "<small>%<small>");
            }

        }
    });
    // progressCirclesgreen1.text.style.fontSize = '20px';
    progressCirclesgreen1.animate(globalRateProfile);
</script>

{{-- Vivier talent --}}
<script>
    // Initialisation du ProgressBar Circle
    var globalRateProfileTalent = {!! json_encode($stats['globalRateProfileTalent']) !!} / 100; // Convertir en fraction (0.80 pour 80%)

    var progressCirclesred1 = new ProgressBar.Circle(circleprogressVivierTalent, {
        color: 'rgb(255, 255, 255)',
        strokeWidth: 10,
        trailWidth: 10,
        easing: 'easeInOut',
        trailColor: '#ffffff46',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: { color: 'rgb(255, 255, 255)', width: 10 },
        to: { color: 'rgb(255, 255, 255)', width: 10 },
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            // Calcul du pourcentage sur base du ratio (0 -> 1)
            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('0');
            } else {
                circle.setText(value + "<small>%<small>");
            }
        }
    });

    // On anime le cercle jusqu'au ratio calculé
    // (si ratio = 0.20, ProgressBar ira à 20%)
    progressCirclesred1.animate(globalRateProfileTalent);
</script>

    <!-- Taux d'interaction Cvthèque -->
    <script>
        // Convertir le tableau PHP en objet JavaScript
        var interactionRates = @json($stats['interactionRates']);

        var areachartblue = document.getElementById('areachartblue13').getContext('2d');
        var gradientblue = areachartblue.createLinearGradient(0, 0, 0, 195);
        gradientblue.addColorStop(0, 'rgba(1, 94, 194, 1)');
        gradientblue.addColorStop(1, 'rgba(0, 197, 221, 0.1)');

        var myareachartblue = {
            type: 'line',
            data: {
                labels: [
                        "{{ __('generated.Jan.') }}", "{{ __('generated.Fév.') }}", "{{ __('generated.Mars') }}", "{{ __('generated.Avr.') }}",
                        "{{ __('generated.Mai') }}", "{{ __('generated.Juin') }}", "{{ __('generated.Jul.') }}", "{{ __('generated.Août') }}",
                        "{{ __('generated.Sep.') }}", "{{ __('generated.Oct.') }}", "{{ __('generated.Nov.') }}", "{{ __('generated.Déc.') }}"
                    ],
                    datasets: [{
                        label: "{{ __('generated.Taux en %') }}",
                    data: [
                        interactionRates["1"] || 0,
                        interactionRates["2"] || 0,
                        interactionRates["3"] || 0,
                        interactionRates["4"] || 0,
                        interactionRates["5"] || 0,
                        interactionRates["6"] || 0,
                        interactionRates["7"] || 0,
                        interactionRates["8"] || 0,
                        interactionRates["9"] || 0,
                        interactionRates["10"] || 0,
                        interactionRates["11"] || 0,
                        interactionRates["12"] || 0
                    ],
                    radius: 2,
                    pointBackgroundColor: '#ffffff',
                    backgroundColor: gradientblue,
                    borderColor: '#0162C2',
                    borderWidth: 1,
                    borderRadius: 15,
                    fill: true,
                    tension: 0.0,
                    barThickness: 25
                }]
            },
            options: {
                layout: {
                    padding: 0,
                },
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        display: true,
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        display: true,
                        beginAtZero: false,
                    }
                }
            }
        };

        var myAreaChartblue = new Chart(areachartblue, myareachartblue);
    </script>

    <!-- Taux d'interaction vivier talents -->
    <script>
        // Conversion du tableau PHP en objet JavaScript
        var interactionRatesTalent = @json($stats['interactionRatesTalent']); // ex: { "1": 20, "2": 15, ..., "12": 25 }

        var areachartblue = document.getElementById('areachartblue133').getContext('2d');
        var gradientblue = areachartblue.createLinearGradient(0, 0, 0, 195);
        gradientblue.addColorStop(0, 'rgba(1, 94, 194, 1)');
        gradientblue.addColorStop(1, 'rgba(0, 197, 221, 0.1)');

        var myareachartblue = {
            type: 'bar',
            data: {
                    labels: [
                        "{{ __('generated.Jan.') }}", "{{ __('generated.Fév.') }}", "{{ __('generated.Mars') }}", "{{ __('generated.Avr.') }}",
                        "{{ __('generated.Mai') }}", "{{ __('generated.Juin') }}", "{{ __('generated.Jul.') }}", "{{ __('generated.Août') }}",
                        "{{ __('generated.Sep.') }}", "{{ __('generated.Oct.') }}", "{{ __('generated.Nov.') }}", "{{ __('generated.Déc.') }}"
                    ],
                    datasets: [{
                        label: "{{ __('generated.Taux en %') }}",
                    data: [
                        interactionRatesTalent["1"] || 0,
                        interactionRatesTalent["2"] || 0,
                        interactionRatesTalent["3"] || 0,
                        interactionRatesTalent["4"] || 0,
                        interactionRatesTalent["5"] || 0,
                        interactionRatesTalent["6"] || 0,
                        interactionRatesTalent["7"] || 0,
                        interactionRatesTalent["8"] || 0,
                        interactionRatesTalent["9"] || 0,
                        interactionRatesTalent["10"] || 0,
                        interactionRatesTalent["11"] || 0,
                        interactionRatesTalent["12"] || 0
                    ],
                    radius: 2,
                    pointBackgroundColor: '#ffffff',
                    backgroundColor: gradientblue,
                    borderColor: 'rgba(1, 94, 194, 0.4)',
                    borderWidth: 1,
                    borderRadius: 15,
                    fill: true,
                    tension: 0.0,
                    barThickness: 25
                }]
            },
            options: {
                layout: {
                    padding: 0,
                },
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        display: true,
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        display: true,
                        beginAtZero: false,
                    }
                }
            }
        };

        var myAreaChartblue = new Chart(areachartblue, myareachartblue);
    </script>

    {{-- Taux de complétude des CVs --}}
    <script>
        var doughnutchart30 = document.getElementById('doughnutchart30').getContext('2d');
        var data30 = {
            // labels: ['Ouvriers', 'Employés', 'Agents de maîtrise', 'Cadres', 'Cadres supérieurs',
            //     'Directeurs'
            // ],

            labels: {!! json_encode($stats['labels_categorie_socio_professionnelle']) !!},
            datasets: [{
                label: 'Taux en %',
                // data: [60, 50, 45, 35, 20, 10],
                data: {!! json_encode($stats['data_categorie_socio_professionnelle']) !!},
                backgroundColor: ['#8DB600', '#FF8C00', '#4682B4', '#D2691E', '#708090', '#FFD700'],
                borderWidth: 0,
            }]
        };
        var mydoughnutchartCofig30 = {
            type: 'doughnut',
            data: data30,

            options: {
                responsive: true,
                cutout: 55,
                tooltips: {
                    position: 'nearest',
                    yAlign: 'bottom'
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: false,
                        text: 'Chart.js polarArea Chart'
                    }
                }
            },
        };
        var mydoughnutchart30 = new Chart(doughnutchart30, mydoughnutchartCofig30);
    </script>

    {{-- Taux d’obsolescence des CVs --}}
    <script>
        var doughnutchart31 = document.getElementById('doughnutchart31').getContext('2d');
        var data31 = {
            labels: ["{{ __('generated.CVs obsolètes') }}", "{{ __('generated.CVs à jour') }}"],
            datasets: [{
                label: 'Taux en %',
                // data: [100, 300],
                data: [{!! json_encode($stats['obsoleteRate']) !!}, {!! json_encode($stats['updatedRate']) !!}],
                backgroundColor: ['#8DB600', '#4682B4'],
                borderWidth: 0,
            }]
        };
        var mydoughnutchartCofig31 = {
            type: 'doughnut',
            data: data31,

            options: {
                responsive: true,
                cutout: 55,
                tooltips: {
                    position: 'nearest',
                    yAlign: 'bottom'
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: false,
                        text: 'Chart.js polarArea Chart'
                    }
                }
            },
        };
        var mydoughnutchart31 = new Chart(doughnutchart31, mydoughnutchartCofig31);
    </script>

    <!-- Taux de réussite CVthèque vs. sourcing externe -->
    <script>
        var doughnutchart32 = document.getElementById('doughnutchart32').getContext('2d');
        var data32 = {
            labels: ['CVthèque', 'Sourcing externe'],
            datasets: [{
                label: 'Taux en %',
                // data: [300, 150],
                data: [{!! json_encode($stats['internalSuccessRate']) !!}, {!! json_encode($stats['externalSuccessRate']) !!}],
                backgroundColor: ['#D2691E', '#FFD700'],
                borderWidth: 0,
            }]
        };
        var mydoughnutchartCofig32 = {
            type: 'doughnut',
            data: data32,

            options: {
                responsive: true,
                cutout: 55,
                tooltips: {
                    position: 'nearest',
                    yAlign: 'bottom'
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: false,
                        text: 'Chart.js polarArea Chart'
                    }
                }
            },
        };
        var mydoughnutchart32 = new Chart(doughnutchart32, mydoughnutchartCofig32);
    </script>

    <!-- Taux de Performance des canaux de sourcing -->
    <script>
        var areachartblue = document.getElementById('areachartblue2').getContext('2d');
        var gradientblue = areachartblue.createLinearGradient(0, 0, 0, 195);
        gradientblue.addColorStop(0, 'rgba(1, 94, 194, 1)');
        gradientblue.addColorStop(1, 'rgba(0, 197, 221, 0.1)');
        var gradientred1 = areachartblue.createLinearGradient(0, 0, 0, 190);
        gradientred1.addColorStop(0, 'rgba(240, 61, 79, 1)');
        gradientred1.addColorStop(1, 'rgba(255, 223, 220, 0.3)');
        var gradientgreen1 = areachartblue.createLinearGradient(0, 0, 0, 195);
        gradientgreen1.addColorStop(0, 'rgba(145, 195, 0, 1)');
        gradientgreen1.addColorStop(1, 'rgba(176, 197, 0, 0.1)');
        var myareachartblue = {
            type: 'bar',
            data: {
                labels: {!! json_encode($stats['labels_for_sourcing_performance_chart']) !!},
                datasets: [{
                    label: "{{ __('generated.Candidatures') }}",
                    data: {!! json_encode($stats['sourcingPerformance']) !!},
                    radius: 2,
                    pointBackgroundColor: '#ffffff',
                    backgroundColor: gradientblue,
                    borderColor: 'rgba(1, 94, 194, 0.4)',
                    borderWidth: 1,
                    borderRadius: 15,
                    fill: true,
                    tension: 0.0,
                    barThickness: 25
                }]
            },
            options: {
                layout: {
                    padding: 0,
                },
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        display: true,
                        beginAtZero: true,
                        grid: {
                            display: false // Removes vertical grid lines
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        display: true,
                        beginAtZero: false,
                    }
                }
            }
        }
        var myAreaChartblue = new Chart(areachartblue, myareachartblue);
    </script>

{{-- Recrutement par secteur --}}
<script>

    var missionsByActivityAreaPercentagesCurrent = {!! json_encode($stats['missionsByActivityAreaPercentagesCurrent']) !!};
    var labels = Object.keys(missionsByActivityAreaPercentagesCurrent);
    var dataValues = Object.values(missionsByActivityAreaPercentagesCurrent);

        var doughnutchart = document.getElementById('doughnutchart').getContext('2d');
        var data = {
            labels: labels,
            datasets: [{
                label: "{{ __('generated.Expense categories') }}",
                data: dataValues,
                backgroundColor: ['#8DB600', '#FF8C00', '#4682B4', '#D2691E', '#708090',
                    '#FFD700', '#FF4500', '#9932CC', '#32CD32', '#1E90FF', '#FF69B4',
                    '#556B2F', '#F4A460', '#8B0000', '#B22222', '#800080', '#A9A9A9',
                    '#008080', '#20B2AA', '#2F4F4F', '#FF6347', '#4682B4', '#6495ED',
                    '#4169E1', '#6A5ACD', '#FF7F50', '#8B4513'
                ],
                borderWidth: 0,
            }]
        };
        var mydoughnutchartCofig = {
            type: 'doughnut',
            data: data,

            options: {
                responsive: true,
                cutout: 55,
                tooltips: {
                    position: 'nearest',
                    yAlign: 'bottom'
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: false,
                        text: 'Chart.js polarArea Chart'
                    }
                }
            },
        };
        var mydoughnutchart = new Chart(doughnutchart, mydoughnutchartCofig);
    </script>

    {{-- Recrutement par région --}}
    <script>
        var doughnutchart2 = document.getElementById('doughnutchart2').getContext('2d');
        var data2 = {
            // labels: ['Tanger-Tétouan-Al Hoceïma', 'Oriental', 'Fès-Meknès', 'Rabat-Salé-Kénitra', 'Béni Mellal-Khénifra',
            //     'Casablanca-Settat', 'Marrakech-Safi', 'Drâa-Tafilalet', 'Souss-Massa',
            //     'Guelmim-Oued Noun', 'Laâyoune-Sakia El Hamra', 'Dakhla-Oued Ed-Dahab'
            // ],
            labels: {!! json_encode($stats['labels_region']) !!},
            datasets: [{
                label: 'Expense categories',
                // data: [40, 10, 15, 25, 10, 30, 20, 10, 27,40, 10, 15],
                data: {!! json_encode($stats['percentages_data_region']) !!},
                backgroundColor: ['#1E90FF', '#FF4500', '#8A2BE2', '#32CD32', '#FFD700',
                    '#FF6347', '#FF8C00', '#8B4513', '#20B2AA', '#6A5ACD', '#2F4F4F',
                    '#4682B4'
                ],
                borderWidth: 0,
            }]
        };
        var mydoughnutchartCofig2 = {
            type: 'doughnut',
            data: data2,

            options: {
                responsive: true,
                cutout: 55,
                tooltips: {
                    position: 'nearest',
                    yAlign: 'bottom'
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: false,
                        text: 'Chart.js polarArea Chart'
                    }
                }
            },
        };
        var mydoughnutchart2 = new Chart(doughnutchart2, mydoughnutchartCofig2);
    </script>

    {{-- Recrutement par poste --}}
    <script>
        var missionsByTitle = {!! json_encode($stats['missionsByTitle']) !!};
        var labels = Object.keys(missionsByTitle);
        var dataValues = Object.values(missionsByTitle);

        var doughnutchart3 = document.getElementById('doughnutchart3').getContext('2d');
        var data3 = {
            labels: labels,
            datasets: [{
                label: 'Expense categories',
                data: dataValues,
                backgroundColor: ['#1E90FF', '#8A2BE2', '#FF4500', '#32CD32', '#FFD700',
                    '#6495ED', '#8B0000', '#20B2AA', '#FF6347', '#6A5ACD', '#708090', '#4169E1',
                    '#FF8C00', '#FF69B4', '#4682B4', '#8B4513', '#9932CC', '#2F4F4F', '#F4A460', '#FF7F50'
                ],
                borderWidth: 0,
            }]
        };
        var mydoughnutchartCofig3 = {
            type: 'doughnut',
            data: data3,
            options: {
                responsive: true,
                cutout: 55,
                tooltips: {
                    position: 'nearest',
                    yAlign: 'bottom'
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: false,
                        text: 'Chart.js polarArea Chart'
                    }
                }
            },
        };
        var mydoughnutchart3 = new Chart(doughnutchart3, mydoughnutchartCofig3);
    </script>

    {{-- Diversité et inclusion --}}
    <script>
        var doughnutchart5 = document.getElementById('doughnutchart5').getContext('2d');
        var data5 = {
            // labels: ['Homme', 'Femme'],
            labels: ["{{ __('generated.Homme') }}", "{{ __('generated.Femme') }}"],
            datasets: [{
                label: 'Expense categories',
                // data: [60, 40,],
                data: [{!! json_encode($stats['malePercentage']) !!}, {!! json_encode($stats['femalePercentage']) !!}],
                backgroundColor: ['#32CD32', '#8A2BE2'],
                borderWidth: 0,
            }]
        };
        var mydoughnutchartCofig5 = {
            type: 'doughnut',
            data: data5,
            options: {
                responsive: true,
                cutout: 55,
                tooltips: {
                    position: 'nearest',
                    yAlign: 'bottom'
                },
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: false,
                        text: 'Chart.js polarArea Chart'
                    }
                }
            },
        };
        var mydoughnutchart5 = new Chart(doughnutchart5, mydoughnutchartCofig5);
    </script>

    {{-- Taux de conversion Candidature / Entretien --}}
    <script>
        'use strict'
        $(window).on('load', function() {
            /* chart js areachart */
            window.randomScalingFactor = function() {
                return Math.round(Math.random() * 20);
            }
            window.randomScalingFactor2 = function() {
                return Math.round(Math.random() * 10);
            }
            var areachartblue = document.getElementById('areachartblue1').getContext('2d');
            var gradientblue = areachartblue.createLinearGradient(0, 0, 0, 195);
            gradientblue.addColorStop(0, 'rgba(1, 94, 194, 1)');
            gradientblue.addColorStop(1, 'rgba(0, 197, 221, 0.1)');
            var gradientred1 = areachartblue.createLinearGradient(0, 0, 0, 190);
            gradientred1.addColorStop(0, 'rgba(240, 61, 79, 1)');
            gradientred1.addColorStop(1, 'rgba(255, 223, 220, 0.3)');
            var gradientgreen1 = areachartblue.createLinearGradient(0, 0, 0, 195);
            gradientgreen1.addColorStop(0, 'rgba(145, 195, 0, 1)');
            gradientgreen1.addColorStop(1, 'rgba(176, 197, 0, 0.1)');
            var myareachartblue = {
                type: 'bar',
                data: {
                    labels: {!! json_encode($stats['months']) !!},
                    labels: [
                        "{{ __('generated.Jan.') }}", "{{ __('generated.Fév.') }}", "{{ __('generated.Mars') }}", "{{ __('generated.Avr.') }}",
                        "{{ __('generated.Mai') }}", "{{ __('generated.Juin') }}", "{{ __('generated.Jul.') }}", "{{ __('generated.Août') }}",
                        "{{ __('generated.Sep.') }}", "{{ __('generated.Oct.') }}", "{{ __('generated.Nov.') }}", "{{ __('generated.Déc.') }}"
                    ],
                    datasets: [{
                        label: "{{ __('generated.Candidatures') }}",
                        data: {!! json_encode($stats['candidatures']) !!},
                        radius: 2,
                        pointBackgroundColor: '#ffffff',
                        backgroundColor: gradientgreen1,
                        borderColor: '#91C300',
                        borderWidth: 1,
                        borderRadius: 15,
                        fill: true,
                        tension: 0.0,
                        barThickness: 25
                    }, {
                        label: "{{ __('generated.Entretiens') }}",
                        data: {!! json_encode($stats['entretiens']) !!},
                        radius: 2,
                        pointBackgroundColor: '#ffffff',
                        backgroundColor: gradientblue,
                        borderColor: 'rgba(1, 94, 194, 0.4)',
                        borderWidth: 1,
                        borderRadius: 15,
                        fill: true,
                        tension: 0.0,
                        barThickness: 25
                    }]
                },
                options: {
                    layout: {
                        padding: 0,
                    },
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        y: {
                            display: true,
                            beginAtZero: true,
                            grid: {
                                display: false // Removes vertical grid lines
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            display: true,
                            beginAtZero: false,
                        }
                    }
                }
            }
            var myAreaChartblue = new Chart(areachartblue, myareachartblue);


            /* circular progress */
            var tauxEntretien = {!! json_encode($stats['tauxCandidatureEntretien']) !!} / 100; // Convertir en fraction (0.80 pour 80%)

            var progressCirclesblue1 = new ProgressBar.Circle(circleprogressblue1, {
                color: '#015EC2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: 'rgba(1, 94, 194, 0.1)',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015EC2',
                    width: 10
                },
                to: {
                    color: '#015EC2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    // Si le taux est trop petit (ex: 0.0027 arrondi à 0), afficher "~0.1%" au lieu de "0%"
                    if (value === 0 && circle.value() > 0) {
                        circle.setText("0.1%");
                    } else {
                        circle.setText(value + "<small>%</small>");
                    }
                }
            });
            progressCirclesblue1.animate(tauxEntretien);

            /* circular progress */
            var tauxEntretienOffre = {!! json_encode($stats['tauxEntretienOffre']) !!} / 100;
            var progressCirclesblue2 = new ProgressBar.Circle(circleprogressblue2, {
                color: '#78c300',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: 'rgba(120, 195, 0, 0.15)',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#78c300',
                    width: 10
                },
                to: {
                    color: '#78c300',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText("0%"); // Afficher "0%" au lieu de laisser vide
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesblue1.text.style.fontSize = '20px';
            progressCirclesblue2.animate(tauxEntretienOffre); // Number from 0.0 to 1.0


            /* circular progress */
            var tauxPreSelection = {!! json_encode($stats['tauxPreSelection']) !!} / 100;
            var progressCirclesblue4 = new ProgressBar.Circle(circleprogressblue4, {
                color: '#fdba00',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: 'rgba(255, 200, 0, 0.3)',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#fdba00',
                    width: 10
                },
                to: {
                    color: '#fdba00',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText("0%");
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesblue1.text.style.fontSize = '20px';
            progressCirclesblue4.animate(tauxPreSelection); // Number from 0.0 to 1.0

            /* circular progress */
            var tauxOfferAccepted = {!! json_encode($stats['tauxOfferAccepted']) !!} / 100;
            var progressCirclesblue3 = new ProgressBar.Circle(circleprogressblue3, {
                color: '#dd2739',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: 'rgba(255, 0, 43, 0.2)',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#dd2739',
                    width: 10
                },
                to: {
                    color: '#dd2739',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText("0%");
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesblue1.text.style.fontSize = '20px';
            progressCirclesblue3.animate(tauxOfferAccepted); // Number from 0.0 to 1.0
        });
    </script>

    {{-- Qualité d’embauche --}}
    <script>
        var areachartblue = document.getElementById('areachartblue3').getContext('2d');
        var gradientblue = areachartblue.createLinearGradient(0, 0, 0, 195);
        gradientblue.addColorStop(0, 'rgba(1, 94, 194, 1)');
        gradientblue.addColorStop(1, 'rgba(0, 197, 221, 0.1)');
        var gradientred1 = areachartblue.createLinearGradient(0, 0, 0, 190);
        gradientred1.addColorStop(0, 'rgba(240, 61, 79, 1)');
        gradientred1.addColorStop(1, 'rgba(255, 223, 220, 0.3)');
        var gradientgreen1 = areachartblue.createLinearGradient(0, 0, 0, 195);
        gradientgreen1.addColorStop(0, 'rgba(145, 195, 0, 1)');
        gradientgreen1.addColorStop(1, 'rgba(176, 197, 0, 0.1)');
        var myareachartblue = {
            type: 'line',
            data: {
                labels: {!! json_encode($stats['labels_qualite_embauche']) !!},
                datasets: [{
                    label: "{{ __('generated.Taux en %') }}",
                    data: {!! json_encode($stats['data_qualite_embauche']) !!},
                    radius: 2,
                    pointBackgroundColor: '#ffffff',
                    backgroundColor: gradientgreen1,
                    borderColor: '#91C300',
                    borderWidth: 1,
                    borderRadius: 15,
                    fill: true,
                    tension: 0.0,
                    barThickness: 25
                }]
            },
            options: {
                layout: {
                    padding: 0,
                },
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        display: true,
                        beginAtZero: true,
                        grid: {
                            display: false // Removes vertical grid lines
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        display: true,
                        beginAtZero: false,
                    }
                }
            }
        }
        var myAreaChartblue = new Chart(areachartblue, myareachartblue);
    </script>

    <script type="text/javascript">
        'use strict'
        $(window).on('load', function() {

            $('.show-row1-action').on('click', function() {
                $('.row-1-all').addClass('hidden');
                $('.row-1-action').removeClass('hidden');
                $('.offres-table').addClass('hidden');
                $('.Integrale').removeClass('hidden');
            })
            $('.close-row-1').on('click', function() {
                $('.row-1-all').removeClass('hidden');
                $('.row-1-action').addClass('hidden');
            });
            $('#myTab button').on('click', function() {
                var id = $(this).attr('id');
                if (id == "planner1-tab") {
                    $('#tab1-title').html('{{ __("generated.CVthèque") }}');
                    $('#tab1-icon').html('<i class="bi bi-database h5"></i>');
                }
                if (id == "planner2-tab") {
                    $('#tab1-title').html('{{ __("generated.Profils actifs") }}');
                    $('#tab1-icon').html('<i class="bi bi-people h5"></i>');
                }
                if (id == "posts3-tab") {
                    $('#tab1-title').html('{{ __("generated.Profils qualifiés") }}');
                    $('#tab1-icon').html('<i class="bi bi-person-check h5"></i>');
                }
                if (id == "posts4-tab") {
                    $('#tab1-title').html('{{ __("generated.Profils pertinents") }}');
                    $('#tab1-icon').html('<i class="bi bi-person-check-fill h5"></i>');
                }
                // if (id == "planner1-tab") {
                //     $('#tab1-title').html('CVthèque');
                //     $('#tab1-icon').html('<i class="bi bi-database h5"></i>');
                // }
                // if (id == "planner2-tab") {
                //     $('#tab1-title').html('Profils actifs');
                //     $('#tab1-icon').html('<i class="bi bi-people h5"></i>');
                // }
                // if (id == "posts3-tab") {
                //     $('#tab1-title').html('Profils qualifiés');
                //     $('#tab1-icon').html('<i class="bi bi-person-check h5"></i>');
                // }
                // if (id == "posts4-tab") {
                //     $('#tab1-title').html('Profils pertinents');
                //     $('#tab1-icon').html('<i class="bi bi-person-check-fill h5"></i>');
                // }
            })
        })
    </script>

{{-- Full Screen :: charts modals --}}
<script>

    /*
    **
    *
    *  => Requrements :
    *
    *       - the modal should contain a unique ID
    *
    *
    *
    *
    *  => btn full screen example
    *
    *       - <a href="#" type="button" class="btn btn-link btn-square fullscreen-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Fullscreen" title="Go Fullscreen"> <i class="bi bi-fullscreen" style="font-size: 20px;"></i> </a>
    *
    */

    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.fullscreen-toggle').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const modalDialog = btn.closest('.modal').querySelector('.modal-dialog');

                if (!document.fullscreenElement) {
                    modalDialog.requestFullscreen().then(() => {
                        modalDialog.classList.add('fullscreen-modal');
                    }).catch(err => {
                        alert("Erreur lors du passage en plein écran ! Veuillez réessayer SVP.");
                        console.error("Erreur lors du passage en plein écran : " + err.message);
                    });
                } else {
                    document.exitFullscreen().then(() => {
                        modalDialog.classList.remove('fullscreen-modal');
                    });
                }
            });
        });

        document.addEventListener('fullscreenchange', function () {
            document.querySelectorAll('.modal-dialog').forEach(dialog => {
                if (!document.fullscreenElement) {
                    dialog.classList.remove('fullscreen-modal');
                }
            });
        });

        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('hidden.bs.modal', function () {
                if (document.fullscreenElement) {
                    document.exitFullscreen().catch(err => {
                        alert("Erreur lors de la sortie du mode plein écran! Veuillez clicker sur 'Echap'.");
                        console.error("Erreur lors de la sortie du mode plein écran : " + err.message);
                    });
                }
            });
        });

    });



</script>

@endsection
