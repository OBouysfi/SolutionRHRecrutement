@extends('layouts.master')

@section('title', __('generated.Indicateurs offre d\'emploi'))

@section('css_header')

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
</style>

@endsection

@section('content')

    <!-- Begin page content -->
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Indicateurs clés") }}</h5>
                </div>

                <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <form id="date-range-form" method="GET" action="{{ route('jobOffer.indicators') }}">
                            <input type="hidden" name="start_date" id="start_date">
                            <input type="hidden" name="end_date" id="end_date">
                            <div class="input-group input-group-md">
                                <input type="text" class="form-control bg-none px-0" value="" id="dashboard-date-filter" />
                                <span class="input-group-text text-secondary bg-none" id="titlecalandershow">
                                    <i class="bi bi-calendar-event"></i>
                                </span>
                            </div>

                            <input type="hidden" name="country" value="{{ request('country') }}">
                            <input type="hidden" name="city" value="{{ request('city') }}">
                            <input type="hidden" name="client" value="{{ request('client') }}">
                            <input type="hidden" name="activity_area" value="{{ request('activity_area') }}">
                            <input type="hidden" name="job_offre" value="{{ request('job_offre') }}">
                        </form>
                        <!-- <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" name="test"/>
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span> -->
                    </div>
                </div>

            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Mission") }}</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">
            {{-- star filter --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body filter-block">
                                            <form id="filter-form" method="GET" action="{{ route('jobOffer.indicators') }}">
                                                <div class="row justify-content-center mt-2">

                                                    <input type="hidden" name="start_date" id="start_date" value="{{ request('start_date') }}">
                                                    <input type="hidden" name="end_date" id="end_date" value="{{ request('end_date') }}">

                                                    <!-- Pays -->
                                                    <div class="col-12 col-md-2 col-lg-3 mb-2">
                                                        <div class="form-group check-valid is-valid">
                                                            <div id="country-selector" class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                                                <label >{{ __("generated.Pays") }}</label>
                                                                <select class="chosenoptgroup w-100" id="filter-pays" name="country" onchange="this.form.submit();">
                                                                    <option  value="all">{{ __("generated.Tous") }}</option>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ __($country->id) }}"
                                                                            data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png"
                                                                            {{ request('country') == $country->id ? 'selected' : '' }}>
                                                                            <span class=" translated_text">{{ __($country->name) }}</span>
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Ville -->
                                                    <div class="col-12 col-md-2 col-lg-3 mb-2">
                                                        <div class="form-group check-valid is-valid">
                                                            <div class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                                                <label >{{ __("generated.Ville") }}</label>
                                                                <select class="chosenoptgroup w-100" id="filter-ville" name="city" onchange="this.form.submit();">
                                                                    <option  value="all">{{ __("generated.Tous") }}</option>
                                                                    @if (isset($cities))
                                                                        @foreach ($cities as $city)
                                                                            <option class=" translated_text" value="{{ __($city->id) }}"
                                                                                data-country="{{ $city->country?->id ?? '' }}"
                                                                                {{ request('city') == $city->id ? 'selected' : '' }}>
                                                                                {{ __($city->name ?? '_' )}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Client -->
                                                    <div class="col-12 col-md-2 col-lg-2 mb-2">
                                                        <div class="form-group check-valid is-valid">
                                                            <div class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                                                <label >{{ __("generated.Client") }}</label>
                                                                <select class="chosenoptgroup w-100" id="filter-client" name="client" onchange="this.form.submit();">
                                                                    <option  value="all">{{ __("generated.Tous") }}</option>
                                                                    @foreach ($clients as $client)
                                                                        <option class=" translated_text" value="{{ __($client->id) }}" {{ request('client') == $client->id ? 'selected' : '' }}>
                                                                            {{ $client->name ?? ' - ' }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Secteur d’activité -->
                                                    <div class="col-12 col-md-2 col-lg-2 mb-2">
                                                        <div class="form-group check-valid is-valid">
                                                            <div class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                                                <label >{{ __("generated.Secteur d’activité") }}</label>
                                                                <select class="chosenoptgroup w-100" id="activity_area_id" name="activity_area" onchange="this.form.submit();">
                                                                    <option  value="all">{{ __("generated.Tous") }}</option>
                                                                    @foreach ($activityAreas as $activityArea)
                                                                        <option class=" translated_text" value="{{ __($activityArea->id) }}" {{ request('activity_area') == $activityArea->id ? 'selected' : '' }}>
                                                                            {{ $activityArea->label ?? ' - ' }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Offre d'emploi -->
                                                    <div class="col-12 col-md-2 col-lg-2 mb-2">
                                                        <div class="form-group check-valid is-valid">
                                                            <div class="custom-multiple-select rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                                                <label >{{ __("generated.Offre d'emploi") }}</label>
                                                                <select class="chosenoptgroup w-100" id="job_offre" name="job_offre" onchange="this.form.submit();">
                                                                    <option  value="all">{{ __("generated.Tous") }}</option>
                                                                    @foreach ($jobOffers as $jobOffer)
                                                                        <option class=" translated_text" value="{{ __($jobOffer->id) }}" {{ request('job_offre') == $jobOffer->id ? 'selected' : '' }}>
                                                                            {{ $jobOffer->title ?? ' - ' }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end filter --}}

            <div class="row mb-4">
                {{-- Star for Nombre total de missions --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Nombre total de missions") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots" style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="padding: 0;min-width: 76px;margin-top: 0;" data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#total_mission_par_client" class="modal-click-show dropdown-item" style="cursor: pointer">
                                                                    {{ __("generated.Détail") }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle" style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light" style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)" data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p style="text-align: justify;width: 451px;padding: 2px 10px 6px 6px">
                                                                    <ul>
                                                                        <li >{{ __("generated.Correspond au nombre de recrutements (ou “missions”) lancés sur une période donnée (par exemple, un mois, un trimestre ou une année).") }}</li>
                                                                        <li >{{ __("generated.Chaque “mission” peut se définir comme un poste à pourvoir, avec éventuellement plusieurs ouvertures pour des postes identiques (dans le cas de recrutements en volume).") }}</li>
                                                                    </ul>
                                                                </p>
                                                                <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function">
                                                                            <span class="katex-mathml">
                                                                                <math xmlns="http://www.w3.org/1998/Math/MathML" display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <mtext>
                                                                                                Nombre&nbsp;total&nbsp;de&nbsp;missions
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <munder>
                                                                                                <mo>∑</mo>
                                                                                                <mrow>
                                                                                                    <mi>m</mi>
                                                                                                    <mo>∈</mo>
                                                                                                    <mi>M</mi>
                                                                                                </mrow>
                                                                                            </munder>
                                                                                            <msub>
                                                                                                <mi>I</mi>
                                                                                                <mrow>
                                                                                                    <mo stretchy="false">{
                                                                                                    </mo>
                                                                                                    <mi>m</mi>
                                                                                                    <mrow>
                                                                                                        <mtext>
                                                                                                            &nbsp;ouverte&nbsp;ou&nbsp;cl
                                                                                                        </mtext>
                                                                                                        <mover
                                                                                                            accent="true">
                                                                                                            <mtext>o</mtext>
                                                                                                            <mo>ˆ</mo>
                                                                                                        </mover>
                                                                                                        <mtext>tur</mtext>
                                                                                                        <mover
                                                                                                            accent="true">
                                                                                                            <mtext>e</mtext>
                                                                                                            <mo>ˊ</mo>
                                                                                                        </mover>
                                                                                                        <mtext>
                                                                                                            e&nbsp;durant&nbsp;la&nbsp;p
                                                                                                        </mtext>
                                                                                                        <mover
                                                                                                            accent="true">
                                                                                                            <mtext>e</mtext>
                                                                                                            <mo>ˊ</mo>
                                                                                                        </mover>
                                                                                                        <mtext>riode</mtext>
                                                                                                    </mrow>
                                                                                                    <mo stretchy="false">}
                                                                                                    </mo>
                                                                                                </mrow>
                                                                                            </msub>
                                                                                            <mi mathvariant="normal">.</mi>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Nombre total de missions}
                                                                                            = \sum_{m \in M} I_{\{m \text{
                                                                                            ouverte ou clôturée durant la
                                                                                            période}\}}.</annotation>
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
                                                <div class="d-none">
                                                    <canvas id="areachartblue1"></canvas>
                                                    <div id="circleprogressgreen1"></div>
                                                    <div id="circleprogressred1"></div>
                                                    <div id="circleprogressblue1"></div>
                                                    <div id="circleprogressblue3"></div>
                                                    <div id="circleprogressblue2"></div>
                                                    <div id="circleprogressblue4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end for Nombre total de missions --}}

                {{-- star for Nombre de candidatures par offre --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Nombre de candidatures par offre") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#total_applications_by_offer"
                                                                    class="modal-click-show dropdown-item "
                                                                    style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 2px 10px 6px 6px">
                                                                <ul>
                                                                    <li >{{ __("generated.Indique le volume de candidatures reçues en moyenne pour chaque offre de poste publiée.") }}</li>
                                                                    <li >{{ __("generated.Permet de mesurer l’attractivité de l’offre et l’efficacité du sourcing (canaux de diffusion, marque employeur, etc.).") }}</li>
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
                                                                                </math></span>
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
                {{-- end for Nombre de candidatures par offre --}}
            </div>


            <div class="row mb-4">
                {{-- star for Taux d'acceptation d'offre --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Taux d'acceptation d'offre") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#taux_acceptation_offre" class="modal-click-show dropdown-item " style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 2px 10px 6px 6px">
                                                                <ul>
                                                                    <li >{{ __("generated.Pourcentage d’offres d’embauche acceptées par les candidats par rapport au nombre total d’offres faites (propositions salariales, conditions contractuelles, etc.).") }}</li>
                                                                    <li >{{ __("generated.Permet d’évaluer l’adéquation de la proposition (salaire, avantages, mission) avec les attentes du marché et des candidats.") }}</li>
                                                                </ul>
                                                                </p>
                                                                <span style="font-weight: 700">Formule :</span>
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
                                                                                                Taux&nbsp;d’acceptation&nbsp;d’offre
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;d’offres&nbsp;accept
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>es</mtext>
                                                                                                </mrow>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;total&nbsp;d’offres&nbsp;
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>mises</mtext>
                                                                                                </mrow>
                                                                                            </mfrac>
                                                                                            <mo>×</mo>
                                                                                            <mn>100</mn>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Taux d'acceptation
                                                                                            d'offre}
                                                                                            = \frac{\text{Nombre d'offres
                                                                                            acceptées}}{\text{Nombre total
                                                                                            d'offres émises}} \times 100
                                                                                        </annotation>
                                                                                    </semantics>
                                                                                </math>
                                                                            </span>
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
                                                <canvas id="areachartblue22"></canvas>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end for Taux d'acceptation d'offre --}}

                {{-- Star for Taux de matching (Profil / Offre) --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Taux de matching (Profil / Offre)") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#total_taux_matching" class="modal-click-show dropdown-item " style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 2px 10px 6px 6px">
                                                                <ul>
                                                                    <li >{{ __("generated.Mesure le degré d’adéquation entre le profil des candidats et les exigences d’un poste.") }}</li>
                                                                    <li >{{ __("generated.Généralement évalué en amont (par exemple, via un scoring automatisé ou un tri manuel) pour voir la pertinence des candidatures reçues.") }}</li>
                                                                </ul>
                                                                </p>
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
                                                                                                Taux&nbsp;de&nbsp;matching
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;de&nbsp;candidatures&nbsp;r
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>
                                                                                                        pondant&nbsp;au&nbsp;crit
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˋ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>re&nbsp;minimal
                                                                                                    </mtext>
                                                                                                </mrow>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;total&nbsp;de&nbsp;candidatures
                                                                                                </mtext>
                                                                                            </mfrac>
                                                                                            <mo>×</mo>
                                                                                            <mn>100</mn>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Taux de matching}
                                                                                            = \frac{\text{Nombre de
                                                                                            candidatures répondant au
                                                                                            critère minimal}}{\text{Nombre
                                                                                            total de candidatures}} \times
                                                                                            100</annotation>
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
                                                <div class="col-12">
                                                    <div class="doughnutchart mb-4 mt-4">
                                                        <canvas id="doughnutchart2"></canvas>
                                                        <div class="countvalue shadow">
                                                            <div class="w-100">
                                                                <h5 class="mb-1" style="font-size: 17px"><span >{{ __("generated.Total") }}</span> <br> {{ __($matchingRate['totalMatchingRate']) }}
                                                                    @if($matchingRate['evolutionRate'] > 0)
                                                                        <span class="text-green" style="color: #558706 !important; font-size: 12px; font-weight: 100;">
                                                                            <i class="bi bi-arrow-up fs-10"></i> {{ round($matchingRate['evolutionRate'], 2) }}%
                                                                        </span>

                                                                    @elseif($matchingRate['evolutionRate'] < 0)
                                                                        <span class="text-green" style="color: #fd000d !important; font-size: 12px; font-weight: 100;">
                                                                            <i class="bi bi-arrow-down fs-10"></i> {{ round(abs($matchingRate['evolutionRate']), 2) }}%
                                                                        </span>

                                                                    @elseif($matchingRate['evolutionRate'] == 0 && $matchingRate['previousTotalMatchingRate'] != 0)
                                                                        <span class="text-blue" style="font-size: 12px; font-weight: 100;">
                                                                            <i class="bi bi-arrows-collapse fs-10"></i> 0%
                                                                        </span>

                                                                    @else
                                                                        <span style="font-size: 15px; font-weight: 100;">
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
                {{-- End for Taux de matching (Profil / Offre) --}}
            </div>

            <div class="row mb-4">
                {{-- star for Taux de conversion Candidatures vers shortlist --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Taux de conversion Candidatures vers shortlist") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#ModalConversionShortlist" class="modal-click-show dropdown-item " style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 2px 10px 6px 6px">
                                                                <ul>
                                                                    <li >{{ __("generated.Pourcentage de candidats sélectionnés en shortlist (liste restreinte de candidats jugés pertinents pour un entretien ou un second tour) par rapport au nombre total de candidatures initiales.") }}</li>
                                                                </ul>
                                                                </p>
                                                                <span style="font-weight: 700" >{{ __("generated.Formule :") }}</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_text"><span
                                                                                class="katex-mathml"><math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <mtext>
                                                                                                Taux&nbsp;de&nbsp;conversion&nbsp;(Candidatures&nbsp;→&nbsp;Shortlist)
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;de&nbsp;candidats&nbsp;en&nbsp;shortlist
                                                                                                </mtext>
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
                                                                                            (Candidatures → Shortlist)}
                                                                                            = \frac{\text{Nombre de
                                                                                            candidats en
                                                                                            shortlist}}{\text{Nombre total
                                                                                            de candidatures reçues}} \times
                                                                                            100</annotation>
                                                                                    </semantics>
                                                                                </math>
                                                                            </span>
                                                                        </span></span>
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
                                                <canvas id="areachartblue4"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end for Taux de conversion Candidatures vers shortlist --}}

                {{-- star for Taux de conversion shortlist vers embauches --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Taux de conversion shortlist vers embauches") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#ModalConversionShortlistForEmbauches" class="modal-click-show dropdown-item " style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 2px 10px 6px 6px">
                                                                <ul>
                                                                    <li >{{ __("generated.Pourcentage de candidats finalement embauchés parmi ceux qui avaient été sélectionnés en shortlist.") }}</li>
                                                                    <li >{{ __("generated.Indicateur crucial pour mesurer la pertinence de la pré-sélection et l’efficacité des entretiens.") }}</li>
                                                                </ul>
                                                                </p>
                                                                <span style="font-weight: 700">Formule :</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_function"><span
                                                                                class="katex-mathml"><math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <mtext>
                                                                                                Taux&nbsp;de&nbsp;conversion&nbsp;(Shortlist&nbsp;→&nbsp;Embauches)
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;de&nbsp;candidats&nbsp;embauch
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>s</mtext>
                                                                                                </mrow>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;total&nbsp;de&nbsp;candidats&nbsp;en&nbsp;shortlist
                                                                                                </mtext>
                                                                                            </mfrac>
                                                                                            <mo>×</mo>
                                                                                            <mn>100</mn>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Taux de conversion
                                                                                            (Shortlist → Embauches)}
                                                                                            = \frac{\text{Nombre de
                                                                                            candidats
                                                                                            embauchés}}{\text{Nombre total
                                                                                            de candidats en shortlist}}
                                                                                            \times 100</annotation>
                                                                                    </semantics>
                                                                                </math>
                                                                            </span>
                                                                        </span></span>
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
                                                <canvas id="areachartblue5"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end for Taux de conversion shortlist vers embauches --}}
            </div>

            <div class="row mb-4">
                {{-- star for Taux d'acceptation d'offre --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Taux d'acceptation d'offre") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#Modal_Taux_Acceptation_Offre_Demi_Cercles" class="modal-click-show dropdown-item " style="cursor: pointer">{{ __("generated.Détail") }}</a>

                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 6px 10px 6px 6px" >{{ __("generated.Le Taux d’acceptation d’offre (Offer Acceptance Rate) représente la proportion d’offres d’embauche acceptées par rapport au nombre total d’offres émises. Il reflète l’attractivité de la proposition (rémunération, conditions de travail, perspectives d’évolution) et mesure dans quelle mesure celle-ci correspond aux attentes des candidats et aux exigences du marché.") }}</p>
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
                                                                                                Taux&nbsp;d’acceptation&nbsp;d’offre
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;d’offres&nbsp;accept
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>es</mtext>
                                                                                                </mrow>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;total&nbsp;d’offres&nbsp;
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>mises</mtext>
                                                                                                </mrow>
                                                                                            </mfrac>
                                                                                            <mo>×</mo>
                                                                                            <mn>100</mn>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Taux d’acceptation
                                                                                            d’offre}
                                                                                            = \frac{\text{Nombre d'offres
                                                                                            acceptées}}{\text{Nombre total
                                                                                            d'offres émises}} \times 100
                                                                                        </annotation>
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
                                            <div class="row justify-content-center" style="height: 236px;">
                                                <div class="col-12">
                                                    <div id="gauge-container"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end for Taux d'acceptation d'offre --}}

                {{-- star for Taux d'abandon en cours de process --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Taux d'abandon en cours de process") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#ModalAbandonEnCoursProcess" class="modal-click-show dropdown-item " style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 2px 10px 6px 6px">
                                                                <ul>
                                                                    <li >{{ __("generated.Pourcentage de candidats qui se retirent ou ne donnent plus suite à un moment quelconque du processus de recrutement (après candidature, entre deux entretiens, avant la proposition finale, etc.).") }}</li>
                                                                </ul>
                                                                </p>
                                                                <span style="font-weight: 700">Formule :</span>
                                                                <div style="margin-bottom: 16px;margin-top: 10px">
                                                                    <span class="katex-display" style="font-size: 12px">
                                                                        <span class="katex translated_text"><span
                                                                                class="katex-mathml"><math
                                                                                    xmlns="http://www.w3.org/1998/Math/MathML"
                                                                                    display="block">
                                                                                    <semantics>
                                                                                        <mrow>
                                                                                            <mtext>Taux&nbsp;d’abandon
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;de&nbsp;candidats&nbsp;qui&nbsp;se&nbsp;sont&nbsp;retir
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>
                                                                                                        s&nbsp;en&nbsp;cours&nbsp;de&nbsp;route
                                                                                                    </mtext>
                                                                                                </mrow>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;total&nbsp;de&nbsp;candidats&nbsp;dans&nbsp;le&nbsp;processus
                                                                                                </mtext>
                                                                                            </mfrac>
                                                                                            <mo>×</mo>
                                                                                            <mn>100</mn>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Taux d’abandon}
                                                                                            = \frac{\text{Nombre de
                                                                                            candidats qui se sont retirés en
                                                                                            cours de route}}{\text{Nombre
                                                                                            total de candidats dans le
                                                                                            processus}} \times 100
                                                                                        </annotation>
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
                                                <canvas id="areachartblue0123"></canvas>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end for Taux d'abandon en cours de process --}}
            </div>

            <div class="row mb-4">
                {{-- star for Performance des canaux de sourcing --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light ">
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
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#ModalPerformanceCanauxSourcing" class="modal-click-show dropdown-item " style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 627px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 600px;padding: 6px 10px 6px 6px" >{{ __("generated.La “Performance des canaux de sourcing” mesure l’efficacité de chaque canal (job boards, réseaux sociaux, cooptation, cabinets, etc.) pour attirer et convertir des candidats en embauches. Elle permet d’identifier les canaux les plus rentables et ceux à améliorer, afin d’optimiser coûts, qualité et rapidité de recrutement.") }}</p>
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
                                                                                                Performance&nbsp;(Taux&nbsp;de&nbsp;conversion&nbsp;canal&nbsp;X)
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;de&nbsp;candidats&nbsp;issus&nbsp;du&nbsp;canal&nbsp;X&nbsp;qui&nbsp;sont&nbsp;embauch
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>s</mtext>
                                                                                                </mrow>
                                                                                                <mtext>
                                                                                                    Nombre&nbsp;total&nbsp;de&nbsp;candidats&nbsp;issus&nbsp;du&nbsp;canal&nbsp;X
                                                                                                </mtext>
                                                                                            </mfrac>
                                                                                            <mo>×</mo>
                                                                                            <mn>100</mn>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Performance (Taux de
                                                                                            conversion canal X)}
                                                                                            = \frac{\text{Nombre de
                                                                                            candidats issus du canal X qui
                                                                                            sont embauchés}}{\text{Nombre
                                                                                            total de candidats issus du
                                                                                            canal X}} \times 100
                                                                                        </annotation>
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
                                                <canvas id="areachartblueL2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end for Performance des canaux de sourcing --}}

                {{-- star for Temps d'embauche --}}
                <div class="col-12 col-md-6 mb-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 theme-blue bg-gradient-theme-light">
                                        <div class="card-header ">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme">
                                                        <i class="bi bi-bar-chart h5"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="fw-medium mb-0 ">{{ __("generated.Temps d'embauche") }}</h5>
                                                </div>
                                                <div class="col-auto ms-auto">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-three-dots"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="padding: 0;min-width: 76px;margin-top: 0;"
                                                            data-bs-popper="static">
                                                            <li>
                                                                <a data-bs-toggle="modal" data-bs-target="#ModalTempsEmbauche" class="modal-click-show dropdown-item " style="cursor: pointer">{{ __("generated.Détail") }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-auto ms-auto" style="margin-left: -20px !important;">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-auto-close="outside" aria-expanded="false">
                                                            <i class="bi bi-info-circle"
                                                                style="font-size: 21px;color: #005dc7;"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end bg-gradient-theme-light "
                                                            style="padding: 0;width: 532px;margin-top: 20px;left: -4px;font-size: 13px;background-color: rgb(155, 221, 246)"
                                                            data-bs-popper="static">
                                                            <li style="padding: 20px;">
                                                                <span style="font-weight: 700" >{{ __("generated.Objectif :") }}</span>
                                                                <p
                                                                    style="text-align: justify;width: 451px;padding: 2px 10px 6px 6px">
                                                                <ul>
                                                                    <li>
                                                                        <span >{{ __("generated.Aussi appelé “Time to Fill” ou “Time to Hire”. Ils’agit du délai moyen entre :") }}</span>
                                                                        <ul>
                                                                            <li>
                                                                                <span >{{ __("generated.Le lancement du recrutement (ex. publication de l’offre, date de demande interne)") }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <span >{{ __("generated.La date d’acceptation de l’offre par le candidat retenu (ou la date d’embauche si on préfère).") }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li>
                                                                        <span >{{ __("generated.Permet de mesurer la rapidité du process et la disponibilité des ressources pour pourvoir un poste.") }}</span>
                                                                    </li>
                                                                </ul>
                                                                </p>
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
                                                                                                Temps&nbsp;d’embauche&nbsp;moyen
                                                                                            </mtext>
                                                                                            <mo>=</mo>
                                                                                            <mfrac>
                                                                                                <mrow>
                                                                                                    <mo>∑</mo>
                                                                                                    <mo stretchy="false">(
                                                                                                    </mo>
                                                                                                    <mtext>
                                                                                                        Date&nbsp;de&nbsp;recrutement&nbsp;final
                                                                                                    </mtext>
                                                                                                    <mo>−</mo>
                                                                                                    <mtext>
                                                                                                        Date&nbsp;de&nbsp;lancement
                                                                                                    </mtext>
                                                                                                    <mo stretchy="false">)
                                                                                                    </mo>
                                                                                                </mrow>
                                                                                                <mrow>
                                                                                                    <mtext>
                                                                                                        Nombre&nbsp;total&nbsp;de&nbsp;recrutements&nbsp;finalis
                                                                                                    </mtext>
                                                                                                    <mover accent="true">
                                                                                                        <mtext>e</mtext>
                                                                                                        <mo>ˊ</mo>
                                                                                                    </mover>
                                                                                                    <mtext>s</mtext>
                                                                                                </mrow>
                                                                                            </mfrac>
                                                                                        </mrow>
                                                                                        <annotation
                                                                                            encoding="application/x-tex">
                                                                                            \text{Temps d'embauche moyen}
                                                                                            = \frac{\sum(\text{Date de
                                                                                            recrutement final} - \text{Date
                                                                                            de lancement})}{\text{Nombre
                                                                                            total de recrutements
                                                                                            finalisés}}</annotation>
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
                                                <canvas id="areachartblue012"></canvas>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end for Temps d'embauche --}}
            </div>
        </div>
    </main>
@endsection

@section('js_footer')
@vite(['resources/js/dashboard/dateFilter.js'])
<script src="{{asset('assets/js/dashboard-custom.js')}}"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>


<script>
    var $chartDetailRoute = "{{ route('indicators.chart_detail') }}";
</script>

{{-- modals --}}
@include('jobOffer.inc.TotalMissionByClient')
@include('jobOffer.inc.TauxAcceptationOffre')
@include('jobOffer.inc.TotalCondidatByMission')
@include('jobOffer.inc.TauxMatching')
@include('jobOffer.inc.ModalConversionShortlist')
@include('jobOffer.inc.ModalConversionShortlistForEmbauches')
@include('jobOffer.inc.Modal_Taux_Acceptation_Offre_Demi_Cercles')
@include('jobOffer.inc.ModalAbandonEnCoursProcess')
@include('jobOffer.inc.ModalPerformanceCanauxSourcing')
@include('jobOffer.inc.ModalTempsEmbauche')


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

{{-- filter country --}}
<script>
    $('#filter-pays').on('change', function () {
        var selectedCountryId = $(this).val();
        $('#filter-ville').val('Tous');

        if (selectedCountryId === 'Tous') {
            $('#filter-ville option').show();
        } else {
            $('#filter-ville option').hide();

            $('#filter-ville option[value="Tous"]').show();  // Toujours afficher l'option "Tous"
            $('#filter-ville option[data-country="' + selectedCountryId + '"]').show();
        }

        $('#filter-ville').trigger("chosen:updated");
    });
</script>

{{-- star for js "Nombre total de missions" --}}
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
            labels: @json($labels_for_total_number_of_missions),
            datasets: [{
                label: 'Mission',
                data: @json($data_for_total_number_of_missions),
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
{{-- end for js "Nombre total de missions" --}}

{{-- star for js "Nombre de candidatures par offre" --}}
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
        type: 'bar',
        data: {
            labels: @json($labels_number_of_applications_per_offer),
            datasets: [{
                label: 'Candidatures',
                data: @json($data_number_of_applications_per_offer),
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
{{-- end for js "Nombre de candidatures par offre" --}}

{{-- star for js "Taux d'acceptation d'offre" par jour --}}
<script>
    var areachartblue23 = document.getElementById('areachartblue22').getContext('2d');
    var gradientblue23 = areachartblue23.createLinearGradient(0, 0, 0, 220);
    gradientblue23.addColorStop(0, 'rgba(1, 94, 194, 0.8)');
    gradientblue23.addColorStop(1, 'rgba(0, 197, 221, 0)');
    var gradientred23 = areachartblue23.createLinearGradient(0, 0, 0, 220);
    gradientred23.addColorStop(1, 'rgba(240, 61, 79, 0.10)');
    gradientred23.addColorStop(0, 'rgba(255, 223, 220, 0)');
    var gradientgreen1 = areachartblue23.createLinearGradient(0, 0, 0, 220);
    gradientgreen1.addColorStop(0, 'rgba(145, 195, 0, 0.5)');
    gradientgreen1.addColorStop(1, 'rgba(176, 197, 0, 0)');
    var myareachartblue23 = {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Offres émises',
                data: @json($offersEmitted),
                radius: 2,
                pointBackgroundColor: '#ffffff',
                backgroundColor: gradientgreen1,
                borderColor: '#91C300',
                borderWidth: 1,
                fill: true,
                tension: 0.00,
            },{
                label: 'Offres acceptées',
                data: @json($offersAccepted),
                radius: 2,
                pointBackgroundColor: '#ffffff',
                backgroundColor: gradientred23,
                borderColor: 'rgba(240, 61, 79, 0.65)',
                borderWidth: 1,
                fill: true,
                tension: 0.00,
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
    var myAreaChartblue23 = new Chart(areachartblue23, myareachartblue23);
</script>
{{-- end for js "Taux d'acceptation d'offre par jour" --}}

{{-- star for Taux de matching (Profil / Offre) --}}
<script>
    var doughnutchart2 = document.getElementById('doughnutchart2').getContext('2d');
    var data2 = {
        // labels: ['Score 80%', 'Score 30%', 'Score 50%', 'Score 70%', 'Score 40%', 'Score 60%', 'Score 90%', 'Score 20%'],
        labels: @json($matchingRate['labels']), // Labels dynamiques (ex: "0-10%", "10-20%")
        datasets: [
            {
                label: 'Taux de matching',
                // data: [40, 10, 15, 25, 10, 30, 20, 10],
                data: @json($matchingRate['counts']), // Données brutes (nombre de correspondances)
                // backgroundColor: ['#1E90FF', '#FF4500', '#8A2BE2', '#32CD32', '#FFD700', '#FF6347', '#FF8C00', '#8B4513'],
                backgroundColor: [
                    '#1E90FF', // Dodger Blue
                    '#FF4500', // Orange Red
                    '#8A2BE2', // Blue Violet
                    '#32CD32', // Lime Green
                    '#FFD700', // Gold
                    '#FF6347', // Tomato
                    '#FF8C00', // Dark Orange
                    '#8B4513', // Saddle Brown
                    '#00CED1', // Dark Turquoise
                    '#DC143C'  // Crimson
                    ],
                borderWidth: 0,
            }
        ]
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
{{-- end for Taux de matching (Profil / Offre) --}}

{{-- star for js "Taux de conversion Candidatures vers shortlist" --}}
<script>
    var areachartblue = document.getElementById('areachartblue4').getContext('2d');
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
                labels: {!! json_encode($labels_for_conversion_chart) !!},
                datasets: [{
                    label: 'Shortlist',
                    data: {!! json_encode($shortlistedApplications) !!},
                    radius: 2,
                    pointBackgroundColor: '#ffffff',
                    backgroundColor: gradientred1,
                    borderColor: 'rgba(240, 61, 79, 0.65)',
                    borderWidth: 1,
                    borderRadius: 15,
                    fill: true,
                    tension: 0.0,
                    barThickness: 15
                },{
                    label: 'Candidatures',
                    data: {!! json_encode($totalApplications) !!},
                    radius: 2,
                    pointBackgroundColor: '#ffffff',
                    backgroundColor: gradientgreen1,
                    borderColor: '#91C300',
                    borderWidth: 1,
                    borderRadius: 15,
                    fill: true,
                    tension: 0.0,
                    barThickness: 15
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
{{-- end for js "Taux de conversion Candidatures vers shortlist" --}}

{{-- Star Taux de conversion shortlist vers embauches --}}
<script>
    var areachartblue = document.getElementById('areachartblue5').getContext('2d');
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
            labels: @json($labels_for_hiring_conversion_chart),
            datasets: [{
                label: 'Shortlist',
                data: @json($shortlistedApplicationsForHiring),
                radius: 2,
                pointBackgroundColor: '#ffffff',
                backgroundColor: gradientblue,
                borderColor: 'rgba(1, 94, 194, 0.4)',
                borderWidth: 1,
                borderRadius: 15,
                fill: true,
                tension: 0.0,
                barThickness: 15
            },{
                label: 'Embauches',
                data: @json($hiredApplications),
                radius: 2,
                pointBackgroundColor: '#ffffff',
                backgroundColor: gradientgreen1,
                borderColor: '#91C300',
                borderWidth: 1,
                borderRadius: 15,
                fill: true,
                tension: 0.0,
                barThickness: 15
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
{{-- End Taux de conversion shortlist vers embauches --}}

{{-- star for Taux d'acceptation d'offre --}}
<script>
    FusionCharts.ready(function () {
        var gaugeChart = new FusionCharts({
            type: 'angulargauge', // Semi-circle gauge
            renderAt: 'gauge-container',
            width: '600', // Width of the chart
            height: '250', // Height of the chart
            dataFormat: 'json',
            dataSource: {
                chart: {
                    caption: "",
                    subcaption: "",
                    lowerLimit: "0",
                    upperLimit: "100",
                    showValue: "1", // Show value near the pointer
                    numberSuffix: "%",
                    theme: "fusion",
                    showToolTip: "1",
                    gaugeFillMix: "{light-10}, #FF0000", // Gradient colors
                    gaugeFillRatio: "50, 50",
                    pivotRadius: "6", // Pointer style
                    pointerBgColor: "#000000",
                    bgColor: "#ebf2fb",
                },
                colorRange: {
                    color: [
                        { minValue: "0", maxValue: "50", code: "#FF0000" }, // Red range
                        { minValue: "50", maxValue: "75", code: "#FFFF00" }, // Yellow range
                        { minValue: "75", maxValue: "100", code: "#00FF00" }  // Green range
                    ]
                },
                dials: {
                    dial: [
                        {
                            value: "{{ __($acceptanceRate) }}",
                            tooltext: "Taux d'acceptation: {{ __($acceptanceRate) }}%",
                            rearExtension: "15"
                        }
                    ]
                },
                annotations: {
                    groups: [
                        {
                            items: [
                                {
                                    type: "text",
                                    text: "Lower Limit",
                                    x: "100",
                                    y: "350",
                                    color: "#FF0000",
                                    fontSize: "12"
                                },
                                {
                                    type: "text",
                                    text: "Upper Limit",
                                    x: "500",
                                    y: "350",
                                    color: "#00FF00",
                                    fontSize: "12"
                                },
                                {
                                    type: "text",
                                    text: "Target",
                                    x: "450",
                                    y: "200",
                                    color: "#000000",
                                    fontSize: "12"
                                }
                            ]
                        }
                    ]
                }
            }
        });
        gaugeChart.render();
    });
</script>
{{-- end for Taux d'acceptation d'offre --}}

{{-- star for Taux d'abandon en cours de process --}}
<script>
    var areachartblue23 = document.getElementById('areachartblue0123').getContext('2d');
    var gradientblue23 = areachartblue23.createLinearGradient(0, 0, 0, 220);
    gradientblue23.addColorStop(0, 'rgba(1, 94, 194, 0.8)');
    gradientblue23.addColorStop(1, 'rgba(0, 197, 221, 0)');
    var gradientred23 = areachartblue23.createLinearGradient(0, 0, 0, 220);
    gradientred23.addColorStop(1, 'rgba(240, 61, 79, 0.10)');
    gradientred23.addColorStop(0, 'rgba(255, 223, 220, 0)');
    var gradientred232 = areachartblue23.createLinearGradient(0, 0, 0, 220);
    gradientred232.addColorStop(0, '#a30202');
    gradientred232.addColorStop(1, 'rgba(255, 223, 220, 0)');
    var gradientgreen1 = areachartblue23.createLinearGradient(0, 0, 0, 220);
    gradientgreen1.addColorStop(0, 'rgba(145, 195, 0, 0.5)');
    gradientgreen1.addColorStop(1, 'rgba(176, 197, 0, 0)');
    var myareachartblue23 = {
        type: 'bar',
        data: {
            labels: @json($abandonRateData['labels']),
            datasets: [{
                label: 'Offres émises',
                data: @json($abandonRateData['abandonRates']),
                radius: 2,
                pointBackgroundColor: '#ffffff',
                backgroundColor: gradientred232,
                borderColor: 'rgba(240, 61, 79, 0.65)',
                borderWidth: 1,
                borderRadius: 15,
                fill: true,
                tension: 0.0,
                barThickness: 15
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
    var myAreaChartblue23 = new Chart(areachartblue23, myareachartblue23);
</script>
{{-- end for Taux d'abandon en cours de process --}}

{{-- star Performance des canaux de sourcing --}}
<script>
    var areachartblue = document.getElementById('areachartblueL2').getContext('2d');
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
            labels: {!! json_encode($labels_for_sourcing_performance_chart) !!},
            datasets: [{
                label: 'Candidatures',
                data: {!! json_encode($sourcingPerformance) !!},
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
{{-- end Performance des canaux de sourcing --}}

{{-- star Temps d'embauche --}}
<script type="text/javascript">
    'use strict'
    $(window).on('load', function () {
        /* doughnut chart js */
        var areachartblue23 = document.getElementById('areachartblue012').getContext('2d');
        var gradientblue23 = areachartblue23.createLinearGradient(0, 0, 0, 220);
        gradientblue23.addColorStop(0, 'rgba(1, 94, 194, 0.8)');
        gradientblue23.addColorStop(1, 'rgba(0, 197, 221, 0)');
        var gradientred23 = areachartblue23.createLinearGradient(0, 0, 0, 220);
        gradientred23.addColorStop(1, 'rgba(240, 61, 79, 0.10)');
        gradientred23.addColorStop(0, 'rgba(255, 223, 220, 0)');
        var gradientgreen1 = areachartblue23.createLinearGradient(0, 0, 0, 220);
        gradientgreen1.addColorStop(0, 'rgba(145, 195, 0, 0.5)');
        gradientgreen1.addColorStop(1, 'rgba(176, 197, 0, 0)');
        var myareachartblue23 = {
            type: 'line',
            data: {
                labels: {!! json_encode($labels_temps_embauche) !!},
                datasets: [{
                    label: 'Offres émises',
                    data: {!! json_encode($data_temps_embauche) !!},
                    radius: 2,
                    pointBackgroundColor: '#ffffff',
                    backgroundColor: gradientgreen1,
                    borderColor: '#91C300',
                    borderWidth: 1,
                    fill: true,
                    tension: 0.00,
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
        var myAreaChartblue23 = new Chart(areachartblue23, myareachartblue23);

        $('.show-row1-action').on('click',function () {
            $('.row-1-all').addClass('hidden');
            $('.row-1-action').removeClass('hidden');
            $('.offres-table').addClass('hidden');
            $('.Integrale').removeClass('hidden');
        })
        $('.close-row-1').on('click',function () {
            $('.row-1-all').removeClass('hidden');
            $('.row-1-action').addClass('hidden');
        });
        $('#myTab button').on('click',function () {
            var id = $(this).attr('id');
            if(id == "planner1-tab"){
                $('#tab1-title').html('CVthèque');
                $('#tab1-icon').html('<i class="bi bi-database h5"></i>');
            }
            if(id == "planner2-tab"){
                $('#tab1-title').html('Profils actifs');
                $('#tab1-icon').html('<i class="bi bi-people h5"></i>');
            }
            if(id == "posts3-tab"){
                $('#tab1-title').html('Profils qualifiés');
                $('#tab1-icon').html('<i class="bi bi-person-check h5"></i>');
            }
            if(id == "posts4-tab"){
                $('#tab1-title').html('Profils pertinents');
                $('#tab1-icon').html('<i class="bi bi-person-check-fill h5"></i>');
            }
        })
    })
</script>
{{-- end Temps d'embauche --}}


<script type="text/javascript">

    $(window).on('load', function () {

        function addImagesToChosen() {
            $('.chosen-results li').each(function() {
                var $chosenOption = $(this);
                var index = $chosenOption.data('option-array-index');
                var imageSrc = $('#country-selector option').eq(index).data('image');

                if (imageSrc) {
                    if (!$chosenOption.find('img').length) {
                        $chosenOption.prepend('<img src="' + imageSrc + '" />');
                    }
                }
            });
        }
        $('#country-selector').on('chosen:showing_dropdown', addImagesToChosen);
        $('#country-selector').on('change',function(){
            var value = $(this).find('option:selected').attr('value');
            $('.chosen-single span').html($(this).attr('label'));
            var selectedCountry = $(this).find('option:selected');
            var imgsrc = selectedCountry.attr('data-image');
            $('#country-selector .chosen-container .chosen-single img').attr('src',imgsrc);
            // Get the image URL from the data attribute
            //var imgSrc = selectedCountry.data('img-src');
            $('.ville-p').addClass('hidden');
            $('#'+value).removeClass('hidden');
        })

        $(".chosenoptgroup").chosen();
        $(".chosenoptgroup").on('change', function (event, el) {
            var textdisplay_element = $(".chosenoptgroup + .chosen-container .chosen-single > span");
            var selected_element = $(".chosenoptgroup option:selected");
            var selected_value = selected_element.val();
            if (selected_element.closest('optgroup').length > 0) {
                var parent_optgroup = selected_element.closest('optgroup').attr('label');
                textdisplay_element.text(parent_optgroup + ' ' + selected_value).trigger("chosen:updated");
            }
        });


        var selectedOption = $('#country-selector option:selected');
        var selectedImage = selectedOption.data('image');
        if (selectedImage) {
            $('#country-selector .chosen-container .chosen-single').prepend('<img src="' + selectedImage + '" />');
        }
    });
</script>

{{-- <style>
    .card .card-footer.footer-1 {
        background-color: #2e9c65ba;
        border-top: 0px solid transparent;
        margin-top: 1px;
        padding: calc(var(--bs-gutter-x)* 0.5);
    }
    .card .card-footer.footer-2 {
        background-color: #b7131bad;
        border-top: 0px solid transparent;
        margin-top: 1px;
        padding: calc(var(--bs-gutter-x)* 0.5);
    }


    .poste-chosen .chosen-container.chosen-container-single{
        padding: 2px 9px;
        background-color: var(--adminux-theme-bg);
        border-radius: 7px;
        margin-top: -4px;
    }
    .poste-chosen .chosen-container.chosen-container-single a.chosen-single{
        padding: 3px 10px;
    }
    .poste-chosen .chosen-container.chosen-container-single div.chosen-drop{
        margin-left: -10px;
    }
    .poste-chosen .chosen-container-single .chosen-single div b {
        display: block;
        width: 100%;
        height: 100%;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-size: 12px;
        margin-top: 0px;
    }
    .poste-chosen ul li{font-size: 13px !important;}
    #country-selector ul li img{width: 30px !important;margin-right: 5px;height: 21px !important;border: 1px solid #999696 !important;}
    #country-selector .chosen-single img{width: 30px !important;margin-right: 8px;float: left;height: 21px}
    #country-selector .chosen-single span{float: left}
    .poste-chosen .chosen-single span{font-size: 14px !important;}
    .poste-chosen .chosen-single{background-color: var(--adminux-theme-bg) !important;}



    .title.custom-title{
        border-bottom: 0 !important;
    }
    .title.custom-title:after{
        width: 63px !important;
    }
    .nav-adminux .nav-item > .nav-link.active {
        color: #15215a;
    }
    .raphael-group-QQONqQzw{display: none}
    @media (min-width: 1400px) {
        .container-xxl, .container-xl, .container-lg, .container-md, .container-sm, .container {
            max-width: 1372px;
        }
    }
</style> --}}

@endsection
