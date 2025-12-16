@extends('layouts.master')

@section('title', 'Rôles et permissions')

@section('css_header')

@endsection

@section('content')
    <!-- Begin page content -->
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">Paramètre</h5>
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
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
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
                    <li class="breadcrumb-item active" aria-current="page">Rôles et permissions</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body filter-block">
                                            <div class="row">
                                                <div class="col-3" style="width: 251px;">
                                                    <div id="country-selector" class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;">Pays
                                                        </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option value="Arabie"
                                                                data-image="assets/img/drap/saudi-arabia.png">Arabie
                                                                Saoudite</option>
                                                            <option value="Belgique"
                                                                data-image="assets/img/drap/Belgique.jpg">Belgique</option>
                                                            <option value="Canada" data-image="assets/img/drap/Canada.png">
                                                                Canada</option>
                                                            <option value="Cameroun"
                                                                data-image="assets/img/drap/cameroon.jpg">Cameroun</option>
                                                            <option value="Chine" data-image="assets/img/drap/china.jpg">
                                                                Chine</option>
                                                            <option value="Ivoire"
                                                                data-image="assets/img/drap/Cote_d'Ivoire.png">Côte
                                                                d'Ivoire
                                                            </option>
                                                            <option value="Espagne"
                                                                data-image="assets/img/drap/Spain.png">
                                                                Espagne</option>
                                                            <option value="Unis"
                                                                data-image="assets/img/drap/united-arab-emirates.jpg">
                                                                Émirats Arabes Unis</option>
                                                            <option value="France"
                                                                data-image="assets/img/drap/France.png">
                                                                France</option>
                                                            <option value="Inde" data-image="assets/img/drap/india.jpg">
                                                                Inde
                                                            </option>
                                                            <option value="Irlande"
                                                                data-image="assets/img/drap/Ireland.png">Irlande</option>
                                                            <option value="Maroc" selected
                                                                data-image="assets/img/drap/MAROC.jpg">Maroc</option>
                                                            <option value="Qatar" data-image="assets/img/drap/QATAR.jpg">
                                                                Qatar</option>
                                                            <option value="Sénégal"
                                                                data-image="assets/img/drap/senegal.jpg">Sénégal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3" style="width: 170px;">
                                                    <div id="Maroc" class="ville-p">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Agadir</option>
                                                                <option selected>Casablanca</option>
                                                                <option>Dakhla</option>
                                                                <option>Fès</option>
                                                                <option>Kenitra</option>
                                                                <option>Laâyoune</option>
                                                                <option>Marrakech</option>
                                                                <option>Meknès</option>
                                                                <option>Oujda</option>
                                                                <option>Rabat</option>
                                                                <option>Tanger</option>
                                                                <option>Tétouan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="France" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Bordeaux</option>
                                                                <option selected>Lille</option>
                                                                <option>Lyon</option>
                                                                <option>Marseille</option>
                                                                <option>Montpellier</option>
                                                                <option>Nantes</option>
                                                                <option>Nice</option>
                                                                <option>Paris</option>
                                                                <option>Strasbourg</option>
                                                                <option>Toulouse</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Irlande" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Cork</option>
                                                                <option selected>Drogheda</option>
                                                                <option>Dublin</option>
                                                                <option>Galway</option>
                                                                <option>Limerick</option>
                                                                <option>Waterford</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Arabie" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Buraidah</option>
                                                                <option selected>Dammam</option>
                                                                <option>Jeddah</option>
                                                                <option>Khobar</option>
                                                                <option>Mecca</option>
                                                                <option>Medina</option>
                                                                <option>Riyad</option>
                                                                <option>Taïf</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Qatar" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Al Daayen</option>
                                                                <option selected>Al Khor</option>
                                                                <option>Al Rayyan</option>
                                                                <option>Al Wakrah</option>
                                                                <option>Doha</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Unis" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Abou Dabi</option>
                                                                <option selected>Ajman</option>
                                                                <option>Dubaï</option>
                                                                <option>Ras Al Khaimah</option>
                                                                <option>Sharjah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Sénégal" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Dakar</option>
                                                                <option selected>Kaolack</option>
                                                                <option>Thiès</option>
                                                                <option>Touba</option>
                                                                <option>Ziguinchor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Ivoire" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Abidjan</option>
                                                                <option selected>Bouaké</option>
                                                                <option>Daloa</option>
                                                                <option>San Pedro</option>
                                                                <option>Yamoussoukro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Cameroun" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Bafoussam</option>
                                                                <option selected>Bamenda</option>
                                                                <option>Douala</option>
                                                                <option>Garoua</option>
                                                                <option>Yaoundé</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Inde" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Ahmedabad</option>
                                                                <option selected>Bangalore</option>
                                                                <option>Chennai</option>
                                                                <option>Delhi</option>
                                                                <option>Hyderabad</option>
                                                                <option>Kolkata</option>
                                                                <option>Mumbai</option>
                                                                <option>Surat</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Chine" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Beijing</option>
                                                                <option selected>Chengdu</option>
                                                                <option>Chongqing</option>
                                                                <option>Guangzhou</option>
                                                                <option>Hong Kong</option>
                                                                <option>Shanghai</option>
                                                                <option>Shenzhen</option>
                                                                <option>Tianjin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Espagne" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Barcelone</option>
                                                                <option selected>Madrid</option>
                                                                <option>Malaga</option>
                                                                <option>Saragosse</option>
                                                                <option>Séville</option>
                                                                <option>Valence</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Canada" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Calgary</option>
                                                                <option selected>Edmonton</option>
                                                                <option>Montréal</option>
                                                                <option>Ottawa</option>
                                                                <option>Toronto</option>
                                                                <option>Vancouver </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Belgique" class="ville-p hidden">
                                                        <div class="rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option>Tous</option>
                                                                <option>Anvers</option>
                                                                <option selected>Bruxelles</option>
                                                                <option>Charleroi</option>
                                                                <option>Gand</option>
                                                                <option>Liège</option>
                                                                <option>Leuven</option>
                                                                <option>Namur</option>
                                                                <option>Bruges</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-3" style="width: 278px;">
                                                    <div class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Filiale</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Filatoc</option>
                                                            <option>Xima</option>
                                                            <option>Kamala</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3" style="width: 276px;margin-right: 0px  !important;">
                                                    <div class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Agence</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Agence - Maarif</option>
                                                            <option>Agence - Bourgone</option>
                                                            <option>Agence - Anfa supp.</option>
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
            <div class="row mb-4">
                <div class="col-12">
                    <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist">
                        <li class="nav-item" role="users">
                            <button class="nav-link" id="tab1020-tab" data-bs-toggle="tab" data-bs-target="#tab1020"
                                type="button" role="tab" aria-controls="tab1020" aria-selected="true">Liste
                                d'utilisateurs</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab1220-tab" data-bs-toggle="tab"
                                data-bs-target="#tab1220" type="button" role="tab" aria-controls="tab1220"
                                aria-selected="true">Type
                                d'utilisateur</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="tab1120-tab" data-bs-toggle="tab" data-bs-target="#tab1120"
                                type="button" role="tab" aria-controls="tab1120" aria-selected="true">Rôles et
                                Permissions</button>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="row">
                <div class="tab-content" id="nav-navtabscard30">
                    <div class="tab-pane fade" id="tab1020" role="tabpanel" aria-labelledby="tab1020-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row" style="padding: 6px 20px">
                                                            <div class="col-12">
                                                                <div class="row mb-5">
                                                                    <div class="col-12">
                                                                        <h6 class="title custom-title">Liste d'utilisateurs
                                                                        </h6>

                                                                        <div class="row" style="padding: 6px 20px">
                                                                            <div class="col-12">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>ID</th>
                                                                                            <th>Nom</th>
                                                                                            <th>Email</th>
                                                                                            <th>Actions</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($users as $user)
                                                                                            <tr>
                                                                                                <td>{{ __($user->id) }}</td>
                                                                                                <td>{{ __($user->name) }}</td>
                                                                                                <td>{{ __($user->email) }}</td>
                                                                                                <td>
                                                                                                    <a href="#"
                                                                                                        class="btn btn-theme  ">Modifier</a>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="" class="tab-pane fade active show" id="tab1220" role="tabpanel"
                        aria-labelledby="tab1220-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0"  >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row" style="padding: 6px 20px">
                                                            <div class="col-12">
                                                                <div class="row mb-5">
                                                                    <div class="col-12">
                                                                        <h6 class="title custom-title">Type d'utilisateur
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion accordion-theme"
                                                                    id="personalizeAccord">
                                                                    <div class="row mt-4" style="padding: 0px 81px">
                                                                        <div class="col-6">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="accordion-item"
                                                                                        style="background-color: transparent;">
                                                                                        <h2 class="accordion-header"
                                                                                            id="personalizeAccorHdOneN1">
                                                                                            <button
                                                                                                style="padding-top: 14px;padding-bottom: 14px;border-bottom: 1px solid #005dc7;"
                                                                                                class="accordion-button theme-blue bg-radial-gradient"
                                                                                                type="button"
                                                                                                data-bs-toggle="collapse"
                                                                                                data-bs-target="#personalizeAccordOneN1"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="personalizeAccordOneN1">

                                                                                                <div class="col">
                                                                                                    <h5 class="fw-medium"
                                                                                                        style="font-size: 18px">
                                                                                                        Recrutement</h5>
                                                                                                </div>

                                                                                            </button>
                                                                                        </h2>
                                                                                        <div id="personalizeAccordOneN1"
                                                                                            class="accordion-collapse collapse show"
                                                                                            aria-labelledby="personalizeAccorHdOneN1"
                                                                                            data-bs-parent="#personalizeAccord">
                                                                                            <div class="accordion-body"
                                                                                                style="padding-right: 14px;padding-left: 14px;">
                                                                                                <ul style="font-size: 16px;"
                                                                                                    class="list-group list-group-flush bg-none">
                                                                                                    <li style="border-top: 1px solid #e9e9e9;padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek"
                                                                                                                    checked>
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Consultant en recrutement"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Consultant
                                                                                                                                en
                                                                                                                                recrutement</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Chargé de recrutement"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Chargé
                                                                                                                                de
                                                                                                                                recrutement</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Talent acquisition specialist"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Talent
                                                                                                                                acquisition
                                                                                                                                specialist</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Chargé de sourcing"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Chargé
                                                                                                                                de
                                                                                                                                sourcing</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable des relations clients"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Responsable
                                                                                                                                des
                                                                                                                                relations
                                                                                                                                clients</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Coordinateur de projet recrutement"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Coordinateur
                                                                                                                                de
                                                                                                                                projet
                                                                                                                                recrutement</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Assistant(e) de recrutement"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Assistant(e)
                                                                                                                                de
                                                                                                                                recrutement</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;border-bottom: 1px solid #e9e9e9;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Prénom"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Directeur
                                                                                                                                Général</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="accordion-item"
                                                                                        style="background-color: transparent;">
                                                                                        <h2 class="accordion-header"
                                                                                            id="personalizeAccorHdOneN7">
                                                                                            <button
                                                                                                style="padding-top: 14px;padding-bottom: 14px;border-bottom: 1px solid #005dc7;"
                                                                                                class="accordion-button theme-blue bg-radial-gradient"
                                                                                                type="button"
                                                                                                data-bs-toggle="collapse"
                                                                                                data-bs-target="#personalizeAccordOneN7"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="personalizeAccordOneN7">

                                                                                                <div class="col">
                                                                                                    <h5 class="fw-medium"
                                                                                                        style="font-size: 18px">
                                                                                                        Repporting</h5>
                                                                                                </div>

                                                                                            </button>
                                                                                        </h2>
                                                                                        <div id="personalizeAccordOneN7"
                                                                                            class="accordion-collapse accordion-collapse collapse"
                                                                                            aria-labelledby="personalizeAccorHdOneN7"
                                                                                            data-bs-parent="#personalizeAccord">
                                                                                            <div class="accordion-body"
                                                                                                style="padding-right: 14px;padding-left: 14px;">
                                                                                                <ul style="font-size: 16px;"
                                                                                                    class="list-group list-group-flush bg-none">
                                                                                                    <li style="border-top: 1px solid #e9e9e9;padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Responsable
                                                                                                                                reporting
                                                                                                                                et
                                                                                                                                analyses</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;border-bottom: 1px solid #e9e9e9;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Responsable
                                                                                                                                des
                                                                                                                                relations
                                                                                                                                clients</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="accordion-item"
                                                                                        style="background-color: transparent;">
                                                                                        <h2 class="accordion-header"
                                                                                            id="personalizeAccorHdOneN3">
                                                                                            <button
                                                                                                style="padding-top: 14px;padding-bottom: 14px;border-bottom: 1px solid #005dc7;"
                                                                                                class="accordion-button theme-blue bg-radial-gradient"
                                                                                                type="button"
                                                                                                data-bs-toggle="collapse"
                                                                                                data-bs-target="#personalizeAccordOneN3"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="personalizeAccordOneN3">

                                                                                                <div class="col">
                                                                                                    <h5 class="fw-medium"
                                                                                                        style="font-size: 18px">
                                                                                                        Finance</h5>
                                                                                                </div>

                                                                                            </button>
                                                                                        </h2>
                                                                                        <div id="personalizeAccordOneN3"
                                                                                            class="accordion-collapse accordion-collapse collapse"
                                                                                            aria-labelledby="personalizeAccorHdOneN3"
                                                                                            data-bs-parent="#personalizeAccord">
                                                                                            <div class="accordion-body"
                                                                                                style="padding-right: 14px;padding-left: 14px;">
                                                                                                <ul style="font-size: 16px;"
                                                                                                    class="list-group list-group-flush bg-none">
                                                                                                    <li style="border-top: 1px solid #e9e9e9;padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Directeur
                                                                                                                                financier</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Contrôleur
                                                                                                                                de
                                                                                                                                gestion</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Responsable
                                                                                                                                comptabilité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Comptable</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;border-bottom: 1px solid #e9e9e9;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Trésorier</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

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
                                                                        <div class="col-6">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="accordion-item"
                                                                                        style="background-color: transparent;">
                                                                                        <h2 class="accordion-header"
                                                                                            id="personalizeAccorHdOneN6">
                                                                                            <button
                                                                                                style="padding-top: 14px;padding-bottom: 14px;border-bottom: 1px solid #005dc7;"
                                                                                                class="accordion-button theme-blue bg-radial-gradient"
                                                                                                type="button"
                                                                                                data-bs-toggle="collapse"
                                                                                                data-bs-target="#personalizeAccordOneN6"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="personalizeAccordOneN6">

                                                                                                <div class="col">
                                                                                                    <h5 class="fw-medium"
                                                                                                        style="font-size: 18px">
                                                                                                        Super administrateur
                                                                                                    </h5>
                                                                                                </div>

                                                                                            </button>
                                                                                        </h2>
                                                                                        <div id="personalizeAccordOneN6"
                                                                                            class="accordion-collapse accordion-collapse collapse"
                                                                                            aria-labelledby="personalizeAccorHdOneN6"
                                                                                            data-bs-parent="#personalizeAccord">
                                                                                            <div class="accordion-body"
                                                                                                style="padding-right: 14px;padding-left: 14px;">
                                                                                                <ul style="font-size: 16px;"
                                                                                                    class="list-group list-group-flush bg-none">
                                                                                                    <li style="border-top: 1px solid #e9e9e9;padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Super
                                                                                                                                administrateur
                                                                                                                                système</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Super
                                                                                                                                administrateur
                                                                                                                                de
                                                                                                                                la
                                                                                                                                sécurité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Super
                                                                                                                                administrateur
                                                                                                                                des
                                                                                                                                utilisateurs</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Super
                                                                                                                                administrateur
                                                                                                                                des
                                                                                                                                données</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Super
                                                                                                                                administrateur
                                                                                                                                des
                                                                                                                                rapports</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;border-bottom: 1px solid #e9e9e9;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Super
                                                                                                                                administrateur
                                                                                                                                de
                                                                                                                                la
                                                                                                                                conformité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="accordion-item"
                                                                                        style="background-color: transparent;">
                                                                                        <h2 class="accordion-header"
                                                                                            id="personalizeAccorHdOneN8">
                                                                                            <button
                                                                                                style="padding-top: 14px;padding-bottom: 14px;border-bottom: 1px solid #005dc7;"
                                                                                                class="accordion-button theme-blue bg-radial-gradient"
                                                                                                type="button"
                                                                                                data-bs-toggle="collapse"
                                                                                                data-bs-target="#personalizeAccordOneN8"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="personalizeAccordOneN8">

                                                                                                <div class="col">
                                                                                                    <h5 class="fw-medium"
                                                                                                        style="font-size: 18px">
                                                                                                        Administrateur</h5>
                                                                                                </div>

                                                                                            </button>
                                                                                        </h2>
                                                                                        <div id="personalizeAccordOneN8"
                                                                                            class="accordion-collapse accordion-collapse collapse"
                                                                                            aria-labelledby="personalizeAccorHdOneN8"
                                                                                            data-bs-parent="#personalizeAccord">
                                                                                            <div class="accordion-body"
                                                                                                style="padding-right: 14px;padding-left: 14px;">
                                                                                                <ul style="font-size: 16px;"
                                                                                                    class="list-group list-group-flush bg-none">
                                                                                                    <li style="border-top: 1px solid #e9e9e9;padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable reporting et analyses"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Administrateur
                                                                                                                                de
                                                                                                                                recrutement</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Administrateur de la conformité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Administrateur
                                                                                                                                de
                                                                                                                                la
                                                                                                                                conformité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Administrateur système"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Administrateur
                                                                                                                                système</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Administrateur des données"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Administrateur
                                                                                                                                des
                                                                                                                                données</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Administrateur des rapports"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Administrateur
                                                                                                                                des
                                                                                                                                rapports</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Administrateur de l'assistance"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Administrateur
                                                                                                                                de
                                                                                                                                l'assistance</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;border-bottom: 1px solid #e9e9e9;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Administrateur des politiques de la sécurité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Administrateur
                                                                                                                                des
                                                                                                                                politiques
                                                                                                                                de
                                                                                                                                la
                                                                                                                                sécurité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="accordion-item"
                                                                                        style="background-color: transparent;">
                                                                                        <h2 class="accordion-header"
                                                                                            id="personalizeAccorHdOneN2">
                                                                                            <button
                                                                                                style="padding-top: 14px;padding-bottom: 14px;border-bottom: 1px solid #005dc7;"
                                                                                                class="accordion-button theme-blue bg-radial-gradient collapsed"
                                                                                                type="button"
                                                                                                data-bs-toggle="collapse"
                                                                                                data-bs-target="#personalizeAccordOneN2"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="personalizeAccordOneN2">

                                                                                                <div class="col">
                                                                                                    <h5 class="fw-medium"
                                                                                                        style="font-size: 18px">
                                                                                                        Système
                                                                                                        d'Information</h5>
                                                                                                </div>

                                                                                            </button>
                                                                                        </h2>
                                                                                        <div id="personalizeAccordOneN2"
                                                                                            class="accordion-collapse accordion-collapse collapse"
                                                                                            aria-labelledby="personalizeAccorHdOneN2"
                                                                                            data-bs-parent="#personalizeAccord">
                                                                                            <div class="accordion-body"
                                                                                                style="padding-right: 14px;padding-left: 14px;">
                                                                                                <ul style="font-size: 16px;"
                                                                                                    class="list-group list-group-flush bg-none">
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;border-top: 1px solid #e9e9e9;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Administrateur réseaux"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Administrateur
                                                                                                                                réseaux</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Chef de projet IT"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Chef
                                                                                                                                de
                                                                                                                                projet
                                                                                                                                IT</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Auditeur IT"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Auditeur
                                                                                                                                IT</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Développeur système"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Développeur
                                                                                                                                système</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;border-bottom: 1px solid #e9e9e9;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Chargé de la gestion des flux"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Chargé
                                                                                                                                de
                                                                                                                                la
                                                                                                                                gestion
                                                                                                                                des
                                                                                                                                flux</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="accordion-item"
                                                                                        style="background-color: transparent;">
                                                                                        <h2 class="accordion-header"
                                                                                            id="personalizeAccorHdOneN4">
                                                                                            <button
                                                                                                style="padding-top: 14px;padding-bottom: 14px;border-bottom: 1px solid #005dc7;"
                                                                                                class="accordion-button theme-blue bg-radial-gradient"
                                                                                                type="button"
                                                                                                data-bs-toggle="collapse"
                                                                                                data-bs-target="#personalizeAccordOneN4"
                                                                                                aria-expanded="false"
                                                                                                aria-controls="personalizeAccordOneN4">

                                                                                                <div class="col">
                                                                                                    <h5 class="fw-medium"
                                                                                                        style="font-size: 18px">
                                                                                                        Sécurité</h5>
                                                                                                </div>

                                                                                            </button>
                                                                                        </h2>
                                                                                        <div id="personalizeAccordOneN4"
                                                                                            class="accordion-collapse accordion-collapse collapse"
                                                                                            aria-labelledby="personalizeAccorHdOneN4"
                                                                                            data-bs-parent="#personalizeAccord">
                                                                                            <div class="accordion-body"
                                                                                                style="padding-right: 14px;padding-left: 14px;">
                                                                                                <ul style="font-size: 16px;"
                                                                                                    class="list-group list-group-flush bg-none">
                                                                                                    <li style="border-top: 1px solid #e9e9e9;padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable de la sécurité du système d'information"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Responsable
                                                                                                                                de
                                                                                                                                la
                                                                                                                                sécurité
                                                                                                                                du
                                                                                                                                système
                                                                                                                                d'information</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Administrateur sécurité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Administrateur
                                                                                                                                sécurité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Ingénieur sécurité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Ingénieur
                                                                                                                                sécurité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Analyste sécurité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Analyste
                                                                                                                                sécurité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Consultant sécurité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Consultant
                                                                                                                                sécurité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable conformité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Responsable
                                                                                                                                conformité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Technicien support sécurité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Technicien
                                                                                                                                support
                                                                                                                                sécurité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Responsable gestion des risques"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Responsable
                                                                                                                                gestion
                                                                                                                                des
                                                                                                                                risques</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Auditeur sécurité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Auditeur
                                                                                                                                sécurité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li style="padding-top: 5px;padding-bottom: 5px;border-bottom: 1px solid #e9e9e9;"
                                                                                                        class="list-group-item text-secondary">
                                                                                                        <div class="row"
                                                                                                            style="padding-left: 10px;">
                                                                                                            <div class="col-auto"
                                                                                                                style="margin-top: 22px">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    name="chek">
                                                                                                            </div>
                                                                                                            <div class="col-8 ps-0"
                                                                                                                style="width: 93%;">
                                                                                                                <div
                                                                                                                    class="form-group mb-1 mt-1 position-relative check-valid is-valid">
                                                                                                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                    <div
                                                                                                                        class="input-group input-group-lg">
                                                                                                                        <div
                                                                                                                            class="form-floating">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                placeholder="Architecte sécurité"
                                                                                                                                value=""
                                                                                                                                required=""
                                                                                                                                class="form-control border-start-0"
                                                                                                                                style="background-color: var(--adminux-theme-bg) !important;color: #000">
                                                                                                                            <label
                                                                                                                                style="color: #000">Architecte
                                                                                                                                sécurité</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

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
                                                                    <div style="padding: 0px 81px;"
                                                                        class="row mb-5 mt-4">
                                                                        <div class="col-12">
                                                                            <div class="form-check form-switch"
                                                                                style="margin-top: 15px;">
                                                                                <button
                                                                                    class="btn btn-theme mnw-100 bg-green"
                                                                                    style="float: right;font-size: 14px;margin-left: 10px">Enregistrer</button>
                                                                                <button data-bs-toggle="modal"
                                                                                    data-bs-target="#emailcompose3"
                                                                                    class="btn btn-danger mnw-100"
                                                                                    style="float: right;font-size: 14px;margin-left: 10px">Supprimer</button>
                                                                                <button data-bs-toggle="modal"
                                                                                    data-bs-target="#emailcompose2"
                                                                                    class="btn btn-theme mnw-100 bg-blue"
                                                                                    style="float: right;font-size: 14px;background-color: #f7931a !important;margin-left: 10px">Modifier</button>
                                                                                <button data-bs-toggle="modal"
                                                                                    data-bs-target="#emailcompose"
                                                                                    class="btn btn-theme mnw-100 bg-blue"
                                                                                    style="float: right;font-size: 14px">Ajouter</button>
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
                    <div class="tab-pane fade " id="tab1120" role="tabpanel" aria-labelledby="tab1120-tab">
                        <div class="row mb-4" style="margin-top: -2px !important">
                            <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab1"
                                role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tR1-tab" data-bs-toggle="tab"
                                        data-bs-target="#tR1" type="button" role="tab" aria-controls="tR1"
                                        aria-selected="true">Recrutement</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tR2-tab" data-bs-toggle="tab"
                                        data-bs-target="#tR2" type="button" role="tab" aria-controls="tR2"
                                        aria-selected="false" tabindex="-1">Reporting </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tR3-tab" data-bs-toggle="tab"
                                        data-bs-target="#tR3" type="button" role="tab" aria-controls="tR3"
                                        aria-selected="false" tabindex="-1">Finance </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tR4-tab" data-bs-toggle="tab"
                                        data-bs-target="#tR4" type="button" role="tab" aria-controls="tR4"
                                        aria-selected="false" tabindex="-1">Super administrateur </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tR5-tab" data-bs-toggle="tab"
                                        data-bs-target="#tR5" type="button" role="tab" aria-controls="tR5"
                                        aria-selected="false" tabindex="-1">Administrateur </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tR6-tab" data-bs-toggle="tab"
                                        data-bs-target="#tR6" type="button" role="tab" aria-controls="tR6"
                                        aria-selected="false" tabindex="-1">Système d'Information</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tR7-tab" data-bs-toggle="tab"
                                        data-bs-target="#tR7" type="button" role="tab" aria-controls="tR7"
                                        aria-selected="false" tabindex="-1">Sécurité</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="tR1" role="tabpanel"
                                aria-labelledby="tR1-tab">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0 mb-2">
                                            <div class="card-body"  >
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center "
                                                                    style="padding-left: 10px">
                                                                    <div class="col-2 ms-auto"
                                                                        style="width: 18%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row">
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Ajouter une permission">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH">
                                                                                        <i
                                                                                            class="bi bi-plus-square avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Modifier une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH2">
                                                                                        <i
                                                                                            class="bi bi-pen avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Supprimer une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-trash3 avatar   rounded h5"></i>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Enregistrer"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-floppy avatar   rounded h5"></i>
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
                                    <div class="col-12">
                                        <div class="card border-0"  >
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row mb-4" style="padding: 6px 20px">
                                                                    <div class="col-4" style="width: 30%;">
                                                                        <h6 class="title custom-title">Recrutement</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding: 6px 20px">
                                                                    <div class="col-12">
                                                                        <table class="table">
                                                                            <tr style="border-top: 1px solid #e9e9e9;">
                                                                                <td rowspan="2" style="width: 32px;">
                                                                                </td>
                                                                                <td rowspan="2"
                                                                                    style="width: 315px;font-weight: 700;vertical-align: middle">
                                                                                    Poste</td>
                                                                                <td rowspan="2"
                                                                                    style="width: 384px;font-weight: 700;vertical-align: middle">
                                                                                    Rôles</td>
                                                                                <td colspan="2"
                                                                                    style="font-weight: 700;/* padding-left: 5%; */text-align: center;">
                                                                                    Permissions</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 176px;font-weight: 700">
                                                                                    Actions</td>
                                                                                <td style="font-weight: 700">Tâches</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Consultant en recrutement</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Gestion des recrutements</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;">Ajouter</button>

                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Ajouter un candidat dans la
                                                                                            shortlist.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Ajuster</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Ajuster les offres d'emplois en
                                                                                            fonction des besoins des
                                                                                            clients.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9;padding-bottom: 18px;">
                                                                                    <button class="btn btn-danger mnw-100"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;">Planifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9;padding-bottom: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Planification des entretiens sur
                                                                                            l'ATS.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="4"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="4"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Chargé de recrutement</td>
                                                                                <td rowspan="4"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Entretiens avec les candidats</td>
                                                                                <td
                                                                                    style="vertical-align: middle;;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;">Ajouter</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Ajouter les candidats dans la
                                                                                            CVthèque.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button class="btn btn-danger mnw-100"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;">Planifier</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Planifier des entretiens entre
                                                                                            candidats et clients.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F1895C !important;width: 109.34px;">Valider</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Valider le matching des
                                                                                            candidats avec les besoins des
                                                                                            offres d'emplois.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9;;padding-bottom: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Envoyer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9;;padding-bottom: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Envoyer des invitations pour les
                                                                                            tests techniques ou de
                                                                                            personnalité.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="2"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="2"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Talent Acquisition Specialist</td>
                                                                                <td rowspan="2"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Coordination des projets de recrutement
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-green"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;background-color: #7D4FFE !important">Mettre
                                                                                        à jour</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Mettre à jour les informations
                                                                                            des candidats et clients.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9;padding-bottom: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-green"
                                                                                        style="float: left;font-size: 14px;background-color: #F6B12D !important;width: 109.34px;">Analyser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9;padding-bottom: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Analyse des coûts de recrutement
                                                                                            par projet.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Chargé de sourcing</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Identification et recherche de talents
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Rechercher</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Recherche de candidats dans la
                                                                                            CVthèque et Vivier talents.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Ajuster</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Ajouter des candidats sur la
                                                                                            CVthèque et/ou Vivier talents.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9;padding-bottom: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #7D4FFE !important;width: 109.34px;">Mettre
                                                                                        à jour</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9;padding-bottom: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Mettre à jour les profils
                                                                                            qualifiés, les profils actifs et
                                                                                            les profils validés.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;"><input
                                                                                        type="checkbox"></td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;">
                                                                                    Responsable des relations clients</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;">
                                                                                    Gestion
                                                                                    des relations avec les clients</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-green"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;background-color: #F6B12D !important">Analyser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Analyser les résultats des
                                                                                            campagnes de recrutement.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Vérifier</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Vérifier, à partir de la
                                                                                            shortlist, que les candidats
                                                                                            répondent aux critères des
                                                                                            clients.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #df7e7e !important;width: 109.34px;">Contrôler</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>
                                                                                            Contrôler les délais des
                                                                                            campagnes de recrutement.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

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
                            <div class="tab-pane fade" id="tR2" role="tabpanel" aria-labelledby="tR2-tab">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0 mb-2">
                                            <div class="card-body"  >
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center "
                                                                    style="padding-left: 10px">
                                                                    <div class="col-2 ms-auto"
                                                                        style="width: 18%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row">
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Ajouter une permission">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH">
                                                                                        <i
                                                                                            class="bi bi-plus-square avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Modifier une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH2">
                                                                                        <i
                                                                                            class="bi bi-pen avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Supprimer une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-trash3 avatar   rounded h5"></i>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Enregistrer"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-floppy avatar   rounded h5"></i>
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
                                    <div class="col-12">
                                        <div class="card border-0"  >
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row mb-4" style="padding: 6px 20px">
                                                                    <div class="col-4" style="width: 30%;">
                                                                        <h6 class="title custom-title">Reporting</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding: 6px 20px">
                                                                    <div class="col-12">
                                                                        <table class="table">
                                                                            <tr style="border-top: 1px solid #e9e9e9;">
                                                                                <td rowspan="2" style="width: 32px;">
                                                                                </td>
                                                                                <td rowspan="2"
                                                                                    style="width: 434px;font-weight: 700;vertical-align: middle">
                                                                                    Poste</td>
                                                                                <td rowspan="2"
                                                                                    style="width: 468px;font-weight: 700;vertical-align: middle">
                                                                                    Rôles</td>
                                                                                <td colspan="2"
                                                                                    style="font-weight: 700;padding-left: 5%;">
                                                                                    Permissions</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 176px;font-weight: 700">
                                                                                    Actions</td>
                                                                                <td style="font-weight: 700">Tâches</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="4"
                                                                                    style="vertical-align: middle;"><input
                                                                                        type="checkbox"></td>
                                                                                <td rowspan="4"
                                                                                    style="vertical-align: middle;">
                                                                                    Responsable reporting et analyses</td>
                                                                                <td>Consulter Rapports de matching</td>
                                                                                <td>
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Vérifier</button>
                                                                                </td>
                                                                                <td>
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Rapports de matching.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Consulter Rapports de test technique
                                                                                </td>
                                                                                <td>
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F1895C !important;width: 109.34px;">Consulter</button>
                                                                                </td>
                                                                                <td>
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Rapports de test technique</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Consulter Rrapports de test personnalité
                                                                                </td>
                                                                                <td>
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F1895C !important;width: 109.34px;">Consulter</button>
                                                                                </td>
                                                                                <td>
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Rapports de test personnalité
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Consulter Rapports d'évaluation</td>
                                                                                <td>
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Vérifier</button>
                                                                                </td>
                                                                                <td>
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Rapports d'évaluation</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
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
                            <div class="tab-pane fade" id="tR3" role="tabpanel" aria-labelledby="tR3-tab">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0 mb-2">
                                            <div class="card-body"  >
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center "
                                                                    style="padding-left: 10px">
                                                                    <div class="col-2 ms-auto"
                                                                        style="width: 18%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row">
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Ajouter une permission">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH">
                                                                                        <i
                                                                                            class="bi bi-plus-square avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Modifier une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH2">
                                                                                        <i
                                                                                            class="bi bi-pen avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Supprimer une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-trash3 avatar   rounded h5"></i>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Enregistrer"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-floppy avatar   rounded h5"></i>
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
                                    <div class="col-12">
                                        <div class="card border-0"  >
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row mb-4" style="padding: 6px 20px">
                                                                    <div class="col-4" style="width: 30%;">
                                                                        <h6 class="title custom-title">Finance</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding: 6px 20px">
                                                                    <div class="col-12">
                                                                        <table class="table">
                                                                            <tr style="border-top: 1px solid #e9e9e9;">
                                                                                <td rowspan="2" style="width: 32px;">
                                                                                </td>
                                                                                <td rowspan="2"
                                                                                    style="width: 315px;font-weight: 700;vertical-align: middle">
                                                                                    Poste</td>
                                                                                <td rowspan="2"
                                                                                    style="width: 384px;font-weight: 700;vertical-align: middle">
                                                                                    Rôles</td>
                                                                                <td colspan="2"
                                                                                    style="font-weight: 700;/* padding-left: 5%; */text-align: center;">
                                                                                    Permissions</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 176px;font-weight: 700">
                                                                                    Actions</td>
                                                                                <td style="font-weight: 700">Tâches</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Directeur financier</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Superviseur Financier</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;">Définir</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Définir la stratégie budgétaire
                                                                                            globale.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Approuver</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Approuver les demandes de budget
                                                                                            relatives au recrutement.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button class="btn btn-danger mnw-100"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;">Générer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Générer et présenter les
                                                                                            rapports financiers à la
                                                                                            Direction.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Contrôleur de Gestion</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Analyste Contrôle</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F1895C !important;width: 109.34px;">Contrôler</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Contrôler la conformité des
                                                                                            dépenses par rapport aux
                                                                                            prévisions.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Élaborer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Élaborer des rapports d’écarts
                                                                                            budgétaires et proposer des
                                                                                            correctifs.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;background-color: #7D4FFE !important">Optimiser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Optimiser la répartition des
                                                                                            coûts de recrutement.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Comptabilité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Gestionnaire Comptable</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F6B12D !important;width: 109.34px;">Superviser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Superviser la facturation et les
                                                                                            factures liées à la plateforme
                                                                                            de recrutement.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Gérer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer les clôtures périodiques
                                                                                            (mensuelles, trimestrielles,
                                                                                            annuelles).</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Préparer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Préparer les bilans et comptes
                                                                                            de résultat.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Comptable</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Opérateur Comptable</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #7D4FFE !important;width: 109.34px;">Enregistrer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Enregistrer les transactions
                                                                                            courantes (factures, paiements,
                                                                                            etc.).</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;background-color: #F6B12D !important">Corriger</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Corriger les erreurs et
                                                                                            anomalies dans les comptes.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Participer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Participer aux déclarations
                                                                                            fiscales (TVA, IS, etc.).</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Trésorier</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Gestionnaire de Trésorerie</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Gérer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer les besoins de liquidités
                                                                                            pour les campagnes de
                                                                                            recrutement.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #df7e7e !important;width: 109.34px;">Proposer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Proposer des solutions de
                                                                                            financement.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F6B12D !important;width: 109.34px;">Suivre</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Suivre les positions de cash et
                                                                                            optimiser la trésorerie.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
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
                            <div class="tab-pane fade" id="tR4" role="tabpanel" aria-labelledby="tR4-tab">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0 mb-2">
                                            <div class="card-body"  >
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center "
                                                                    style="padding-left: 10px">
                                                                    <div class="col-2 ms-auto"
                                                                        style="width: 18%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row">
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Ajouter une permission">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH">
                                                                                        <i
                                                                                            class="bi bi-plus-square avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Modifier une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH2">
                                                                                        <i
                                                                                            class="bi bi-pen avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Supprimer une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-trash3 avatar   rounded h5"></i>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Enregistrer"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-floppy avatar   rounded h5"></i>
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
                                    <div class="col-12">
                                        <div class="card border-0"  >
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row mb-4" style="padding: 6px 20px">
                                                                    <div class="col-4" style="width: 30%;">
                                                                        <h6 class="title custom-title">Super
                                                                            administrateur
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding: 6px 20px">
                                                                    <div class="col-12">
                                                                        <table class="table">
                                                                            <tr style="border-top: 1px solid #e9e9e9;">
                                                                                <td rowspan="2" style="width: 32px;">
                                                                                </td>
                                                                                <td rowspan="2"
                                                                                    style="width: 315px;font-weight: 700;vertical-align: middle">
                                                                                    Poste</td>
                                                                                <td rowspan="2"
                                                                                    style="width: 384px;font-weight: 700;vertical-align: middle">
                                                                                    Rôles</td>
                                                                                <td colspan="2"
                                                                                    style="font-weight: 700;/* padding-left: 5%; */text-align: center;">
                                                                                    Permissions</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 176px;font-weight: 700">
                                                                                    Actions</td>
                                                                                <td style="font-weight: 700">Tâches</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Super administrateur Système</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Technique Global</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Déployer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Déployer les mises à jour
                                                                                            logicielles et correctifs de
                                                                                            sécurité.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Paramétrer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Paramétrer les serveurs, bases
                                                                                            de données et services associés.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button class="btn btn-danger mnw-100"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Réaliser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Réaliser la supervision de la
                                                                                            plateforme et résoudre les
                                                                                            incidents techniques.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Super administrateur de la Sécurité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Sécurité SI</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F1895C !important;width: 109.34px;">Créer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Créer la charte de sécurité et
                                                                                            les règles d’accès.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Gérer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer les systèmes SSO, MFA,
                                                                                            certificats et clés de
                                                                                            chiffrement.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;background-color: #7D4FFE !important">Détecter</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Détecter les menaces et
                                                                                            appliquer des mesures
                                                                                            correctives en cas d’incident.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Super administrateur des Utilisateurs
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Gestion des Comptes</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F6B12D !important;width: 109.34px;">Maintenir</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Maintenir la base des
                                                                                            utilisateurs et leurs
                                                                                            informations.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Mettre
                                                                                        à jour</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Mettre à jour la matrice des
                                                                                            accès en fonction des besoins
                                                                                            opérationnels.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Configurer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Configurer les méthodes
                                                                                            d’authentification avancées.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Super administrateur des Données</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Architecture des Données
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Gérer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer les tables, champs et
                                                                                            référentiels dans la base.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;background-color: #F6B12D !important">Déterminer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Déterminer la durée de
                                                                                            conservation des données et
                                                                                            automatiser l’archivage.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Identifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Identifier et corriger les
                                                                                            doublons, incohérences et
                                                                                            anomalies.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Super administrateur des Rapports</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Reporting & Analytics</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Gérer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer l’ensemble des rapports
                                                                                            d’analyse et les tableaux de
                                                                                            bord destinés aux différents
                                                                                            profils.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #df7e7e !important;width: 109.34px;">Attribuer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Attribuer ou révoquer l’accès
                                                                                            aux rapports et indicateurs clés
                                                                                            (KPIs).</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Générer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Générer des statistiques et des
                                                                                            analyses détaillées (performance
                                                                                            RH, coûts de recrutement, etc.).
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Super administrateur de la Conformité
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Conformité Réglementaire
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F1895C !important;width: 109.34px;">Vérifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Vérifier le respect des lois en
                                                                                            vigueur (RGPD, CNIL, etc.) et
                                                                                            mettre à jour la documentation.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Contrôler</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Contrôler régulièrement les
                                                                                            journaux d’activité et vérifier
                                                                                            l’application des politiques.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Gérer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer les rapports d’audit,
                                                                                            ainsi que les procédures de
                                                                                            conformité.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
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
                            <div class="tab-pane fade" id="tR5" role="tabpanel" aria-labelledby="tR5-tab">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0 mb-2">
                                            <div class="card-body"  >
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center "
                                                                    style="padding-left: 10px">
                                                                    <div class="col-2 ms-auto"
                                                                        style="width: 18%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row">
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Ajouter une permission">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH">
                                                                                        <i
                                                                                            class="bi bi-plus-square avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Modifier une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH2">
                                                                                        <i
                                                                                            class="bi bi-pen avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Supprimer une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-trash3 avatar   rounded h5"></i>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Enregistrer"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-floppy avatar   rounded h5"></i>
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
                                    <div class="col-12">
                                        <div class="card border-0"  >
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row mb-4" style="padding: 6px 20px">
                                                                    <div class="col-4" style="width: 30%;">
                                                                        <h6 class="title custom-title">Administrateur</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding: 6px 20px">
                                                                    <div class="col-12">
                                                                        <table class="table">
                                                                            <tr style="border-top: 1px solid #e9e9e9;">
                                                                                <td rowspan="2" style="width: 32px;">
                                                                                </td>
                                                                                <td rowspan="2"
                                                                                    style="width: 315px;font-weight: 700;vertical-align: middle">
                                                                                    Poste</td>
                                                                                <td rowspan="2"
                                                                                    style="width: 384px;font-weight: 700;vertical-align: middle">
                                                                                    Rôles</td>
                                                                                <td colspan="2"
                                                                                    style="font-weight: 700;/* padding-left: 5%; */text-align: center;">
                                                                                    Permissions</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 176px;font-weight: 700">
                                                                                    Actions</td>
                                                                                <td style="font-weight: 700">Tâches</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Administrateur de recrutement</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Gestion des Offres</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Créer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Créer des offres d’emploi.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Assurer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Assurer le suivi du pipeline de
                                                                                            candidatures et optimiser le
                                                                                            processus de recrutement.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button class="btn btn-danger mnw-100"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Mettre
                                                                                        à jour</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Mettre à jour et adapter les
                                                                                            formulaires en fonction des
                                                                                            besoins métier.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Administrateur de la conformité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Conformité Opérationnelle
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F1895C !important;width: 109.34px;">Vérifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Vérifier le traitement des
                                                                                            données personnelles et la durée
                                                                                            de conservation.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Diffuser</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Diffuser et archiver les
                                                                                            procédures de conformité (CNIL,
                                                                                            RGPD, etc.).</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F6B12D !important;width: 109.34px;">Identifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Identifier les écarts et
                                                                                            proposer des actions
                                                                                            correctives.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Administrateur système</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Configuration Technique</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Gérer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer la maintenance préventive
                                                                                            et corrective de la plateforme.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Paramétrer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Paramétrer les serveurs,
                                                                                            pare-feu, VPN et autres éléments
                                                                                            d’infrastructure.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #7D4FFE !important;width: 109.34px;">Superviser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Superviser les outils de
                                                                                            monitoring et d’alerte.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="2"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="2"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Administrateur des données</td>
                                                                                <td rowspan="2"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Gestion des Données</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Paramétrer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Paramétrer les règles de
                                                                                            conservation, suppression et
                                                                                            archivage automatique.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Corriger</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Détecter et corriger les
                                                                                            doublons, incohérences ou
                                                                                            anomalies dans les informations
                                                                                            stockées.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Administrateur des rapports</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Reporting & Analytics</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F6B12D !important;width: 109.34px;">Créer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Créer des indicateurs clés
                                                                                            (KPIs) pour le suivi du
                                                                                            processus de recrutement.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Gérer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer les accès aux différents
                                                                                            rapports en fonction des rôles
                                                                                            utilisateurs.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Gérer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer des analyses statistiques
                                                                                            (taux de conversion candidats,
                                                                                            temps moyen de recrutement…).
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Administrateur de l’assistance</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Support & Helpdesk</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #df7e7e !important;width: 109.34px;">Traiter</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Traiter les demandes techniques
                                                                                            et fonctionnelles des
                                                                                            utilisateurs.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Orienter</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Orienter les demandes complexes
                                                                                            vers les équipes spécialisées
                                                                                            (infra, sécurité, etc.).</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;background-color: #7D4FFE !important">Mettre
                                                                                        à jour</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Mettre à jour la FAQ et les
                                                                                            guides d’utilisation pour
                                                                                            favoriser l’autonomie des
                                                                                            utilisateurs.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Administrateur des politiques de
                                                                                    sécurité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Politique Sécurité & Risques
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Définir</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Définir les chartes, procédures
                                                                                            et politiques de sécurité
                                                                                            applicables à la plateforme.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-green"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Auditer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Auditer et attribuer les rôles
                                                                                            sensibles (accès admin, accès
                                                                                            données confidentielles, etc.).
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Contrôler</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Vérifier régulièrement que les
                                                                                            configurations et accès
                                                                                            respectent les standards de
                                                                                            sécurité.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
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
                            <div class="tab-pane fade" id="tR6" role="tabpanel" aria-labelledby="tR6-tab">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0 mb-2">
                                            <div class="card-body"  >
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center "
                                                                    style="padding-left: 10px">
                                                                    <div class="col-2 ms-auto"
                                                                        style="width: 18%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row">
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Ajouter une permission">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH">
                                                                                        <i
                                                                                            class="bi bi-plus-square avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Modifier une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH2">
                                                                                        <i
                                                                                            class="bi bi-pen avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Supprimer une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-trash3 avatar   rounded h5"></i>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Enregistrer"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-floppy avatar   rounded h5"></i>
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
                                    <div class="col-12">
                                        <div class="card border-0"  >
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row mb-4" style="padding: 6px 20px">
                                                                    <div class="col-4" style="width: 30%;">
                                                                        <h6 class="title custom-title">Système
                                                                            d'Information
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding: 6px 20px">
                                                                    <div class="col-12">
                                                                        <table class="table">
                                                                            <tr style="border-top: 1px solid #e9e9e9;">
                                                                                <td rowspan="2" style="width: 32px;">
                                                                                </td>
                                                                                <td rowspan="2"
                                                                                    style="width: 315px;font-weight: 700;vertical-align: middle">
                                                                                    Poste</td>
                                                                                <td rowspan="2"
                                                                                    style="width: 384px;font-weight: 700;vertical-align: middle">
                                                                                    Rôles</td>
                                                                                <td colspan="2"
                                                                                    style="font-weight: 700;/* padding-left: 5%; */text-align: center;">
                                                                                    Permissions</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 176px;font-weight: 700">
                                                                                    Actions</td>
                                                                                <td style="font-weight: 700">Tâches</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Administrateur Réseaux</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Manager Infrastructure Réseau</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Configurer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Configurer et maintenir
                                                                                            l’architecture réseau.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Surveiller</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Surveiller la performance et la
                                                                                            disponibilité du réseau.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Configurer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Configurer les règles de
                                                                                            pare-feu, VPN et VLAN pour
                                                                                            protéger les flux de données.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Chef de Projet IT</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Coordinateur Technique & Fonctionnel
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F1895C !important;width: 109.34px;">Planifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Établir les plannings, répartir
                                                                                            les tâches et suivre
                                                                                            l’avancement.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Assurer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Assurer la disponibilité des
                                                                                            compétences et des moyens
                                                                                            financiers nécessaires.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F6B12D !important;width: 109.34px;">Organiser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Organiser les comités de
                                                                                            pilotage, rédiger les comptes
                                                                                            rendus et gérer les risques.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Auditeur IT</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Audit & Conformité</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Vérifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Vérifier les flux, recenser les
                                                                                            équipements et vérifier la
                                                                                            cohérence des paramétrages.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Identifier</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Identifier les anomalies,
                                                                                            tentatives d’intrusion ou écarts
                                                                                            par rapport aux règles de
                                                                                            conformité.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #7D4FFE !important;width: 109.34px;">Soumettre</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Soumettre un plan d’actions
                                                                                            correctives et préventives aux
                                                                                            équipes concernées.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Développeur Système</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Audit & Conformité</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;background-color: #F6B12D !important">Rédiger</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Rédiger le code, tester et
                                                                                            intégrer les modules au sein de
                                                                                            la plateforme.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Corriger</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Corriger les bugs et améliorer
                                                                                            les performances en continu.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #df7e7e !important;width: 109.34px;">Collaborer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Collaborer avec l’administrateur
                                                                                            système et le chef de projet IT
                                                                                            sur les choix technologiques.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Chargé de la Gestion des Flux</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable Orchestration &
                                                                                    Synchronisation</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Configurer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Configurer les workflows et API
                                                                                            pour échanger des données entre
                                                                                            les différents modules de la
                                                                                            plateforme.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Analyser</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Analyser les logs d’erreurs et
                                                                                            rétablir la connexion ou la
                                                                                            cohérence des données.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Automatiser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Automatiser et documenter les
                                                                                            procédures d’import/export de
                                                                                            données.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
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
                            <div class="tab-pane fade" id="tR7" role="tabpanel" aria-labelledby="tR7-tab">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border-0 mb-2">
                                            <div class="card-body p-0"  >
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center "
                                                                    style="padding-left: 10px">
                                                                    <div class="col-2 ms-auto"
                                                                        style="width: 18%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row">
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Ajouter une permission">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH">
                                                                                        <i
                                                                                            class="bi bi-plus-square avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Modifier une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#emailcomposeRTKH2">
                                                                                        <i
                                                                                            class="bi bi-pen avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Supprimer une permission"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-trash3 avatar   rounded h5"></i>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Enregistrer"
                                                                                style="margin-right: -15px;">
                                                                                <div
                                                                                    class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i
                                                                                        class="bi bi-floppy avatar   rounded h5"></i>
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
                                    <div class="col-12">
                                        <div class="card border-0"  >
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row mb-4" style="padding: 6px 20px">
                                                                    <div class="col-4" style="width: 30%;">
                                                                        <h6 class="title custom-title">Sécurité</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding: 6px 20px">
                                                                    <div class="col-12">
                                                                        <table class="table">
                                                                            <tr style="border-top: 1px solid #e9e9e9;">
                                                                                <td rowspan="2" style="width: 32px;">
                                                                                </td>
                                                                                <td rowspan="2"
                                                                                    style="width: 315px;font-weight: 700;vertical-align: middle">
                                                                                    Poste</td>
                                                                                <td rowspan="2"
                                                                                    style="width: 384px;font-weight: 700;vertical-align: middle">
                                                                                    Rôles</td>
                                                                                <td colspan="2"
                                                                                    style="font-weight: 700;/* padding-left: 5%; */text-align: center;">
                                                                                    Permissions</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 176px;font-weight: 700">
                                                                                    Actions</td>
                                                                                <td style="font-weight: 700">Tâches</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable de la sécurité du SI (RSSI /
                                                                                    CISO)</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Manager de la sécurité globale</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Établir</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Établir la feuille de route de
                                                                                            la sécurité, en cohérence avec
                                                                                            les exigences légales et
                                                                                            métiers.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;background-color: #8BA503 !important;">Organiser</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Organiser les formations
                                                                                            internes sur les bonnes
                                                                                            pratiques de sécurité.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F1895C !important;width: 109.34px;">Coordonner</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Coordonner la réponse et le plan
                                                                                            d’actions correctives face à un
                                                                                            incident.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Administrateur sécurité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Opérateur Sécurité & Contrôle d’Accès
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button class="btn btn-danger mnw-100"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Administrer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Administrer les rôles
                                                                                            utilisateurs, mettre en place la
                                                                                            politique du moindre privilège.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Configurer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Configurer et surveiller les
                                                                                            dispositifs de filtrage et de
                                                                                            détection d’intrusion.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;width: 109.34px;background-color: #7D4FFE !important">Mettre
                                                                                        à jour</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Mettre à jour les serveurs,
                                                                                            applications et équipements de
                                                                                            la plateforme de recrutement.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Ingénieur sécurité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Concepteur & Mainteneur des Solutions
                                                                                    Sécurité</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F6B12D !important;width: 109.34px;">Déployer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Déployer les outils nécessaires
                                                                                            pour renforcer la sécurité de la
                                                                                            plateforme.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Analyser</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Analyser la capacité de la
                                                                                            plateforme à résister aux
                                                                                            charges et attaques
                                                                                            potentielles.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-green"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Créer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Créer des scripts ou des
                                                                                            playbooks pour optimiser la
                                                                                            réponse aux incidents.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Analyste sécurité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Analyste & Opérateur SOC (Security
                                                                                    Operations)</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Surveiller</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Surveiller les logs et alertes
                                                                                            de sécurité.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Analyser</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Analyser les menaces et
                                                                                            vulnérabilités.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-green"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Créer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Créer les reports régulier des
                                                                                            incidents et alertes.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Consultant sécurité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Expert Conseil & Accompagnement SI</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Auditer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Auditer les processus,
                                                                                            cartographier les risques et
                                                                                            proposer une feuille de route
                                                                                            d’amélioration.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-green"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Créer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Créer des rapports et
                                                                                            recommandations.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button class="btn btn-danger mnw-100"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Sensibiliser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Sensibiliser le personnel sur
                                                                                            les politiques de sécurité.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable conformité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Manager Conformité & Réglementation</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #df7e7e !important;width: 109.34px;">Vérifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Vérifier le respect des lois en
                                                                                            matière de traitement et de
                                                                                            conservation des données
                                                                                            (candidats, employés, etc.).
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-green"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Créer</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Créer les procédures internes,
                                                                                            informer les équipes des
                                                                                            nouvelles exigences légales.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Préparer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Préparer et suivre les audits,
                                                                                            corriger les écarts constatés.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Technicien support sécurité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Opérateur Support & Incident Secours
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #F6B12D !important;width: 109.34px;">Identifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Identifier la cause racine,
                                                                                            apporter les solutions ou
                                                                                            escalader aux équipes expertes.
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #7D4FFE !important;width: 109.34px;">Mettre
                                                                                        à jour</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Mettre à jour la base de
                                                                                            connaissances (FAQ, guides
                                                                                            utilisateurs, best practices).
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-green"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Gérer</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Gérer l’implémentation
                                                                                            d’antivirus, de solutions de
                                                                                            chiffrement, etc..</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Responsable gestion des risques</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Risk Manager & Pilotage du Système de
                                                                                    Gestion</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Établir</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Établir une cartographie des
                                                                                            risques, proposer des plans de
                                                                                            mitigation.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Définir</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Définir et coordonner les
                                                                                            actions préventives et
                                                                                            correctives.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Analyser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Analyser l’évolution des menaces
                                                                                            et la criticité des actifs.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Auditeur sécurité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Auditeur Interne & Externe</td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #606f7d !important;width: 109.34px;">Identifier</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Identifier les vulnérabilités
                                                                                            exploitables et vérifier la
                                                                                            configuration des systèmes.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #8baec5 !important;width: 109.34px;">Contrôler</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Contrôler la bonne application
                                                                                            des politiques internes et
                                                                                            processus.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #7D4FFE !important;width: 109.34px;">Partager</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Communiquer les résultats aux
                                                                                            équipes concernées, proposer un
                                                                                            plan d’action.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    <input type="checkbox">
                                                                                </td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Architecte sécurité</td>
                                                                                <td rowspan="3"
                                                                                    style="vertical-align: middle;border-bottom: 4px solid #e9e9e9">
                                                                                    Concepteur de l’Architecture Sécurisée
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-yellow"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Définir</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-top: 18px;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Définir les standards techniques
                                                                                            pour garantir la
                                                                                            confidentialité, l’intégrité et
                                                                                            la disponibilité de la
                                                                                            plateforme.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle;">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="width: 109.34px;float: left;font-size: 14px;">Sélectionner</button>
                                                                                </td>
                                                                                <td style="vertical-align: middle;">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Sélectionner les solutions (SSO,
                                                                                            MFA, IAM) adaptées aux besoins
                                                                                            de la plateforme.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <button
                                                                                        class="btn btn-theme mnw-100 bg-blue"
                                                                                        style="float: left;font-size: 14px;background-color: #BC632E !important;width: 109.34px;">Réaliser</button>
                                                                                </td>
                                                                                <td
                                                                                    style="vertical-align: middle;padding-bottom: 18px;border-bottom: 4px solid #e9e9e9">
                                                                                    <ul
                                                                                        style="list-style: circle;margin-bottom: 0">
                                                                                        <li>Réaliser des revues
                                                                                            d’architecture et valider les
                                                                                            évolutions majeures.</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
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

    </main>

    {{-- modals  --}}
    <div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-block">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px"
                                        class="bi bi-person-add avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0">Ajouter un utilisateur</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Type d'utilisateur</label>
                                <input type="text" class="input-1 destinataires" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Poste</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Utilisateur</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal"
                                aria-label="Close"><i class="bi bi-x-square me-2"></i> Annuler</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-floppy me-2"></i>
                                Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="emailcomposeRTKH" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-block">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px"
                                        class="bi bi-person-lock avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0">Ajouter une Permission</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Poste</label>
                                <input type="text" class="input-1 destinataires" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Rôles</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-10">
                            <div class="input-box">
                                <label class="input-label">Actions</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                        <div class="col-2" style="padding-right: 0;width: 50px;margin-left: 7px;">
                            <div class="color-picker-container">
                                <!-- Icon for triggering the palette -->
                                <div class="color-picker-icon" onclick="togglePalette()" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Couleur de la forme">
                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                        <a href="#" type="button">
                                            <i class="bi bi-paint-bucket avatar   rounded h5"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- The palette -->
                                <div class="color-picker" id="colorPicker">
                                    <canvas id="gradientCanvas" class="gradient-canvas"></canvas>
                                    <canvas id="hueCanvas" class="hue-strip"></canvas>
                                    <div class="selected-color">
                                        <div id="colorDisplay" class="color-display"></div>
                                        <span id="colorHex">#000000</span>
                                    </div>
                                    <div class="rgb-inputs">
                                        <div>
                                            <input type="number" id="red" min="0" max="255"
                                                value="0">
                                            <label for="red">R</label>
                                        </div>
                                        <div>
                                            <input type="number" id="green" min="0" max="255"
                                                value="0">
                                            <label for="green">G</label>
                                        </div>
                                        <div>
                                            <input type="number" id="blue" min="0" max="255"
                                                value="0">
                                            <label for="blue">B</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Tâches</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal"
                                aria-label="Close"><i class="bi bi-x-square me-2"></i> Annuler</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-floppy me-2"></i>
                                Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="emailcomposeRTKH2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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
                            <h6 class="fw-medium mb-0">Modifier une Permission</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Poste</label>
                                <input type="text" class="input-1 destinataires" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Rôles</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-10">
                            <div class="input-box">
                                <label class="input-label">Actions</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                        <div class="col-2" style="padding-right: 0;width: 50px;margin-left: 7px;">
                            <div class="color-picker-container">
                                <!-- Icon for triggering the palette -->
                                <div class="color-picker-icon" onclick="togglePalette()" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Couleur de la forme">
                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                        <a href="#" type="button">
                                            <i class="bi bi-paint-bucket avatar   rounded h5"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- The palette -->
                                <div class="color-picker" id="colorPicker">
                                    <canvas id="gradientCanvas" class="gradient-canvas"></canvas>
                                    <canvas id="hueCanvas" class="hue-strip"></canvas>
                                    <div class="selected-color">
                                        <div id="colorDisplay" class="color-display"></div>
                                        <span id="colorHex">#000000</span>
                                    </div>
                                    <div class="rgb-inputs">
                                        <div>
                                            <input type="number" id="red" min="0" max="255"
                                                value="0">
                                            <label for="red">R</label>
                                        </div>
                                        <div>
                                            <input type="number" id="green" min="0" max="255"
                                                value="0">
                                            <label for="green">G</label>
                                        </div>
                                        <div>
                                            <input type="number" id="blue" min="0" max="255"
                                                value="0">
                                            <label for="blue">B</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Tâches</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal"
                                aria-label="Close"><i class="bi bi-x-square me-2"></i> Annuler</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-floppy me-2"></i>
                                Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="emailcompose2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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
                            <h6 class="fw-medium mb-0">Modifier un utilisateur</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label">Type d'utilisateur</label>
                                <input type="text" class="input-1 destinataires" value="Recrutement"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label">Poste</label>
                                <input type="text" class="input-1" value="Consultant en recrutement"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Utilisateur</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal"
                                aria-label="Close"><i class="bi bi-x-square me-2"></i> Annuler</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-floppy me-2"></i>
                                Enregistrer</button>
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
                            <h6 class="fw-medium mb-0">Supprimer un utilisateur</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label">Type d'utilisateur</label>
                                <input type="text" class="input-1 destinataires" value="Recrutement"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label">Poste</label>
                                <input type="text" class="input-1" value="Consultant en recrutement"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label">Utilisateur</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal"
                                aria-label="Close"><i class="bi bi-x-square me-2"></i> Annuler</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-trash me-2"></i>
                                Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_footer')

@endsection
