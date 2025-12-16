@extends('layouts.master')

@section('title', 'Détail CV')

@section('css_header')

@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">Curriculum Vitae</h5>
                </div>
                <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar1" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
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
                    title="Chatbot">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                        <img src="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" alt=""
                            style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Confort utilisateur"
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
                    <li class="breadcrumb-item active" aria-current="page">Détail CV : Nouhaila SAOUD</li>
                </ol>
            </nav>
        </div>

        <!-- content -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-3">
                    <div class="card border-0" style="height: 100%;">
                        <div class="card-body" style="min-height: 700px; background-color: #e4e8ee29">
                            <div class="row mt-3">
                                <div class="col-auto ms-auto" style="margin-right: 3px;">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                            aria-expanded="false" data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical" style="font-size: 19px"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" style="min-width: 10px;">
                                            <li><a class="dropdown-item" href="cv-view.html" target="_blank">Aperçu</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">Partager</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">Imprimer</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-7 mb-2">
                                    <figure class="avatar avatar-60 rounded-circle coverimg custom-cv-img vm"
                                        style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                                        <img src="{{ asset('assets/img/icon/59902.jpg') }}" alt=""
                                            style="display: none;">
                                    </figure>

                                </div>

                                <div class="row justify-content-center mt-3">
                                    <p style="text-align: center;font-weight: 700;font-size: 25px;margin-bottom: 2px;">
                                        Nouhaila SAOUD</p>
                                    <p class="text-secondary" style="text-align: center;">Chef de projet senior</p>
                                </div>
                                <div class="row justify-content-center" style="margin-top: 14px !important;">
                                    <div class="col-6">
                                        <ul class="nav justify-content-center">
                                            <li class="nav-item">
                                                <a class="nav-link px-2" href="https://www.facebook.com/maxartkiller/"
                                                    target="_blank">
                                                    <i class="bi bi-facebook h3"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-2" href="https://twitter.com/maxartkiller"
                                                    target="_blank">
                                                    <i class="bi bi-twitter-x h3"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-2" href="https://linkedin.com/company/maxartkiller"
                                                    target="_blank">
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
                                                <p class="text-secondary small mb-1">Téléphone</p>
                                                <p>+212 760 40 20 18</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-envelope h5 text-theme mb-0"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">E-mail</p>
                                                <p>n.saoud@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-calendar2-heart h5 text-theme mb-0"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">Date de naissance</p>
                                                <p>14 Juillet 1998</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-geo h5 text-theme mb-0"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">Lieu de naissance</p>
                                                <p>Casablanca</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-globe h5 text-theme mb-0"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">Nationalité</p>
                                                <p>Marocaine</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi- h5 text-theme mb-0"><img
                                                        src="{{ asset('assets/img/icon/anneaux.png') }}"
                                                        style="width: 21px;"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">Situation familiale</p>
                                                <p>Célibataire</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card border-0 mb-4">
                                            <div class="card-body">
                                                <a href="lettre-motivation.html" target="_blank">
                                                    <div class="row gx-3 align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-blue text-white">
                                                                <i class="bi bi-file-earmark-text h5 vm"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-1">Lettre de motivation</h6>
                                                            <p class="text-secondary">Candidat</p>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card border-0 mb-4">
                                            <div class="card-body">
                                                <a href="cv.html" target="_blank">
                                                    <div class="row gx-3 align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-red text-white">
                                                                <i class="bi bi-layout-text-sidebar-reverse h5 vm"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-1">Curriculum Vitae</h6>
                                                            <p class="text-secondary">Candidat</p>
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
                    <div class="card border-0">
                        <div class="card-header" style="padding: 0">
                            <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist"
                                style="width: 100%;border-radius: 0;font-size: 18px;">
                                <li class="nav-item active" role="presentation">
                                    <button class="nav-link active" id="tab1220-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab1220" type="button" role="tab" aria-controls="tab1220"
                                        aria-selected="false" tabindex="-1">CV</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="tab11120-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab11120" type="button" role="tab"
                                        aria-controls="tab11120" aria-selected="false" tabindex="-1">CV vidéo</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link " id="tab1120-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab1120" type="button" role="tab" aria-controls="tab1120"
                                        aria-selected="false" tabindex="-1">Timeline</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card border-0 mt-5">

                        <div class="card-body">
                            <div class="tab-content" id="nav-navtabscard30">
                                <div class="tab-pane fade show active" id="tab1220" role="tabpanel"
                                    aria-labelledby="tab1220-tab">
                                    <div class="row mb-5 mt-2">
                                        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button style="font-size: 13px" class="nav-link active" id="planner-tab"
                                                    data-bs-toggle="tab" data-bs-target="#planner" type="button"
                                                    role="tab" aria-controls="planner"
                                                    aria-selected="true">Informations</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button style="font-size: 13px" class="nav-link" id="posts-tab"
                                                    data-bs-toggle="tab" data-bs-target="#posts" type="button"
                                                    role="tab" aria-controls="posts" aria-selected="false"
                                                    tabindex="-1">Formations</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button style="font-size: 13px" class="nav-link" id="posts2-tab"
                                                    data-bs-toggle="tab" data-bs-target="#posts2" type="button"
                                                    role="tab" aria-controls="posts2" aria-selected="false"
                                                    tabindex="-1">Expériences</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button style="font-size: 13px" class="nav-link" id="posts4-tab"
                                                    data-bs-toggle="tab" data-bs-target="#posts4" type="button"
                                                    role="tab" aria-controls="posts4" aria-selected="false"
                                                    tabindex="-1">Compétences</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button style="font-size: 13px" class="nav-link" id="posts3-tab"
                                                    data-bs-toggle="tab" data-bs-target="#posts3" type="button"
                                                    role="tab" aria-controls="posts3" aria-selected="false"
                                                    tabindex="-1">Langues</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button style="font-size: 13px" class="nav-link" id="posts5-tab"
                                                    data-bs-toggle="tab" data-bs-target="#posts5" type="button"
                                                    role="tab" aria-controls="posts5" aria-selected="false"
                                                    tabindex="-1">Recommandations</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button style="font-size: 13px" class="nav-link" id="posts6-tab"
                                                    data-bs-toggle="tab" data-bs-target="#posts6" type="button"
                                                    role="tab" aria-controls="posts6" aria-selected="false"
                                                    tabindex="-1">Lettre de motivation</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="planner" role="tabpanel"
                                                aria-labelledby="planner-tab">
                                                <div class="row align-items-center py-2" style="margin-top: -30px">
                                                    <div class="col-12 mb-4">
                                                        <div class="card border-0"
                                                            style="margin-top: -12px;margin-bottom: 19px;">
                                                            <div class="card-header" style="background-color: #f0f2f5;">
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto">
                                                                        <i
                                                                            class="bi bi-info-square h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <h6 class="fw-medium mb-0">Informations</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card border-0" style="background-color: #e4e8ee54;">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card border-0">
                                                                            <div class="card-body"
                                                                                style="padding: 15px 28px;">
                                                                                <h6 class="title mb-5"
                                                                                    style="margin-bottom: 38px !important;">
                                                                                    Etat civil</h6>
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-2 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            M.</option>
                                                                                                        <option>Mme</option>
                                                                                                        <option selected>
                                                                                                            Mlle</option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Civilité</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="invalid-feedback mb-3">
                                                                                            Add valid data </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-5 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Prénom"
                                                                                                        value="Nouhaila"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Prénom</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-5 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Nom"
                                                                                                        value="SAOUD"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Nom</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-3 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Situation familiale"
                                                                                                        value="Célibataire"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Situation
                                                                                                        familiale</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-3 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Date de naissance"
                                                                                                        value="14/07/1998"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Date de
                                                                                                        naissance</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-3 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Lieu de naissance"
                                                                                                        value="Casablanca"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Lieu de
                                                                                                        naissance</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-3 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Nationalité"
                                                                                                        value="Marocaine"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Nationalité</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Adresse"
                                                                                                        value="41, Rue Atlas, Etage 2, Appt. N° 5, Mâarif"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Adresse</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-12 col-md-4 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Code postal"
                                                                                                        value="20340"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Code
                                                                                                        postal</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-4 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Ville "
                                                                                                        value="Casablanca"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Ville </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-4 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Pays"
                                                                                                        value="Maroc"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Pays</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-4 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Téléphone 1"
                                                                                                        value="+212 760 40 20 18"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Téléphone
                                                                                                        1</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-4 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Téléphone 2"
                                                                                                        value="+212 612 31 70 23"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Téléphone
                                                                                                        2</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-4 mb-2">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="E-mail"
                                                                                                        value="n.saoud@gmail.com"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>E-mail</label>
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
                                                    <div class="col-12">
                                                        <div class="card border-0" style="background-color: #e4e8ee54;">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card border-0">
                                                                            <div class="card-body"
                                                                                style="padding: 15px 28px;">
                                                                                <h6 class="title mb-5"
                                                                                    style="margin-bottom: 38px !important;">
                                                                                    Mobilité du candidat</h6>
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-6 mb-2">
                                                                                        <div class="row">
                                                                                            <div class="col-auto">
                                                                                                <div
                                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg"
                                                                                                        style="padding: 10px 26px;background-color: #e3e7f1;">
                                                                                                        <label>Mobilité
                                                                                                            géographique</label>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <div
                                                                                                    class="form-check form-switch">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Locale</label>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-check form-switch">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Régionale</label>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-check form-switch">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Nationale</label>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-check form-switch ">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Internationale</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6 mb-2">
                                                                                        <div class="row">
                                                                                            <div class="col-auto">

                                                                                                <div
                                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg"
                                                                                                        style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                                                                        <label>Mode de
                                                                                                            travail</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <div
                                                                                                    class="form-check form-switch">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Présentiel</label>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-check form-switch ">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Distanciel</label>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-check form-switch ">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Hybride</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mt-4">
                                                                                    <div class="col-12 col-md-6 mb-2"
                                                                                        style="width: 44%;">
                                                                                        <div class="row">
                                                                                            <div class="col-auto">
                                                                                                <div
                                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg"
                                                                                                        style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                                                                        <label>Temps de
                                                                                                            travail</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <div
                                                                                                    class="form-check form-switch">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Plein</label>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-check form-switch ">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Partiel</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6 mb-2"
                                                                                        style="width: 48%;margin-left: 61px;">
                                                                                        <div class="row">
                                                                                            <div class="col-auto">
                                                                                                <div
                                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg"
                                                                                                        style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                                                                        <label>Disponibilité</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <div
                                                                                                    class="form-check form-switch">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        type="checkbox"
                                                                                                        role="switch"
                                                                                                        id="savecard">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="savecard">Immédiate</label>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                        <div
                                                                                                            class="form-check form-switch ">
                                                                                                            <input
                                                                                                                class="form-check-input"
                                                                                                                type="checkbox"
                                                                                                                role="switch"
                                                                                                                id="savecard">
                                                                                                            <label
                                                                                                                class="form-check-label"
                                                                                                                for="savecard">Préavis</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="margin-left: 38px;">
                                                                                                        <div
                                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                            <select
                                                                                                                class="form-select border-0"
                                                                                                                id="country1"
                                                                                                                required
                                                                                                                style="font-size: 13px">
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    1 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    2 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    3 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    4 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    5 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    6 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    7 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    8 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    9 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    10 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    11 mois
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    12 mois
                                                                                                                </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12 mt-3">
                                                                                        <div
                                                                                            class="row justify-content-center">
                                                                                            <div class="col-3">
                                                                                                <div
                                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div
                                                                                                        class="input-group input-group-lg">
                                                                                                        <div
                                                                                                            class="form-floating">
                                                                                                            <select
                                                                                                                class="form-select border-0"
                                                                                                                id="permis">
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    Oui
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="">
                                                                                                                    Non
                                                                                                                </option>
                                                                                                            </select>
                                                                                                            <label
                                                                                                                for="country1">Permis
                                                                                                                de
                                                                                                                conduire</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                                <div
                                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg"
                                                                                                        style="padding: 16px 15px 6px;background-color: #e3e7f1;">
                                                                                                        <div
                                                                                                            class="form-floating">
                                                                                                            <div class="dropdown d-inline-block"
                                                                                                                style="width: 100%;">
                                                                                                                <a class="text-secondary dd-arrow-none"
                                                                                                                    data-bs-toggle="dropdown"
                                                                                                                    aria-expanded="false"
                                                                                                                    data-bs-display="static"
                                                                                                                    role="button"
                                                                                                                    style="color: #111111 !important;">
                                                                                                                    <label
                                                                                                                        style="transform: scale(0.75) translateY(-0.5rem) translateX(0.15rem);position: absolute;top: -7px;left: -18px;color: #5f6165;">Type
                                                                                                                        de
                                                                                                                        permis</label>
                                                                                                                    <span
                                                                                                                        style="margin-top: 10px !important;float: left;">Permis
                                                                                                                        B</span><i
                                                                                                                        class="bi bi-chevron-down"
                                                                                                                        style="float: right;"></i>
                                                                                                                </a>
                                                                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                                                                    style="top: -260px;min-width: 184px;left: -16px;">
                                                                                                                    <li>
                                                                                                                        <div class="row"
                                                                                                                            style="padding-left: 15px;">
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-top: 2px;">
                                                                                                                                <input
                                                                                                                                    type="checkbox">
                                                                                                                            </div>
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-left: -15px">
                                                                                                                                Permis
                                                                                                                                A
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <div class="row"
                                                                                                                            style="padding-left: 15px;">
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-top: 2px;">
                                                                                                                                <input
                                                                                                                                    type="checkbox">
                                                                                                                            </div>
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-left: -15px">
                                                                                                                                Permis
                                                                                                                                A1
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <div class="row"
                                                                                                                            style="padding-left: 15px;">
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-top: 2px;">
                                                                                                                                <input
                                                                                                                                    type="checkbox">
                                                                                                                            </div>
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-left: -15px">
                                                                                                                                Permis
                                                                                                                                AM
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <div class="row"
                                                                                                                            style="padding-left: 15px;">
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-top: 2px;">
                                                                                                                                <input
                                                                                                                                    type="checkbox"
                                                                                                                                    checked>
                                                                                                                            </div>
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-left: -15px">
                                                                                                                                Permis
                                                                                                                                B
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <div class="row"
                                                                                                                            style="padding-left: 15px;">
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-top: 2px;">
                                                                                                                                <input
                                                                                                                                    type="checkbox">
                                                                                                                            </div>
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-left: -15px">
                                                                                                                                Permis
                                                                                                                                C
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <div class="row"
                                                                                                                            style="padding-left: 15px;">
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-top: 2px;">
                                                                                                                                <input
                                                                                                                                    type="checkbox">
                                                                                                                            </div>
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-left: -15px">
                                                                                                                                Permis
                                                                                                                                D
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <div class="row"
                                                                                                                            style="padding-left: 15px;">
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-top: 2px;">
                                                                                                                                <input
                                                                                                                                    type="checkbox">
                                                                                                                            </div>
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-left: -15px">
                                                                                                                                Permis
                                                                                                                                EB
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <div class="row"
                                                                                                                            style="padding-left: 15px;">
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-top: 2px;">
                                                                                                                                <input
                                                                                                                                    type="checkbox">
                                                                                                                            </div>
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-left: -15px">
                                                                                                                                Permis
                                                                                                                                EC
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <div class="row"
                                                                                                                            style="padding-left: 15px;">
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-top: 2px;">
                                                                                                                                <input
                                                                                                                                    type="checkbox">
                                                                                                                            </div>
                                                                                                                            <div class="col-auto"
                                                                                                                                style="margin-left: -15px">
                                                                                                                                Permis
                                                                                                                                ED
                                                                                                                            </div>
                                                                                                                        </div>
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
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 mt-4 mb-4">
                                                            <button class="btn btn-white btn-annuler" type="button"
                                                                style="font-size: 12px;float: right;">Annuler</button>
                                                            <button class="btn btn-theme " type="button"
                                                                style="font-size: 12px;float: right;margin-right: 10px">Modifier</button>
                                                            <button class="btn btn-theme btn-ajouter" type="button"
                                                                style="font-size: 12px;float: right;margin-right: 10px">Ajouter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="posts" role="tabpanel"
                                                aria-labelledby="posts-tab">
                                                <div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
                                                    <div class="card-header" style="background-color: #f0f2f5;">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <i
                                                                    class="bi bi-mortarboard h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                            </div>
                                                            <div class="col ps-0">
                                                                <h6 class="fw-medium mb-0">Formations</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-0 mb-3" style="background-color: #e4e8ee8f;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body" style="padding-left: 30px">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">
                                                                                <img src="{{ asset('assets/img/icon/formation1.png') }}"
                                                                                    alt="" style="width: 60px;">
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Ecole Centrale, Paris, France</h6>
                                                                                <p class="text-secondary"
                                                                                    style="margin-bottom: 0;">Elève
                                                                                    ingénieur</p>
                                                                                <p class="text-secondary">Septembre 2019 -
                                                                                    Septembre 2022, 3 ans</p>
                                                                                <p>Filière Ingénierie des Systèmes
                                                                                    d’Informations.<br> Mineure Ingénierie
                                                                                    d’Affaires.</p>
                                                                                <p><b>Projet de fin d’année :</b> Etude de
                                                                                    la QoS d’un réseau Wimax en mobilité.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-0 mb-3" style="background-color: #e4e8ee8f;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body" style="padding-left: 30px">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">
                                                                                <img src="{{ asset('assets/img/icon/formation2.png') }}"
                                                                                    alt="" style="width: 60px;">
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Lycée Carnot, Dijon, France</h6>
                                                                                <p class="text-secondary"
                                                                                    style="margin-bottom: 0;">Classes
                                                                                    Préparatoires aux Grandes Ecoles (CPGE)
                                                                                </p>
                                                                                <p class="text-secondary">Septembre 2016 -
                                                                                    Septembre 2018, 2 ans</p>
                                                                                <p>Filière Maths Physiques Sciences de
                                                                                    l’Ingénieur.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-0" style="background-color: #e4e8ee8f;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body" style="padding-left: 30px">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">
                                                                                <img src="{{ asset('assets/img/icon/formation3.png') }}"
                                                                                    alt="" style="width: 60px;">
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Pearson VUE </h6>
                                                                                <p class="text-secondary"
                                                                                    style="margin-bottom: 0;">Azure
                                                                                    Database</p>
                                                                                <p class="text-secondary">Octobre 2021 -
                                                                                    Décembre 2021, 3 mois</p>
                                                                                <p>Azure Database Administrator Associate
                                                                                    (DP-300)</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-4 mb-4">
                                                        <button class="btn btn-white btn-annuler" type="button"
                                                            style="font-size: 12px;float: right;">Annuler</button>
                                                        <button class="btn btn-theme " type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Modifier</button>
                                                        <button class="btn btn-theme btn-ajouter" type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Ajouter</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="posts2" role="tabpanel"
                                                aria-labelledby="posts2-tab">
                                                <div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
                                                    <div class="card-header" style="background-color: #f0f2f5;">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <i
                                                                    class="bi bi-briefcase h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                            </div>
                                                            <div class="col ps-0">
                                                                <h6 class="fw-medium mb-0">Expériences</h6>
                                                            </div>
                                                            <div class="col-auto" style="margin-right: -25px;">
                                                                <i class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Modifier"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="bi bi-plus-square h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Ajouter une expérience"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-0 mb-3" style="background-color: #e4e8ee8f;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body" style="padding-left: 30px">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">
                                                                                <img src="{{ asset('assets/img/icon/expe1.png') }}"
                                                                                    alt="" style="width: 60px;">
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Chef de projet</h6>
                                                                                <p class="text-secondary">Du 01/12/2023 à
                                                                                    ce jour</p>
                                                                                <p>En charge de l’élaboration et la
                                                                                    conception des projets de l’entreprise,
                                                                                    leur suivi et pilotage.</p>
                                                                                <h6 class="title">Missions réalisées</h6>
                                                                                <p><b>Projet de refonte du SI de la Banque
                                                                                        (2024):</b></p>
                                                                                <p>Projet de plus de 1000 JH, avec une
                                                                                    équipe de 15 ingénieurs, incluant les
                                                                                    développements, tests et recettes, mise
                                                                                    en production.</p>
                                                                                <div class="row mb-4">
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#Java</span>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#Monétique</span>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#Scrum</span>
                                                                                    </div>
                                                                                </div>
                                                                                <p><b>Projet de TMA (2023):</b></p>
                                                                                <p>Tierce Maintenance Applicative des
                                                                                    systèmes de production, avec une équipe
                                                                                    de 3 ingénieurs.</p>
                                                                                <div class="row">
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#C++</span>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#Monétique</span>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#Scrum</span>
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
                                                <div class="card border-0" style="background-color: #e4e8ee8f;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body" style="padding-left: 30px">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">
                                                                                <img src="{{ asset('assets/img/icon/expe2.png') }}"
                                                                                    alt="" style="width: 60px;">
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6>Architecte Azure</h6>
                                                                                <p class="text-secondary">Du 01/12/2022 au
                                                                                    30/11/2023</p>
                                                                                <p>En charge de la conception et de
                                                                                    l'architecture des solutions Azure pour
                                                                                    le compte des clients, ainsi que de leur
                                                                                    suivi et gestion.</p>
                                                                                <h6 class="title">Missions réalisées</h6>
                                                                                <p><b>Projet de Migration vers Azure Cloud
                                                                                        (2023) :</b></p>
                                                                                <p>Migration de plus de 1500 VM vers Azure,
                                                                                    avec une équipe de 12 ingénieurs,
                                                                                    couvrant l'architecture, la sécurité,
                                                                                    l'optimisation des coûts, et la mise en
                                                                                    production.</p>
                                                                                <div class="row mb-4">
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#Azure</span>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#Cloudmigration</span>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#DevOps</span>
                                                                                    </div>
                                                                                </div>
                                                                                <p><b>Projet de Déploiement d’une
                                                                                        Infrastructure Azure (2022) :</b>
                                                                                </p>
                                                                                <p>Conception et déploiement d'une
                                                                                    infrastructure haute disponibilité sur
                                                                                    Azure pour un système de gestion de
                                                                                    données critiques, avec une équipe de 5
                                                                                    ingénieurs.</p>
                                                                                <div class="row">
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#Azure</span>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#Automation</span>
                                                                                    </div>
                                                                                    <div class="col-auto">
                                                                                        <span
                                                                                            class="badge badge-sm bg-blue">#IaC</span>
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
                                                    <div class="col-12 mt-4 mb-4">
                                                        <button class="btn btn-white btn-annuler" type="button"
                                                            style="font-size: 12px;float: right;">Annuler</button>
                                                        <button class="btn btn-theme " type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Modifier</button>
                                                        <button class="btn btn-theme btn-ajouter" type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Ajouter</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="posts4" role="tabpanel"
                                                aria-labelledby="posts4-tab">
                                                <div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
                                                    <div class="card-header" style="background-color: #f0f2f5;">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <i
                                                                    class="bi bi-tools h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                            </div>
                                                            <div class="col ps-0">
                                                                <h6 class="fw-medium mb-0">Compétences techniques</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-0 mb-4" style="background-color: #e4e8ee8f;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center ">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body" style="padding: 19px 30px 0;">
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Développement Informatique"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Détail"
                                                                                                value="Python"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="country1M" required>
                                                                                                <option value="">
                                                                                                    Débutant</option>
                                                                                                <option>Intermédiaire
                                                                                                </option>
                                                                                                <option selected>Avancé
                                                                                                </option>
                                                                                                <option>Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Développement Informatique"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Détail"
                                                                                                value="Java"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="country1M" required>
                                                                                                <option value="">
                                                                                                    Débutant</option>
                                                                                                <option selected>
                                                                                                    Intermédiaire
                                                                                                    </optionselected>
                                                                                                <option>Avancé</option>
                                                                                                <option>Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Développement Informatique"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Détail"
                                                                                                value="C++"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="country1M" required>
                                                                                                <option value="">
                                                                                                    Débutant</option>
                                                                                                <option selected>
                                                                                                    Intermédiaire</option>
                                                                                                <option>Avancé</option>
                                                                                                <option>Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Développement Informatique"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Détail"
                                                                                                value="JavaScript"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="country1M" required>
                                                                                                <option value="">
                                                                                                    Débutant</option>
                                                                                                <option>Intermédiaire
                                                                                                </option>
                                                                                                <option>Avancé</option>
                                                                                                <option selected>Expert
                                                                                                </option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Développement Informatique"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Détail"
                                                                                                value="PHP"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="country1M" required>
                                                                                                <option value="">
                                                                                                    Débutant</option>
                                                                                                <option>Intermédiaire
                                                                                                </option>
                                                                                                <option selected>Avancé
                                                                                                </option>
                                                                                                <option>Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Développement Informatique"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Détail"
                                                                                                value="Ruby"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="country1M" required>
                                                                                                <option value="">
                                                                                                    Débutant</option>
                                                                                                <option>Intermédiaire
                                                                                                </option>
                                                                                                <option selected>Avancé
                                                                                                </option>
                                                                                                <option>Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Développement Informatique"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 39%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Détail"
                                                                                                value="Swift"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="country1M" required>
                                                                                                <option value="">
                                                                                                    Débutant</option>
                                                                                                <option>Intermédiaire
                                                                                                </option>
                                                                                                <option>Avancé</option>
                                                                                                <option selected>Expert
                                                                                                </option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
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

                                                <div class="card border-0" style="margin-top: 0px;margin-bottom: 19px;">
                                                    <div class="card-header" style="background-color: #f0f2f5;">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <i
                                                                    class="bi bi-person h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                            </div>
                                                            <div class="col ps-0">
                                                                <h6 class="fw-medium mb-0">Compétences personnelles</h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-0 mb-4" style="background-color: #e4e8ee8f;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body"
                                                                        style="padding: 19px 30px 0;">
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Communication"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="communicationD"
                                                                                                placeholder="Détail"
                                                                                                value="Communiquer efficacement."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="communication"
                                                                                                required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire"
                                                                                                    selected>Intermédiaire
                                                                                                </option>
                                                                                                <option value="Avancé">
                                                                                                    Avancé</option>
                                                                                                <option value="Expert">
                                                                                                    Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Collaboration"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="collaborationD"
                                                                                                placeholder="Détail"
                                                                                                value="Leadership et gestion d’équipe."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="collaboration"
                                                                                                required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire">
                                                                                                    Intermédiaire</option>
                                                                                                <option value="Avancé"
                                                                                                    selected>Avancé</option>
                                                                                                <option value="Expert">
                                                                                                    Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Adaptabilité"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="adaptabilitD"
                                                                                                placeholder="Détail"
                                                                                                value="Gestion du changement."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="adaptabilit" required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire">
                                                                                                    Intermédiaire</option>
                                                                                                <option value="Avancé">
                                                                                                    Avancé</option>
                                                                                                <option value="Expert"
                                                                                                    selected>Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Prise de décision"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="priseD"
                                                                                                placeholder="Détail"
                                                                                                value="Prise de décisions stratégiques."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="prise" required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire">
                                                                                                    Intermédiaire</option>
                                                                                                <option value="Avancé"
                                                                                                    selected>Avancé</option>
                                                                                                <option value="Expert">
                                                                                                    Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Gestion du temps"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="tempsD"
                                                                                                placeholder="Détail"
                                                                                                value="Respect des délais."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="temps" required>
                                                                                                <option
                                                                                                    value="Débutant"selected>
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire">
                                                                                                    Intermédiaire</option>
                                                                                                <option value="Avancé">
                                                                                                    Avancé</option>
                                                                                                <option value="Expert">
                                                                                                    Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Leadership"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="leadershipD"
                                                                                                placeholder="Détail"
                                                                                                value="Leadership  et innovation."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="leadership" required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire">
                                                                                                    Intermédiaire</option>
                                                                                                <option value="Avancé"
                                                                                                    selected>Avancé</option>
                                                                                                <option value="Expert">
                                                                                                    Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Résolution de problèmes"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="problemesD"
                                                                                                placeholder="Détail"
                                                                                                value="Gestion de crises."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="problemes" required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire">
                                                                                                    Intermédiaire</option>
                                                                                                <option value="Avancé">
                                                                                                    Avancé</option>
                                                                                                <option value="Expert"
                                                                                                    selected>Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Critique et analyse"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="analyseD"
                                                                                                placeholder="Détail"
                                                                                                value="Évaluation complexe et prise de décision."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="analyse" required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire"
                                                                                                    selected>Intermédiaire
                                                                                                </option>
                                                                                                <option value="Avancé">
                                                                                                    Avancé</option>
                                                                                                <option value="Expert">
                                                                                                    Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Créativité et innovation"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="innovationD"
                                                                                                placeholder="Détail"
                                                                                                value="Créativité pour transformation."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="innovation" required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire">
                                                                                                    Intermédiaire</option>
                                                                                                <option value="Avancé"
                                                                                                    selected>Avancé</option>
                                                                                                <option value="Expert">
                                                                                                    Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Ethique et intégrité"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="ethiqueD"
                                                                                                placeholder="Détail"
                                                                                                value="Intégrité et influence éthique."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="ethique" required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire">
                                                                                                    Intermédiaire</option>
                                                                                                <option value="Avancé">
                                                                                                    Avancé</option>
                                                                                                <option value="Expert"
                                                                                                    selected>Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 32%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                placeholder="Catégorie"
                                                                                                value="Compétences interculturelles"
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Catégorie</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 47%;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <input type="text"
                                                                                                id="interculturellesD"
                                                                                                placeholder="Détail"
                                                                                                value="Gestion d’équipes interculturelles."
                                                                                                required=""
                                                                                                class="form-control border-start-0">
                                                                                            <label>Détail</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4 col-md-4 mb-2"
                                                                                style="width: 21%;padding-right: 0;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">
                                                                                            <select
                                                                                                class="form-select border-0"
                                                                                                id="interculturelles"
                                                                                                required>
                                                                                                <option value="Débutant">
                                                                                                    Débutant</option>
                                                                                                <option
                                                                                                    value="Intermédiaire">
                                                                                                    Intermédiaire</option>
                                                                                                <option value="Avancé"
                                                                                                    selected>Avancé</option>
                                                                                                <option value="Expert">
                                                                                                    Expert</option>
                                                                                            </select>
                                                                                            <label
                                                                                                for="country1">Niveau</label>
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
                                                    <div class="col-12 mt-4 mb-4">
                                                        <button class="btn btn-white btn-annuler" type="button"
                                                            style="font-size: 12px;float: right;">Annuler</button>
                                                        <button class="btn btn-theme " type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Modifier</button>
                                                        <button class="btn btn-theme btn-ajouter" type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Ajouter</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="posts3" role="tabpanel"
                                                aria-labelledby="posts3-tab">
                                                <div class="card border-0"
                                                    style="margin-top: -34px;margin-bottom: 19px;">
                                                    <div class="card-header" style="background-color: #f0f2f5;">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <i
                                                                    class="bi bi-translate h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                            </div>
                                                            <div class="col ps-0">
                                                                <h6 class="fw-medium mb-0">Langues</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-0 mb-3" style="background-color: #e4e8ee47;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body"
                                                                        style="padding: 19px 30px 0;">
                                                                        <div class="row">
                                                                            <div class="col-4 col-md-4"
                                                                                style="width: 24%;">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12 mb-2">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value=""
                                                                                                            selected>Anglais
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Allemand
                                                                                                        </option>
                                                                                                        <option>Arabe
                                                                                                        </option>
                                                                                                        <option>Chinois
                                                                                                        </option>
                                                                                                        <option>Espagnol
                                                                                                        </option>
                                                                                                        <option>Français
                                                                                                        </option>
                                                                                                        <option>Italien
                                                                                                        </option>
                                                                                                        <option>Japonais
                                                                                                        </option>
                                                                                                        <option>Portugais
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Langue</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-8" style="width: 75%">
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Compréhension orale"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Expression orale"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Compréhension écrite"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Expression écrite"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">

                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Grammaire"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4"
                                                                                        style="width: 60%;">

                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Vocabulaire"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
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
                                                <div class="card border-0 mb-3" style="background-color: #e4e8ee47;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body"
                                                                        style="padding: 19px 30px 0;">
                                                                        <div class="row">
                                                                            <div class="col-4 col-md-4"
                                                                                style="width: 24%;">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12 mb-2">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Anglais</option>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Allemand
                                                                                                        </option>
                                                                                                        <option>Arabe
                                                                                                        </option>
                                                                                                        <option>Chinois
                                                                                                        </option>
                                                                                                        <option>Espagnol
                                                                                                        </option>
                                                                                                        <option selected>
                                                                                                            Français
                                                                                                        </option>
                                                                                                        <option>Italien
                                                                                                        </option>
                                                                                                        <option>Japonais
                                                                                                        </option>
                                                                                                        <option>Portugais
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Langue</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-8" style="width: 75%">
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Compréhension orale"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Expression orale"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Compréhension écrite"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Expression écrite"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">

                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Grammaire"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4"
                                                                                        style="width: 60%;">

                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Vocabulaire"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
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
                                                <div class="card border-0 mb-3" style="background-color: #e4e8ee47;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body"
                                                                        style="padding: 19px 30px 0;">
                                                                        <div class="row">
                                                                            <div class="col-4 col-md-4"
                                                                                style="width: 24%;">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12 mb-2">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Anglais</option>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Allemand
                                                                                                        </option>
                                                                                                        <option selected>
                                                                                                            Arabe</option>
                                                                                                        <option>Chinois
                                                                                                        </option>
                                                                                                        <option>Espagnol
                                                                                                        </option>
                                                                                                        <option>Français
                                                                                                        </option>
                                                                                                        <option>Italien
                                                                                                        </option>
                                                                                                        <option>Japonais
                                                                                                        </option>
                                                                                                        <option>Portugais
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Langue</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-8" style="width: 75%">
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Compréhension orale"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Expression orale"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Compréhension écrite"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">
                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Expression écrite"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4 mb-3"
                                                                                        style="width: 60%;">

                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Grammaire"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-4 col-md-4"
                                                                                        style="width: 60%;">

                                                                                        <div
                                                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <input type="text"
                                                                                                        placeholder="Compétence"
                                                                                                        value="Vocabulaire"
                                                                                                        required=""
                                                                                                        class="form-control border-start-0">
                                                                                                    <label>Compétence</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-4 col-md-4 mb-3 ms-auto"
                                                                                        style="width: 40%;padding-right: 0;">
                                                                                        <div
                                                                                            class="form-group  position-relative check-valid is-valid">
                                                                                            <div
                                                                                                class="input-group input-group-lg">
                                                                                                <div
                                                                                                    class="form-floating">
                                                                                                    <select
                                                                                                        class="form-select border-0"
                                                                                                        id="country1M"
                                                                                                        required>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            A1 : Débutant
                                                                                                        </option>
                                                                                                        <option>A2 :
                                                                                                            Intermédiaire
                                                                                                            bas</option>
                                                                                                        <option selected>B1
                                                                                                            : Intermédiaire
                                                                                                        </option>
                                                                                                        <option>B2 :
                                                                                                            Intermédiaire
                                                                                                            avancé</option>
                                                                                                        <option>C1 : Avancé
                                                                                                        </option>
                                                                                                        <option>C2 :
                                                                                                            Maîtrise
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label
                                                                                                        for="country1">Niveau</label>
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
                                                <div class="row">
                                                    <div class="col-12 mt-4 mb-4">
                                                        <button class="btn btn-white btn-annuler" type="button"
                                                            style="font-size: 12px;float: right;">Annuler</button>
                                                        <button class="btn btn-theme " type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Modifier</button>
                                                        <button class="btn btn-theme btn-ajouter" type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Ajouter</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="posts5" role="tabpanel"
                                                aria-labelledby="posts5-tab">
                                                <div class="card border-0"
                                                    style="margin-top: -34px;margin-bottom: 19px;">
                                                    <div class="card-header" style="background-color: #f0f2f5;">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <i
                                                                    class="bi bi-balloon-heart h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                            </div>
                                                            <div class="col ps-0">
                                                                <h6 class="fw-medium mb-0">Recommendations</h6>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a href="" data-bs-toggle="modal"
                                                                    data-bs-target="#emailcompose">
                                                                    <i class="bi bi-chat-right-dots h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Demander recommendation"></i>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border-0 mb-4">
                                                    <div class="card-body " style="background-color: #e4e8ee47;">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body" style="padding: 14px 33px;">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">
                                                                                <figure
                                                                                    class="avatar-60 avatar rounded-circle coverimg"
                                                                                    style="background-image: url(&quot;assets/img/icon/new/f2.jpg&quot;);">
                                                                                    <img src="{{ asset('assets/img/icon/new/f2.jpg') }}"
                                                                                        alt=""
                                                                                        style="display: none;">
                                                                                </figure>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1">Meryem FADILI</h6>
                                                                                <p class="text-secondary">Directrice des
                                                                                    opérations. Recommandé le 14 novembre
                                                                                    2024.</p>
                                                                                <h6 class="fw-normal"
                                                                                    style="text-align: justify">"En 2024,
                                                                                    j'ai eu l'opportunité de collaborer avec
                                                                                    Nouhaila SAOUD sur un projet impliquant
                                                                                    des tests, recettes et la mise en
                                                                                    production d'une plateforme
                                                                                    informatique.<br> Je recommande vivement
                                                                                    Nouhaila SAOUD pour son
                                                                                    professionnalisme, son enthousiasme et
                                                                                    sa capacité d'intégration."</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <div class="card border-0"
                                                                    style="background-color: #fff;">
                                                                    <div class="card-body" style="padding: 14px 33px;">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">
                                                                                <figure
                                                                                    class="avatar-60 avatar rounded-circle coverimg"
                                                                                    style="background-image: url(&quot;assets/img/icon/9989.jpg&quot;);">
                                                                                    <img src="{{ asset('assets/img/icon/9989.jpg') }}"
                                                                                        alt=""
                                                                                        style="display: none;">
                                                                                </figure>
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1">Anas EL OUDGHIRI</h6>
                                                                                <p class="text-secondary">Directeur des
                                                                                    Systèmes d'Information. Recommandé le 15
                                                                                    septembre 2024</p>
                                                                                <h6 class="fw-normal"
                                                                                    style="text-align: justify">"Nouhaila
                                                                                    a brillamment piloté la migration de
                                                                                    1500 VM vers le Cloud Azure, avec une
                                                                                    équipe de 12 ingénieurs, en 2023,
                                                                                    assurant l’architecture, la sécurité et
                                                                                    l’optimisation des coûts. Son
                                                                                    professionnalisme et son efficacité sont
                                                                                    remarquables, et je la recommande
                                                                                    vivement."</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mt-4 mb-4">
                                                        <button class="btn btn-white btn-annuler" type="button"
                                                            style="font-size: 12px;float: right;">Annuler</button>
                                                        <button class="btn btn-theme " type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Modifier</button>
                                                        <button class="btn btn-theme btn-ajouter" type="button"
                                                            style="font-size: 12px;float: right;margin-right: 10px">Ajouter</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="posts6" role="tabpanel"
                                                aria-labelledby="posts6-tab">
                                                <div class="card border-0"
                                                    style="margin-top: -34px;margin-bottom: 19px;">
                                                    <div class="card-header" style="background-color: #f0f2f5;">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <i
                                                                    class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                            </div>
                                                            <div class="col ps-0">
                                                                <h6 class="fw-medium mb-0">Lettre de motivation</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center py-2">
                                                    <div class="col-12">
                                                        <div class="card border-0 mb-4"
                                                            style="background-color: #e4e8ee47">
                                                            <div class="card-body ">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card border-0"
                                                                            style="background-color: #fff">
                                                                            <div class="card-body"
                                                                                style="padding: 15px 42px;">
                                                                                <div class="row mb-4">
                                                                                    <div class="col-12">
                                                                                        <span class="ms-auto"
                                                                                            style="float: right;font-size: 14px; text-align: justify;color: #5d6266 !important;">Casablanca,
                                                                                            14 novembre 2024</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-4">

                                                                                    <p class="text-secondary"
                                                                                        style="font-size: 14px; text-align: justify;color: #5d6266 !important;">
                                                                                        Objet : Lettre de motivation<br><br>
                                                                                        Madame, Monsieur,<br><br>
                                                                                        Ingénieure diplômée de l’École
                                                                                        Centrale de Paris, spécialisée en
                                                                                        systèmes d’information et en
                                                                                        ingénierie d’affaires, je vous
                                                                                        adresse ma candidature spontanée
                                                                                        pour un poste de cheffe de projet IT
                                                                                        au sein de votre entreprise. Mon
                                                                                        expérience dans la gestion de
                                                                                        projets stratégiques et mon
                                                                                        expertise en architecture Cloud me
                                                                                        permettent de mener des missions
                                                                                        complexes avec une forte valeur
                                                                                        ajoutée.
                                                                                        <br><br>
                                                                                        Au cours de mon parcours
                                                                                        professionnel, j’ai dirigé des
                                                                                        projets variés, notamment la refonte
                                                                                        du système d’information d’une
                                                                                        grande banque, un projet de plus de
                                                                                        1000 jours-homme impliquant 15
                                                                                        ingénieurs. J’y ai piloté toutes les
                                                                                        phases, des développements et tests
                                                                                        jusqu’à la mise en production, tout
                                                                                        en appliquant les méthodologies
                                                                                        agiles #Scrum et en utilisant des
                                                                                        technologies comme #Java et
                                                                                        #Monétique.<br><br>
                                                                                        En tant qu'architecte Azure, j'ai
                                                                                        également été responsable de la
                                                                                        conception et de la migration vers
                                                                                        le Cloud Azure de plus de 1500
                                                                                        machines virtuelles, en mettant
                                                                                        l’accent sur l’optimisation des
                                                                                        coûts, la sécurité et la haute
                                                                                        disponibilité. Ces projets ont
                                                                                        renforcé mes compétences en
                                                                                        #Cloudmigration, #DevOps, et #IaC,
                                                                                        et m’ont permis de gérer des équipes
                                                                                        techniques de différentes tailles,
                                                                                        jusqu’à 12 ingénieurs.<br><br>
                                                                                        Je suis particulièrement motivée à
                                                                                        l’idée de rejoindre votre
                                                                                        entreprise, réputée pour son esprit
                                                                                        d’innovation et ses projets de
                                                                                        transformation digitale. Je suis
                                                                                        convaincue que mes compétences
                                                                                        techniques, mon leadership et mon
                                                                                        sens de l'organisation me
                                                                                        permettront de contribuer
                                                                                        efficacement à vos projets
                                                                                        ambitieux.<br><br>
                                                                                        Je reste à votre disposition pour un
                                                                                        entretien afin de vous détailler
                                                                                        plus amplement mon parcours et mes
                                                                                        motivations. Je vous remercie par
                                                                                        avance de l’attention que vous
                                                                                        porterez à ma candidature.<br><br>
                                                                                        Dans l’attente de votre retour, je
                                                                                        vous prie d’agréer, Madame,
                                                                                        Monsieur, l’expression de mes
                                                                                        salutations distinguées.<br><br>
                                                                                        Nouhaila SAOUD<br><br>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 mt-4 mb-4">
                                                            <button class="btn btn-white btn-annuler" type="button"
                                                                style="font-size: 12px;float: right;">Annuler</button>
                                                            <button class="btn btn-theme " type="button"
                                                                style="font-size: 12px;float: right;margin-right: 10px">Modifier</button>
                                                            <button class="btn btn-theme btn-ajouter" type="button"
                                                                style="font-size: 12px;float: right;margin-right: 10px">Ajouter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="tab11120" role="tabpanel"
                                    aria-labelledby="tab11120-tab">
                                    <div class="row mb-5 mt-5">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0" style="background-color: #e4e8ee47;">
                                                        <div class="card-body">
                                                            <div class="card border-0 h-100 "
                                                                style="background-color: #fff;">
                                                                <div class="card-header"
                                                                    style="background-color: #fff;">
                                                                    <div class="row align-items-center"
                                                                        style="padding: 25px 12px 0px;">
                                                                        <div class="col-auto">
                                                                            <i class="bi bi-play-btn h5 avatar avatar-40 bg-light-blue text-blue rounded"
                                                                                style="font-size: 26px;"></i>
                                                                        </div>
                                                                        <div class="col">
                                                                            <h6 class="fw-medium mb-0">CV vidéo</h6>
                                                                            <p class="text-secondary small">Durée : 03:36
                                                                            </p>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-0"
                                                                    style="min-height: 518px;background-color: #fff;padding:15px 24px !important;">
                                                                    <div class="row gx-0 h-100">
                                                                        <video style="width: 100%;" id="myVideo"
                                                                            controls="false">
                                                                            <source
                                                                                src="{{ asset('assets/img/video/CV-Video.mp4') }}"
                                                                                type="video/mp4" />
                                                                        </video>
                                                                    </div>

                                                                </div>
                                                                <div class="card-footer"
                                                                    style="background-color: #fff;padding: 21px 13px;border-top: 10px solid #f7f9fa;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12">
                                                                            <input id="seekBar" type="range"
                                                                                min="0" max="100"
                                                                                value="0">
                                                                        </div>
                                                                        <div class="col-2"
                                                                            style="margin-right: -33px;">
                                                                            <div class="custom-controls controls1">
                                                                                <div class="avatar avatar-50 rounded bg-light-cyan"
                                                                                    id="playPause"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Lire"
                                                                                    style="cursor: pointer;background-color: transparent !important;">
                                                                                    <i class="bi bi-play-fill h2"></i>
                                                                                </div>

                                                                                <div class="avatar avatar-50 rounded bg-light-cyan hidden"
                                                                                    id="rewind"
                                                                                    style="cursor: pointer;background-color: transparent !important;">
                                                                                    <i class="bi bi-rewind-btn h5"></i>
                                                                                </div>
                                                                                <span id="timeDisplay">00:00</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="custom-controls controls2">
                                                                                <div class="volume-show">
                                                                                    <div class="avatar avatar-50 rounded bg-light-cyan"
                                                                                        id="mute"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top"
                                                                                        title="Activer / Désactiver le son"
                                                                                        style="cursor: pointer;background-color: transparent !important;">
                                                                                        <i class="bi bi-volume-up h4"></i>
                                                                                    </div>
                                                                                    <input id="volumeBar" type="range"
                                                                                        min="0" max="1"
                                                                                        step="0.1" value="1"
                                                                                        class="hidden">
                                                                                </div>
                                                                                <div class="avatar avatar-50 rounded bg-light-cyan"
                                                                                    id="fullscreen"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Plein écran"
                                                                                    style="cursor: pointer;background-color: transparent !important;">
                                                                                    <i class="bi bi-fullscreen h4"></i>
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
                                <div class="tab-pane fade " id="tab1120" role="tabpanel"
                                    aria-labelledby="tab1120-tab">
                                    <div class="row mb-5 mt-4">
                                        <div class="col-5 ms-auto mb-5" style="margin-bottom: 36px !important;">
                                            <div class="input-group " style="border: 1px solid #005dc7">
                                                <span class="input-group-text text-theme"
                                                    style="background-color: #eef3fc !important;"><i
                                                        class="bi bi-search"></i></span>
                                                <input style="background-color: #eef3fc !important;" type="text"
                                                    class="form-control" placeholder="Recherche...">
                                            </div>
                                        </div>
                                        <div class="col-12 cover-cusomer">
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <figure class="avatar avatar-60 coverimg  vm"
                                                                style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                                                                <img src="{{ asset('assets/img/icon/59902.jpg') }}"
                                                                    alt="" style="display: none;">
                                                            </figure>
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 394px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            01/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Inscription</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            La candidate s’inscrit sur Human Jobs.</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            CV téléchargé, informations de base complètes.
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <figure class="avatar avatar-60 coverimg  vm"
                                                                style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                                                                <img src="{{ asset('assets/img/icon/59902.jpg') }}"
                                                                    alt="" style="display: none;">
                                                            </figure>
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            05/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Modification</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Ajout de la certification AZ-305<br> Designing
                                                                            Microsoft Azure Infrastructure Solutions.</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            CV mis à jour.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('assets/img/icon/diorh.png') }}"
                                                                alt="" style="width: 64px;">
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            07/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Évaluation</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Examin et validation du CV.</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Programmation d'un test technique.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('assets/img/icon/diorh.png') }}"
                                                                alt="" style="width: 64px;">
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            10/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Évaluation</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Test technique (score 85/100).</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Résultat du test ajouté.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('assets/img/icon/diorh.png') }}"
                                                                alt="" style="width: 64px;">
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            10/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Évaluation</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Entretien d'évaluation des compétences
                                                                            interpersonnelles<br> et de la motivation.</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Entretien validé, candidature recommandée pour
                                                                            entretien final.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('assets/img/icon/totale.png') }}"
                                                                alt="" style="width: 64px;">
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            10/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Entretien</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Entretien d'évaluation des compétences
                                                                            techniques<br> et la culture d’entreprise.</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Entretien validé, candidat retenu pour la suite.
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('assets/img/icon/totale.png') }}"
                                                                alt="" style="width: 64px;">
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            10/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Entretien</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Mise à jour du statut de la candidature.</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Entretien réussi, phase suivante.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('assets/img/icon/totale.png') }}"
                                                                alt="" style="width: 64px;">
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            10/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Mise à jour du Statut</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Proposition de l'offre.</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Statut mis à jour : Offre faite.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <figure class="avatar avatar-60 coverimg  vm"
                                                                style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                                                                <img src="{{ asset('assets/img/icon/59902.jpg') }}"
                                                                    alt="" style="display: none;">
                                                            </figure>
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            05/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Mise à jour du Statut</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Acceptation de l'offre.</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Statut mis à jour : Candidat accepté, embauche
                                                                            prévue.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('assets/img/icon/totale.png') }}"
                                                                alt="" style="width: 64px;">
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            10/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Pré-embauche</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Signature de la lettre de promesse d'embauche.
                                                                        </td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Remise de la lettre de promesse d'embauche.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border-0 mb-4">
                                                <div class="card-body"
                                                    style="background-color: #dce6f97d;padding: 4px 10px;">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <figure class="avatar avatar-60 coverimg  vm"
                                                                style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                                                                <img src="{{ asset('assets/img/icon/59902.jpg') }}"
                                                                    alt="" style="display: none;">
                                                            </figure>
                                                        </div>
                                                        <div class="col-11 ">
                                                            <table class="table">
                                                                <thead style="font-size: 13px;color: #87888b;">
                                                                    <tr>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 108px;font-weight: 100;color: #005dc7;">
                                                                            Date</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;width: 121px;font-weight: 100;color: #005dc7;">
                                                                            Étape</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;width: 395px;">
                                                                            Action</th>
                                                                        <th
                                                                            style="border-bottom: 0px !important;font-weight: 100;color: #005dc7;">
                                                                            Statut</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            05/03/2024</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Embauche</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Acceptation de la promesse d'embauche.</td>
                                                                        <td
                                                                            style="border-bottom: 0px !important;padding-top: 0;">
                                                                            Date d'embauche : 01 décembre 2024.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
                    $('#collaborationD').val("Leadership et gestion d’équipe.");
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
                    $('#interculturellesD').val("Gestion d’équipes interculturelles.");
                } else if (value == "Expert") {
                    $('#interculturellesD').val("Gestion de projets internationaux.");
                }
            });
        });
        $(window).on('load', function() {
            $('taginput').tagsinput();

            /* ck editor */
            ClassicEditor
                .create(document.querySelector('#ckeditor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    <style>
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

        .ck.ck-editor__main {
            height: 219px;
            overflow: hidden;
            overflow-y: scroll;
        }

        .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline p {
            text-align: justify;
        }

        .custom-color-icon i {
            color: #005dc7 !important;
        }

        .btn-annuler:hover {
            background-color: #e4e5e7;
            color: #686767;
        }

        .btn-ajouter {
            background-color: #005dc7;
        }

        .btn-ajouter:hover {
            background-color: #2e9c65 !important;
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

        /****************************************/

        .cover-cusomer figure {
            width: 64px !important;
            height: 64px !important;
        }


        @media (min-width: 1400px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1470px;
            }
        }
    </style>
@endsection
