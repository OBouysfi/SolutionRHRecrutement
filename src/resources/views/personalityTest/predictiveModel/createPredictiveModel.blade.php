@extends('layouts.master')

@section('title', 'Modèle prédictif')

@section('css_header')
    <style>
        button.btn-custom.btn-active {
            background-color: #005dc7;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight">

        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __('generated.Test personnalité') }}</h5>
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
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                    </figure>
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
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active " aria-current="page">{{ __('generated.Créer un modèle prédictif') }}
                    </li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">

            <div class="row mb-4 justify-content-center">
                <div class="col-10 mb-4">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header bg-gradient-theme-light">
                                            <div class="row align-items-center">

                                                <h5 class="fw-medium mb-0 ">{{ __('generated.Détail du modèle prédictif') }}
                                                </h5>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-6 col-lg-4">
                                                    <div
                                                        class="form-group mb-3 mt-3 position-relative check-valid is-valid">
                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input type="text" id="label"
                                                                    placeholder="{{ __('generated.Nom du modèle prédictif') }}"
                                                                    class="form-control border-start-0 translated_text"
                                                                    required>
                                                                <label><span>{{ __('generated.Nom du modèle prédictif') }}</span>
                                                                    *</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-4">
                                                    <div
                                                        class="form-group mb-3 mt-3 position-relative check-valid is-valid">
                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input type="text" id="profession"
                                                                    placeholder="{{ __('generated.Métier') }}"
                                                                    class="form-control border-start-0 translated_text"
                                                                    required>
                                                                <label><span>{{ __('generated.Métier') }}</span> *</label>
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
                <div class="col-10 mb-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab"
                                role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="planner-tab" data-bs-toggle="tab"
                                        data-bs-target="#planner" type="button" role="tab" aria-controls="planner"
                                        aria-selected="true">SWIPE</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts"
                                        type="button" role="tab" aria-controls="posts" aria-selected="false"
                                        tabindex="-1">DRIVE</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="posts2-tab" data-bs-toggle="tab"
                                        data-bs-target="#posts2" type="button" role="tab" aria-controls="posts2"
                                        aria-selected="false" tabindex="-1">BRAIN</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent" style="min-height: 800px;">
                        <div class="tab-pane fade show active" id="planner" role="tabpanel"
                            aria-labelledby="planner-tab">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center">

                                                        <h5 class="fw-medium mb-0 ">{{ __('generated.SWIPE') }}</h5>

                                                    </div>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <ul class="list-group list-group-flush bg-none">
                                                                <li class="list-group-item text-secondary">
                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <div class="avatar avatar-20 rounded-circle bg-green"
                                                                                style="background-color: #005dc7 !important;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0 ">
                                                                            {{ __('generated.Comportements associés à la réussite') }}
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item text-secondary">
                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <div class="avatar avatar-20 rounded-circle bg-green"
                                                                                style="background-color: var(--adminux-theme-bg) !important;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0 ">
                                                                            {{ __('generated.Comportements à éviter') }}
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item text-secondary">
                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <div class="avatar avatar-20 rounded-circle bg-green"
                                                                                style="border: 1px solid #3a82d4;background-color: #fff !important;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0 ">
                                                                            {{ __('generated.Comportements neutres') }}
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5 mb-4 justify-content-center">
                                                        <div class="col-9 mb-4 section-grp translated_text"
                                                            data-title="{{ __('generated.Leadership - influence') }}">
                                                            <p class="text-secondary mb-2 "
                                                                style="font-weight: 700;text-align: center; font-size: 30px">
                                                                {{ __('generated.Leadership - influence') }}</p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Ne souhaite pas mener les autres') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.Prend l'ascendant sur les autres") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Ne cherche pas à influencer') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Cherche à convaincre les autres') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Préfère être abordé(e)') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Va spontanément vers les autres') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.S'adresse aux autres sans détour") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Fait preuve de diplomatie') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 mb-4 section-grp translated_text"
                                                            data-title="{{ __('generated.Prise en compte des autres') }}">
                                                            <p class="text-secondary mb-2 "
                                                                style="font-weight: 700;text-align: center; font-size: 30px">
                                                                {{ __('generated.Prise en compte des autres') }}</p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Conserve une distance affective') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.S'implique affectivement") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Se centre sur ses points de vue') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.S'ouvre aux idées des autres") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Peut réagir aux critiques') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Accepte les critiques émises') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Apprécie de décider seul(e)') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Consulte avant de décider') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 mb-4 section-grp translated_text"
                                                            data-title="{{ __('generated.Créativité - adaptabilité') }}">
                                                            <p class="text-secondary mb-2 "
                                                                style="font-weight: 700;text-align: center; font-size: 30px">
                                                                {{ __('generated.Créativité - adaptabilité') }}</p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Parvient à centrer son attention') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Est attiré(e) par les tâches variées') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.S'attache à l'aspect opérationnel") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.S'intéresse aux choses abstraites") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Se montre conventionnel(le)') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.Fait preuve d'inventivité") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Gère prudemment le changement') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.S'adapte aux changements") }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 mb-4 section-grp translated_text"
                                                            data-title="{{ __('generated.Rigueur dans le travail') }}">
                                                            <p class="text-secondary mb-2 "
                                                                style="font-weight: 700;text-align: center; font-size: 30px">
                                                                {{ __('generated.Rigueur dans le travail') }}</p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.Apprécie d'improviser") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.S'organise avec méthode") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.S'attache à la globalité") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.S'attache aux détails") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Préfère contourner les obstacles') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Persévère face aux obstacles') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.S'en tient aux tâches prescrites") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Va au-delà des tâches prescrites') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 mb-4 section-grp translated_text"
                                                            data-title="{{ __('generated.Équilibre personnel') }}">
                                                            <p class="text-secondary mb-2 "
                                                                style="font-weight: 700;text-align: center; font-size: 30px">
                                                                {{ __('generated.Équilibre personnel') }}</p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Fait preuve de réactivité') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Se montre détendu(e)') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.S'en tient strictement aux faits") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.S'attache aux aspects positifs") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Exprime ses émotions') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Contrôle ses émotions') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 83%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 328px;margin-right: -3px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.N'hésite pas à prendre des risques") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 328px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Recherche la stabilité') }}</button>
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
                        <div class="tab-pane fade " id="posts" role="tabpanel" aria-labelledby="posts-tab">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center">

                                                        <h5 class="fw-medium mb-0 ">{{ __('generated.DRIVE') }}</h5>

                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <ul class="list-group list-group-flush bg-none">
                                                                <li class="list-group-item text-secondary">
                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <div class="avatar avatar-20 rounded-circle bg-green"
                                                                                style="background-color: #005dc7 !important;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0 ">
                                                                            {{ __('generated.Motivation souhaitée') }}
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item text-secondary">
                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <div class="avatar avatar-20 rounded-circle bg-green"
                                                                                style="background-color: var(--adminux-theme-bg) !important;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto ps-0 ">
                                                                            {{ __('generated.Motivation non souhaitée') }}
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5 mb-4 justify-content-center">
                                                        <div class="col-9 mb-4 section-grp translated_text"
                                                            data-title="{{ __('generated.Motivations liées à la tâche') }}">
                                                            <p class="text-secondary mb-2 "
                                                                style="font-weight: 700;text-align: center; font-size: 30px">
                                                                {{ __('generated.Motivations liées à la tâche') }}</p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Ne pas chercher à créer de nouvelles choses') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Créer de nouvelles choses') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.Faire passer l'esthétique au second plan") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.Se préoccuper de l'esthétique") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.S'appuyer sur son intuition") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Analyser des données') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Avoir un objectif global à atteindre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Avoir des tâches clairement définies') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Ne pas se focaliser sur la qualité') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Se préoccuper de la qualité') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Travailler à son rythme') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Se dépasser au quotidien') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Ne pas souvent être au contact des autres') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Rencontrer de nouvelles personnes') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 mb-4 section-grp translated_text"
                                                            data-title="{{ __('generated.Motivations relationnelles') }}">
                                                            <p class="text-secondary mb-2 "
                                                                style="font-weight: 700;text-align: center; font-size: 30px">
                                                                {{ __('generated.Motivations relationnelles') }}</p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Aimer être encadré de près') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.Avoir de l'autonomie") }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Travailler seul(e)') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Travailler en équipe') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.Accepter d'avoir une influence limitée") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __("generated.Avoir de l'influence") }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 mb-4 section-grp translated_text"
                                                            data-title="{{ __("generated.Motivations liées à l'environnement de travail") }}">
                                                            <p class="text-secondary mb-2 "
                                                                style="font-weight: 700;text-align: center; font-size: 30px">
                                                                {{ __("generated.Motivations liées à l'environnement de travail") }}
                                                            </p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Ne pas attendre trop de discipline') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Travailler de façon disciplinée') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Ne pas chercher à changer le monde') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Avoir un impact positif sur le monde') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Travailler dans un environnement formel') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Travailler dans un environnement informel') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Evoluer dans un environnement incertain') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Evoluer dans un environnement sécurisant') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.Accepter de s'investir sans réserve") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Préserver son équilibre personnel') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 mb-4 section-grp translated_text"
                                                            data-title="{{ __('generated.Motivations personnelles') }}">
                                                            <p class="text-secondary mb-2 "
                                                                style="font-weight: 700;text-align: center; font-size: 30px">
                                                                {{ __('generated.Motivations personnelles') }}</p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Ne pas attendre des récompenses systématiques') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Recevoir des récompenses') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Ne pas faire passer la rémunération au premier plan') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Avoir une rémunération attractive') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Accepter de ne pas gagner à chaque fois') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Remporter régulièrement des succès') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Se centrer sur ses propres besoins') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Aider les autres') }}</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 100%;">
                                                                    <button class="btn btn-primary btn-custom btn-1 "
                                                                        style="padding: 10px 28px;width: 389px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __("generated.Etre détaché(e) du regard de l'autre") }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-2 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Neutre') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-3 "
                                                                        style="padding: 10px 28px;width: 389px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Etre reconnu(e) par les autres') }}</button>
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
                        <div class="tab-pane fade " id="posts2" role="tabpanel" aria-labelledby="posts2-tab">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center">

                                                        <h5 class="fw-medium mb-0 ">{{ __('generated.BRAIN') }}</h5>

                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mt-5 mb-4 justify-content-center section-grp translated_text"
                                                        data-title="{{ __('generated.Raisonnement général') }}">
                                                        <div class="col-9" style="width: 56%">
                                                            <div class="chart mb-4">
                                                                <div class="bar gray bar1"
                                                                    style="height: 54px; width: 60px"> 2%
                                                                    <div class="bar gray bar1"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="bar gray bar2"
                                                                    style="height: 74px; width: 60px">4%
                                                                    <div class="bar gray bar2"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="bar gray bar3"
                                                                    style="height: 124px; width: 60px">9%
                                                                    <div class="bar gray bar3"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="bar gray bar4"
                                                                    style="height: 184px; width: 60px">15%
                                                                    <div class="bar gray bar4"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="bar gray bar5"
                                                                    style="height: 234px; width: 60px">20%
                                                                    <div class="bar gray bar5"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="bar gray bar6"
                                                                    style="height: 234px; width: 60px">20%
                                                                    <div class="bar gray bar6"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="bar gray bar7"
                                                                    style="height: 184px; width: 60px">15%
                                                                    <div class="bar gray bar7"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="bar gray bar8"
                                                                    style="height: 124px; width: 60px">9%
                                                                    <div class="bar gray bar8"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="bar gray bar9"
                                                                    style="height: 74px; width: 60px">4%
                                                                    <div class="bar gray bar9"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                                <div class="bar gray bar10"
                                                                    style="height: 54px; width: 60px">2%
                                                                    <div class="bar gray bar10"
                                                                        style=" width: 60px; height: 20px;border-top: 4px solid #fff;border-top-left-radius: 0;border-top-right-radius: 0;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="text-secondary mb-0 "
                                                                style="font-weight: 700;text-align: center; font-size: 20px">
                                                                {{ __('generated.Raisonnement général') }}</p>
                                                            <p class="text-secondary mb-4 "
                                                                style="font-weight: 500;text-align: center; font-size: 13px">
                                                                {{ __('generated.Gérer la complexité et apprendre de nouvelles choses') }}
                                                            </p>
                                                            <div class="row mb-2 justify-content-center section-child">
                                                                <div class="col-12" style="width: 92%;">
                                                                    <button class="btn btn-primary btn-custom btn-5 "
                                                                        style="padding: 10px 28px;width: 179px;margin-right: -4px;border-right: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;border-top-left-radius: 50px;border-bottom-left-radius: 50px;">{{ __('generated.Non pris en compte') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-6 "
                                                                        style="padding: 10px 28px;border-radius: 0;margin-right: -5px;">{{ __('generated.Basique') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-7 "
                                                                        style="padding: 10px 28px;border-radius: 0;margin-right: -5px;">{{ __('generated.Intermédiaire') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-8 "
                                                                        style="padding: 10px 28px;border-radius: 0;">{{ __('generated.Avancé') }}</button>
                                                                    <button class="btn btn-primary btn-custom btn-9 "
                                                                        style="padding: 10px 28px;width: 104px;margin-left: -4px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-left: 0;">{{ __('generated.Expert') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="text-secondary text-legend"
                                                            style="font-weight: 500;text-align: center; font-size: 13px">
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- card footer --}}
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-12 ms-auto" style="width: 36%">
                                                            <div class="form-check form-switch" style="margin-top: 4px;">
                                                                <button id="submitButton"
                                                                    class="btn btn-theme mnw-100 bg-blue "
                                                                    style="float: right;font-size: 14px;margin-left: 10px">{{ __('generated.Enregistrer') }}</button>
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


    {{-- modals  --}}
    <!-- footer ends -->
    <div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="width: 458px !important;">
                <div class="modal-body d-block">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px" class="bi bi-person-add avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0 ">{{ __('generated.Ajouter un évaluateur') }}</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-4">
                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="{{ __('generated.Matricule') }}" value=""
                                        class="form-control border-start-0 translated_text">
                                    <label>{{ __('generated.Matricule') }}</label>
                                </div>
                            </div>
                            <div class="invalid-feedback mb-3 ">{{ __('generated.Add insert valid data') }}</div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-11">
                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="{{ __('generated.Prénom') }}" value=""
                                        class="form-control border-start-0 translated_text">
                                    <label>{{ __('generated.Prénom') }}</label>
                                </div>
                            </div>
                            <div class="invalid-feedback mb-3 ">{{ __('generated.Add insert valid data') }}</div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-11">
                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="{{ __('generated.Nom') }}" value=""
                                        class="form-control border-start-0 translated_text">
                                    <label>{{ __('generated.Nom') }}</label>
                                </div>
                            </div>
                            <div class="invalid-feedback mb-3 ">{{ __('generated.Add insert valid data') }}</div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                <div class="form-floating">
                                    <input type="text" placeholder="{{ __('generated.Poste') }}" value=""
                                        class="form-control border-start-0 translated_text">
                                    <label>{{ __('generated.Poste') }}</label>
                                </div>
                            </div>
                            <div class="invalid-feedback mb-3 ">{{ __('generated.Add insert valid data') }}</div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x-square me-2"></i> <span>{{ __('generated.Annuler') }}</span></button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-floppy me-2"></i>
                                <span>{{ __('generated.Enregistrer') }}</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="emailcompose2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 702px">
            <div class="modal-content">
                <div class="modal-body d-block">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px" class="bi bi-pen avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0 ">{{ __('generated.Modifier') }}</h6>
                        </div>
                    </div>
                    <div class="row  mb-3">
                        <div class="col-8">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 mb-4">
                                                            <h6 class="title custom-title ">
                                                                {{ __("generated.Types d'évaluation") }}</h6>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group ">
                                                                <input style="border-bottom: 1px solid #005dc7;"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="Compétences techniques">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group ">
                                                                <input style="border-bottom: 1px solid #005dc7;"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="Compétences personnelles">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group ">
                                                                <input style="border-bottom: 1px solid #005dc7;"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="Adaptabilité">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group ">
                                                                <input style="border-bottom: 1px solid #005dc7;"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="Leadership">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group ">
                                                                <input style="border-bottom: 1px solid #005dc7;"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="Résolution de problèmes">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group ">
                                                                <input style="border-bottom: 1px solid #005dc7;"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="Communication">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group ">
                                                                <input style="border-bottom: 1px solid #005dc7;"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="Innovation">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group ">
                                                                <input style="border-bottom: 1px solid #005dc7;"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="Motivation">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group ">
                                                                <input style="border-bottom: 1px solid #005dc7;"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="Référence professionnelle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-12">
                                                            <div class="input-box ">
                                                                <label
                                                                    class="input-label ">{{ __('generated.Ajouter') }}</label>
                                                                <input type="text" value="" class="input-1"
                                                                    onfocus="setFocus(true)" onblur="setFocus(false)">
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
                        <div class="col-4">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 mb-4">
                                                            <h6 class="title custom-title ">
                                                                {{ __('generated.Coefficients') }}</h6>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group " style="width: 50%;margin: 0 auto">
                                                                <input
                                                                    style="border-bottom: 1px solid #005dc7;;text-align: center"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="1">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group " style="width: 50%;margin: 0 auto">
                                                                <input
                                                                    style="border-bottom: 1px solid #005dc7;;text-align: center"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="2">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group " style="width: 50%;margin: 0 auto">
                                                                <input
                                                                    style="border-bottom: 1px solid #005dc7;;text-align: center"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="3">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group " style="width: 50%;margin: 0 auto">
                                                                <input
                                                                    style="border-bottom: 1px solid #005dc7;;text-align: center"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="4">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group " style="width: 50%;margin: 0 auto">
                                                                <input
                                                                    style="border-bottom: 1px solid #005dc7;;text-align: center"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="5">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group " style="width: 50%;margin: 0 auto">
                                                                <input
                                                                    style="border-bottom: 1px solid #005dc7;;text-align: center"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="6">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group " style="width: 50%;margin: 0 auto">
                                                                <input
                                                                    style="border-bottom: 1px solid #005dc7;;text-align: center"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="7">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group " style="width: 50%;margin: 0 auto">
                                                                <input
                                                                    style="border-bottom: 1px solid #005dc7;;text-align: center"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="8">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="input-group " style="width: 50%;margin: 0 auto">
                                                                <input
                                                                    style="border-bottom: 1px solid #005dc7;;text-align: center"
                                                                    type="text" class="form-control translated_text"
                                                                    placeholder="" value="9">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-12">
                                                            <div class="input-box ">
                                                                <label
                                                                    class="input-label ">{{ __('generated.Ajouter') }}</label>
                                                                <input type="text" value="" class="input-1"
                                                                    onfocus="setFocus(true)" onblur="setFocus(false)">
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

                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x-square me-2"></i> <span>{{ __('generated.Annuler') }}</span></button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-floppy me-2"></i>
                                <span>{{ __('generated.Enregistrer') }}</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="emailcompose3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-block">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px" class="bi bi-trash avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0 ">{{ __('generated.Supprimer un Rôle') }}</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label ">{{ __('generated.Catégorie') }}</label>
                                <input type="text" value="Utilisateurs recrutement" class="input-1 destinataires"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label ">{{ __('generated.Rôle') }}</label>
                                <input type="text" value="Chargé de recrutement" class="input-1"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-link text-secondary" type="button" data-bs-dismiss="modal"
                                aria-label="Close"><i class="bi bi-x-square h4 me-2"></i> Annuler</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-trash me-2"></i>
                                <span>{{ __('generated.Supprimer') }}</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js_footer')
    <script type="text/javascript">
        $(window).on('load', function() {
            $('.btn-custom').on('click', function() {
                var btn1 = $(this).hasClass('btn-1');
                var btn2 = $(this).hasClass('btn-2');
                var btn3 = $(this).hasClass('btn-3');
                var btn5 = $(this).hasClass('btn-5');
                var btn6 = $(this).hasClass('btn-6');
                var btn7 = $(this).hasClass('btn-7');
                var btn8 = $(this).hasClass('btn-8');
                var btn9 = $(this).hasClass('btn-9');


                if (btn2) {
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-active');
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-inactive');
                }
                if (btn1) {
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-active');
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-inactive');
                    $(this).addClass('btn-active');
                    $(this).closest('.col-12').find('.btn-3').addClass('btn-inactive');
                }
                if (btn3) {
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-active');
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-inactive');
                    $(this).addClass('btn-active');
                    $(this).closest('.col-12').find('.btn-1').addClass('btn-inactive');
                }
                if (btn5) {
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-active');
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-inactive');
                    $(this).addClass('btn-active');
                    $('.text-legend').html('');
                    $('.bar').removeClass('light-pink');
                    $('.bar').removeClass('pink');
                    $('.bar').addClass('gray');
                }
                if (btn6) {
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-active');
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-inactive');
                    $(this).addClass('btn-active');
                    $('.text-legend').html(
                        'Capacité à intervenir sur des tâches connues et déjà expérimentées. 85 % des personnes obtiendront probablement ce score.'
                    );
                    $('.bar').removeClass('light-pink');
                    $('.bar').removeClass('pink');
                    $('.bar').removeClass('gray');
                    $('.bar1').addClass('gray');
                    $('.bar2,.bar3').addClass('light-pink');
                    $('.bar4, .bar5, .bar6, .bar7, .bar8, .bar9, .bar10').addClass('pink');
                }
                if (btn7) {
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-active');
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-inactive');
                    $(this).addClass('btn-active');
                    $('.text-legend').html(
                        'Capacité à gérer son activité en autonomie. 50 % des personnes obtiendront probablement ce score.'
                    );
                    $('.bar').removeClass('light-pink');
                    $('.bar').removeClass('pink');
                    $('.bar').removeClass('gray');
                    $('.bar1,.bar2,.bar3').addClass('gray');
                    $('.bar4,.bar5').addClass('light-pink');
                    $('.bar6, .bar7, .bar8, .bar9, .bar10').addClass('pink');
                }
                if (btn8) {
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-active');
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-inactive');
                    $(this).addClass('btn-active');
                    $('.text-legend').html(
                        'Capacité à appréhender des sujets nouveaux et stratégiques. 30 % des personnes obtiendront probablement ce score.'
                    );
                    $('.bar').removeClass('light-pink');
                    $('.bar').removeClass('pink');
                    $('.bar').removeClass('gray');
                    $('.bar1,.bar2,.bar3,.bar4').addClass('gray');
                    $('.bar5,.bar6').addClass('light-pink');
                    $('.bar7, .bar8, .bar9, .bar10').addClass('pink');
                }
                if (btn9) {
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-active');
                    $(this).closest('.col-12').find('.btn-custom').removeClass('btn-inactive');
                    $(this).addClass('btn-active');
                    $('.text-legend').html(
                        'Capacité à gérer une forte complexité, même en dehors de son champ d\'expertise. 15 % des personnes obtiendront probablement ce score.'
                    );
                    $('.bar').removeClass('light-pink');
                    $('.bar').removeClass('pink');
                    $('.bar').removeClass('gray');
                    $('.bar1,.bar2,.bar3,.bar4,.bar5').addClass('gray');
                    $('.bar6,.bar7').addClass('light-pink');
                    $('.bar8, .bar9, .bar10').addClass('pink');
                }
            })

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
            $('#country-selector').on('change', function() {
                var value = $(this).find('option:selected').attr('value');
                $('.chosen-single span').html($(this).attr('label'));
                var selectedCountry = $(this).find('option:selected');
                var imgsrc = selectedCountry.attr('data-image');
                $('#country-selector .chosen-container .chosen-single img').attr('src', imgsrc);
                // Get the image URL from the data attribute
                //var imgSrc = selectedCountry.data('img-src');
                $('.ville-p').addClass('hidden');
                $('#' + value).removeClass('hidden');
            })

            $(".chosenoptgroup").chosen();
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


            var selectedOption = $('#country-selector option:selected');
            var selectedImage = selectedOption.data('image');
            if (selectedImage) {
                $('#country-selector .chosen-container .chosen-single').prepend('<img src="' + selectedImage +
                    '" />');
            }
        });
    </script>

    <script>
        const apiCreatePredictiveModel = "{{ route('api.personalityTest.predictiveModel.create') }}";
        const predictiveModelListing = "{{ route('personalityTest.predictiveModel.listing') }}";

        function collectData() {
            let data = [];

            // get label and profession value
            let label = document.getElementById('label').value;
            let profession = document.getElementById('profession').value;

            // label and profession required
            if ((!label && label !== "null") || !profession) {
                alert('Label and profession are required !');
                return;
            }

            let sectionGrps = document.querySelectorAll('.section-grp');

            sectionGrps.forEach(sectionGrp => {
                // get the element data-title
                const title = sectionGrp.getAttribute('data-title');
                // get section-child in sectionGrp
                const sectionChilds = sectionGrp.querySelectorAll('.section-child');


                let retrivedData = retriceData(sectionChilds);

                // push an item to data with key leadership-section
                data.push({
                    title: title,
                    value: retrivedData
                });

            })


            console.log("label:", label, "profession: ", profession);
            // console.log( "=========> csrfToken: ", csrfToken);
            // return ;


            const formData = new FormData();
            formData.append("label", label);
            formData.append("profession", profession);
            formData.append("data", JSON.stringify(data || {}));

            fetch(apiCreatePredictiveModel, {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json()) // Parse JSON response
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: window.translations.success,
                        text: window.translations.success,
                    });
                    console.log(data);
                    window.location.href = predictiveModelListing;
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: window.translations.error,
                        text: window.translations.error,
                    });
                    // alert("Error occurred");
                    console.error(error);
                });

        }

        // retrice data pre section type
        function retriceData(sections) {
            let sectionData = [];

            sections.forEach(section => {

                let item = [];
                // get all buttons in the section
                const buttons = section.querySelectorAll('.btn-custom');

                buttons.forEach(button => {

                    // push an item to sectionData with button text as label and is selected  btn-active
                    item.push({
                        label: button.innerText,
                        selected: button.classList.contains('btn-active')
                    });

                });

                sectionData.push(item);

            });

            return sectionData;
        }

        // Bind the function to the form submission
        document.querySelector('#submitButton').addEventListener('click', function(event) {
            event.preventDefault();
            collectData();
        });
    </script>

@endsection
