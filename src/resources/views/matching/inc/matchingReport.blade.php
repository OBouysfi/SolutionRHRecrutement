@extends('layouts.master')

@section('title', 'Rapport Matching')

@section('css_header')

@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Rapports") }}</h5>
                </div>

                <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="contact">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Rapport Matching") }}</li>
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
                                <div class="card-body p-0" style="min-height: 700px; ">
                                    <div class="row mt-3">
                                        <div class="col-auto ms-auto" style="margin-right: 3px;">
                                            <div class="dropdown d-inline-block">
                                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                                    aria-expanded="false" data-bs-display="static" role="button">
                                                    <i class="bi bi-three-dots-vertical" style="font-size: 19px"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end" style="min-width: 10px;">
                                                    <li><a class="dropdown-item " href="cv-view.html"
                                                            target="_blank">{{ __("generated.Aperçu") }}</a></li>
                                                    <li><a class="dropdown-item " href="javascript:void(0)">{{ __("generated.Partager") }}</a></li>
                                                    <li><a class="dropdown-item " href="javascript:void(0)">{{ __("generated.Imprimer") }}</a></li>
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
                                            <p
                                                style="text-align: center;font-weight: 700;font-size: 25px;margin-bottom: 2px;" >{{ __("generated.Nouhaila SAOUD") }}</p>
                                            <p class="text-secondary " style="text-align: center;">{{ __("generated.Chef de projet senior") }}</p>
                                        </div>
                                        <div class="row justify-content-center" style="margin-top: 14px !important;">
                                            <div class="col-6">
                                                <ul class="nav justify-content-center">
                                                    <li class="nav-item">
                                                        <a class="nav-link px-2"
                                                            href="https://www.facebook.com/maxartkiller/" target="_blank">
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
                                                        <a class="nav-link px-2"
                                                            href="https://linkedin.com/company/maxartkiller"
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
                                                        <p class="text-secondary small mb-1 ">{{ __("generated.Téléphone") }}</p>
                                                        <p>+212 760 40 20 18</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-envelope h5 text-theme mb-0"></i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 ">{{ __("generated.E-mail") }}</p>
                                                        <p>n.saoud@gmail.com</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-calendar2-heart h5 text-theme mb-0"></i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 " >{{ __("generated.Date de naissance") }}</p>
                                                        <p>14 Juillet 1998</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-geo h5 text-theme mb-0"></i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 ">{{ __("generated.Lieu de naissance") }}</p>
                                                        <p>Casablanca</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-auto">
                                                        <i class="bi bi-globe h5 text-theme mb-0"></i>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-secondary small mb-1 ">{{ __("generated.Nationalité") }}</p>
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
                                                        <p class="text-secondary small mb-1 ">{{ __("generated.Situation familiale") }}</p>
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
                                                                    <div
                                                                        class="avatar avatar-50 rounded bg-blue text-white">
                                                                        <i class="bi bi-file-earmark-text h5 vm"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-1 ">{{ __("generated.Lettre de motivation") }}</h6>
                                                                    <p class="text-secondary ">{{ __("generated.Candidat") }}</p>
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
                                                                    <div
                                                                        class="avatar avatar-50 rounded bg-red text-white">
                                                                        <i
                                                                            class="bi bi-layout-text-sidebar-reverse h5 vm"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-1 ">{{ __("generated.Curriculum Vitae") }}</h6>
                                                                    <p class="text-secondary ">{{ __("generated.Candidat") }}</p>
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
                                <div class="tab-content" id="nav-navtabscard30">
                                    <div class="tab-pane fade show active" id="tabLR11120" role="tabpanel"
                                        aria-labelledby="tabLR11120-tab">
                                        <div class="card border-0 mb-4">
                                            <div class="card-body p-0" >
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center ">

                                                                    <div class="col-2 ms-auto"
                                                                        style="width: 22%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row">
                                                                            <div class="col-auto" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="rapport-matching-apercu.html"
                                                                                        target="_blank"><i
                                                                                            class="bi bi-binoculars avatar   rounded h5"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
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
                                                                            <div class="col-auto" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button">
                                                                                        <i
                                                                                            class="bi bi-cloud-download avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-printer avatar   rounded h5"></i>
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
                                                <div class="card border-0" >
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body" style="padding: 10px 33px;">
                                                                        <div class="row mb-4">
                                                                            <div class="col-12">
                                                                                <h4 class="title custom-title ">{{ __("generated.Rapport Matching") }}</h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <table class="table">
                                                                                    <thead style="font-size: 14px">
                                                                                        <tr>
                                                                                            <th rowspan="2"
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;width: 200px;" >{{ __("generated.Intitulé") }}</th>
                                                                                            <th rowspan="2"
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                                                            </th>
                                                                                            <th colspan="2"
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;text-align: center;width: 111px;" >{{ __("generated.Candidat") }}</th>
                                                                                            <th rowspan="2"
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                                                            </th>
                                                                                            <th colspan="2"
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;text-align: center" >{{ __("generated.Recruteur") }}</th>
                                                                                            <th rowspan="2"
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                                                            </th>
                                                                                            <th rowspan="2"
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;text-align: right;width: 87px;" >{{ __("generated.Ecart") }}</th>
                                                                                            <th rowspan="2"
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;text-align: right;width: 90px;" >{{ __("generated.Score") }}</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 66px;text-align: right" >{{ __("generated.Indicateur") }}</th>
                                                                                            <th
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 112px;text-align: right" >{{ __("generated.Tolérance") }}</th>
                                                                                            <th
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 66px;text-align: right" >{{ __("generated.Indicateur") }}</th>
                                                                                            <th
                                                                                                style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 112px;text-align: right" >{{ __("generated.Tolérance") }}</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody style="font-size: 14px">
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding: 10px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Profil") }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Formation") }}</td>
                                                                                            <td rowspan="3"
                                                                                                style="width: 2px;border-bottom: 0">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span >{{ __("generated.Bac") }}</span>+4
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                            </td>
                                                                                            <td rowspan="3"
                                                                                                style="border-bottom: 0;width: 2px">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span >{{ __("generated.Bac") }}</span>+5
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                20%</td>
                                                                                            <td rowspan="3"
                                                                                                style="border-bottom: 0;width: 2px">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM1">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Expérience") }}</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3
                                                                                               <span >{{ __("generated.ans") }}</span> </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5
                                                                                                <span >{{ __("generated.ans") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                2 <span >{{ __("generated.ans") }}</span> &nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM2">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Type de contrat") }}</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CDI
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: left;padding: 17px 13px;">
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CDI
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM3">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding: 10px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Mobilité") }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Mobilité géographique") }}</td>
                                                                                            <td rowspan="15"
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td rowspan="15"
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td rowspan="15"
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i>
                                                                                                <span >{{ __("generated.Locale") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                60%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                20%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-up-right"
                                                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM4">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Régionale") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                20%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM5">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Nationale") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM6">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Internationale") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                40%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM7">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Mode de travail") }}</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Présentiel") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                65%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-up-right"
                                                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM8">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Distanciel") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                20%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                5%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-up-right"
                                                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM9">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Hybride") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                40%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM10">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Temps de travail") }}</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Plein") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                60%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                20%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-up-right"
                                                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM11">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Partiel") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Disponibilité") }}</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Immédiate") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM12">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Préavis") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding: 10px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Compétences techniques") }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Développement Informatique") }}</td>
                                                                                            <td rowspan="8"
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td rowspan="8"
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td rowspan="8"
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>Python</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                75%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                25%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM13">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>Java</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                51%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                49%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM14">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>C++</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                60%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                20%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-up-right"
                                                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM15">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>JavaScript</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                75%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                25%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM16">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>PHP</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                20%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                40%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM17">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>Ruby</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                60%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                20%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-up-right"
                                                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM18">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>Swift</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                75%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                25%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM19">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding: 10px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Compétences personnelles") }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Personnalité") }}</td>
                                                                                            <td rowspan="13"
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td rowspan="13"
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td rowspan="13"
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Management") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                65%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM20">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Créativité") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                60%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                25%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                50%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM21">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Empathie") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                65%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM22">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Rigueur") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                65%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM23">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Motivations") }}</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Stabilité") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                65%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM24">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Dynamisme") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                60%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                25%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                50%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM25">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Raisonnement") }}</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Innover") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                65%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM26">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expérimenter") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                73%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                15%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                76%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                3%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM27">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Appliquer") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                63%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                35%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                96%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                30%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                33%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM28">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Approfondir") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                75%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                25%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM29">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding: 10px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td colspan="10"
                                                                                                style="padding-left: 13px;font-weight: 700;background-color: #f3f3f5;border-top: 1px solid #000 !important;border-bottom: 1px solid #cfcdcd;" >{{ __("generated.Compétences linguistiques") }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;padding: 10px">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 0;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="width: 2px;border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;">
                                                                                                Français</td>
                                                                                            <td rowspan="23"
                                                                                                style="width: 2px;border-bottom: 0">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td rowspan="23"
                                                                                                style="width: 2px;border-bottom: 0">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td rowspan="23"
                                                                                                style="width: 2px;border-bottom: 0">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension orale") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM30">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression orale") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM31">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension écrite") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM32">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression écrite") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM33">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Règles linguistiques") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                85%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                15%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM34">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Syntaxe") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                75%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                25%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM35">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;">
                                                                                                Anglais</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension orale") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                85%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                5%&nbsp;<i
                                                                                                    class="bi bi-arrow-up-right"
                                                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM36">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression orale") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM37">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension écrite") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM38">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression écrite") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM39">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Règles linguistiques") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                60%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                20%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM40">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Syntaxe") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                70%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM41">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;" >{{ __("generated.Espagnole") }}</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension orale") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM42">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression orale") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-up-right"
                                                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM43">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Compréhension écrite") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%&nbsp;<i
                                                                                                    class="bi bi-arrow-right"
                                                                                                    style="color: #005dc7;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM44">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Expression écrite") }}</span></td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                100%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM45">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Règles linguistiques") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                90%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                10%&nbsp;<i
                                                                                                    class="bi bi-arrow-up-right"
                                                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM46">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr
                                                                                            style="vertical-align: middle;">
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                                                <i class="bi bi-square-fill"
                                                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span >{{ __("generated.Syntaxe") }}</span>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                73%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                80%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                0%</td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                7%&nbsp;<i
                                                                                                    class="bi bi-arrow-down-left"
                                                                                                    style="color: #dd2255;font-size: 15px"></i>
                                                                                            </td>
                                                                                            <td
                                                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                                                <div class="circle-small"
                                                                                                    style="float: right">
                                                                                                    <div
                                                                                                        id="circleprogressgreenRM47">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('js_footer')
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



            var progressCirclesredRM1 = new ProgressBar.Circle(circleprogressgreenRM1, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM1.animate(0.89); // Number from 0.0 to 1.0

            var progressCirclesredRM2 = new ProgressBar.Circle(circleprogressgreenRM2, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM2.animate(0.78); // Number from 0.0 to 1.0


            var progressCirclesredRM3 = new ProgressBar.Circle(circleprogressgreenRM3, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM3.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM4 = new ProgressBar.Circle(circleprogressgreenRM4, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM4.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM5 = new ProgressBar.Circle(circleprogressgreenRM5, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM5.animate(0.30); // Number from 0.0 to 1.0


            var progressCirclesredRM6 = new ProgressBar.Circle(circleprogressgreenRM6, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM6.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM7 = new ProgressBar.Circle(circleprogressgreenRM7, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM7.animate(0.20); // Number from 0.0 to 1.0


            var progressCirclesredRM8 = new ProgressBar.Circle(circleprogressgreenRM8, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM8.animate(0.80); // Number from 0.0 to 1.0



            var progressCirclesredRM9 = new ProgressBar.Circle(circleprogressgreenRM9, {
                color: '#fdba00',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f9eab1',
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
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM9.animate(0.50); // Number from 0.0 to 1.0


            var progressCirclesredRM10 = new ProgressBar.Circle(circleprogressgreenRM10, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM10.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM11 = new ProgressBar.Circle(circleprogressgreenRM11, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM11.animate(1); // Number from 0.0 to 1.0


            var progressCirclesredRM12 = new ProgressBar.Circle(circleprogressgreenRM12, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM12.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM13 = new ProgressBar.Circle(circleprogressgreenRM13, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM13.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM14 = new ProgressBar.Circle(circleprogressgreenRM14, {
                color: '#fdba00',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f9eab1',
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
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM14.animate(0.51); // Number from 0.0 to 1.0


            var progressCirclesredRM15 = new ProgressBar.Circle(circleprogressgreenRM15, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM15.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM16 = new ProgressBar.Circle(circleprogressgreenRM16, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM16.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM17 = new ProgressBar.Circle(circleprogressgreenRM17, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM17.animate(0.10); // Number from 0.0 to 1.0

            var progressCirclesredRM18 = new ProgressBar.Circle(circleprogressgreenRM18, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM18.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM19 = new ProgressBar.Circle(circleprogressgreenRM19, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM19.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM20 = new ProgressBar.Circle(circleprogressgreenRM20, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM20.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredRM21 = new ProgressBar.Circle(circleprogressgreenRM21, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM21.animate(0.40); // Number from 0.0 to 1.0

            var progressCirclesredRM22 = new ProgressBar.Circle(circleprogressgreenRM22, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM22.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredRM23 = new ProgressBar.Circle(circleprogressgreenRM23, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM23.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM24 = new ProgressBar.Circle(circleprogressgreenRM24, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM24.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredRM25 = new ProgressBar.Circle(circleprogressgreenRM25, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM25.animate(0.40); // Number from 0.0 to 1.0

            var progressCirclesredRM26 = new ProgressBar.Circle(circleprogressgreenRM26, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM26.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredRM27 = new ProgressBar.Circle(circleprogressgreenRM27, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM27.animate(0.95); // Number from 0.0 to 1.0

            var progressCirclesredRM28 = new ProgressBar.Circle(circleprogressgreenRM28, {
                color: '#fdba00',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f9eab1',
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
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM28.animate(0.65); // Number from 0.0 to 1.0

            var progressCirclesredRM29 = new ProgressBar.Circle(circleprogressgreenRM29, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM29.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM30 = new ProgressBar.Circle(circleprogressgreenRM30, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM30.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM31 = new ProgressBar.Circle(circleprogressgreenRM31, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM31.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM32 = new ProgressBar.Circle(circleprogressgreenRM32, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM32.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM33 = new ProgressBar.Circle(circleprogressgreenRM33, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM33.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM34 = new ProgressBar.Circle(circleprogressgreenRM34, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM34.animate(0.85); // Number from 0.0 to 1.0

            var progressCirclesredRM35 = new ProgressBar.Circle(circleprogressgreenRM35, {
                color: '#015ec2',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#dcecfe',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#015ec2',
                    width: 10
                },
                to: {
                    color: '#015ec2',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM35.animate(0.75); // Number from 0.0 to 1.0

            var progressCirclesredRM36 = new ProgressBar.Circle(circleprogressgreenRM36, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM36.animate(0.95); // Number from 0.0 to 1.0

            var progressCirclesredRM37 = new ProgressBar.Circle(circleprogressgreenRM37, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM37.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM38 = new ProgressBar.Circle(circleprogressgreenRM38, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM38.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM39 = new ProgressBar.Circle(circleprogressgreenRM39, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM39.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM40 = new ProgressBar.Circle(circleprogressgreenRM40, {
                color: '#f03d4f',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 10,
                trailWidth: 10,
                easing: 'easeInOut',
                trailColor: '#f03d4fa6',
                duration: 1400,
                text: {
                    autoStyleContainer: false
                },
                from: {
                    color: '#f03d4f',
                    width: 10
                },
                to: {
                    color: '#f03d4f',
                    width: 10
                },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM40.animate(0.40); // Number from 0.0 to 1.0

            var progressCirclesredRM41 = new ProgressBar.Circle(circleprogressgreenRM41, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM41.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM42 = new ProgressBar.Circle(circleprogressgreenRM42, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM42.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM43 = new ProgressBar.Circle(circleprogressgreenRM43, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM43.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM44 = new ProgressBar.Circle(circleprogressgreenRM44, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM44.animate(1); // Number from 0.0 to 1.0

            var progressCirclesredRM45 = new ProgressBar.Circle(circleprogressgreenRM45, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM45.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredRM46 = new ProgressBar.Circle(circleprogressgreenRM46, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM46.animate(0.95); // Number from 0.0 to 1.0

            var progressCirclesredRM47 = new ProgressBar.Circle(circleprogressgreenRM47, {
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

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + "<small>%<small>");
                    }

                }
            });
            // progressCirclesred1.text.style.fontSize = '20px';
            progressCirclesredRM47.animate(0.93); // Number from 0.0 to 1.0


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

        .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
            height: 312px !important;
        }

        .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline p {
            text-align: justify;
        }

        .custom-color-icon i {
            color: #005dc7 !important;
        }

        .dropdown-menu .form-control,
        .dropdown-menu .form-select,
        .dropdown-menu .input-group-text,
        .dropdown-menu .chosen-choices,
        .dropdown-menu .chosen-single,
        .modal-dialog .form-control,
        .modal-dialog .form-select,
        .modal-dialog .input-group-text,
        .modal-dialog .chosen-choices,
        .modal-dialog .chosen-single,
        .card .form-control,
        .card .form-select,
        .card .input-group-text,
        .card .chosen-choices,
        .card .chosen-single {
            background-color: var(--adminux-theme-bg) !important;
        }

        .form-control,
        .form-select {
            background-color: var(--adminux-theme-bg) !important;
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

        .dz-default.dz-message {
            margin-top: 8%;
        }

        .lettre-3 .dz-default.dz-message {
            margin-top: 4%;
        }

        .filter-block .col-3 {
            margin-right: -5px
        }

        .filter-empty {
            padding-top: 11px !important;
        }

        .poste-chosen .chosen-container.chosen-container-single {
            padding: 2px 9px;
            background-color: var(--adminux-theme-bg);
            border-radius: 7px;
            margin-top: -4px;
        }

        .poste-chosen .chosen-container.chosen-container-single a.chosen-single {
            padding: 3px 10px;
        }

        .poste-chosen .chosen-container.chosen-container-single div.chosen-drop {
            margin-left: -10px;
        }

        .poste-chosen .chosen-container-single .chosen-single div b {
            display: block;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 12px;
            margin-top: 3px;
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
        }

        .title.custom-title:after {
            width: 63px !important;
        }

        /****************************************/
        @media (min-width: 1400px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1372px;
            }
        }
    </style>
@endsection
