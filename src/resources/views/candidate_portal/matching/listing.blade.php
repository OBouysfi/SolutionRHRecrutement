@extends('candidate_portal.layouts.second')

@section('title', __('generated.matching'))
@section('css_header')
    <style>
        .chosen-results img {
            width: 30px;
            height: auto;
            margin-right: 5px;
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">{{ __('generated.matching') }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>
                <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('generated.contact') }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('generated.contact') }}">
                            <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #26b6ea;">
                                <span class="input-group-text text-secondary bg-none" style="border: 0;">
                                    <i class="bi bi-question-diamond" style="font-size: 22px; color: #fff"></i>
                                </span>
                            </figure>
                        </div>
                    </a>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
title="{{ __("generated.Guide vidéo") }}">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('generated.chatbot') }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('generated.user_comfort') }}"

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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('generated.scoring') }}</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body filter-block">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div id="country-selector"
                                                        class="rounded border poste-chosen custom-multiple-select">
                                                        <label>{{ __('generated.country') }}
                                                        </label>
                                                        <select class="chosenoptgroup w-100" id="filter-pays">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ __($country->id) }}" class="translated_var"
                                                                    data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png">
                                                                    {{ __($country->name) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div id="city-selector" class="rounded border poste-chosen custom-multiple-select"
                                                      >
                                                        <label
                                                           >{{ __('generated.city') }}
                                                        </label>
                                                        <select class="chosenoptgroup w-100" id="filter-ville">
                                                            <option value="Tous" selected>{{ __("generated.Tous") }}</option>
                                                            @foreach ($cities as $city)
                                                                <option value="{{ __($city->id) }}" class="translated_var"
                                                                    data-region-id="{{ __($city->region->country_id) }}">
                                                                    {{ __($city->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="rounded border poste-chosen custom-multiple-select"
                                                       >
                                                        <label
                                                          >{{ __('generated.position') }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-poste">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($posts as $post)
                                                                <option value="{{ __($post->id) }}" class="translated_var">
                                                                    {{ $post->label ?? ' - ' }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="rounded border poste-chosen custom-multiple-select"
                                                       >
                                                        <label
                                                           >{{ __('generated.activity_area') }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-activityarea">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($activityareas as $activityarea)
                                                                <option value="{{ __($activityarea->id) }}" class="translated_var">
                                                                    {{ __($activityarea->label) }}
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
            {{-- <div class="row mb-4 ">
            <div class="col-12">
                <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="navtabscard139" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a style="font-size: 14px" class="nav-link " href="{{ route('generated.jobOffer') }}">Offres d'emploi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button style="font-size: 14px" class="nav-link active" href="{{ route('generated.matching') }}" >Matching</button>
                    </li>
                </ul>
            </div>
        </div> --}}
            {{-- <div class="row mb-5">
            <div class="col-12">
                <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="navtabscard139" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a style="font-size: 14px" class="nav-link active" id="offres-tab" data-bs-toggle="tab" href="#offres" role="tab">Offres d'emploi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a style="font-size: 14px" class="nav-link" id="matching-tab" data-bs-toggle="tab" href="#matching" role="tab">Matching</a>
                    </li>
                </ul>
            </div>
        </div> --}}
            <div class="tab-content py-3" id="myTabContent">
                <!-- personal info tab-->
                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">

                    <div class="row hidden">
                        <div class="col-12">
                            <h4 class="title graph-title hidden"></h4>
                            <div class="bigchart250 cut-5 mb-4">
                                <canvas id="areachartblue1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3 hidden">
                        <div class="col-3">
                            <div class="card border-0">
                                <div class="card-body">
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
                                                            <h6 class="fw-medium mb-0">{{ __('generated.cvtheque') }}</h6>
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
                                                                    <li><a class="dropdown-item show-row1"
                                                                            href="javascript:void(0)"
                                                                            id="flt-chartall">{{ __('generated.detail') }}</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-2">

                                                        <div class="col text-center">
                                                            <a href="#" class="card border-0"
                                                                data-bs-toggle="modal" data-bs-target="#billpay"
                                                                style="background-color: #e6eaee;">
                                                                <div class="card-body " style="height: 69px !important;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto">
                                                                            <div class="circle-small">
                                                                                <div id="circleprogressgreen1">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto"
                                                                            style="    margin-right: 24px;">
                                                                            <p class="bi bi- h4 avatar avatar-40 rounded text-theme "
                                                                                style="width: 100%;color: #000;">15
                                                                                282&nbsp;</p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    style="margin-top: 8px;margin-right: -16px;">
                                                                                    <span class="text-green"
                                                                                        style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                        3.15%
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div
                                                                                        class="avatar avatar-40 rounded-circle bg-green">
                                                                                        <i class="bi bi-arrow-up-right"
                                                                                            style="color: #FFF"></i>
                                                                                    </div>
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
                        <div class="col-3">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="card border-0  ">
                                                <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-40 rounded bg-light-theme"
                                                                style="background-color: rgba(145, 195, 0, 0.5) !important;">
                                                                <i class="bi bi-people h5"
                                                                    style="color: #638502 !important;"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.active_profiles') }}</h6>
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
                                                                    <li><a class="dropdown-item show-row1"
                                                                            href="javascript:void(0)"
                                                                            id="flt-chart1">{{ __('generated.detail') }}</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-2">

                                                        <div class="col text-center">
                                                            <a href="#" class="card border-0"
                                                                data-bs-toggle="modal" data-bs-target="#billpay"
                                                                style="background-color: #e6eaee;">
                                                                <div class="card-body " style="height: 69px !important;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto">
                                                                            <div class="circle-small">
                                                                                <div id="circleprogressgreen2">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto"
                                                                            style="    margin-right: 24px;">
                                                                            <p class="bi bi- h4 avatar avatar-40 rounded text-theme "
                                                                                style="width: 100%;color: #000;">7
                                                                                352&nbsp;</p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    style="margin-top: 8px;margin-right: -16px;">
                                                                                    <span class="text-green"
                                                                                        style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                        17.05%
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div
                                                                                        class="avatar avatar-40 rounded-circle bg-green">
                                                                                        <i class="bi bi-arrow-up-right"
                                                                                            style="color: #FFF"></i>
                                                                                    </div>
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
                        <div class="col-3">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="card border-0  ">
                                                <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">

                                                            <div class="avatar avatar-40 rounded bg-light-theme"
                                                                style="background-color: rgba(240, 61, 79, 0.40) !important;">
                                                                <i class="bi bi-person-check h5"
                                                                    style="color: #b51121 !important;"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.qualified_profiles') }}</h6>
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
                                                                    <li><a class="dropdown-item show-row1"
                                                                            href="javascript:void(0)"
                                                                            id="flt-chart2">{{ __('generated.detail') }}</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-2">

                                                        <div class="col text-center">
                                                            <a href="#" class="card border-0"
                                                                data-bs-toggle="modal" data-bs-target="#billpay"
                                                                style="background-color: #e6eaee;">
                                                                <div class="card-body " style="height: 69px !important;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto">
                                                                            <div class="circle-small">
                                                                                <div id="circleprogressgreen3">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto"
                                                                            style="    margin-right: 24px;">
                                                                            <p class="bi bi- h4 avatar avatar-40 rounded text-theme "
                                                                                style="width: 100%;color: #000;">
                                                                                6 823&nbsp;</p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    style="margin-top: 8px;margin-right: -16px;">
                                                                                    <span class="text-green"
                                                                                        style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                        4.26%
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div
                                                                                        class="avatar avatar-40 rounded-circle bg-red">
                                                                                        <i class="bi bi-arrow-down-left"
                                                                                            style="color: #FFF"></i>
                                                                                    </div>
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
                        <div class="col-3">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="card border-0  ">
                                                <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-40 rounded bg-light-theme"
                                                                style="background-color: rgba(1, 94, 194, 0.4) !important;">
                                                                <i class="bi bi-person-bounding-box h5"
                                                                    style="color: #01448d !important;"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-0">{{ __('generated.validating_profiles') }}</h6>
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
                                                                    <li><a class="dropdown-item show-row1"
                                                                            href="javascript:void(0)"
                                                                            id="flt-chart3">{{ __('generated.detail') }}</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-2">

                                                        <div class="col text-center">
                                                            <a href="#" class="card border-0"
                                                                data-bs-toggle="modal" data-bs-target="#billpay"
                                                                style="background-color: #e6eaee;">
                                                                <div class="card-body " style="height: 69px !important;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto">
                                                                            <div class="circle-small">
                                                                                <div id="circleprogressgreen4">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto"
                                                                            style="    margin-right: 24px;">
                                                                            <p class="bi bi- h4 avatar avatar-40 rounded text-theme "
                                                                                style="width: 100%;color: #000;">1
                                                                                107&nbsp;</p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    style="margin-top: 8px;margin-right: -16px;">
                                                                                    <span class="text-green"
                                                                                        style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                        0.00%
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div
                                                                                        class="avatar avatar-40 rounded-circle bg-blue">
                                                                                        <i class="bi bi-arrow-right"
                                                                                            style="color: #FFF"></i>
                                                                                    </div>
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
                    <div class="row mb-5 justify-content-center">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0 " style="padding: 10px 20px;">
                                                <div class="card-header ">
                                                    <div class="row align-items-center">

                                                        <div class="col-auto">
                                                            <h5>{{ __('generated.scoring') }}</h5>
                                                        </div>
                                                        {{-- <div class="col-2 ms-auto"
                                                            style="width: 9%;height: 50px !important;margin-top: auto;margin-bottom: auto;margin-right: -12px">
                                                            <div class="row">
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Partager"
                                                                    style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                        <a href="#" type="button"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#emailcompose">
                                                                            <i
                                                                                class="bi bi-share avatar   rounded h5"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                        <select
                                                                            style="border: 0;background-color: transparent;width: 49px;color: #005dc7;"
                                                                            id="customLength">
                                                                            <option selected>10</option>
                                                                            <option>25</option>
                                                                            <option>50</option>
                                                                            <option>100</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table offres-table" data-show-toggle="true"
                                                        id="candidateMatching">
                                                        <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                            <tr style="vertical-align: middle;">
                                                                <th rowspan="2" style="font-weight: 600;width: 80px">#</th>
                                                                <th rowspan="2" style="font-weight: 600;">{{ __('generated.client_number') }}</th>
                                                                <th rowspan="2" style="font-weight: 600;">{{ __('generated.client') }}</th>
                                                                <th rowspan="2" style="font-weight: 600;width: 220px">{{ __('generated.job_title') }}</th>
                                                                <th rowspan="2" style="font-weight: 600;text-align: center">{{ __('generated.contract_type') }}</th>
                                                                <th rowspan="2" style="font-weight: 600">{{ __('generated.location') }}</th>
                                                                <th rowspan="2" style="font-weight: 600">{{ __('generated.diploma') }}</th>
                                                                <th rowspan="2" style="font-weight: 600">{{ __('generated.option') }}</th>
                                                                <th rowspan="2" style="font-weight: 600;text-align: center">{{ __('generated.experience') }}</th>
                                                                <th colspan="2" style="font-weight: 600;text-align: center">{{ __('generated.offer_period') }}</th>
                                                                {{-- <th rowspan="2" style="font-weight: 600;text-align: center">Score</th>
                                                        <th rowspan="2" style="font-weight: 600;text-align: center;">Action</th> --}}
                                                            </tr>
                                                            <tr>
                                                                <th style="font-weight: 600">{{ __('generated.start_date') }}</th>
                                                                <th style="font-weight: 600">{{ __('generated.end_date') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px">

                                                        </tbody>
                                                    </table>

                                                    <div class="row align-items-center mx-0 mb-3">
                                                        <div class="col-6 ">

                                                        </div>
                                                        <!-- Pagination -->
                                                        <div class="row align-items-center mx-0 mb-3">
                                                            <div class="col-12 mt-4 footable-paging-external footable-paging-right footable-pagination"
                                                                id="validated-matching-candidate-pagination">
                                                                <div class="footable-pagination-wrapper">
                                                                    <ul class="pagination" id="pagination-links"></ul>
                                                                    <div class="divider"></div>
                                                                    <span class="label label-default"
                                                                        id="pagination-info">1 {{ __('generated.of') }} 1</span>
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
@endsection


@section('js_footer')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/js/jobOffer/listing.js') }}"></script>

    <script>
        var MatchingcandidateData = "{{ route('matchingcandidate.listing.data') }}";
    </script>

    @vite(['resources/js/candidatePortal/listingMatching.js'])
    @vite(['resources/js/profile/dateFillter.js'])


@endsection
