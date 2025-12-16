@extends('layouts.master')

@section('title', __('generated.Détail Matching'))

@section('css_header')
    <style>
        .card .custom-header {
            background-color: #f0f2f5;
            padding: 18px 10px;
        }

        td.td-separator {
            padding-left: 13px;
            font-weight: 700;
            background-color: #f3f3f5;
            /* Light mode background */
            border-top: 1px solid #000 !important;
            border-bottom: 1px solid #cfcdcd;
        }

        .dark-mode td.td-separator {
            background-color: transparent;
            Evaluation
            /* No background in dark mode */
            color: #ffffff;
            /* Optional: ensure text is readable */
            border-top: 1px solid #555 !important;
            border-bottom: 1px solid #777;
        }

        th.th-action-header {
            border-bottom: 0px !important;
            font-weight: 100;
            color: #005dc7;
        }

        th.th-date {
            width: 108px;
        }

        th.th-action {
            width: 394px;
        }

        .card-body.custom-style {
            /* background-color: #dce6f97d; */
            padding: 4px 10px;
        }

        .dark-mode .card-body.custom-style {
            background-color: transparent;
            padding: 4px 10px;
        }

        #personal2 .avatar.avatar-profile {
            line-height: 58px;
            height: 60px;
            width: 100% !important;

        }

        .dark-mode .dark-invert {
            filter: invert(1);
        }

        .card-footer-separated {
            background-color: #fff;
            padding: 20px 16px;
            border-top: 1px solid #e6e9ec;
            box-shadow: 0 -1px 8px rgba(0, 0, 0, 0.03);
            border-radius: 0 0 12px 12px;
        }

        /******************Custom Video control ***********************/

        .custom-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .custom-controls i {
            color: #025ec7 !important;
        }

        .custom-controls.controls2 i {
            color: #04448d !important;
        }

        button,
        input[type="range"] {
            cursor: pointer;
        }

        input[type="range"] {
            width: 150px;
        }

        .controls1 input[type="range"] {
            width: 80%;
        }

        #timeDisplay {
            font-family: monospace;
        }

        #seekBar,
        #volumeBar {
            appearance: none;
            height: 3px;
            background: linear-gradient(to right, #025ec7 0%, #025ec7 0%, #a7a0a05c 0%, #a7a0a05c 100%);
            border-radius: 5px;
            outline: none;
            cursor: pointer;
        }

        #seekBar {

            width: 100%;
        }

        #seekBar::-webkit-slider-runnable-track,
        #volumeBar::-webkit-slider-runnable-track {
            height: 8px;
            border-radius: 5px;
        }

        #seekBar::-webkit-slider-thumb,
        #volumeBar::-webkit-slider-thumb {
            -webkit-appearance: none;
            background-color: #025ec7;
            /* Color of the thumb */
            height: 12px;
            width: 12px;
            border-radius: 50%;
            margin-top: -1px;
            cursor: pointer;
        }

        #seekBar::-moz-range-track,
        #volumeBar::-moz-range-track {
            height: 8px;
            border-radius: 5px;
        }

        #seekBar::-moz-range-thumb,
        #volumeBar::-moz-range-thumb {
            background-color: #025ec7;
            /* Color of the thumb */
            height: 16px;
            width: 16px;
            border-radius: 50%;
            cursor: pointer;
        }

        #seekBar::-ms-track,
        #volumeBar::-ms-track {
            background: transparent;
            border-color: transparent;
            color: transparent;
            height: 8px;
        }

        #seekBar::-ms-thumb,
        #volumeBar::-ms-thumb {
            background-color: #0b0f1f;
            /* Color of the thumb */
            height: 16px;
            width: 16px;
            border-radius: 50%;
            cursor: pointer;
        }

        #seekBar:focus,
        #volumeBar:focus {
            outline: none;
        }

        video {
            width: 100%;
            height: auto;
        }

        :fullscreen video {
            width: 100vw;
            height: 100vh;
        }

        video::-webkit-media-controls {
            display: none !important;
        }

        video::-moz-media-controls {
            display: none !important;
        }


        .title.custom-title {
            border-bottom: 0 !important;
            padding-bottom: 0px;
        }

        .title.custom-title:after {
            width: 63px !important;
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 translated_text">{{ __('generated.Matching') }}</h5>
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
                        <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="contact">
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
                    <li class="breadcrumb-item active translated_text" aria-current="page">
                        {{ __('generated.Détail Matching') }}</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">

            <div class="tab-content py-3" id="myTabContent">
                <!-- personal info tab-->

                <div class="tab-pane fade show active" id="personal2" role="tabpanel" aria-labelledby="personal2-tab">

                    <div class="row">
                        <div class="col-3">
                            <div class="card border-0" style="height: 98.2%;">
                                <div class="card-body p-0" style="min-height: 700px;">
                                    <div class="row mt-3">
                                        <div class="col-auto ms-auto" style="margin-right: 3px;">
                                            <div class="dropdown d-inline-block">
                                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                                    aria-expanded="false" data-bs-display="static" role="button">
                                                    <i class="bi bi-three-dots-vertical" style="font-size: 19px"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end" style="min-width: 10px;">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('detail.matching.cv.preview', $profile->id) }}"
                                                            target="_blank"><span
                                                                class="translated_text">{{ __('generated.Aperçu') }}</span>
                                                        </a>
                                                    </li>
                                                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#emailcompose">{{ __('generated.Partager') }}</a>
                                                    </li>
                                                   <li><a class="dropdown-item" href="javascript:void(0)"
                                                            onclick="printExternalPage('{{ route('profile.cv.print', $profile->id) }}')" ><span
                                                                class="translated_text">{{ __('generated.Imprimer') }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-7 mb-2">
                                            <figure
                                                class="avatar avatar-60  avatar-profile rounded-circle coverimg custom-cv-img vm"
                                                style="background-image: url('
                                                @if ($profile->path_picture) {{ asset('storage/' . $profile->path_picture) }}
                                                @else
                                                    {{ $profile->sexe == 'Homme' ? asset('assets/img/male-perso-default.webp') : asset('assets/img/female-perso-default.jpg') }} @endif
                                            ');">
                                                <img src="
                                                @if ($profile->path_picture) {{ asset('storage/' . $profile->path_picture) }}
                                                @else
                                                    {{ $profile->sexe == 'Homme' ? asset('assets/img/male-perso-default.webp') : asset('assets/img/female-perso-default.jpg') }} @endif
                                            "
                                                    alt="" style="display: none;">
                                            </figure>
                                        </div>
                                        <div class="row justify-content-center mt-3">
                                            <p
                                                style="text-align: center;font-weight: 700;font-size: 25px;margin-bottom: 2px;">
                                                {{ $profile->full_name ?? '' }}</p>
                                            <p class="text-secondary" style="text-align: center;">
                                                {{ $profile->profession?->label ?? '' }}</p>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 14px !important;">
                                            <div class="col-6">
                                                <ul class="nav justify-content-center">
                                                    <li class="nav-item">
                                                        <a class="nav-link px-2"
                                                            href="{{ $profile->url_facebook ?? '' }}" target="_blank">
                                                            <i class="bi bi-facebook h3"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link px-2" href="{{ $profile->url_twitter ?? '' }}"
                                                            target="_blank">
                                                            <i class="bi bi-twitter-x h3"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link px-2"
                                                            href="{{ $profile->url_linkedin ?? '' }}" target="_blank">
                                                            <i class="bi bi-linkedin h3"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body pb-0 custom-color-icon"
                                                style="padding-left: 36px;margin-top: 40px;">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-telephone h5 text-theme mb-0"></i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 translated_text">
                                                            {{ __('generated.Téléphone') }}</p>
                                                        <p>{{ $profile->phone_primary ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-envelope h5 text-theme mb-0"></i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 translated_text">
                                                            {{ __('generated.E-mail') }}</p>
                                                        <p>{{ $profile->email ?? '' }} </p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-calendar2-heart h5 text-theme mb-0"></i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 translated_text">
                                                            {{ __('generated.Date de naissance') }}</p>
                                                        <p>{{ \Carbon\Carbon::parse($profile->birth_date)->format('d/m/Y') ?? '' }}
                                                        </p>

                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-geo h5 text-theme mb-0"></i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 translated_text">
                                                            {{ __('generated.Lieu de naissance') }}</p>
                                                        <p>{{ $profile->birth_place ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-globe h5 text-theme mb-0"></i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 translated_text">
                                                            {{ __('generated.Nationalité') }}
                                                        </p>
                                                        <p>{{ $profile->nationality_name->name ?? ' - ' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-person-hearts h5 text-theme mb-0">
                                                        </i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 ">
                                                            {{ __('generated.Situation familiale') }}</p>
                                                        <p>{{ $profile->family_situation ?? ' - ' }}</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-12 col-md-12 col-lg-12">
                                                <div class="card border-0 mb-4">
                                                    <div class="card-body">
                                                        <a
                                                            href="{{ route('detail.matching.cover.letter.preview', $profile->id) }}" target="_blank">
                                                            <div class="row gx-3 align-items-center">
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="avatar avatar-50 rounded bg-blue text-white">
                                                                        <i class="bi bi-file-earmark-text h5 vm"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-1 translated_text">
                                                                        {{ __('generated.Lettre de motivation') }}</h6>
                                                                    <p class="text-secondary translated_text">
                                                                        {{ __('generated.Candidat') }}</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-12">
                                                <div class="card border-0 mb-4">
                                                    <div class="card-body">
                                                        <a href="{{ route('detail.matching.cv.preview', $profile->id) }}" target="_blank">
                                                            <div class="row gx-3 align-items-center">
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="avatar avatar-50 rounded bg-red text-white">
                                                                        <i
                                                                            class="bi bi-layout-text-sidebar-reverse h5 vm"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-1 translated_text">
                                                                        {{ __('generated.Curriculum Vitae') }}</h6>
                                                                    <p class="text-secondary translated_text">
                                                                        {{ __('generated.Candidat') }}</p>
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
                        <div class="col-9">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header" style="padding: 0">
                                            <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30"
                                                role="tablist" style="width: 100%;border-radius: 0;font-size: 18px;">
                                                <li class="nav-item active" role="presentation">
                                                    <button class="nav-link active translated_text" id="tabM1220-tab"
                                                        data-bs-toggle="tab" data-bs-target="#tabM1220" type="button"
                                                        role="tab" aria-controls="tabM1220" aria-selected="false"
                                                        tabindex="-1">{{ __('generated.Score Matching') }}</button>
                                                </li>
                                                <li class="nav-item " role="presentation">
                                                    <button class="nav-link translated_text" id="tab1220-tab"
                                                        data-bs-toggle="tab" data-bs-target="#tab1220" type="button"
                                                        role="tab" aria-controls="tab1220" aria-selected="false"
                                                        tabindex="-1">{{ __('generated.CV') }}</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link translated_text" id="tabM11120-tab"
                                                        data-bs-toggle="tab" data-bs-target="#tabM11120" type="button"
                                                        role="tab" aria-controls="tabM11120" aria-selected="false"
                                                        tabindex="-1">{{ __('generated.CV vidéo') }}</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link translated_text" id="tabLM11120-tab"
                                                        data-bs-toggle="tab" data-bs-target="#tabLM11120" type="button"
                                                        role="tab" aria-controls="tabLM11120" aria-selected="false"
                                                        tabindex="-1">{{ __('generated.Lettre de motivation') }}</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link translated_text" id="tabLR11120-tab"
                                                        data-bs-toggle="tab" data-bs-target="#tabLR11120" type="button"
                                                        role="tab" aria-controls="tabLR11120" aria-selected="false"
                                                        tabindex="-1">{{ __('generated.Rapport') }}</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link translated_text" id="tabLR11120M-tab"
                                                        data-bs-toggle="tab" data-bs-target="#tabLR11120M" type="button"
                                                        role="tab" aria-controls="tabLR11120M" aria-selected="false"
                                                        tabindex="-1">{{ __('generated.Evaluation') }}</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link translated_text" id="tabM1120-tab"
                                                        data-bs-toggle="tab" data-bs-target="#tabM1120" type="button"
                                                        role="tab" aria-controls="tabM1120" aria-selected="false"
                                                        tabindex="-1">{{ __('generated.Timeline') }}</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="tab-content" id="nav-navtabscard30">
                                    <div class="tab-pane fade show active" id="tabM1220" role="tabpanel"
                                        aria-labelledby="tabM1220-tab">
                                        <div class="row mb-4">
                                            <div class="col-12 mb-4">
                                                {{-- <h4 class="title custom-title translated_text">Score</h4> --}}
                                                <div class="card-header bg-gradient-theme-light rounded">
                                                    <div class="row align-items-center p-3 rounded">
                                                        <h6 class="fw-medium mb-0 translated_text">
                                                            {{ __('generated.Score') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border-0 h-100">
                                                    <div class="card-body p-0 h-100">
                                                        <div class="row align-items-stretch h-100">
                                                            <div class="col-12 h-100">
                                                                <div class="card border-0 h-100">
                                                                    <div
                                                                        class="card-body d-flex flex-column justify-content-center">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <p class="text-secondary small mb-1 translated_text"
                                                                                    style="margin-bottom: 12px !important;">
                                                                                    {{ __('generated.Référence') }}</p>
                                                                                <h5 class="fw-medium"
                                                                                    style="margin-bottom: 6px !important;">
                                                                                    {{ $profile->matricule ?? '' }}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card border-0 h-100">
                                                    <div class="card-body p-0 h-100">
                                                        <div class="row h-100">
                                                            <div class="col-12 h-100">
                                                                <div class="card border-0 h-100">
                                                                    <div
                                                                        class="card-body d-flex flex-column justify-content-center">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <p class="text-secondary small mb-1 translated_text"
                                                                                    style="margin-bottom: 12px !important;">
                                                                                    {{ __("generated.Offre d'emploi") }}
                                                                                </p>
                                                                                <h5 class="fs-6"
                                                                                    style="margin-bottom: 6px !important;">
                                                                                    {{ $jobOffer?->profession?->label ?? '' }}
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
                                            <div class="col-4">
                                                <div class="card border-0 h-100">
                                                    <div class="card-body h-100">
                                                        <div class="row h-100">
                                                            <div class="col-12 h-100">
                                                                <div class="card border-0 h-100">
                                                                    <div
                                                                        class="card-body p-0 d-flex flex-column justify-content-center h-100">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <p class="text-secondary small mb-1"><span
                                                                                        class="translated_text">{{ __('generated.Score moyen') }}</span>
                                                                                    <global></global>
                                                                                </p>
                                                                                <label
                                                                                    class="d-flex justify-content-end w-100">
                                                                                    {{ $match->ratio * 100 ?? 0 }} %
                                                                                </label>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar
                                                                                    @if ($match->ratio < 0.5) bg-danger
                                                                                    @elseif($match->ratio >= 0.5 && $match->ratio < 0.75) bg-warning
                                                                                    @else bg-success @endif"
                                                                                        role="progressbar"
                                                                                        style="width: {{ $match->ratio * 100 ?? 0 }}%"
                                                                                        aria-valuenow="{{ $match->ratio * 100 ?? 0 }}"
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100">
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
                                            <div class="col-12 mb-4">
                                                {{-- <h4 class="title custom-title translated_text">Profil</h4> --}}
                                                <div class="card-header bg-gradient-theme-light rounded">
                                                    <div class="row align-items-center p-3 rounded">
                                                        <h6 class="fw-medium mb-0 translated_text">
                                                            {{ __('generated.Profil') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row align-items-stretch">
                                                <!-- Carte 1 : Formation -->
                                                <div class="col-md-3 col-sm-6 col-12 mb-4">
                                                    <div class="card border-0 h-100">
                                                        <div class="card-body p-0 h-100">
                                                            <div class="row h-100">
                                                                <div class="col-12">
                                                                    <div class="card border-0 h-100">
                                                                        <div
                                                                            class="card-body d-flex flex-column justify-content-center">
                                                                            <div class="doughnutchart mt-4 mb-2">
                                                                                <canvas id="doughnutchart"></canvas>
                                                                                <div class="countvalue shadow">
                                                                                    <div class="w-100">
                                                                                        <h2>{{ $matchingFomationScore }}%
                                                                                        </h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-center mb-4">
                                                                                <span class="translated_text"
                                                                                    style="font-size: 18px; font-weight: 700;">{{ __('generated.Formation') }}</span>
                                                                                <br>
                                                                                <span class="text-secondary"
                                                                                    style="font-size: 13px;">
                                                                                    <span
                                                                                        class="translated_text">{{ __('generated.Score Matching') }}
                                                                                        :</span>
                                                                                    {{ $matchingFomationScore }}%
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Carte 2 : Expérience -->
                                                <div class="col-md-3 col-sm-6 col-12 mb-4">
                                                    <div class="card border-0 h-100">
                                                        <div class="card-body p-0 h-100">
                                                            <div class="row h-100">
                                                                <div class="col-12">
                                                                    <div class="card border-0 h-100">
                                                                        <div
                                                                            class="card-body d-flex flex-column justify-content-center">
                                                                            <div class="doughnutchart mt-4 mb-2">
                                                                                <canvas id="doughnutchart2"></canvas>
                                                                                <div class="countvalue shadow">
                                                                                    <div class="w-100">
                                                                                        <h2>{{ $matchingExperienceScore }}%
                                                                                        </h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-center mb-4">
                                                                                <span class="translated_text"
                                                                                    style="font-size: 18px; font-weight: 700;">{{ __('generated.Expérience') }}</span>
                                                                                <br>
                                                                                <span class="text-secondary"
                                                                                    style="font-size: 13px;">
                                                                                    <span
                                                                                        class="translated_text">{{ __('generated.Score Matching') }}
                                                                                        :</span>
                                                                                    {{ $matchingExperienceScore }}%
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Carte 3 : Type de contrat -->
                                                <div class="col-md-3 col-sm-6 col-12 mb-4">
                                                    <div class="card border-0 h-100">
                                                        <div class="card-body p-0 h-100">
                                                            <div class="row h-100">
                                                                <div class="col-12">
                                                                    <div class="card border-0 h-100">
                                                                        <div
                                                                            class="card-body d-flex flex-column justify-content-center">
                                                                            <div class="doughnutchart mt-4 mb-2">
                                                                                <canvas id="doughnutchart3"></canvas>
                                                                                <div class="countvalue shadow">
                                                                                    <div class="w-100">
                                                                                        <h2>{{ $matchingTypeContractScore }}%
                                                                                        </h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-center mb-4">
                                                                                <span class="translated_text"
                                                                                    style="font-size: 18px; font-weight: 700;">
                                                                                    {{ __('generated.Type de contrat') }}</span>
                                                                                <br>
                                                                                <span class="text-secondary"
                                                                                    style="font-size: 13px;">
                                                                                    <span
                                                                                        class="translated_text">{{ __('generated.Score Matching') }}
                                                                                        :</span>
                                                                                    {{ $matchingTypeContractScore }}%
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Carte 4 : Prétentions salariales -->
                                                <div class="col-md-3 col-sm-6 col-12 mb-4">
                                                    <div class="card border-0 h-100">
                                                        <div class="card-body p-0 h-100">
                                                            <div class="row h-100">
                                                                <div class="col-12">
                                                                    <div class="card border-0 h-100">
                                                                        <div
                                                                            class="card-body d-flex flex-column justify-content-center">
                                                                            <div class="doughnutchart mt-4 mb-2">
                                                                                <canvas id="doughnutchart4"></canvas>
                                                                                <div class="countvalue shadow">
                                                                                    <div class="w-100">
                                                                                        <h2>{{ $matchingSalaryScore }}%
                                                                                        </h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-center mb-4">
                                                                                <span class="translated_text"
                                                                                    style="font-size: 18px; font-weight: 700;">{{ __('generated.Prétentions salariales') }}</span>
                                                                                <br>
                                                                                <span class="text-secondary"
                                                                                    style="font-size: 13px;">
                                                                                    <span
                                                                                        class="translated_text">{{ __('generated.Score Matching') }}
                                                                                        :</span>
                                                                                    {{ $matchingSalaryScore }}%
                                                                                </span>
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
                                            <div class="col-12 mb-3">
                                                {{-- <h4 class="title custom-title translated_text">Mobilité</h4> --}}
                                                <div class="card-header bg-gradient-theme-light rounded">
                                                    <div class="row align-items-center p-3 rounded">
                                                        <h6 class="fw-medium mb-0 translated_text">
                                                            {{ __('generated.Mobilité') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mb-2">
                                                    <div class="card border-0">
                                                        <div class="card-body p-0">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card border-0">
                                                                        <div class="card-body" style="height: 136px;">
                                                                            <div class="w-100" style="height: 113px">
                                                                                <canvas id="barchartvert"></canvas>
                                                                                <sp an class="text-secondary"
                                                                                    style="font-size: 13px;position: absolute;top: 79px;left: 16px;">
                                                                                    <span
                                                                                        class="translated_text">{{ __('generated.Score Matching') }}
                                                                                        :</span>
                                                                                    {{ $matchingMobilityScore }}%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-2">
                                                    <div class="card border-0">
                                                        <div class="card-body p-0">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card border-0">
                                                                        <div class="card-body" style="height: 136px">
                                                                            <div class="w-100" style="height: 113px">
                                                                                <canvas id="barchartvert2"></canvas>
                                                                                <span class="text-secondary"
                                                                                    style="font-size: 13px;position: absolute;top: 79px;left: 16px;"><span
                                                                                        class="translated_text">{{ __('generated.Score Matching') }}
                                                                                        :</span>
                                                                                    {{ $matchingModeTravailScore }}%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card border-0">
                                                        <div class="card-body p-0">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card border-0">
                                                                        <div class="card-body" style="height: 136px">
                                                                            <div class="w-100" style="height: 113px">
                                                                                <canvas id="barchartvert3"></canvas>
                                                                                <span class="text-secondary"
                                                                                    style="font-size: 13px;position: absolute;top: 79px;left: 16px;"><span
                                                                                        class="translated_text">{{ __('generated.Score Matching') }}
                                                                                        :</span>
                                                                                    {{ $matchingTempsTravail }}%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card border-0">
                                                        <div class="card-body p-0">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card border-0">
                                                                        <div class="card-body" style="136px">
                                                                            <div class="w-100" style="height: 113px">
                                                                                <canvas id="barchartvert4"></canvas>
                                                                                <span class="text-secondary"
                                                                                    style="font-size: 13px;position: absolute;top: 79px;left: 16px;"><span
                                                                                        class="translated_text">{{ __('generated.Score Matching') }}
                                                                                        :</span>
                                                                                    95%</span>
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
                                            <div class="col-12 mb-4">
                                                {{-- <h4 class="title custom-title translated_text">Compétences</h4> --}}
                                                <div class="card-header bg-gradient-theme-light rounded">
                                                    <div class="row align-items-center p-3 rounded">
                                                        <h6 class="fw-medium mb-0 translated_text">
                                                            {{ __('generated.Compétences') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                {{-- <h6 class="title custom-title translated_text">Compétences techniques</h6> --}}
                                                <h6 class="fw-medium mb-0 title custom-title translated_text">
                                                    {{ __('generated.Compétences Techniques') }}</h6>

                                            </div>
                                            @foreach ($matchingSkills as $skillTypeId => $details)
                                                <div class="col-12">
                                                    <div class="card border-0 mb-4">
                                                        <div class="card-body">
                                                            <div class="row justify-content-center">
                                                                <div class="col-4">
                                                                    <div class="card border-0">
                                                                        <div class="card-header custom-header">
                                                                            <h6 class="translated_text">
                                                                                {{ __('generated.Catégorie') }}</h6>
                                                                        </div>
                                                                        <div class="card-body" style="min-height: 289px">
                                                                            <span
                                                                                style="margin-top: 30%;float: left;font-size: 17px;font-weight: 700;width: 100%;text-align: center;">{{ $details->first()->skill->skillType->label ?? 'Sans type' }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8" style="width: 49%;">
                                                                    <div class="card border-0">
                                                                        <div class="card-header custom-header">
                                                                            <table class="table offres-table"
                                                                                data-show-toggle="true"
                                                                                style="margin-bottom: 0px">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td
                                                                                            style="border: 0;width: 356px;padding-left: 28px">
                                                                                            <h6 class="translated_text">
                                                                                                {{ __('generated.Détail') }}
                                                                                            </h6>
                                                                                        </td>
                                                                                        <td style="border: 0">
                                                                                            <h6 class="translated_text">
                                                                                                {{ __('generated.Score') }}
                                                                                            </h6>
                                                                                        </td>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                        </div>
                                                                        <div class="card-body card-skills"
                                                                            style="height: 217px;overflow: hidden;">
                                                                            <table class="table offres-table"
                                                                                data-show-toggle="true">
                                                                                <tbody
                                                                                    style="font-size: 15px;vertical-align: middle;">
                                                                                    @foreach ($details as $detailMatching)
                                                                                        <tr>
                                                                                            <td
                                                                                                style="width: 356px;padding-left: 28px">
                                                                                                {{ $detailMatching->skill->label ?? 'Nom non défini' }}
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="col-auto">
                                                                                                    <div
                                                                                                        class="circle-small">
                                                                                                        <div
                                                                                                            id="circleprogress-{{ $detailMatching->skill->id }}">

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    style="margin-right: -15px;margin: 0 auto;">
                                                                                    <div
                                                                                        class="avatar avatar-50 rounded bg-light-theme">
                                                                                        <a type="button"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="top"
                                                                                            class="translated_text"
                                                                                            title="{{ __("generated.Voir plus") }}"
                                                                                            id="click-show-skills">
                                                                                            <i class="bi bi-arrow-down-square avatar   rounded h3"
                                                                                                style="margin-top: -3px;margin-left: -1px;"></i>
                                                                                        </a>
                                                                                        <a class="hidden translated_text"
                                                                                            type="button"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="top"
                                                                                            title="Réduire"
                                                                                            id="click-hidd-skills">
                                                                                            <i class="bi bi-arrow-up-square avatar   rounded h3"
                                                                                                style="margin-top: -3px;margin-left: -1px;"></i>
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
                                            @endforeach

                                            <div class="col-12 mb-4">
                                                {{-- <h6 class="title custom-title translated_text">Compétences personnelles</h6> --}}
                                                <h6 class="fw-medium mb-0 title custom-title translated_text">
                                                    {{ __('generated.Compétences personelles') }}</h6>
                                            </div>

                                            @foreach ($matchingPersonalSkills as $skillTypeId => $details)
                                                <div class="col-12">
                                                    <div class="card border-0 mb-4">
                                                        <div class="card-body ">
                                                            <div class="row justify-content-center">
                                                                <div class="col-4">
                                                                    <div class="card border-0">
                                                                        <div class="card-header custom-header">
                                                                            <h6>{{ __('generated.Catégorie') }}</h6>
                                                                        </div>
                                                                        <div class="card-body" style="min-height: 289px">
                                                                            <span
                                                                                style="margin-top: 30%;float: left;font-size: 17px;font-weight: 700;width: 100%;text-align: center;">{{ $details->first()->skill->skillType->label ?? 'Sans type' }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8" style="width: 49%;">
                                                                    <div class="card border-0">
                                                                        <div class="card-header custom-header">
                                                                            <table class="table offres-table"
                                                                                data-show-toggle="true"
                                                                                style="margin-bottom: 0px">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td
                                                                                            style="border: 0;width: 356px;padding-left: 28px">
                                                                                            <h6 class="translated_text">
                                                                                                {{ __('generated.Détail') }}
                                                                                            </h6>
                                                                                        </td>
                                                                                        <td style="border: 0">
                                                                                            <h6 class="translated_text">
                                                                                                {{ __('generated.Score') }}
                                                                                            </h6>
                                                                                        </td>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                        </div>
                                                                        <div class="card-body card-skills"
                                                                            style="height: 217px;overflow: hidden;">
                                                                            <table class="table offres-table"
                                                                                data-show-toggle="true">
                                                                                <tbody
                                                                                    style="font-size: 15px;vertical-align: middle;">
                                                                                    @foreach ($details as $detailMatching)
                                                                                        <tr>
                                                                                            <td
                                                                                                style="width: 356px;padding-left: 28px">
                                                                                                {{ $detailMatching->skill->label ?? 'Nom non défini' }}
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="col-auto">
                                                                                                    <div
                                                                                                        class="circle-small">
                                                                                                        <div
                                                                                                            id="circleprogress-{{ $detailMatching->skill->id }}">

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    style="margin-right: -15px;margin: 0 auto;">
                                                                                    <div
                                                                                        class="avatar avatar-50 rounded bg-light-theme">
                                                                                        <a type="button"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="top"
                                                                                            class="translated_text"
                                                                                            title="{{ __("generated.Voir plus") }}"
                                                                                            id="click-show-skills">
                                                                                            <i class="bi bi-arrow-down-square avatar   rounded h3"
                                                                                                style="margin-top: -3px;margin-left: -1px;"></i>
                                                                                        </a>
                                                                                        <a class="hidden translated_text"
                                                                                            type="button"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="top"
                                                                                            title="Réduire"
                                                                                            id="click-hidd-skills">
                                                                                            <i class="bi bi-arrow-up-square avatar   rounded h3"
                                                                                                style="margin-top: -3px;margin-left: -1px;"></i>
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
                                            @endforeach


                                            <div class="col-12 mb-4 mt-5">
                                                {{-- <h6 class="title custom-title translated_text">Compétences linguistiques</h6> --}}
                                                <h6 class="fw-medium mb-0 title custom-title translated_text">
                                                    {{ __('generated.Compétences linguistiques') }}</h6>
                                            </div>

                                            @foreach ($linguisticSkills as $languageTypeId => $details)
                                                <div class="col-4">
                                                    <div class="card border-0">
                                                        <div class="card-body p-0">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card border-0">
                                                                        <div class="card-header">
                                                                            <div class="row">
                                                                                <div class="col-auto">
                                                                                    <h6>{{ $details->first()->skill->skillType->label }}
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="col-auto ms-auto">
                                                                                    <span class="text-secondary"
                                                                                        style="font-size: 12px;"><span
                                                                                            class="translated_text">
                                                                                            {{ __('generated.Score Matching') }}
                                                                                            :</span>
                                                                                        {{ round($details->avg('skill_match_score') * 100, 2) }}%</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-12"
                                                                                    style="margin-top: -39px;">
                                                                                    <div class="doughnutchart  mt-4 mb-2"
                                                                                        style="height: 300px;width: 98%">
                                                                                        <canvas
                                                                                            id="radarchart-{{ $languageTypeId }}"></canvas>
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
                                            @endforeach



                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab1220" role="tabpanel"
                                        aria-labelledby="tab1220-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <div>

                                                    <div class="card-body p-0">
                                                        <div class="tab-content" id="nav-navtabscard30">
                                                            <div class="tab-pane fade show active" id="tab1220"
                                                                role="tabpanel" aria-labelledby="tab1220-tab">

                                                                <div class="row">

                                                                    <div class="tab-content" id="myTabContent">
                                                                        <div class="tab-pane fade show active"
                                                                            id="posts" role="tabpanel"
                                                                            aria-labelledby="posts-tab">
                                                                            <div class="row mb-4">
                                                                                <div class="col-12">
                                                                                    {{-- <h4
                                                                                    class="title custom-title translated_text">
                                                                                    Formations
                                                                                </h4> --}}
                                                                                    <div
                                                                                        class="card-header bg-gradient-theme-light">
                                                                                        <div
                                                                                            class="row align-items-center p-3 rounded">
                                                                                            <h6
                                                                                                class="fw-medium mb-0 translated_text">
                                                                                                {{ __('generated.Formations') }}
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @forelse ($profile?->formations as $formation)
                                                                                <div class="card border-0 mb-3">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="card border-0">
                                                                                                    <div class="card-body"
                                                                                                        style="padding-left: 30px">
                                                                                                        <div class="row mb-3 mt-3">
                                                                                                            <div class="col-auto">
                                                                                                                <img src="{{ $formation->logo && file_exists(public_path('storage/' . $formation->logo))
                                                                                                                    ? asset('storage/' . $formation->logo)
                                                                                                                    : asset('assets/img/high-school-modern-simple-icon-vector.jpg') }}"
                                                                                                                    alt="Logo de la formation"
                                                                                                                    style="width: 60px;">
                                                                                                            </div>
                                                                                                            <div class="col">
                                                                                                                <h6 class="translated_text">
                                                                                                                    {{ $formation->name ?? ' - ' }}
                                                                                                                </h6>
                                                                                                                <p class="text-secondary"
                                                                                                                    style="margin-bottom: 0;">
                                                                                                                    {{ __($formation->diploma->label) ?? ' - ' }}
                                                                                                                </p>
                                                                                                                <p>
                                                                                                                    {{ $formation->date ? \Carbon\Carbon::parse($formation->date)->locale('fr')->translatedFormat('d F Y') : ' - ' }}
                                                                                                                </p>
                                                                                                                <p>{{ __($formation->option->label) ?? ' - ' }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @empty
                                                                                <div class="card border-0 mb-3">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="card border-0">
                                                                                                    <div class="card-body"
                                                                                                        style="padding-left: 30px">
                                                                                                        <div class="row mb-3 mt-3">
                                                                                                            <div class="col-auto">
                                                                                                                <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                                                    alt=""
                                                                                                                    style="width: 60px;">
                                                                                                            </div>
                                                                                                            <div class="col px-5 py-3">
                                                                                                                <h6 class="translated_text">
                                                                                                                    {{ __("generated.Ce profil n'a aucune formations") }}
                                                                                                                </h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforelse
                                                                        </div>
                                                                        <div class="tab-pane fade show active"
                                                                            id="posts2" role="tabpanel"
                                                                            aria-labelledby="posts2-tab">
                                                                            <div class="row mb-4 mt-4">
                                                                                <div class="col-12">
                                                                                    {{-- <h4
                                                                                    class="title custom-title translated_text">
                                                                                    Expériences
                                                                                </h4> --}}
                                                                                    <div
                                                                                        class="card-header bg-gradient-theme-light">
                                                                                        <div
                                                                                            class="row align-items-center p-3 rounded">
                                                                                            <h6
                                                                                                class="fw-medium mb-0 translated_text">
                                                                                                {{ __('generated.Expériences') }}
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @forelse($profile?->experiences as $experience)
                                                                                <div class="card border-0 mb-3">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="card border-0">
                                                                                                    <div class="card-body" style="padding-left:30px ">
                                                                                                        <div class="row mb-3 mt-3">
                                                                                                            <div class="col-auto">
                                                                                                                <img src="{{ $experience->logo && file_exists(public_path('storage/' . $experience->logo))
                                                                                                                    ? asset('storage/' . $experience->logo)
                                                                                                                    : asset('assets/img/briefcase-icon-isolated-on-white-background-work-bag-symbol-free-vector.jpg') }}"
                                                                                                                    alt="Logo de l'expérience"
                                                                                                                    style="width: 60px;">
                                                                                                            </div>
                                                                                                            <div class="col">
                                                                                                                <h6 class="translated_text">
                                                                                                                    {{ __($experience->profession?->label) }}
                                                                                                                </h6>
                                                                                                                <p
                                                                                                                    class="text-secondary translated_text">
                                                                                                                    {{ __('generated.Du') }}
                                                                                                                    {{ $experience->started_at->translatedFormat('d/m/Y') }}
                                                                                                                    {{ __('generated.à') }}
                                                                                                                    {{ $experience->finished_at == null ? 'ce jour' : $experience->finished_at->translatedFormat('d/m/Y') }}
                                                                                                                </p>
                                                                                                                <p>{{ __($experience->description) }}
                                                                                                                </p>
                                                                                                                <h6 class="title ">
                                                                                                                    {{ __('generated.Missions réalisées') }}
                                                                                                                </h6>
                                                                                                                <p><b>{{ __($experience->project_name) }}</b>
                                                                                                                </p>
                                                                                                                @foreach ($experience->missions as $mission)
                                                                                                                    <p>{{ __($mission->description) }}
                                                                                                                    </p>
                                                                                                                @endforeach
                                                                                                                <div class="row mb-4">
                                                                                                                    @php
                                                                                                                        $skills = explode(
                                                                                                                            ',',
                                                                                                                            $experience->skills_tech,
                                                                                                                        );
                                                                                                                    @endphp
                                                                                                                    <div class="row mb-4">
                                                                                                                        @foreach ($skills as $skill)
                                                                                                                            <div class="col-auto">
                                                                                                                                <span
                                                                                                                                    class="badge badge-sm bg-blue">#{{ trim($skill) }}</span>
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
                                                                            @empty
                                                                                <div class="card border-0 mb-3">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="card border-0">
                                                                                                    <div class="card-body"
                                                                                                        style="padding-left: 30px">
                                                                                                        <div class="row mb-3 mt-3">
                                                                                                            <div class="col-auto">
                                                                                                                <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                                                    alt=""
                                                                                                                    style="width: 60px;">
                                                                                                            </div>
                                                                                                            <div class="col px-5 py-3">
                                                                                                                <h6>{{ __("generated.Ce profil n'a aucune éxperience") }}
                                                                                                                </h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforelse
                                                                        </div>
                                                                        <div class="tab-pane fade show active"
                                                                            id="posts4" role="tabpanel"
                                                                            aria-labelledby="posts4-tab">
                                                                            <div class="row mb-4 mt-4">
                                                                                <div class="col-12">
                                                                                    {{-- <h4
                                                                                    class="title custom-title translated_text">
                                                                                    Compétences
                                                                                    techniques</h4> --}}
                                                                                    <div
                                                                                        class="card-header bg-gradient-theme-light">
                                                                                        <div
                                                                                            class="row align-items-center p-3 rounded">
                                                                                            <h6
                                                                                                class="fw-medium mb-0 translated_text">
                                                                                                {{ __('generated.Compétences techniques') }}
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @forelse ($skillsgroup as $skillTypeId => $skillsInType)
                                                                            @if ($skillsInType->first()->skillType->parent_id != 1)
                                                                                @continue
                                                                            @endif
                                                                            <div class="card border-0 mb-4">
                                                                                <div class="card-body p-0">
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <div class="card border-0">
                                                                                                <div class="card-header bg-gradient-theme-light"
                                                                                                    style="padding: 18px 10px;">
                                                                                                    <h6>{{ __('generated.Catégorie') }}</h6>
                                                                                                </div>
                                                                                                @php
                                                                                                    $skillTypeLabel =
                                                                                                        $skillsInType->first()?->skillType
                                                                                                            ->label ?? 'Unknown';
                                                                                                @endphp
                                                                                                <div class="card-body"
                                                                                                    style="min-height: 304px;">
                                                                                                    <span
                                                                                                        style="margin-top: 42%;float: left;font-size: 17px;font-weight: 700;width: 100%;text-align: center;">{{ __($skillTypeLabel) }}</span>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-8">
                                                                                            <div class="card border-0" style="height: 100%;">
                                                                                                <div class="card-body p-0"
                                                                                                    style="padding: 8px 10px; height: 100%;">
                                                                                                    <div style="height: 100%;">
                                                                                                        <table class="table offres-table"
                                                                                                            data-show-toggle="true"
                                                                                                            style="margin-bottom: 0px">
                                                                                                            <thead
                                                                                                                class="bg-gradient-theme-light">
                                                                                                                <tr>
                                                                                                                    <td style="border: 0;">
                                                                                                                        <h6>{{ __('generated.Compétences') }}
                                                                                                                        </h6>
                                                                                                                    </td>
                                                                                                                    <td style="border: 0; width: 200px;">
                                                                                                                        <h6>{{ __('generated.Niveau') }}
                                                                                                                        </h6>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                @foreach ($skillsInType as $skill)
                                                                                                                    @php
                                                                                                                        $___skill = \DB::table(
                                                                                                                            'profiles_skills',
                                                                                                                        )
                                                                                                                            ->where(
                                                                                                                                'skill_id',
                                                                                                                                $skill?->id,
                                                                                                                            )
                                                                                                                            ->where(
                                                                                                                                'profile_id',
                                                                                                                                $profile?->id,
                                                                                                                            )
                                                                                                                            ->first();
                                                                                                                    @endphp
                                                                                                                    <tr>
                                                                                                                        <td>{{ __($skill?->label) }}
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            @switch($___skill?->level
                                                                                                                                ?? null)
                                                                                                                                @case(1)
                                                                                                                                    <span
                                                                                                                                        class="badge badge-sm bg-green">{{ __('generated.Débutant') }}</span>
                                                                                                                                @break

                                                                                                                                @case(2)
                                                                                                                                    <span
                                                                                                                                        class="badge badge-sm bg-yellow">{{ __('generated.Intermédiaire') }}</span>
                                                                                                                                @break

                                                                                                                                @case(3)
                                                                                                                                    <span
                                                                                                                                        class="badge badge-sm bg-blue">{{ __('generated.Avancé') }}</span>
                                                                                                                                @break

                                                                                                                                @case(4)
                                                                                                                                    <span
                                                                                                                                        class="badge badge-sm bg-red">{{ __('generated.Expert') }}</span>
                                                                                                                                @break

                                                                                                                                @default
                                                                                                                                    <span
                                                                                                                                        class="badge badge-sm bg-secondary">{{ __('generated.Inconnu') }}</span>
                                                                                                                            @endswitch
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                @endforeach
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            @empty
                                                                                <div class="card border-0 mb-3">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div class="card border-0">
                                                                                                    <div class="card-body"
                                                                                                        style="padding-left: 30px">
                                                                                                        <div class="row mb-3 mt-3">
                                                                                                            <div class="col-auto">
                                                                                                                <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                                                    alt=""
                                                                                                                    style="width: 60px;">
                                                                                                            </div>
                                                                                                            <div class="col px-5 py-3">
                                                                                                                <h6>{{ __("generated.Ce profil n'a aucune compétence technique") }}
                                                                                                                </h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforelse
                                                                            <div class="row mb-4 mt-4">
                                                                                <div class="col-12">

                                                                                    <div
                                                                                        class="card-header bg-gradient-theme-light">
                                                                                        <div
                                                                                            class="row align-items-center p-3 rounded">
                                                                                            <h6
                                                                                                class="fw-medium mb-0 translated_text">
                                                                                                {{ __('generated.Compétences personnelles') }}
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="card border-0 mb-4">
                                                                                <div class="card-body p-0">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card border-0 ">
                                                                                                {{-- <div
                                                                                                    class="card-header bg-gradient-theme-light ">
                                                                                                    <table
                                                                                                        class="table offres-table"
                                                                                                        data-show-toggle="true"
                                                                                                        style="margin-bottom: 0px">
                                                                                                        <thead class="bg-gradient-theme-light">
                                                                                                            <tr>
                                                                                                                <th rowspan="2"
                                                                                                                    style="font-weight: 600;border-bottom: 0;">
                                                                                                                    <h6>{{ __('generated.Catégorie') }}
                                                                                                                    </h6>
                                                                                                                </th>
                                                                                                                <th rowspan="2"
                                                                                                                    style="font-weight: 600;border-bottom: 0;">
                                                                                                                    <h6>{{ __('generated.Détail') }}
                                                                                                                    </h6>
                                                                                                                </th>
                                                                                                                <th rowspan="2"
                                                                                                                    style="font-weight: 600;border-bottom: 0; width: 200px;">
                                                                                                                    <h6>{{ __('generated.Niveau') }}
                                                                                                                    </h6>
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                    </table>
                                                                                                </div> --}}
                                                                                                <div class="card-body p-0">
                                                                                                    <table class="table offres-table" data-show-toggle="true">
                                                                                                        <thead class="bg-gradient-theme-light">
                                                                                                            <tr>
                                                                                                                <th rowspan="2"
                                                                                                                    style="font-weight: 600;border-bottom: 0;">
                                                                                                                    <h6>{{ __('generated.Catégorie') }}
                                                                                                                    </h6>
                                                                                                                </th>
                                                                                                                <th rowspan="2"
                                                                                                                    style="font-weight: 600;border-bottom: 0;">
                                                                                                                    <h6 style="margin-left: 70px;">{{ __('generated.Détail') }}
                                                                                                                    </h6>
                                                                                                                </th>
                                                                                                                <th rowspan="2"
                                                                                                                    style="font-weight: 600;border-bottom: 0; width: 200px;">
                                                                                                                    <h6>{{ __('generated.Niveau') }}
                                                                                                                    </h6>
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                                @forelse ($skillsgroup as $skillTypeId => $skillsInType)
                                                                                                                    @if ($skillsInType->first()->skillType->parent_id != 2)
                                                                                                                        @continue
                                                                                                                    @endif

                                                                                                                    @php
                                                                                                                        $skillTypeLabel =
                                                                                                                            $skillsInType->first()
                                                                                                                                ->skillType
                                                                                                                                ->label ??
                                                                                                                            'Unknown';
                                                                                                                    @endphp

                                                                                                                    @foreach ($skillsInType as $index => $skill)
                                                                                                                        @php
                                                                                                                            $__skill = \DB::table(
                                                                                                                                'profiles_skills',
                                                                                                                            )
                                                                                                                                ->where(
                                                                                                                                    'skill_id',
                                                                                                                                    $skill?->id,
                                                                                                                                )
                                                                                                                                ->where(
                                                                                                                                    'profile_id',
                                                                                                                                    $profile?->id,
                                                                                                                                )
                                                                                                                                ->first();
                                                                                                                        @endphp
                                                                                                                        <tr>
                                                                                                                            @if ($index === 0)
                                                                                                                                <td
                                                                                                                                    rowspan="{{ count($skillsInType) }}">
                                                                                                                                    {{ __($skillTypeLabel) }}
                                                                                                                                </td>
                                                                                                                            @endif

                                                                                                                            <td>{{ __($skill?->label) }}
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                @switch($__skill?->level ??
                                                                                                                                    null)
                                                                                                                                    @case(1)
                                                                                                                                        <span
                                                                                                                                            class="badge badge-sm bg-green">{{ __('generated.Débutant') }}</span>
                                                                                                                                    @break

                                                                                                                                    @case(2)
                                                                                                                                        <span
                                                                                                                                            class="badge badge-sm bg-yellow">{{ __('generated.Intermédiaire') }}</span>
                                                                                                                                    @break

                                                                                                                                    @case(3)
                                                                                                                                        <span
                                                                                                                                            class="badge badge-sm bg-blue">{{ __('generated.Avancé') }}</span>
                                                                                                                                    @break

                                                                                                                                    @case(4)
                                                                                                                                        <span
                                                                                                                                            class="badge badge-sm bg-red">{{ __('generated.Expert') }}</span>
                                                                                                                                    @break

                                                                                                                                    @default
                                                                                                                                        <span
                                                                                                                                            class="badge badge-sm bg-secondary">{{ __('generated.Inconnu') }}</span>
                                                                                                                                @endswitch
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    @endforeach
                                                                                                                    @empty

                                                                                                                        <div class="card border-0 mb-3">
                                                                                                                            <div class="card-body p-0">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-12">
                                                                                                                                        <div
                                                                                                                                            class="card border-0">
                                                                                                                                            <div class="card-body"
                                                                                                                                                style="padding-left: 30px">
                                                                                                                                                <div
                                                                                                                                                    class="row mb-3 mt-3">
                                                                                                                                                    <div
                                                                                                                                                        class="col-auto">
                                                                                                                                                        <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                                                                                            alt=""
                                                                                                                                                            style="width: 60px;">
                                                                                                                                                    </div>
                                                                                                                                                    <div
                                                                                                                                                        class="col px-5 py-3">
                                                                                                                                                        <h6> {{ __("generated.Ce profil n'a aucune compétences personnelles") }}

                                                                                                                                                        </h6>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                @endforelse
                                                                                                            </tbody>
                                                                                                    </table>
                                                                                           </div>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                    </div>
                                                                    <div class="tab-pane fade show active" id="posts3" role="tabpanel" aria-labelledby="posts3-tab">
                                                                                        <div class="row mb-4 mt-4">
                                                                                            <div
                                                                                                class="col-12">
                                                                                                {{-- <h4
                                                                                                class="title custom-title translated_text">

                                                                                            </h4> --}}
                                                                                                <div
                                                                                                    class="card-header bg-gradient-theme-light">
                                                                                                    <div
                                                                                                        class="row align-items-center p-3 rounded">
                                                                                                        <h6
                                                                                                            class="fw-medium mb-0 translated_text">
                                                                                                            {{ __('generated.Compétences linguistiques') }}
                                                                                                        </h6>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                                @forelse ($skillsgroup as $skillTypeId => $skillsInType)
                                                                                                    @if ($skillsInType->first()->skillType->parent_id != 3)
                                                                                                        @continue
                                                                                                    @endif
                                                                                                    <div class="card border-0 mb-4">
                                                                                                        <div class="card-body p-0">
                                                                                                            <div class="row">
                                                                                                                <div class="col-4">
                                                                                                                    @php
                                                                                                                        $skillTypeLabel =
                                                                                                                            $skillsInType->first()->skillType
                                                                                                                                ->label ?? 'Unknown';
                                                                                                                    @endphp
                                                                                                                    <div class="card border-0">
                                                                                                                        <div class="card-header bg-gradient-theme-light"
                                                                                                                            style="padding: 18px 10px;">
                                                                                                                            <h6>{{ __('generated.Langue') }}</h6>
                                                                                                                        </div>
                                                                                                                        <div class="card-body" style="min-height: 271px;">
                                                                                                                            <span
                                                                                                                                style="margin-top: 42%;float: left;font-size: 17px;font-weight: 700;width: 100%;text-align: center;">{{ __($skillTypeLabel) }}</span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-8">
                                                                                                                    <div class="card border-0" style="height: 100%;">
                                                                                                                        <div class="card-body p-0"
                                                                                                                            style="padding: 8px 10px; height: 100%;">
                                                                                                                            <div style=" height: 100%;">
                                                                                                                                <table class="table offres-table"
                                                                                                                                    data-show-toggle="true"
                                                                                                                                    style="margin-bottom: 0px">
                                                                                                                                    <thead class="bg-gradient-theme-light">
                                                                                                                                        <tr>
                                                                                                                                            <td style="border: 0;">
                                                                                                                                                <h6>{{ __('generated.Compétences') }}
                                                                                                                                                </h6>
                                                                                                                                            </td>
                                                                                                                                            <td style="border: 0; width: 200px;">
                                                                                                                                                <h6>{{ __('generated.Niveau') }}
                                                                                                                                                </h6>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </thead>
                                                                                                                                    <tbody>
                                                                                                                                        @foreach ($skillsInType as $skill)
                                                                                                                                            @php
                                                                                                                                                $_skill = \DB::table(
                                                                                                                                                    'profiles_skills',
                                                                                                                                                )
                                                                                                                                                    ->where(
                                                                                                                                                        'skill_id',
                                                                                                                                                        $skill?->id,
                                                                                                                                                    )
                                                                                                                                                    ->where(
                                                                                                                                                        'profile_id',
                                                                                                                                                        $profile?->id,
                                                                                                                                                    )
                                                                                                                                                    ->first();
                                                                                                                                            @endphp
                                                                                                                                            <tr>
                                                                                                                                                <td>{{ __($skill?->label) }}
                                                                                                                                                </td>
                                                                                                                                                <td>
                                                                                                                                                    @switch($_skill?->level
                                                                                                                                                        ?? null)
                                                                                                                                                        @case(5)
                                                                                                                                                            <span
                                                                                                                                                                class="badge badge-sm bg-green">{{ __('generated.A1 : Débutant') }}</span>
                                                                                                                                                        @break

                                                                                                                                                        @case(6)
                                                                                                                                                            <span
                                                                                                                                                                class="badge badge-sm bg-green">{{ __('generated.A2 : Intermédiaire bas') }}</span>
                                                                                                                                                        @break

                                                                                                                                                        @case(7)
                                                                                                                                                            <span
                                                                                                                                                                class="badge badge-sm bg-blue">{{ __('generated.B1 : Intermédiaire') }}</span>
                                                                                                                                                        @break

                                                                                                                                                        @case(8)
                                                                                                                                                            <span
                                                                                                                                                                class="badge badge-sm bg-blue">{{ __('generated.B2 : Intermédiaire avancé') }}</span>
                                                                                                                                                        @break

                                                                                                                                                        @case(9)
                                                                                                                                                            <span
                                                                                                                                                                class="badge badge-sm bg-red">{{ __('generated.C1 : Avancé') }}</span>
                                                                                                                                                        @break

                                                                                                                                                        @case(10)
                                                                                                                                                            <span
                                                                                                                                                                class="badge badge-sm bg-red">{{ __('generated.C2 : Maîtrise') }}</span>
                                                                                                                                                        @break

                                                                                                                                                        @default
                                                                                                                                                            <span
                                                                                                                                                                class="badge badge-sm bg-secondary">{{ __('generated.Inconnu') }}</span>
                                                                                                                                                    @endswitch
                                                                                                                                                </td>
                                                                                                                                            </tr>
                                                                                                                                        @endforeach
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    @empty
                                                                                                        <div class="card border-0 mb-3">
                                                                                                            <div class="card-body p-0">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12">
                                                                                                                        <div class="card border-0">
                                                                                                                            <div class="card-body" style="padding-left: 30px">
                                                                                                                                <div class="row mb-3 mt-3">
                                                                                                                                    <div class="col-auto">
                                                                                                                                        <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                                                                            alt=""
                                                                                                                                            style="width: 60px;">
                                                                                                                                    </div>
                                                                                                                                    <div class="col px-5 py-3">
                                                                                                                                        <h6 class="translated_text">
                                                                                                                                            {{ __("generated.Ce profil n'a aucune compétences linguistiques") }}
                                                                                                                                        </h6>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                @endforelse

                                                                                                </div>
                                                                                                <div class="tab-pane fade show active"
                                                                                                    id="posssts3"
                                                                                                    role="tabpanel"
                                                                                                    aria-labelledby="posssts3-tab">
                                                                                                    <div
                                                                                                        class="row mb-4 mt-4">
                                                                                                        <div
                                                                                                            class="col-12">
                                                                                                            {{-- <h4
                                                                                                            class="title custom-title translated_text">

                                                                                                        </h4> --}}
                                                                                                            <div
                                                                                                                class="card-header bg-gradient-theme-light">
                                                                                                                <div
                                                                                                                    class="row align-items-center p-3 rounded">
                                                                                                                    <h6
                                                                                                                        class="fw-medium mb-0 translated_text">
                                                                                                                        {{ __('generated.Mobilité') }}
                                                                                                                    </h6>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-12">
                                                                                                            <div class="card border-0">
                                                                                                                <div class="card-body p-0">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-12">
                                                                                                                            @if (
                                                                                                                                (empty($mobility['geographique']) || count($mobility['geographique']) === 0) &&
                                                                                                                                    (empty($mobility['mode_travail']) || count($mobility['mode_travail']) === 0) &&
                                                                                                                                    (empty($mobility['temps_travail']) || count($mobility['temps_travail']) === 0) &&
                                                                                                                                    (empty($mobility['disponibli']) || count($mobility['disponibli']) === 0))
                                                                                                                                <div class="card border-0 mb-3">
                                                                                                                                    <div class="card-body p-0">
                                                                                                                                        <div class="row">
                                                                                                                                            <div class="col-12">
                                                                                                                                                <div class="card border-0">
                                                                                                                                                    <div class="card-body"
                                                                                                                                                        style="padding-left: 30px">
                                                                                                                                                        <div class="row mb-3 mt-3">
                                                                                                                                                            <div class="col-auto">
                                                                                                                                                                <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                                                                                                    alt=""
                                                                                                                                                                    style="width: 60px;">
                                                                                                                                                            </div>
                                                                                                                                                            <div
                                                                                                                                                                class="col px-5 py-3">
                                                                                                                                                                <h6
                                                                                                                                                                    class="translated_text">
                                                                                                                                                                    {{ __("generated.Ce profil n'a aucune Mobilité") }}
                                                                                                                                                                </h6>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            @else
                                                                                                                                <div class="card border-0">
                                                                                                                                    <div class="card-body">
                                                                                                                                        <div class="row">
                                                                                                                                            <!-- Mobilité géographique -->
                                                                                                                                            <div class="col-12 col-lg-6 mb-4">
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <strong>{{ __('generated.Mobilité géographique :') }}</strong>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <ul
                                                                                                                                                            class="mb-0 translated_text">
                                                                                                                                                            @foreach ($mobility['geographique'] as $m)
                                                                                                                                                                <li>{{ __('generated.' . $m->mobilityOptionType?->label) ?? ' - ' }}
                                                                                                                                                                    :
                                                                                                                                                                    {{ $m->weight ?? ' -' }}%
                                                                                                                                                                </li>
                                                                                                                                                                </li>
                                                                                                                                                            @endforeach
                                                                                                                                                        </ul>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>

                                                                                                                                            <!-- Mode de travail -->
                                                                                                                                            <div class="col-12 col-lg-6 mb-4">
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <strong>{{ __('generated.Mode de travail :') }}</strong>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <ul
                                                                                                                                                            class="mb-0 translated_text">
                                                                                                                                                            @foreach ($mobility['mode_travail'] as $m)
                                                                                                                                                                <li>{{ __('generated.' . $m->mobilityOptionType?->label) ?? ' - ' }}
                                                                                                                                                                    :
                                                                                                                                                                    {{ $m->weight ?? ' -' }}%
                                                                                                                                                                </li>
                                                                                                                                                            @endforeach
                                                                                                                                                        </ul>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>

                                                                                                                                            <!-- Temps de travail -->
                                                                                                                                            <div class="col-12 col-lg-6 mb-4">
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <strong>{{ __('generated.Temps de travail :') }}</strong>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <ul
                                                                                                                                                            class="mb-0 translated_text">
                                                                                                                                                            @foreach ($mobility['temps_travail'] as $m)
                                                                                                                                                                <li>{{ __('generated.' . $m->mobilityOptionType?->label) ?? ' - ' }}
                                                                                                                                                                    :
                                                                                                                                                                    {{ $m->weight ?? ' -' }}%
                                                                                                                                                                </li>
                                                                                                                                                            @endforeach
                                                                                                                                                        </ul>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>

                                                                                                                                            <!-- Disponibilité -->
                                                                                                                                            <div class="col-12 col-lg-6 mb-4">
                                                                                                                                                <div class="row">
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <strong>{{ __('generated.Disponibilité :') }}</strong>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-6">
                                                                                                                                                        <ul
                                                                                                                                                            class="mb-0 translated_text">
                                                                                                                                                            @foreach ($mobility['disponibli'] as $m)
                                                                                                                                                                <li>
                                                                                                                                                                    {{ __('generated.' . $m->mobilityOptionType?->label) ?? ' - ' }}
                                                                                                                                                                    :
                                                                                                                                                                    {{ $m->notice_period_per_month !== null
                                                                                                                                                                        ? App\Enums\Profile\NoticePeriodEnum::getLabel($m->notice_period_per_month)
                                                                                                                                                                        : '' }}
                                                                                                                                                                </li>
                                                                                                                                                            @endforeach
                                                                                                                                                        </ul>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div> <!-- row -->

                                                                                                                                    </div> <!-- card-body -->
                                                                                                                                </div> <!-- card -->
                                                                                                                            @endif
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade show active"
                                                                                                    id="posts5"
                                                                                                    role="tabpanel"
                                                                                                    aria-labelledby="posts5-tab">
                                                                                                    <div class="row mb-4 mt-4">
                                                                                                        <div class="col-12">
                                                                                                            <div
                                                                                                                class="card-header bg-gradient-theme-light">
                                                                                                                <div
                                                                                                                    class="row align-items-center p-3 rounded">
                                                                                                                    <h6
                                                                                                                        class="fw-medium mb-0 translated_text">
                                                                                                                        {{ __('generated.Recommandations') }}
                                                                                                                    </h6>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                       @forelse ($recommendations as $recommandation)
                                                                                                        <div class="card border-0 mb-3">
                                                                                                            <div class="card-body p-0">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12">
                                                                                                                        <div class="card border-0">
                                                                                                                            <div class="card-body"
                                                                                                                                style="padding-left: 30px">
                                                                                                                                <div class="row mb-3 mt-3">
                                                                                                                                    <div class="col-auto">
                                                                                                                                        <img src="{{ $recommandation->photo ? asset('storage/' . $recommandation->photo) : asset('assets/img/male-perso-default.webp') }}"
                                                                                                                                            alt="Photo de {{ $recommandation?->first_name ?? 'Utilisateur' }}"
                                                                                                                                            class="avatar-60 avatar rounded-circle coverimg">
                                                                                                                                    </div>
                                                                                                                                    <div class="col mt-1">
                                                                                                                                        <h6 class="translated_text">
                                                                                                                                        {{ $recommandation?->first_name && $recommandation?->last_name ? $recommandation?->first_name . ' ' . $recommandation?->last_name : '_' }}
                                                                                                                                        </h6>
                                                                                                                                        <p class="text-secondary"
                                                                                                                                            style="margin-bottom: 0;">
                                                                                                                                            {{ __($recommandation->profession->label) ?? ' - ' }}.
                                                                                                                                            {{ __('generated.Recommandé le') }}
                                                                                                                                            {{ \Carbon\Carbon::parse($recommandation->created_at)->translatedFormat('d F Y') }}
                                                                                                                                        </p>
                                                                                                                                        <p>
                                                                                                                                            {{ $recommandation?->message ?? ' - ' }}
                                                                                                                                        </p>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        @empty
                                                                                                        <div class="card border-0 mb-3">
                                                                                                            <div class="card-body p-0">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12">
                                                                                                                        <div class="card border-0">
                                                                                                                            <div class="card-body" style="padding-left: 30px">
                                                                                                                                <div class="row mb-3 mt-3">
                                                                                                                                    <div class="col-auto">
                                                                                                                                        <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                                                                            alt="" style="width: 60px;">
                                                                                                                                    </div>
                                                                                                                                    <div class="col px-5 py-3">
                                                                                                                                        <h6 class="translated_text">
                                                                                                                                            {{ __('generated.Ce profil n\'a aucune recommandation') }}
                                                                                                                                        </h6>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        @endforelse
                                                                                                        </div>
                                                                                                <div class="tab-pane fade show active"
                                                                                                    id="posts5"
                                                                                                    role="tabpanel"
                                                                                                    aria-labelledby="posts5-tab">
                                                                                                    <div class="row mb-4 mt-4"
                                                                                                        style="    margin-bottom: 30px !important;">
                                                                                                        <div
                                                                                                            class="col-12">
                                                                                                            {{-- <h4
                                                                                                            class="title custom-title translated_text">
                                                                                                            Poste
                                                                                                            souhaité</h4> --}}
                                                                                                            <div
                                                                                                                class="card-header bg-gradient-theme-light">
                                                                                                                <div
                                                                                                                    class="row align-items-center p-3 rounded">
                                                                                                                    <h6
                                                                                                                        class="fw-medium mb-0 translated_text">
                                                                                                                        {{ __('generated.Poste souhaité') }}
                                                                                                                    </h6>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row mb-4">
                                                                                                        <div
                                                                                                            class="col-12">

                                                                                                            @if ($profile->desired_profile)
                                                                                                                <h5
                                                                                                                    style="text-align: justify; margin-left:15px">
                                                                                                                    {{ $profile->desired_profile }}
                                                                                                                </h5>
                                                                                                            @else
                                                                                                                <div
                                                                                                                    class="card border-0">
                                                                                                                    <div class="card-body"
                                                                                                                        style="padding-left: 30px">
                                                                                                                        <div
                                                                                                                            class="row mb-3 mt-3">
                                                                                                                            <div
                                                                                                                                class="col-auto">
                                                                                                                                <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.png') }}"
                                                                                                                                    alt=""
                                                                                                                                    style="width: 60px;">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col px-5 py-3">
                                                                                                                                <h6
                                                                                                                                    class="translated_text">
                                                                                                                                    {{ __("generated.Ce  profil n'a aucun poste souhaité") }}
                                                                                                                                </h6>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @endif

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tab-pane fade "
                                                                                        id="tab11120" role="tabpanel"
                                                                                        aria-labelledby="tab11120-tab">
                                                                                        <div class="row mb-5 mt-5">
                                                                                            2
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tab-pane fade "
                                                                                        id="tab1120" role="tabpanel"
                                                                                        aria-labelledby="tab1120-tab">
                                                                                        <div class="row mb-5 mt-5">
                                                                                            3
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="tabM11120" role="tabpanel"
                                                                aria-labelledby="tabM11120-tab">
                                                                <div class="row mb-5">
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="card border-0">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="card border-0 h-100 ">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center"
                                                                                                    style="padding: 25px 12px 0px;">
                                                                                                    <div class="col-auto">
                                                                                                        <i class="bi bi-play-btn h5 avatar avatar-40 bg-light-blue text-blue rounded"
                                                                                                            style="font-size: 26px;"></i>
                                                                                                    </div>
                                                                                                    <div class="col">
                                                                                                        <h6
                                                                                                            class="fw-medium mb-0 translated_text">
                                                                                                            {{ __('generated.CV vidéo') }}
                                                                                                        </h6>
                                                                                                        <p
                                                                                                            class="text-secondary small">
                                                                                                            {{ __('generated.Durée :') }}
                                                                                                            {{ $profile->cv_video_duration ?? '' }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body p-0"
                                                                                                style="min-height: 518px;padding:15px 24px !important;">
                                                                                                <div
                                                                                                    class="row justify-content-center">
                                                                                                    @if ($profile->path_cv_video == null)
                                                                                                        <img src="{{ asset('assets/img/no-result-data-not-found-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-etc-vector.PNG') }}"
                                                                                                            alt=""
                                                                                                            style="width: 400px">
                                                                                                        <h4
                                                                                                            class="text-center translated_text">
                                                                                                            {{ __("generated.Ce profil n'a aucun CV Vidéo") }}
                                                                                                        </h4>
                                                                                                        <video
                                                                                                            style="width: 100%; display:none"
                                                                                                            id="myVideo"
                                                                                                            controls="false">
                                                                                                            <source
                                                                                                                src=""
                                                                                                                type="video/mp4" />
                                                                                                        </video>
                                                                                                    @else
                                                                                                        <video
                                                                                                            style="width: 100%;"
                                                                                                            id="myVideo"
                                                                                                            controls="false">
                                                                                                            <source
                                                                                                                src="{{ Storage::url($profile->path_cv_video) }}"
                                                                                                                type="video/mp4" />
                                                                                                        </video>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-footer card-footer-separated"
                                                                                                style="padding: 21px 13px;">
                                                                                                <div
                                                                                                    class="row justify-content-center">
                                                                                                    <div class="col-12">
                                                                                                        <input
                                                                                                            id="seekBar"
                                                                                                            type="range"
                                                                                                            min="0"
                                                                                                            max="100"
                                                                                                            value="0">
                                                                                                    </div>
                                                                                                    <div class="col-2"
                                                                                                        style="margin-right: -33px;">
                                                                                                        <div
                                                                                                            class="custom-controls controls1">
                                                                                                            <div class="avatar avatar-50 rounded bg-light-cyan translated_text"
                                                                                                                id="playPause"
                                                                                                                data-bs-toggle="tooltip"
                                                                                                                data-bs-placement="top"
                                                                                                                title="{{ __('generated.Lire') }}"
                                                                                                                style="cursor: pointer;background-color: transparent !important;">
                                                                                                                <i
                                                                                                                    class="bi bi-play-fill h2"></i>
                                                                                                            </div>

                                                                                                            <div class="avatar avatar-50 rounded bg-light-cyan hidden"
                                                                                                                id="rewind"
                                                                                                                style="cursor: pointer;background-color: transparent !important;">
                                                                                                                <i
                                                                                                                    class="bi bi-rewind-btn h5"></i>
                                                                                                            </div>
                                                                                                            <span
                                                                                                                id="timeDisplay">00:00</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div
                                                                                                            class="custom-controls controls2">
                                                                                                            <div
                                                                                                                class="volume-show">
                                                                                                                <div class="avatar avatar-50 rounded bg-light-cyan translated_text"
                                                                                                                    id="mute"
                                                                                                                    data-bs-toggle="tooltip"
                                                                                                                    data-bs-placement="top"
                                                                                                                    title="{{ __('generated.Activer / Désactiver le son') }}"
                                                                                                                    style="cursor: pointer;background-color: transparent !important;">
                                                                                                                    <i
                                                                                                                        class="bi bi-volume-up h4"></i>
                                                                                                                </div>
                                                                                                                <input
                                                                                                                    id="volumeBar"
                                                                                                                    type="range"
                                                                                                                    min="0"
                                                                                                                    max="1"
                                                                                                                    step="0.1"
                                                                                                                    value="1"
                                                                                                                    class="hidden">
                                                                                                            </div>
                                                                                                            <div class="avatar avatar-50 rounded bg-light-cyan translated_text"
                                                                                                                id="fullscreen"
                                                                                                                data-bs-toggle="tooltip"
                                                                                                                data-bs-placement="top"
                                                                                                                title="{{ __('generated.Plein écran') }}"
                                                                                                                style="cursor: pointer;background-color: transparent !important;">
                                                                                                                <i
                                                                                                                    class="bi bi-fullscreen h4"></i>
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
                                                            <div class="tab-pane fade" id="tabLM11120" role="tabpanel"
                                                                aria-labelledby="tabLM11120-tab"
                                                                style="padding: 10px 23px">
                                                                <div class="row">

                                                                    <div class="col-12 mb-4">
                                                                        {{-- <h4 class="title custom-title translated_text">Score</h4> --}}
                                                                        <div
                                                                            class="card-header bg-gradient-theme-light rounded">
                                                                            <div
                                                                                class="row align-items-center p-4 rounded">
                                                                                <h6
                                                                                    class="fw-medium mb-0 translated_text">
                                                                                    {{ __('generated.Lettre de motivation') }}
                                                                                </h6>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="row align-items-center py-2">
                                                                            <div class="col-12">
                                                                                <div class="card border-0 mb-4">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                @forelse($profile->coverLetters as $coverletter)
                                                                                                    <div
                                                                                                        class="card border-0">
                                                                                                        <div class="card-body p-0"
                                                                                                            style="padding: 15px 42px;">
                                                                                                            <div
                                                                                                                class="row mb-4">
                                                                                                                <div
                                                                                                                    class="col-12">
                                                                                                                    <span
                                                                                                                        class="ms-auto"
                                                                                                                        style="float: right;font-size: 14px; text-align: justify;color: #5d6266 !important;">{{ $profile->city->name }},
                                                                                                                        {{ $coverletter->created_at->toDateString() }}</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="row mb-4">
                                                                                                                <h4> <span
                                                                                                                        class="translated_text">{{ __('generated.Objet : ') }}</span>
                                                                                                                    {{ $coverletter->subject }}
                                                                                                                </h4>
                                                                                                                <p class="text-secondary"
                                                                                                                    style="font-size: 14px; text-align: justify;color: #5d6266 !important;">
                                                                                                                    {!! $coverletter->description !!}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @empty
                                                                                                    <div
                                                                                                        class="card border-0">
                                                                                                        <div
                                                                                                            class="card-body p-0">
                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-12">
                                                                                                                    <div
                                                                                                                        class="card border-0">
                                                                                                                        <div class="card-body"
                                                                                                                            style="padding-left: 30px">
                                                                                                                            <div
                                                                                                                                class="row mb-3 mt-3">
                                                                                                                                <div
                                                                                                                                    class="col-auto">
                                                                                                                                    <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.png') }}"
                                                                                                                                        alt=""
                                                                                                                                        style="width: 60px;">
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="col px-5 py-3">
                                                                                                                                    <h4 class="translated_text">
                                                                                                                                        {{ __('generated.Ce profil n\'a aucune lettre de motivation') }}
                                                                                                                                    </h4>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endforelse
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @include('matching.inc.timeline')
                                                            @include('matching.inc.rapport')


                                                            <div class="tab-pane fade" id="tabLR11120M"
                                                                role="tabpanel" aria-labelledby="tabLR11120M-tab">

                                                                <div class="row justify-content-center ">

                                                                    <div class="col-2 ms-auto"
                                                                        style="width: 22%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row"
                                                                            style="justify-content: end;">
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;" title="{{ __("generated.Aperçu") }}">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="{{ route('detail.evaluator.preview', ['match' => $match, 'profile' => $profile, 'jobOffer' => $joboffer]) }}"
                                                                                        target="_blank"><i
                                                                                            class="bi bi-binoculars avatar   rounded h5"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: 0;" title="{{ __("generated.Partager") }}">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcompose">
                                                                                        <i
                                                                                            class="bi bi-share avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>



                                                                    <div class="row mt-1 mb-4">
                                                                        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center"
                                                                            id="myTab" role="tablist">
                                                                            <li class="nav-item" role="presentation">
                                                                                <button
                                                                                    class="nav-link active translated_text"
                                                                                    id="planner-tab"
                                                                                    data-bs-toggle="tab"
                                                                                    data-bs-target="#planner"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="planner"
                                                                                    aria-selected="true">{{ __('generated.Cabinet de recrutement') }}</button>
                                                                            </li>
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link translated_text"
                                                                                    id="postsM-tab" data-bs-toggle="tab"
                                                                                    data-bs-target="#postsM"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="postsM"
                                                                                    aria-selected="false"
                                                                                    tabindex="-1">{{ __('generated.Client') }}</button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="card border-0">
                                                                                <div class="card-body p-0">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card border-0">
                                                                                                <div class="card-body p-0"
                                                                                                    style="padding: 10px 33px;">
                                                                                                    <div class="tab-content"
                                                                                                        id="myTabContent">
                                                                                                        <div class="tab-pane fade show active"
                                                                                                            id="planner"
                                                                                                            role="tabpanel"
                                                                                                            aria-labelledby="planner-tab">
                                                                                                            <div
                                                                                                                class="row mb-4">
                                                                                                                <div
                                                                                                                    class="col-12">
                                                                                                                    {{-- <h4
                                                                                                                class="title custom-title translated_text">
                                                                                                                Evaluation
                                                                                                                cabinet de
                                                                                                                recrutement
                                                                                                            </h4> --}}
                                                                                                                    <div
                                                                                                                        class="card-header bg-gradient-theme-light">
                                                                                                                        <div
                                                                                                                            class="row align-items-center">
                                                                                                                            <h6
                                                                                                                                class="fw-medium mb-0 translated_text">
                                                                                                                                {{ __('generated.Evaluation cabinet de recrutement') }}
                                                                                                                            </h6>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-12">
                                                                                                                    <div
                                                                                                                        class="table-responsive">
                                                                                                                        <form
                                                                                                                            method="post"
                                                                                                                            action=""
                                                                                                                            id="form_evaluation_cabinet">

                                                                                                                            <table
                                                                                                                                class="table">
                                                                                                                                <thead
                                                                                                                                    style="font-size: 13px">
                                                                                                                                    <tr
                                                                                                                                        style="border-top: 1px solid #c7c7c7;">
                                                                                                                                        <th style="width: 176px;"
                                                                                                                                            class="translated_text">
                                                                                                                                            {{ __('generated.Critère') }}
                                                                                                                                        </th>
                                                                                                                                        <th style="width: 200px"
                                                                                                                                            class="translated_text">
                                                                                                                                            {{ __('generated.Prénom et Nom') }}
                                                                                                                                        </th>
                                                                                                                                        <th
                                                                                                                                            class="translated_text">
                                                                                                                                            {{ __('generated.Date') }}
                                                                                                                                        </th>
                                                                                                                                        <th style="text-align: right;width: 109px;"
                                                                                                                                            class="translated_text">
                                                                                                                                            {{ __('generated.Note') }}
                                                                                                                                        </th>
                                                                                                                                        <th style="text-align: right"
                                                                                                                                            class="translated_text">
                                                                                                                                            {{ __('generated.Coefficient') }}
                                                                                                                                        </th>
                                                                                                                                        <th style="text-align: right"
                                                                                                                                            class="translated_text">
                                                                                                                                            {{ __('generated.Pondération') }}
                                                                                                                                        </th>
                                                                                                                                        <th style="text-align: center;width: 567px"
                                                                                                                                            class="translated_text">
                                                                                                                                            {{ __('generated.Appréciation') }}
                                                                                                                                        </th>
                                                                                                                                    </tr>
                                                                                                                                </thead>
                                                                                                                                <tbody
                                                                                                                                    style="font-size: 13px"
                                                                                                                                    class="searchInput">
                                                                                                                                    @foreach ($evaluatorsEvaluationCompany as $evaluator)
                                                                                                                                        <tr>
                                                                                                                                            <td
                                                                                                                                                style="vertical-align: middle;">
                                                                                                                                                <span
                                                                                                                                                    class="translated_text">
                                                                                                                                                    {{ $evaluator->evaluation_type }}</span><br>

                                                                                                                                                <input
                                                                                                                                                    type="hidden"
                                                                                                                                                    name="evaluation_type_id"
                                                                                                                                                    value="{{ $evaluator->evaluation_type_id }}">
                                                                                                                                                <input
                                                                                                                                                    type="hidden"
                                                                                                                                                    name="profile_id"
                                                                                                                                                    value="{{ $profile->id }}">
                                                                                                                                                <input
                                                                                                                                                    type="hidden"
                                                                                                                                                    name="evaluator_id"
                                                                                                                                                    value="{{ $evaluator->id }}">


                                                                                                                                            </td>
                                                                                                                                            <td
                                                                                                                                                style="vertical-align: middle;">
                                                                                                                                                <input
                                                                                                                                                    type="hidden"
                                                                                                                                                    name="first_name"
                                                                                                                                                    value="{{ $evaluator->first_name }}">
                                                                                                                                                <input
                                                                                                                                                    type="hidden"
                                                                                                                                                    name="last_name"
                                                                                                                                                    value="{{ $evaluator->last_name }}">

                                                                                                                                                <div
                                                                                                                                                    class="row">
                                                                                                                                                    <div class="col-auto"
                                                                                                                                                        style="margin-right: -16px">
                                                                                                                                                        <figure
                                                                                                                                                            class="avatar avatar-50 mb-0 coverimg "
                                                                                                                                                            style="background-image: url(&quot;assets/img/icon2/9989.jpg&quot;);">
                                                                                                                                                            <img src="{{ asset('assets/img/icon2/9989.jpg') }}"
                                                                                                                                                                alt=""
                                                                                                                                                                style="display: none;">
                                                                                                                                                        </figure>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-auto"
                                                                                                                                                        style="margin-top: 8px;margin-left: 5px;">
                                                                                                                                                        <span><span
                                                                                                                                                                class="Abdellah">{{ $evaluator->first_name }}</span><br>
                                                                                                                                                            <span
                                                                                                                                                                class="translated_text">{{ $evaluator->last_name }}
                                                                                                                                                            </span></span>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </td>
                                                                                                                                            <td
                                                                                                                                                style="vertical-align: middle;">
                                                                                                                                                12/12/2024
                                                                                                                                            </td>
                                                                                                                                            <td
                                                                                                                                                style="vertical-align: middle;text-align: right">
                                                                                                                                                <div class="input-group "
                                                                                                                                                    style="width: 40px;float: right;">
                                                                                                                                                    <input
                                                                                                                                                        style="text-align: center;border-bottom: 1px solid #2e9c65;width: 40px;text-align: right"
                                                                                                                                                        type="text"
                                                                                                                                                        class="form-control translated_text"
                                                                                                                                                        placeholder=""
                                                                                                                                                        {{ !$evaluator->can_evaluate ? 'disabled' : '' }}
                                                                                                                                                        value="{{ $evaluator->mark }}">
                                                                                                                                                </div>
                                                                                                                                            </td>
                                                                                                                                            <td
                                                                                                                                                style="vertical-align: middle;text-align: center">
                                                                                                                                                <span
                                                                                                                                                    class="coefficient-value">
                                                                                                                                                    {{ $evaluator->coefficient }}
                                                                                                                                                </span>
                                                                                                                                                <input
                                                                                                                                                    type="hidden"
                                                                                                                                                    name="coefficient"
                                                                                                                                                    value="{{ $evaluator->coefficient }}">

                                                                                                                                            </td>
                                                                                                                                            <td
                                                                                                                                                style="vertical-align: middle;text-align: center">
                                                                                                                                                <span
                                                                                                                                                    class="ponderation-value">
                                                                                                                                                    {{ $evaluator->ponderation }}
                                                                                                                                                </span>
                                                                                                                                                <input
                                                                                                                                                    type="hidden"
                                                                                                                                                    name="ponderation">

                                                                                                                                            </td>
                                                                                                                                            <td>
                                                                                                                                                <textarea name="evaluation"
                                                                                                                                                    style="text-align: justify;width: 100%;background-color: #e3e7f1;border-radius: 5px;border: 0;border-bottom: 1px solid #319e68;padding: 6px;"
                                                                                                                                                    rows="5" class="translated_text" {{ !$evaluator->can_evaluate ? 'disabled' : '' }}>
                                                                                                                                {{ $evaluator->evaluation }}
                                                                                                                            </textarea>

                                                                                                                                            </td>
                                                                                                                                            <td
                                                                                                                                                style="vertical-align: middle;text-align: center">
                                                                                                                                                @if ($evaluator->can_evaluate)
                                                                                                                                                    <button
                                                                                                                                                        class="btn   btn-primary">
                                                                                                                                                        <i
                                                                                                                                                            class="bi bi-check2"></i>
                                                                                                                                                    </button>
                                                                                                                                                @endif
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    @endforeach

                                                                                                                                </tbody>
                                                                                                                            </table>

                                                                                                                        </form>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="tab-pane fade"
                                                                                                            id="postsM"
                                                                                                            role="tabpanel"
                                                                                                            aria-labelledby="postsM-tab">
                                                                                                            <div
                                                                                                                class="row mb-4">
                                                                                                                <div
                                                                                                                    class="col-12">
                                                                                                                    {{-- <h4
                                                                                                                class="title custom-title translated_text">
                                                                                                                Evaluation
                                                                                                                client</h4> --}}
                                                                                                                    <div
                                                                                                                        class="card-header bg-gradient-theme-light">
                                                                                                                        <div
                                                                                                                            class="row align-items-center">
                                                                                                                            <h6
                                                                                                                                class="fw-medium mb-0 translated_text">
                                                                                                                                {{ __('generated.Evaluation client') }}
                                                                                                                            </h6>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-12">
                                                                                                                    <form
                                                                                                                        method="post"
                                                                                                                        action=""
                                                                                                                        id="form_evaluation_client">
                                                                                                                        <table
                                                                                                                            class="table">
                                                                                                                            <thead
                                                                                                                                style="font-size: 13px">
                                                                                                                                <tr
                                                                                                                                    style="border-top: 1px solid #c7c7c7;">
                                                                                                                                    <th style="width: 176px;"
                                                                                                                                        class="translated_text">
                                                                                                                                        {{ __('generated.Critère') }}
                                                                                                                                    </th>
                                                                                                                                    <th style="width: 200px"
                                                                                                                                        class="translated_text">
                                                                                                                                        {{ __('generated.Prénom et Nom') }}
                                                                                                                                    </th>
                                                                                                                                    <th
                                                                                                                                        class="translated_text">
                                                                                                                                        {{ __('generated.Date') }}
                                                                                                                                    </th>
                                                                                                                                    <th style="text-align: right;width: 109px;"
                                                                                                                                        class="translated_text">
                                                                                                                                        {{ __('generated.Note') }}
                                                                                                                                    </th>
                                                                                                                                    <th style="text-align: right"
                                                                                                                                        class="translated_text">
                                                                                                                                        {{ __('generated.Coefficient') }}
                                                                                                                                    </th>
                                                                                                                                    <th style="text-align: right"
                                                                                                                                        class="translated_text">
                                                                                                                                        {{ __('generated.Pondération') }}
                                                                                                                                    </th>
                                                                                                                                    <th style="text-align: center;width: 567px"
                                                                                                                                        class="translated_text">
                                                                                                                                        {{ __('generated.Appréciation') }}
                                                                                                                                    </th>
                                                                                                                                </tr>
                                                                                                                            </thead>
                                                                                                                            <tbody
                                                                                                                                style="font-size: 13px"
                                                                                                                                class="searchInput">
                                                                                                                                @foreach ($evaluators_evaluation as $evaluator)
                                                                                                                                    <tr>
                                                                                                                                        <td
                                                                                                                                            style="vertical-align: middle;">
                                                                                                                                            <span
                                                                                                                                                class="translated_text">
                                                                                                                                                {{ $evaluator->evaluation_type }}</span><br>

                                                                                                                                            <input
                                                                                                                                                type="hidden"
                                                                                                                                                name="evaluation_type_id"
                                                                                                                                                value="{{ $evaluator->evaluation_type_id }}">
                                                                                                                                            <input
                                                                                                                                                type="hidden"
                                                                                                                                                name="profile_id"
                                                                                                                                                value="{{ $profile->id }}">
                                                                                                                                            <input
                                                                                                                                                type="hidden"
                                                                                                                                                name="evaluator_id"
                                                                                                                                                value="{{ $evaluator->id }}">


                                                                                                                                        </td>
                                                                                                                                        <td
                                                                                                                                            style="vertical-align: middle;">
                                                                                                                                            <input
                                                                                                                                                type="hidden"
                                                                                                                                                name="first_name"
                                                                                                                                                value="{{ $evaluator->first_name }}">
                                                                                                                                            <input
                                                                                                                                                type="hidden"
                                                                                                                                                name="last_name"
                                                                                                                                                value="{{ $evaluator->last_name }}">

                                                                                                                                            <div
                                                                                                                                                class="row">
                                                                                                                                                <div class="col-auto"
                                                                                                                                                    style="margin-right: -16px">
                                                                                                                                                    <figure
                                                                                                                                                        class="avatar avatar-50 mb-0 coverimg "
                                                                                                                                                        style="background-image: url(&quot;assets/img/icon2/9989.jpg&quot;);">
                                                                                                                                                        <img src="{{ asset('assets/img/icon2/9989.jpg') }}"
                                                                                                                                                            alt=""
                                                                                                                                                            style="display: none;">
                                                                                                                                                    </figure>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-auto"
                                                                                                                                                    style="margin-top: 8px;margin-left: 5px;">
                                                                                                                                                    <span><span
                                                                                                                                                            class="Abdellah">{{ $evaluator->first_name }}</span><br>
                                                                                                                                                        <span
                                                                                                                                                            class="translated_text">{{ $evaluator->last_name }}
                                                                                                                                                        </span></span>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </td>
                                                                                                                                        <td
                                                                                                                                            style="vertical-align: middle;">
                                                                                                                                            12/12/2024
                                                                                                                                        </td>
                                                                                                                                        <td
                                                                                                                                            style="vertical-align: middle;text-align: right">
                                                                                                                                            <div class="input-group "
                                                                                                                                                style="width: 40px;float: right;">
                                                                                                                                                <input
                                                                                                                                                    style="text-align: center;border-bottom: 1px solid #2e9c65;width: 40px;text-align: right"
                                                                                                                                                    type="text"
                                                                                                                                                    class="form-control translated_text"
                                                                                                                                                    placeholder=""
                                                                                                                                                    {{ !$evaluator->can_evaluate ? 'disabled' : '' }}
                                                                                                                                                    value="{{ $evaluator->mark }}">
                                                                                                                                            </div>
                                                                                                                                        </td>
                                                                                                                                        <td
                                                                                                                                            style="vertical-align: middle;text-align: center">
                                                                                                                                            <span
                                                                                                                                                class="coefficient-value">
                                                                                                                                                {{ $evaluator->coefficient }}
                                                                                                                                            </span>
                                                                                                                                            <input
                                                                                                                                                type="hidden"
                                                                                                                                                name="coefficient"
                                                                                                                                                value="{{ $evaluator->coefficient }}">

                                                                                                                                        </td>
                                                                                                                                        <td
                                                                                                                                            style="vertical-align: middle;text-align: center">
                                                                                                                                            <span
                                                                                                                                                class="ponderation-value">
                                                                                                                                                {{ $evaluator->ponderation }}
                                                                                                                                            </span>
                                                                                                                                            <input
                                                                                                                                                type="hidden"
                                                                                                                                                name="ponderation">

                                                                                                                                        </td>
                                                                                                                                        <td>
                                                                                                                                            <textarea name="evaluation"
                                                                                                                                                style="text-align: justify;width: 100%;background-color: #e3e7f1;border-radius: 5px;border: 0;border-bottom: 1px solid #319e68;padding: 6px;"
                                                                                                                                                {{ !$evaluator->can_evaluate ? 'disabled' : '' }} rows="5" class="translated_text">
                                                                                                                                {{ $evaluator->evaluation }}
                                                                                                                            </textarea>

                                                                                                                                        </td>
                                                                                                                                        <td
                                                                                                                                            style="vertical-align: middle;text-align: center">
                                                                                                                                            @if ($evaluator->can_evaluate)
                                                                                                                                                <button
                                                                                                                                                    class="btn   btn-primary">
                                                                                                                                                    <i
                                                                                                                                                        class="bi bi-check2"></i>
                                                                                                                                                </button>
                                                                                                                                            @endif
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                @endforeach

                                                                                                                            </tbody>
                                                                                                                        </table>

                                                                                                                    </form>
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
                                            </div>
                                        </div>

                                    </div>

    </main>
    <div id="print-section" class="d-none">
        @include('profile.printProfile')
    </div>
    <!-- Modal Partager -->
    <div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <h6 class="mb-4 text-center translated_text">{{ __('generated.Envoyez un lien de cette page par email.') }}</h6>
                    <!-- Formulaire pour envoyer l'email -->
                    <form action="{{ route('send.share.email') }}" method="POST">
                        @csrf
                        <input type="hidden" name="page_url" value="{{ url()->current() }}">
                        <input type="hidden" name="message"
                            value="Voici le lien de la page que vous m'avez demandé :">

                        <div class="mb-3">
                            <label class="form-label text-secondary translated_text">{{ __('generated.À :') }}</label>
                            <input type="text" name="to" class="form-control translated_text"
                                placeholder="{{ __('generated.Entrez les adresses email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __('generated.CC :') }}</label>
                            <input type="text" name="cc" class="form-control translated_text"
                                placeholder="{{ __('generated.Entrez les adresses en CC') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary translated_text">{{ __('generated.Objet :') }}</label>
                            <input type="text" name="subject" class="form-control translated_text"
                                placeholder="{{ __("generated.Entrez le sujet de l'email") }}" required>
                        </div>


                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-link text-danger" type="button" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="bi bi-trash h4 me-2"></i><span class="translated_text">{{ __('generated.Annuler') }}</span>
                            </button>
                            <button class="btn btn-theme" type="submit">
                                <i class="bi bi-send me-2"></i><span class="translated_text">{{ __('generated.Envoyer') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="evaluationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title translated_text" id="exampleModalLabel">{{ __('generated.Evaluation du candidat') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="evaluationForm">
                        @csrf
                        <input type="hidden" name="profile_id" value="{{ $profile->id }}" id="profile_id">
                        <label class="label-control py-2 translated_text"> {{ __('generated.Evaluateur') }} </label>
                        <div class="col-12 col-md-12 col-lg-12" style="width: 100%;margin-right: -10px;">
                            <div class="rounded border poste-chosen">
                                {{-- <label
                                    style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Evaluateur</label> --}}
                                <select class="chosenoptgroup w-100" name="evaluator_id" id="evaluator_id">
                                    <option>{{ __('generated.Sélectionnez un choix') }}</option>
                                    @foreach ($evaluators as $evaluator)
                                        <option value="{{ $evaluator->id }}">
                                            {{ $evaluator->first_name . ' ' . $evaluator->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="invalid-feedback translated_text">{{ __('generated.Please enter valid input') }}</div>
                        </div>
                        <label class="label-control py-2 translated_text"> {{ __('generated.Critère d\'évaluation') }} </label>
                        <div class="col-12 " style="width: 100%;margin-right: -10px;">
                            <div class="rounded border poste-chosen no-search">
                                {{-- <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;margin-bottom: 4px">Type d'évaluation</label> --}}
                                <select class="chosenoptgroup w-100 form-control border-start-0"
                                    name="evaluation_type_id" id="evaluation_type_id">
                                    @foreach ($types_evaluations as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <style>
                                .no-search .chosen-search {
                                    display: none
                                }
                            </style>
                        </div>
                        <label class="label-control py-1 translated_text"> {{ __('generated.Note') }} </label>
                        <input type="number" class="form-control" name="mark" id="mark">
                        <label class="label-control py-1 translated_text"> {{ __('generated.Evaluation') }} </label>
                        <textarea class="form-control" style="height:200px" name="evaluation" id="evaluation"></textarea>
                        <div id="formFeedback" style="margin-top: 10px; display: none;"></div>
                </div>
                <div class="modal-footer">
                    <div class="px-2">

                        <input type="submit" class="btn btn-theme text-white translated_text " id="save"
                            value="Ajouter">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_footer')
    @vite('resources/js/evaluation/create-edit.js')

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const evaluationsListing = "{{ route('api.evaluation.listing') }}";
        const evaluationStore = "{{ route('api.evaluation.create') }}";
        const evaluationUpdate = "{{ route('api.evaluation.edit') }}";
    </script>
    <script>
        function printExternalPage(url) {
            const printWindow = window.open(url, '_blank');
            printWindow.focus();

            // Wait for content to fully load before printing
            printWindow.onload = function () {
                printWindow.print();
            };
        }

        function downloadPDF() {
            const element = document.getElementById('printable-content'); // wrap printable content in this div

            const opt = {
                margin:       0.5,
                filename:     'job_offer.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save();
        }

    </script>
    <script>
        $(document).ready(function() {
            $(document).on('input', '.translated_text', function() {
                const inputValue = parseFloat($(this).val()) || 0;

                const coefficient = parseFloat($(this).closest('tr').find('.coefficient-value').first()
                    .text().trim()) || 0;
                const result = inputValue * coefficient;

                $(this).closest('tr').find('.ponderation-value').text(result.toFixed(
                    2)); // Arrondi à 2 décimales
            });
        })
    </script>
    <script>
        /**
         * Js For Print
         */
        window.printPage = function() {
            var printContent = document.getElementById('print-section').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();

            function onafterprint() {
                document.body.innerHTML = originalContent;
                window.location.reload();
            };
            onafterprint();
        }
    </script>

    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var searchTerm = this.value.toLowerCase();
            var rows = document.querySelectorAll(".searchable-row");

            rows.forEach(function(row) {
                var cells = row.querySelectorAll("td");
                var rowText = "";

                cells.forEach(function(cell) {
                    rowText += cell.textContent.toLowerCase() + " ";
                });

                if (rowText.includes(searchTerm)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#evaluation_table').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "searching": false,
                "ajax": {
                    url: evaluationsListing,
                    type: "GET",
                },
                "columns": [{
                        "data": "evaluation_type"
                    },
                    {
                        "data": "evaluator"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "mark",
                        "render": function(data, type, row) {
                            return '<form id="editEvaluation' + row.id +
                                '" > <input type="number" value="' + data +
                                '" class="form-control disabled mark-input" id="mark-input' + row
                                .id + '" name="mark" disabled >';
                        }
                    },
                    {
                        "data": "coefficient"
                    },
                    {
                        "data": "ponderation"
                    },
                    {
                        "data": "appreciation",
                        "render": function(data, type, row) {
                            return '<input type="text" value="' + data +
                                '" class="form-control disabled appreciation-input" id="appreciation-input' +
                                row.id +
                                '" name="evaluation" disabled> <input type="hidden" name="id" value="' +
                                row.id + '">  <input type="hidden" name="evaluator_id" value="' +
                                row.evaluator_id +
                                '"> <input type="hidden" name="evaluation_type_id" value="' + row
                                .evaluation_type_id + '"> </form>';
                        }
                    },
                    {
                        "data": "action"

                    }
                ],
                "order": [
                    [1, 'asc']
                ],

            });


            // Chart Formation
            /* doughnut chart js */
            var matchingFomationScore = @json($matchingFomationScore);
            var doughnutchart = document.getElementById('doughnutchart').getContext('2d');

            var data = {
                labels: ['Formation', ''],
                datasets: [{
                    label: 'Expense categories',
                    data: [matchingFomationScore, 100 - matchingFomationScore],
                    backgroundColor: ['#015ec2', '#becede'],
                    borderWidth: 0,
                }]
            };
            var mydoughnutchartCofig = {
                type: 'doughnut',
                data: data,

                options: {
                    responsive: true,
                    cutout: 62,
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
                            text: 'Chart.js Doughnut Chart'
                        }
                    }
                },
            };
            var mydoughnutchart = new Chart(doughnutchart, mydoughnutchartCofig);

            /* doughnut2 chart js */
            var matchingExperienceScore = @json($matchingExperienceScore);

            var doughnutchart2 = document.getElementById('doughnutchart2').getContext('2d');
            var data = {
                labels: ['Expérience', ''],
                datasets: [{
                    label: 'Expense categories',
                    data: [matchingExperienceScore, 100 - matchingExperienceScore],
                    backgroundColor: ['#91c300', '#becede'],
                    borderWidth: 0,
                }]
            };
            var mydoughnutchartCofig2 = {
                type: 'doughnut',
                data: data,

                options: {
                    responsive: true,
                    cutout: 62,
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
                            text: 'Chart.js Doughnut Chart'
                        }
                    }
                },
            };
            var mydoughnutchart2 = new Chart(doughnutchart2, mydoughnutchartCofig2);

            /* doughnut2 chart js */
            var matchingTypeContractScore = @json($matchingTypeContractScore);
            var doughnutchart3 = document.getElementById('doughnutchart3').getContext('2d');
            var data = {
                labels: ['Type de contrat', ''],
                datasets: [{
                    label: 'Expense categories',
                    data: [matchingTypeContractScore, 100 - matchingTypeContractScore],
                    backgroundColor: ['#ffbb00', '#becede'],
                    borderWidth: 0,
                }]
            };
            var mydoughnutchartCofig3 = {
                type: 'doughnut',
                data: data,

                options: {
                    responsive: true,
                    cutout: 62,
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
                            text: 'Chart.js Doughnut Chart'
                        }
                    }
                },
            };
            var mydoughnutchart3 = new Chart(doughnutchart3, mydoughnutchartCofig3);


            /* doughnut4 chart js Salary Matching Score */
            var matchingSalaryScore = @json($matchingSalaryScore);
            var doughnutchart4 = document.getElementById('doughnutchart4').getContext('2d');
            var data = {
                labels: ['Prétentions salariales', ''],
                datasets: [{
                    label: 'Expense categories',
                    data: [matchingSalaryScore, 100 - matchingSalaryScore],
                    backgroundColor: ['#ffbb00', '#becede'],
                    borderWidth: 0,
                }]
            };
            var mydoughnutchartCofig4 = {
                type: 'doughnut',
                data: data,

                options: {
                    responsive: true,
                    cutout: 62,
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
                            text: 'Chart.js Doughnut Chart'
                        }
                    }
                },
            };
            var mydoughnutchart4 = new Chart(doughnutchart4, mydoughnutchartCofig4);


            let linguisticSkillsData = @json($linguisticSkills);

            Object.keys(linguisticSkillsData).forEach((languageId, index) => {

                var radarchart = document.getElementById(`radarchart-${languageId}`).getContext('2d');
                var linguisticDetails = linguisticSkillsData[
                    languageId]; // Obtenir les détails spécifiques pour cette compétence linguistique


                // Préparer les scores dynamiques pour 'Candidat' et 'Offre'
                var candidateScores = linguisticDetails.map(detail => parseFloat(detail.profile_score));
                var offerScores = linguisticDetails.map(detail => parseFloat(detail.job_offer_score));


                var data = {
                    labels: [
                        'Compréhension orale',
                        ['Expression', 'orale'],
                        ['Compréhension', 'écrite'],
                        'Expression écrite',
                        ['Règles', 'linguistiques'],
                        'Syntaxe'
                    ],
                    datasets: [{
                        label: 'Candidat',
                        data: candidateScores,
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)'
                    }, {
                        label: 'Offre',
                        data: offerScores,
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)',
                        pointBackgroundColor: 'rgb(54, 162, 235)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(54, 162, 235)'
                    }]
                };

                var myradarchartCofig = {
                    type: 'radar',
                    data: data,

                    options: {
                        responsive: true,
                        cutout: 85,
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
                                text: 'Chart.js Doughnut Chart'
                            }
                        },
                        scales: {
                            r: {
                                beginAtZero: true, // Ensures the chart begins at zero
                            }
                        }

                    },
                };
                var myradarchart = new Chart(radarchart, myradarchartCofig);


            });








            /* vertical bar chart */

            var barchartvert = document.getElementById('barchartvert').getContext('2d');
            var mybarchartvertCofig = {
                type: 'bar',
                data: {
                    labels: ['Mobilité géographique'],
                    datasets: [{
                        label: ' Locale',
                        data: [
                            @json($matchingLocalScore)
                        ],
                        backgroundColor: '#2d79cade',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, {
                        label: ' Régionale',
                        data: [
                            @json($matchingRegionalScore)
                        ],
                        backgroundColor: '#2d79caa6',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, {
                        label: ' Nationale',
                        data: [
                            @json($matchingNationalScore)
                        ],
                        backgroundColor: '#2d79ca7a',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, {
                        label: ' Internationale',
                        data: [
                            @json($matchingInternationalScore)
                        ],
                        backgroundColor: '#d7e6f5',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    layout: {
                        padding: {
                            top: 0,
                            bottom: 0
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const datasetIndex = context.datasetIndex;
                                    const value = context.raw; // Value of the current dataset

                                    // Calculate the total for all datasets at the same index
                                    const total = context.chart.data.datasets.reduce((sum, dataset) => {
                                        return sum + dataset.data[context.dataIndex];
                                    }, 0);

                                    // Calculate percentage
                                    const percentage = ((value / total) * 100).toFixed(2);

                                    // Format tooltip text
                                    return `${context.dataset.label}: ${value}%`;
                                },
                            },
                        },
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        y: {
                            ticks: {
                                display: true,
                                font: {
                                    size: 17,
                                    weight: 'bold',
                                }
                            },
                            drawBorder: true,
                            label: false,
                            grid: {
                                display: false,
                                zeroLineColor: 'rgba(219,219,219,0.3)',
                                drawBorder: true,
                                lineWidth: 1,
                                zeroLineWidth: 1
                            }
                        },
                        x: {
                            display: false,
                            ticks: {
                                beginAtZero: false,
                                display: false,
                                color: '#999999',
                                font: {
                                    size: 25,
                                    weight: 'bold',
                                },
                            },
                            grid: {
                                display: false,
                            },
                            categoryPercentage: 10.8, // Adjusts spacing between bars
                            barPercentage: 0.9, // Adjusts bar width
                        }
                    }
                }
            }
            var myBarChartvert = new Chart(barchartvert, mybarchartvertCofig);


            /* vertical bar chart */
            var barchartvert2 = document.getElementById('barchartvert2').getContext('2d');
            var mybarchartvertCofig2 = {
                type: 'bar',
                data: {
                    labels: ['Mode de travail             '],
                    datasets: [{
                        label: ' Présentiel',
                        data: [
                            @json($matchingPresentielScore),
                        ],
                        backgroundColor: '#2d79cade',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, {
                        label: ' Distanciel',
                        data: [
                            @json($matchingRemoteScore),
                        ],
                        backgroundColor: '#2d79caa6',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, {
                        label: ' Hybride',
                        data: [
                            @json($matchingHybridScore),
                        ],
                        backgroundColor: '#2d79ca7a',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    layout: {
                        padding: {
                            top: 0,
                            bottom: 0
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const datasetIndex = context.datasetIndex;
                                    const value = context.raw; // Value of the current dataset

                                    // Calculate the total for all datasets at the same index
                                    const total = context.chart.data.datasets.reduce((sum, dataset) => {
                                        return sum + dataset.data[context.dataIndex];
                                    }, 0);

                                    // Calculate percentage
                                    const percentage = ((value / total) * 100).toFixed(2);

                                    // Format tooltip text
                                    return `${context.dataset.label}: ${value}%`;
                                },
                            },
                        },
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        y: {
                            ticks: {
                                display: true,
                                font: {
                                    size: 17,
                                    weight: 'bold',
                                }
                            },
                            drawBorder: true,
                            label: false,
                            grid: {
                                display: false,
                                zeroLineColor: 'rgba(219,219,219,0.3)',
                                drawBorder: true,
                                lineWidth: 1,
                                zeroLineWidth: 1
                            }
                        },
                        x: {
                            display: false,
                            ticks: {
                                beginAtZero: false,
                                display: false,
                                color: '#999999',
                                font: {
                                    size: 25,
                                    weight: 'bold',
                                },
                            },
                            grid: {
                                display: false,
                            },
                            categoryPercentage: 10.8, // Adjusts spacing between bars
                            barPercentage: 0.9, // Adjusts bar width
                        }
                    }
                }
            }
            var myBarChartvert2 = new Chart(barchartvert2, mybarchartvertCofig2);

            /* vertical bar chart */
            var barchartvert3 = document.getElementById('barchartvert3').getContext('2d');
            var mybarchartvertCofig3 = {
                type: 'bar',
                data: {
                    labels: ['Temps de travail          '],
                    datasets: [{
                        label: ' Plein',
                        data: [
                            @json($matchingFullTimeScore),
                        ],
                        backgroundColor: '#2d79cade',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, {
                        label: ' Partiel',
                        data: [
                            @json($matchingPartTimeScore),
                        ],
                        backgroundColor: '#2d79caa6',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    layout: {
                        padding: {
                            top: 0,
                            bottom: 0
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const datasetIndex = context.datasetIndex;
                                    const value = context.raw; // Value of the current dataset

                                    // Calculate the total for all datasets at the same index
                                    const total = context.chart.data.datasets.reduce((sum, dataset) => {
                                        return sum + dataset.data[context.dataIndex];
                                    }, 0);

                                    // Calculate percentage
                                    const percentage = ((value / total) * 100).toFixed(2);

                                    // Format tooltip text
                                    return `${context.dataset.label}: ${value}%`;
                                },
                            },
                        },
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        y: {
                            ticks: {
                                display: true,
                                font: {
                                    size: 17,
                                    weight: 'bold',
                                }
                            },
                            drawBorder: true,
                            label: false,
                            grid: {
                                display: false,
                                zeroLineColor: 'rgba(219,219,219,0.3)',
                                drawBorder: true,
                                lineWidth: 1,
                                zeroLineWidth: 1
                            }
                        },
                        x: {
                            display: false,
                            ticks: {
                                beginAtZero: false,
                                display: false,
                                color: '#999999',
                                font: {
                                    size: 25,
                                    weight: 'bold',
                                },
                            },
                            grid: {
                                display: false,
                            },
                            categoryPercentage: 10.8, // Adjusts spacing between bars
                            barPercentage: 0.9, // Adjusts bar width
                        }
                    }
                }
            }
            var myBarChartvert3 = new Chart(barchartvert3, mybarchartvertCofig3);

            /* vertical bar chart */
            var barchartvert4 = document.getElementById('barchartvert4').getContext('2d');
            var mybarchartvertCofig4 = {
                type: 'bar',
                data: {
                    labels: ['Disponibilité                  '],
                    datasets: [{
                        label: ' Immédiate',
                        data: [
                            100,
                        ],
                        backgroundColor: '#2d79cade',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, {
                        label: ' Préavis',
                        data: [
                            89,
                        ],
                        backgroundColor: '#2d79caa6',
                        borderWidth: 0,
                        borderRadius: 0,
                        borderSkipped: true,
                        barThickness: 10,
                    }, ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    layout: {
                        padding: {
                            top: 0,
                            bottom: 0
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const datasetIndex = context.datasetIndex;
                                    const value = context.raw; // Value of the current dataset

                                    // Calculate the total for all datasets at the same index
                                    const total = context.chart.data.datasets.reduce((sum, dataset) => {
                                        return sum + dataset.data[context.dataIndex];
                                    }, 0);

                                    // Calculate percentage
                                    const percentage = ((value / total) * 100).toFixed(2);

                                    // Format tooltip text
                                    return `${context.dataset.label}: ${percentage}%`;
                                },
                            },
                        },
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        y: {
                            ticks: {
                                display: true,
                                font: {
                                    size: 17,
                                    weight: 'bold',
                                }
                            },
                            drawBorder: true,
                            label: false,
                            grid: {
                                display: false,
                                zeroLineColor: 'rgba(219,219,219,0.3)',
                                drawBorder: true,
                                lineWidth: 1,
                                zeroLineWidth: 1
                            }
                        },
                        x: {
                            display: false,
                            ticks: {
                                beginAtZero: false,
                                display: false,
                                color: '#999999',
                                font: {
                                    size: 15,
                                },
                            },
                            grid: {
                                display: false,
                            },
                            categoryPercentage: 10.8, // Adjusts spacing between bars
                            barPercentage: 0.9, // Adjusts bar width
                        }
                    }
                }
            }
            var myBarChartvert4 = new Chart(barchartvert4, mybarchartvertCofig4);


            let matchingSkills = @json($matchingSkills);
            matchingSkills = Object.values(matchingSkills);

            matchingSkills.forEach(element => {

                element.forEach(element2 => {
                    let cercleId = `circleprogress-${element2.skill.id}`;
                    var progressCirclesredM6 = new ProgressBar.Circle(`#${cercleId}`, {
                        color: element2.skill_match_score >= 0.5 ? '#015ec2' :
                        '#fdba00', // Couleur selon le score
                        // This has to be the same size as the maximum width to
                        // prevent clipping
                        strokeWidth: 10,
                        trailWidth: 10,
                        easing: 'easeInOut',
                        trailColor: element2.skill_match_score >= 0.5 ? '#dcecfe' :
                            '#f9eab1', // Couleur d'arrière-plan
                        duration: 1400,
                        text: {
                            autoStyleContainer: false
                        },
                        from: {
                            color: element2.skill_match_score >= 0.5 ? '#015ec2' :
                                '#fdba00',
                            width: 10
                        },
                        to: {
                            color: element2.skill_match_score >= 0.5 ? '#015ec2' :
                                '#fdba00',
                            width: 10
                        },
                        // Set default step function for all animate calls
                        step: function(state, circle) {
                            circle.path.setAttribute('stroke', state.color);
                            circle.path.setAttribute('stroke-width', state.width);

                            var value = Math.round(element2.skill_match_score * 100);
                            // if (value === 0) {
                            //     circle.setText('');
                            // } else {
                            //     circle.setText(value + "<small>%<small>");
                            // }
                            circle.setText(value + "<small>%<small>");

                        }
                    });
                    // progressCirclesred1.text.style.fontSize = '20px';
                    progressCirclesredM6.animate(element2
                        .skill_match_score); // Number from 0.0 to 1.0
                });

            });

            let matchingPeronalSkills = @json($matchingPersonalSkills);
            matchingPersonalSkills = Object.values(matchingPeronalSkills);

            matchingPersonalSkills.forEach(element => {

                element.forEach(element2 => {
                    let cercleId = `circleprogress-${element2.skill.id}`;
                    var progressCirclesredM6 = new ProgressBar.Circle(`#${cercleId}`, {
                        color: element2.skill_match_score >= 0.5 ? '#015ec2' :
                        '#fdba00', // Couleur selon le score
                        // This has to be the same size as the maximum width to
                        // prevent clipping
                        strokeWidth: 10,
                        trailWidth: 10,
                        easing: 'easeInOut',
                        trailColor: element2.skill_match_score >= 0.5 ? '#dcecfe' :
                            '#f9eab1', // Couleur d'arrière-plan
                        duration: 1400,
                        text: {
                            autoStyleContainer: false
                        },
                        from: {
                            color: element2.skill_match_score >= 0.5 ? '#015ec2' :
                                '#fdba00',
                            width: 10
                        },
                        to: {
                            color: element2.skill_match_score >= 0.5 ? '#015ec2' :
                                '#fdba00',
                            width: 10
                        },
                        // Set default step function for all animate calls
                        step: function(state, circle) {
                            circle.path.setAttribute('stroke', state.color);
                            circle.path.setAttribute('stroke-width', state.width);

                            var value = Math.round(element2.skill_match_score * 100);
                            if (value === 0) {
                                circle.setText('');
                            } else {
                                circle.setText(value + "<small>%<small>");
                            }

                        }
                    });
                    // progressCirclesred1.text.style.fontSize = '20px';
                    progressCirclesredM6.animate(element2
                        .skill_match_score); // Number from 0.0 to 1.0
                });

            });




            let matchingDetailProfile = @json($matchingDetailProfile);
            matchingDetailProfile = Object.values(matchingDetailProfile);
            matchingDetailProfile.forEach(element => {
                let cercleId = `circleprogressgreenRM-${element.id}`;
                var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                    color: '#2e9c65',
                    // This has to be the same size as the maximum width to
                    // prevent clipping
                    strokeWidth: 10,
                    trailWidth: 10,
                    easing: 'easeInOut',
                    trailColor: '#2e9c657a',
                    duration: 1400,
                    text: {
                        autoStyleContainer: false
                    },
                    from: {
                        color: '#2e9c65',
                        width: 10
                    },
                    to: {
                        color: '#2e9c65',
                        width: 10
                    },
                    // Set default step function for all animate calls
                    step: function(state, circle) {
                        circle.path.setAttribute('stroke', state.color);
                        circle.path.setAttribute('stroke-width', state.width);

                        var value = Math.round(element.skill_match_score * 100);
                        // if (value === 0) {
                        //     circle.setText('');
                        // } else {
                        //     circle.setText(value + "<small>%<small>");
                        // }
                        circle.setText(value + "<small>%<small>");

                    }
                });
                // progressCirclesred1.text.style.fontSize = '20px';
                progressCirclesredRM.animate(element.skill_match_score); // Number from 0.0 to 1.0

            });


            let matchingDetailMobilityGeographique = @json($matchingDetailMobilityGeographique);
            matchingDetailMobilityGeographique = Object.values(matchingDetailMobilityGeographique);
            matchingDetailMobilityGeographique.forEach(element => {
                let cercleId = `circleprogressgreenRM-${element.id}`;
                var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                    color: '#2e9c65',
                    // This has to be the same size as the maximum width to
                    // prevent clipping
                    strokeWidth: 10,
                    trailWidth: 10,
                    easing: 'easeInOut',
                    trailColor: '#2e9c657a',
                    duration: 1400,
                    text: {
                        autoStyleContainer: false
                    },
                    from: {
                        color: '#2e9c65',
                        width: 10
                    },
                    to: {
                        color: '#2e9c65',
                        width: 10
                    },
                    // Set default step function for all animate calls
                    step: function(state, circle) {
                        circle.path.setAttribute('stroke', state.color);
                        circle.path.setAttribute('stroke-width', state.width);

                        var value = Math.round(element.skill_match_score * 100);
                        // if (value === 0) {
                        //     circle.setText('');
                        // } else {
                        //     circle.setText(value + "<small>%<small>");
                        // }
                        circle.setText(value + "<small>%<small>");

                    }
                });
                // progressCirclesred1.text.style.fontSize = '20px';
                progressCirclesredRM.animate(element.skill_match_score); // Number from 0.0 to 1.0

            });


            let matchingDetailsModeWork = @json($matchingDetailsModeWork);
            matchingDetailsModeWork = Object.values(matchingDetailsModeWork);
            matchingDetailsModeWork.forEach(element => {
                let cercleId = `circleprogressgreenRM-${element.id}`;
                var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                    color: '#2e9c65',
                    // This has to be the same size as the maximum width to
                    // prevent clipping
                    strokeWidth: 10,
                    trailWidth: 10,
                    easing: 'easeInOut',
                    trailColor: '#2e9c657a',
                    duration: 1400,
                    text: {
                        autoStyleContainer: false
                    },
                    from: {
                        color: '#2e9c65',
                        width: 10
                    },
                    to: {
                        color: '#2e9c65',
                        width: 10
                    },
                    // Set default step function for all animate calls
                    step: function(state, circle) {
                        circle.path.setAttribute('stroke', state.color);
                        circle.path.setAttribute('stroke-width', state.width);

                        var value = Math.round(element.skill_match_score * 100);
                        // if (value === 0) {
                        //     circle.setText('');
                        // } else {
                        //     circle.setText(value + "<small>%<small>");
                        // }
                        circle.setText(value + "<small>%<small>");

                    }
                });
                // progressCirclesred1.text.style.fontSize = '20px';
                progressCirclesredRM.animate(element.skill_match_score); // Number from 0.0 to 1.0

            });

            let matchingDetailsTimeWork = @json($matchingDetailsTimeWork);
            matchingDetailsTimeWork = Object.values(matchingDetailsTimeWork);
            matchingDetailsTimeWork.forEach(element => {
                let cercleId = `circleprogressgreenRM-${element.id}`;
                var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                    color: '#2e9c65',
                    // This has to be the same size as the maximum width to
                    // prevent clipping
                    strokeWidth: 10,
                    trailWidth: 10,
                    easing: 'easeInOut',
                    trailColor: '#2e9c657a',
                    duration: 1400,
                    text: {
                        autoStyleContainer: false
                    },
                    from: {
                        color: '#2e9c65',
                        width: 10
                    },
                    to: {
                        color: '#2e9c65',
                        width: 10
                    },
                    // Set default step function for all animate calls
                    step: function(state, circle) {
                        circle.path.setAttribute('stroke', state.color);
                        circle.path.setAttribute('stroke-width', state.width);

                        var value = Math.round(element.skill_match_score * 100);
                        // if (value === 0) {
                        //     circle.setText('');
                        // } else {
                        //     circle.setText(value + "<small>%<small>");
                        // }
                        circle.setText(value + "<small>%<small>");

                    }
                });
                // progressCirclesred1.text.style.fontSize = '20px';
                progressCirclesredRM.animate(element.skill_match_score); // Number from 0.0 to 1.0

            });

            let groupedTechnicalSkills = @json($matchingDetailsTechnicalSkills); // La variable initiale
            let skillTypes = Object.keys(
                groupedTechnicalSkills); // Récupérer les types de compétences (clés des groupes)

            skillTypes.forEach(skillType => {
                // Récupérer les compétences spécifiques dans le groupe correspondant
                let skillsInGroup = groupedTechnicalSkills[skillType];

                skillsInGroup.forEach(element => {
                    let cercleId = `circleprogressgreenRM-${element.id}`; // ID du cercle
                    var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                        color: '#2e9c65',
                        strokeWidth: 10,
                        trailWidth: 10,
                        easing: 'easeInOut',
                        trailColor: '#2e9c657a',
                        duration: 1400,
                        text: {
                            autoStyleContainer: false
                        },
                        from: {
                            color: '#2e9c65',
                            width: 10
                        },
                        to: {
                            color: '#2e9c65',
                            width: 10
                        },
                        step: function(state, circle) {
                            circle.path.setAttribute('stroke', state.color);
                            circle.path.setAttribute('stroke-width', state.width);

                            // Calculer et afficher la valeur dans le cercle
                            var value = Math.round(element.skill_match_score * 100);
                            // if (value === 0) {
                            //     circle.setText('');
                            // } else {
                            //     circle.setText(value + "<small>%<small>");
                            // }
                            circle.setText(value + "<small>%<small>");
                        }
                    });

                    // Animer le cercle avec le skill_match_score
                    progressCirclesredRM.animate(element.skill_match_score); // Valeur entre 0 et 1
                });
            });


            let groupedPersonalSkills = @json($matchingDetailsPersonalSkills); // La variable initiale
            let personalSkillTypes = Object.keys(
                groupedPersonalSkills); // Récupérer les types de compétences (clés des groupes)

            personalSkillTypes.forEach(skillType => {
                // Récupérer les compétences spécifiques dans le groupe correspondant
                let skillsInGroup = groupedPersonalSkills[skillType];

                skillsInGroup.forEach(element => {
                    let cercleId = `circleprogressgreenRM-${element.id}`; // ID du cercle
                    var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                        color: '#2e9c65',
                        strokeWidth: 10,
                        trailWidth: 10,
                        easing: 'easeInOut',
                        trailColor: '#2e9c657a',
                        duration: 1400,
                        text: {
                            autoStyleContainer: false
                        },
                        from: {
                            color: '#2e9c65',
                            width: 10
                        },
                        to: {
                            color: '#2e9c65',
                            width: 10
                        },
                        step: function(state, circle) {
                            circle.path.setAttribute('stroke', state.color);
                            circle.path.setAttribute('stroke-width', state.width);

                            // Calculer et afficher la valeur dans le cercle
                            var value = Math.round(element.skill_match_score * 100);
                            // if (value === 0) {
                            //     circle.setText('');
                            // } else {
                            //     circle.setText(value + "<small>%<small>");
                            // }
                            circle.setText(value + "<small>%<small>");
                        }
                    });

                    // Animer le cercle avec le skill_match_score
                    progressCirclesredRM.animate(element.skill_match_score); // Valeur entre 0 et 1
                });
            });

            let matchingDetailsLinguistiqueSkills = @json($matchingDetailsLinguistiqueSkills);
            matchingDetailsLinguistiqueSkills = Object.values(matchingDetailsLinguistiqueSkills);
            matchingDetailsLinguistiqueSkills.forEach(element => {
                element.forEach(element2 => {
                    let cercleId = `circleprogressgreenRM-${element2.id}`;
                    var progressCirclesredRM = new ProgressBar.Circle(`#${cercleId}`, {
                        color: '#2e9c65',
                        // This has to be the same size as the maximum width to
                        // prevent clipping
                        strokeWidth: 10,
                        trailWidth: 10,
                        easing: 'easeInOut',
                        trailColor: '#2e9c657a',
                        duration: 1400,
                        text: {
                            autoStyleContainer: false
                        },
                        from: {
                            color: '#2e9c65',
                            width: 10
                        },
                        to: {
                            color: '#2e9c65',
                            width: 10
                        },
                        // Set default step function for all animate calls
                        step: function(state, circle) {
                            circle.path.setAttribute('stroke', state.color);
                            circle.path.setAttribute('stroke-width', state.width);

                            var value = Math.round(element2.skill_match_score * 100);
                            //    if (value === 0) {
                            //        circle.setText('');
                            //    } else {
                            //        circle.setText(value + "<small>%<small>");
                            //    }
                            circle.setText(value + "<small>%<small>");

                        }
                    });
                    // progressCirclesred1.text.style.fontSize = '20px';
                    progressCirclesredRM.animate(element2
                        .skill_match_score); // Number from 0.0 to 1.0
                });
            });

        });
    </script>
    <script type="text/javascript">
        $(window).on('load', function() {
            const video = document.getElementById("myVideo");
            const playPauseButton = document.getElementById("playPause");
            //const stopButton = document.getElementById("stop");
            const rewindButton = document.getElementById("rewind");
            //const fastForwardButton = document.getElementById("fastForward");
            const seekBar = document.getElementById("seekBar");
            const timeDisplay = document.getElementById("timeDisplay");
            const muteButton = document.getElementById("mute");
            const volumeBar = document.getElementById("volumeBar");
            const videoContainer = document.getElementById("myVideo")
                .parentElement; // Fullscreen on the video container
            const fullscreenButton = document.getElementById("fullscreen");

            // Fullscreen toggle function
            fullscreenButton.addEventListener("click", function() {
                if (!document.fullscreenElement) {
                    if (videoContainer.requestFullscreen) {
                        videoContainer.requestFullscreen();
                    } else if (videoContainer.mozRequestFullScreen) { // Firefox
                        videoContainer.mozRequestFullScreen();
                    } else if (videoContainer.webkitRequestFullscreen) { // Chrome, Safari, and Opera
                        videoContainer.webkitRequestFullscreen();
                    } else if (videoContainer.msRequestFullscreen) { // IE/Edge
                        videoContainer.msRequestFullscreen();
                    }
                    //fullscreenButton.textContent = "Exit Fullscreen";
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) { // Firefox
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) { // Chrome, Safari, and Opera
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) { // IE/Edge
                        document.msExitFullscreen();
                    }
                    //fullscreenButton.textContent = "Fullscreen";
                }
            });

            // Play/Pause toggle
            playPauseButton.addEventListener("click", function() {
                if (video.paused) {
                    video.play();
                    playPauseButton.innerHTML = '<i class="bi bi-pause-fill h2"></i>';
                } else {
                    video.pause();
                    playPauseButton.innerHTML = '<i class="bi bi-play-fill h2"></i>';
                }
            });

            // Stop the video
            /*stopButton.addEventListener("click", function() {
                video.pause();
                video.currentTime = 0;
                playPauseButton.textContent = "Play";
            });*/

            // Rewind 10 seconds
            rewindButton.addEventListener("click", function() {
                video.currentTime -= 10;
            });

            // Fast forward 10 seconds
            /* fastForwardButton.addEventListener("click", function() {
                 video.currentTime += 10;
             });*/

            // Update the seek bar as the video plays
            video.addEventListener("timeupdate", function() {
                const value = (100 / video.duration) * video.currentTime;
                seekBar.value = value;
                updateDisplayTime(video.currentTime);
                seekBar.style.background =
                    `linear-gradient(to right, #025ec7 ${value}%, #a7a0a05c ${value}%)`;
            });

            // Seek video when user changes the seek bar
            seekBar.addEventListener("input", function() {
                const time = (seekBar.value * video.duration) / 100;
                video.currentTime = time;

            });

            // Mute/Unmute toggle
            muteButton.addEventListener("click", function() {
                video.muted = !video.muted;
                muteButton.innerHTML = video.muted ? '<i class="bi bi-volume-mute h4"></i>' :
                    '<i class="bi bi-volume-up h4"></i>';
                if (video.muted) {
                    volumeBar.value = 0;
                } else {
                    volumeBar.value = video.volume;
                }
            });
            volumeBar.style.background = `linear-gradient(to right, #025ec7 100%, #a7a0a05c 100%)`;
            // Adjust the volume
            volumeBar.addEventListener("input", function() {
                const value = volumeBar.value * 100
                video.volume = volumeBar.value;
                volumeBar.style.background =
                    `linear-gradient(to right, #025ec7 ${value}%, #a7a0a05c ${value}%)`;
            });

            // Update time display
            function updateDisplayTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = Math.floor(seconds % 60);
                timeDisplay.textContent = `${minutes}:${remainingSeconds.toString().padStart(2, "0")}`;
            }

            $(".volume-show").mouseenter(function() {
                $('#volumeBar').removeClass('hidden');
            });
            $(".volume-show").mouseleave(function() {
                $('#volumeBar').addClass('hidden');
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

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
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#communication').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#communicationD').val("Communiquer efficacement.");
                } else if (value == "Débutant") {
                    $('#communicationD').val("Communication concise.");
                } else if (value == "Avancé") {
                    $('#communicationD').val("Communication adaptative et persuasive.");
                } else if (value == "Expert") {
                    $('#communicationD').val("Communication  stratégique.");
                }
            });
            $('#collaboration').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#collaborationD').val("Résolution de conflits.");
                } else if (value == "Débutant") {
                    $('#collaborationD').val("Collaboration efficace.");
                } else if (value == "Avancé") {
                    $('#collaborationD').val("Leadership et gestion d'équipe.");
                } else if (value == "Expert") {
                    $('#collaborationD').val("Gestion de groupes.");
                }
            });
            $('#adaptabilit').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#adaptabilitD').val("Apprentissage autonome.");
                } else if (value == "Débutant") {
                    $('#adaptabilitD').val("Adaptabilité et gestion du changement.");
                } else if (value == "Avancé") {
                    $('#adaptabilitD').val("Capacité à anticiper.");
                } else if (value == "Expert") {
                    $('#adaptabilitD').val("Gestion du changement.");
                }
            });
            $('#prise').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#priseD').val("Prise de décisions autonome.");
                } else if (value == "Débutant") {
                    $('#priseD').val("Prise de décision simple.");
                } else if (value == "Avancé") {
                    $('#priseD').val("Prise de décisions stratégiques.");
                } else if (value == "Expert") {
                    $('#priseD').val("Décision sous pression et stratégie.");
                }
            });
            $('#temps').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#tempsD').val("Gestion multitâches.");
                } else if (value == "Débutant") {
                    $('#tempsD').val("Respect des délais.");
                } else if (value == "Avancé") {
                    $('#tempsD').val("Gestion de projets et priorités.");
                } else if (value == "Expert") {
                    $('#tempsD').val("Planification stratégique.");
                }
            });
            $('#leadership').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#leadershipD').val("Prise d'initiatives et leadership.");
                } else if (value == "Débutant") {
                    $('#leadershipD').val("Atteinte des objectifs.");
                } else if (value == "Avancé") {
                    $('#leadershipD').val("Leadership  et innovation.");
                } else if (value == "Expert") {
                    $('#leadershipD').val("Leadership global.");
                }
            });
            $('#problemes').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#problemesD').val("Résolution de problèmes complexes.");
                } else if (value == "Débutant") {
                    $('#problemesD').val("Identification des problèmes.");
                } else if (value == "Avancé") {
                    $('#problemesD').val("Résolution analytique et créative.");
                } else if (value == "Expert") {
                    $('#problemesD').val("Gestion de crises.");
                }
            });
            $('#analyse').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#analyseD').val("Évaluation complexe et prise de décision.");
                } else if (value == "Débutant") {
                    $('#analyseD').val("Analyse réfléchie.");
                } else if (value == "Avancé") {
                    $('#analyseD').val("Stratégie data-driven.");
                } else if (value == "Expert") {
                    $('#analyseD').val("Prise de  décision impactante.");
                }
            });
            $('#innovation').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#innovationD').val("Innovation et résolution créative.");
                } else if (value == "Débutant") {
                    $('#innovationD').val("Proposition d'idées simples.");
                } else if (value == "Avancé") {
                    $('#innovationD').val("Créativité pour transformation.");
                } else if (value == "Expert") {
                    $('#innovationD').val("Leadership innovant.");
                }
            });
            $('#ethique').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#ethiqueD').val("Respect des valeurs et standards.");
                } else if (value == "Débutant") {
                    $('#ethiqueD').val("Respect des normes.");
                } else if (value == "Avancé") {
                    $('#ethiqueD').val("Gestion éthique sous pression.");
                } else if (value == "Expert") {
                    $('#ethiqueD').val("Intégrité et influence éthique.");
                }
            });
            $('#interculturelles').on('change', function() {
                var value = $(this).val();
                if (value == "Intermédiaire") {
                    $('#interculturellesD').val("Communication interculturelle.");
                } else if (value == "Débutant") {
                    $('#interculturellesD').val("Interaction interculturels.");
                } else if (value == "Avancé") {
                    $('#interculturellesD').val("Gestion d'équipes interculturelles.");
                } else if (value == "Expert") {
                    $('#interculturellesD').val("Gestion de projets internationaux.");
                }
            });
        });
        $(window).on('load', function() {
            $(".chosenoptgroup").chosen()
            $(".chosenoptgroup").on('change', function(event, el) {
                var textdisplay_element = $(".chosenoptgroup + .chosen-container .chosen-single > span");
                var selected_element = $(".chosenoptgroup option:selected");
                var selected_value = selected_element.val();
                if (selected_element.closest('optgroup').length > 0) {
                    var parent_optgroup = selected_element.closest('optgroup').attr('label');
                    textdisplay_element.text(parent_optgroup + ' ' + selected_value).trigger(
                        "chosen:updated");
                }
            });



            $('#post-changing').on('change', function() {
                var title = $(this).val();
                $('.title-of-post').html(title);
                $('.offres-table').addClass('hidden');
                if (title == 'Intégrale') {
                    $('.Intégrale').removeClass('hidden');
                } else if (title == 'Analyste financier') {
                    $('.Analyste-financier').removeClass('hidden');
                } else if (title == 'Architecte Cloud') {
                    $('.Architecte-Cloud').removeClass('hidden');
                } else if (title == 'Comptable') {
                    $('.Comptable').removeClass('hidden');
                } else if (title == 'Talent Acquisition') {
                    $('.Talent-Acquisition').removeClass('hidden');
                } else if (title == 'Pentest') {
                    $('.Pentest').removeClass('hidden');
                } else if (title == 'Auditrice Qualité') {
                    $('.Auditrice-Qualité').removeClass('hidden');
                }

            })




            /* chart js areachart */
            window.randomScalingFactor = function() {
                return Math.round(Math.random() * 20);
            }
            window.randomScalingFactor2 = function() {
                return Math.round(Math.random() * 10);
            }

            $('#click-show-skills').on('click', function() {
                $('.card-skills').attr('style', 'height: 100%;');
                $(this).addClass('hidden');
                $('#click-hidd-skills').removeClass('hidden');
            })
            $('#click-hidd-skills').on('click', function() {
                $('.card-skills').attr('style', 'height: 217px;overflow: hidden;');
                $(this).addClass('hidden');
                $('#click-show-skills').removeClass('hidden');
            })
        });
    </script>
@endsection
