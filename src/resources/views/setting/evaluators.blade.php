@extends('layouts.master')

@section('title', 'Evaluateurs')

@section('css_header')

@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Paramètre") }}</h5>
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
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Evaluateurs") }}</li>
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
                                                    <div id="country-selector" class="custom-mutliple-select rounded border poste-chosen"
                                                        style="border-radius: 8px !important; ">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Pays
                                                        </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            <option value="Arabie"
                                                                data-image="{{ asset('assets/img/drap/saudi-arabia.png') }}">
                                                                Arabie Saoudite</option>
                                                            <option value="Belgique"
                                                                data-image="{{ asset('assets/img/drap/Belgique.jpg') }}">
                                                                Belgique</option>
                                                            <option value="Canada"
                                                                data-image="{{ asset('assets/img/drap/Canada.png') }}">
                                                                Canada</option>
                                                            <option value="Cameroun"
                                                                data-image="{{ asset('assets/img/drap/cameroon.jpg') }}">
                                                                Cameroun</option>
                                                            <option value="Chine"
                                                                data-image="{{ asset('assets/img/drap/china.jpg') }}">Chine
                                                            </option>
                                                            <option value="Ivoire"
                                                                data-image="{{ asset("assets/img/drap/Cote_d'Ivoire.png") }}">
                                                                Côte d'Ivoire</option>
                                                            <option value="Espagne"
                                                                data-image="{{ asset('assets/img/drap/Spain.png') }}">
                                                                Espagne</option>
                                                            <option value="Unis"
                                                                data-image="{{ asset('assets/img/drap/united-arab-emirates.jpg') }}">
                                                                Émirats Arabes Unis</option>
                                                            <option value="France"
                                                                data-image="{{ asset('assets/img/drap/France.png') }}">
                                                                France</option>
                                                            <option value="Inde"
                                                                data-image="{{ asset('assets/img/drap/india.jpg') }}">Inde
                                                            </option>
                                                            <option value="Irlande"
                                                                data-image="{{ asset('assets/img/drap/Ireland.png') }}">
                                                                Irlande</option>
                                                            <option value="Maroc" selected
                                                                data-image="{{ asset('assets/img/drap/MAROC.jpg') }}">
                                                                Maroc
                                                            </option>
                                                            <option value="Qatar"
                                                                data-image="{{ asset('assets/img/drap/QATAR.jpg') }}">
                                                                Qatar
                                                            </option>
                                                            <option value="Sénégal"
                                                                data-image="{{ asset('assets/img/drap/senegal.jpg') }}">
                                                                Sénégal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3" style="width: 170px;">
                                                    <div id="Maroc" class="ville-p">
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
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
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
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
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
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
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
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
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                <option>Al Daayen</option>
                                                                <option selected>Al Khor</option>
                                                                <option>Al Rayyan</option>
                                                                <option>Al Wakrah</option>
                                                                <option>Doha</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Unis" class="ville-p hidden">
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                <option>Abou Dabi</option>
                                                                <option selected>Ajman</option>
                                                                <option>Dubaï</option>
                                                                <option>Ras Al Khaimah</option>
                                                                <option>Sharjah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Sénégal" class="ville-p hidden">
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                <option>Dakar</option>
                                                                <option selected>Kaolack</option>
                                                                <option>Thiès</option>
                                                                <option>Touba</option>
                                                                <option>Ziguinchor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Ivoire" class="ville-p hidden">
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                <option>Abidjan</option>
                                                                <option selected>Bouaké</option>
                                                                <option>Daloa</option>
                                                                <option>San Pedro</option>
                                                                <option>Yamoussoukro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Cameroun" class="ville-p hidden">
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                <option>Bafoussam</option>
                                                                <option selected>Bamenda</option>
                                                                <option>Douala</option>
                                                                <option>Garoua</option>
                                                                <option>Yaoundé</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Inde" class="ville-p hidden">
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
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
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
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
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
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
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
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
                                                        <div class="custom-mutliple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Ville
                                                            </label>
                                                            <select class="chosenoptgroup w-100">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
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
                                                    <div class="custom-mutliple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Filiale</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            <option>Filatoc</option>
                                                            <option>Xima</option>
                                                            <option>Kamala</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3" style="width: 276px;margin-right: 0px  !important;">
                                                    <div class="custom-mutliple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px; font-size: 12px;">Agence</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
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
            <div class="row mt-3 mb-4">
                <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="planner-tab" data-bs-toggle="tab"
                            data-bs-target="#planner" type="button" role="tab" aria-controls="planner"
                            aria-selected="true">{{ __("generated.Cabinet de recrutement") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="posts-tab" data-bs-toggle="tab"
                            data-bs-target="#posts" type="button" role="tab" aria-controls="posts"
                            aria-selected="false" tabindex="-1">{{ __("generated.Client") }}</button>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="tab-content" id="myTabContent" style="min-height: 800px;">
                    <div class="tab-pane fade show active" id="planner" role="tabpanel" aria-labelledby="planner-tab">
                        <div class="row align-items-center py-2">
                            <div class="col-12">
                                <div class="card border-0 mb-4"  >
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3" style="padding-left: 30px">
                                                                    <div class="col-2" style="width: 9%;">
                                                                        <div class="col-auto position-relative">
                                                                            <figure
                                                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                style="background-image: url(&quot;assets/img/logo-entreprise/Artus.jpg&quot;);line-height: 0 !important;margin-top: 2px !important;background-repeat: no-repeat;background-size: 80px;">
                                                                                <img src="{{ asset('assets/img/logo-entreprise/Artus.jpg') }}"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                                style="top: 78% !important;left: 74%;">
                                                                                <button
                                                                                    class="btn btn-theme btn-44 shadow-sm rounded-circle"><i
                                                                                        class="bi bi-camera"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 24.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="Raison sociale"
                                                                                    value="ARTUS Maroc"
                                                                                    class="form-control border-start-0">
                                                                                <label >{{ __("generated.Raison sociale") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 27%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="Adresse"
                                                                                    value="145, Boulevard Hassan II"
                                                                                    class="form-control border-start-0">
                                                                                <label
                                                                                    >{{ __("generated.Adresse") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="margin-top: 26px;width: 12%;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="Code postal"
                                                                                    value="20100" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label >{{ __("generated.Code postal") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 12%;margin-right: 4px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Ville"
                                                                                    value="Casablanca" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label
                                                                                    >{{ __("generated.Ville") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 14%">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Pays"
                                                                                    value="Maroc" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label >{{ __("generated.Pays") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
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
                                <div class="card border-0"  >
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <div class="row mb-3" style="padding-left: 10px">
                                                                    <div class="col-2" style="width: 9%;">
                                                                        <div class="col-auto position-relative">
                                                                            <figure
                                                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                style="background-image: url(&quot;assets/img/team/T1.jpg&quot;);line-height: 0 !important;margin-top: 2px !important;background-size: 70%">
                                                                                <img src="{{ asset('assets/img/team/T1.jpg') }}"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                                style="top: 78% !important;left: 74%;">
                                                                                <button
                                                                                    class="btn btn-theme btn-44 shadow-sm rounded-circle"><i
                                                                                        class="bi bi-camera"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="{{ __("generated.Prénom") }}"
                                                                                    value="Farida"
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label
                                                                                    >{{ __("generated.Prénom") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="{{ __("generated.Nom") }}"
                                                                                    value="EL WAFA"
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label >{{ __("generated.Nom") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="margin-top: 26px;width: 24%;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="{{ __("generated.Poste") }}"
                                                                                    value="Consultante en recrutement"
                                                                                    required=""
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label
                                                                                    >{{ __("generated.Poste") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 29%;">
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Type d'évaluation") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option >{{ __("generated.Compétences techniques") }}</option>
                                                                                        <option >{{ __("generated.Compétences personnelles") }}</option>
                                                                                        <option >{{ __("generated.Adaptabilité") }}</option>
                                                                                        <option >{{ __("generated.Leadership") }}</option>
                                                                                        <option >{{ __("generated.Résolution de problèmes") }}</option>
                                                                                        <option >{{ __("generated.Communication") }}</option>
                                                                                        <option >{{ __("generated.Innovation") }}</option>
                                                                                        <option >{{ __("generated.Motivation") }}</option>
                                                                                        <option >{{ __("generated.Référence professionnelle") }}</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Coefficient") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Type d'évaluation") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option >{{ __("generated.Compétences techniques") }}</option>
                                                                                        <option >{{ __("generated.Compétences personnelles") }}</option>
                                                                                        <option >{{ __("generated.Adaptabilité") }}</option>
                                                                                        <option >{{ __("generated.Leadership") }}</option>
                                                                                        <option 
                                                                                            selected>{{ __("generated.Résolution de problèmes") }}</option>
                                                                                        <option >{{ __("generated.Communication") }}</option>
                                                                                        <option >{{ __("generated.Innovation") }}</option>
                                                                                        <option >{{ __("generated.Motivation") }}</option>
                                                                                        <option >{{ __("generated.Référence professionnelle") }}</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Coefficient") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Type d'évaluation") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option >{{ __("generated.Compétences techniques") }}</option>
                                                                                        <option >{{ __("generated.Compétences personnelles") }}</option>
                                                                                        <option >{{ __("generated.Adaptabilité") }}</option>
                                                                                        <option >{{ __("generated.Leadership") }}</option>
                                                                                        <option >{{ __("generated.Résolution de problèmes") }}</option>
                                                                                        <option >{{ __("generated.Communication") }}</option>
                                                                                        <option 
                                                                                            selected>{{ __("generated.Innovation") }}</option>
                                                                                        <option >{{ __("generated.Motivation") }}</option>
                                                                                        <option >{{ __("generated.Référence professionnelle") }}</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Coefficient") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Type d'évaluation") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Compétences techniques
                                                                                        </option>
                                                                                        <option>Compétences personnelles
                                                                                        </option>
                                                                                        <option>Adaptabilité</option>
                                                                                        <option>Leadership</option>
                                                                                        <option>Résolution de problèmes
                                                                                        </option>
                                                                                        <option>Communication</option>
                                                                                        <option>Innovation</option>
                                                                                        <option>Motivation</option>
                                                                                        <option selected>Référence
                                                                                            professionnelle</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Coefficient") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12"
                                                                                style="width: 61%;margin-right: -10px;">
                                                                            </div>
                                                                            <div class="col-12"
                                                                                style="width: 28%;margin-right: -24px;">
                                                                            </div>
                                                                            <div class="col-2"
                                                                                style="width: 6%;margin-top: 17px;">
                                                                                <button
                                                                                    class="btn btn-theme mnw-100 bg-blue"
                                                                                    style="float: right;font-size: 14px"
                                                                                    >{{ __("generated.Ajouter") }}</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <div class="row mb-3" style="padding-left: 10px">
                                                                    <div class="col-2" style="width: 9%;">
                                                                        <div class="col-auto position-relative">
                                                                            <figure
                                                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                style="background-image: url(&quot;assets/img/team/T5.jpg&quot;);line-height: 0 !important;margin-top: 2px !important;background-size: 90%;">
                                                                                <img src="{{ asset('assets/img/team/T5.jpg') }}"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                                style="top: 78% !important;left: 74%;">
                                                                                <button
                                                                                    class="btn btn-theme btn-44 shadow-sm rounded-circle"><i
                                                                                        class="bi bi-camera"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="{{ __("generated.Prénom") }}"
                                                                                    value="Omar"
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label
                                                                                    >{{ __("generated.Prénom") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="{{ __("generated.Nom") }}"
                                                                                    value="BENKIRANE"
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label >{{ __("generated.Nom") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="margin-top: 26px;width: 24%;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="{{ __("generated.Poste") }}"
                                                                                    value="Chargé de recrutement"
                                                                                    required=""
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label
                                                                                    >{{ __("generated.Poste") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 29%;">
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Type d'évaluation") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Compétences techniques
                                                                                        </option>
                                                                                        <option>Compétences personnelles
                                                                                        </option>
                                                                                        <option>Adaptabilité</option>
                                                                                        <option selected>Leadership</option>
                                                                                        <option>Résolution de problèmes
                                                                                        </option>
                                                                                        <option>Communication</option>
                                                                                        <option>Innovation</option>
                                                                                        <option>Motivation</option>
                                                                                        <option>Référence professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Coefficient") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Type d'évaluation") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Compétences techniques
                                                                                        </option>
                                                                                        <option>Compétences personnelles
                                                                                        </option>
                                                                                        <option>Adaptabilité</option>
                                                                                        <option>Leadership</option>
                                                                                        <option>Résolution de problèmes
                                                                                        </option>
                                                                                        <option selected>Communication
                                                                                        </option>
                                                                                        <option>Innovation</option>
                                                                                        <option>Motivation</option>
                                                                                        <option>Référence professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option selected>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12"
                                                                                style="width: 61%;margin-right: -10px;">
                                                                            </div>
                                                                            <div class="col-12"
                                                                                style="width: 28%;margin-right: -24px;">
                                                                            </div>
                                                                            <div class="col-2"
                                                                                style="width: 6%;margin-top: 17px;">
                                                                                <button
                                                                                    class="btn btn-theme mnw-100 bg-blue"
                                                                                    style="float: right;font-size: 14px">Ajouter</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3" style="padding-left: 10px">
                                                                    <div class="col-2" style="width: 9%;">
                                                                        <div class="col-auto position-relative">
                                                                            <figure
                                                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                style="background-image: url(&quot;assets/img/team/T4.jpg&quot;);line-height: 0 !important;margin-top: 2px !important;background-repeat: no-repeat;">
                                                                                <img src="{{ asset('assets/img/team/T4.jpg') }}"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                                style="top: 78% !important;left: 74%;">
                                                                                <button
                                                                                    class="btn btn-theme btn-44 shadow-sm rounded-circle"><i
                                                                                        class="bi bi-camera"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Prénom"
                                                                                    value="Jaouad"
                                                                                    class="form-control border-start-0">
                                                                                <label>Prénom</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback mb-3">Add insert valid
                                                                            data </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Nom"
                                                                                    value="FATHALLAH"
                                                                                    class="form-control border-start-0">
                                                                                <label>Nom</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback">Please enter valid
                                                                            input</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="margin-top: 26px;width: 24%;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Poste"
                                                                                    value="Responsable talents aquisition"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Poste</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback">Please enter valid
                                                                            input</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 29%;">
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Compétences techniques
                                                                                        </option>
                                                                                        <option selected>Compétences
                                                                                            personnelles</option>
                                                                                        <option>Adaptabilité</option>
                                                                                        <option selected>Leadership</option>
                                                                                        <option>Résolution de problèmes
                                                                                        </option>
                                                                                        <option>Communication</option>
                                                                                        <option>Innovation</option>
                                                                                        <option>Motivation</option>
                                                                                        <option>Référence professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Compétences techniques
                                                                                        </option>
                                                                                        <option>Compétences personnelles
                                                                                        </option>
                                                                                        <option selected>Adaptabilité
                                                                                        </option>
                                                                                        <option>Leadership</option>
                                                                                        <option>Résolution de problèmes
                                                                                        </option>
                                                                                        <option>Communication</option>
                                                                                        <option>Innovation</option>
                                                                                        <option>Motivation</option>
                                                                                        <option>Référence professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option selected>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Compétences techniques
                                                                                        </option>
                                                                                        <option>Compétences personnelles
                                                                                        </option>
                                                                                        <option selected>Adaptabilité
                                                                                        </option>
                                                                                        <option>Leadership</option>
                                                                                        <option>Résolution de problèmes
                                                                                        </option>
                                                                                        <option>Communication</option>
                                                                                        <option>Innovation</option>
                                                                                        <option selected>Motivation</option>
                                                                                        <option>Référence professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option selected>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12"
                                                                                style="width: 61%;margin-right: -10px;">
                                                                            </div>
                                                                            <div class="col-12"
                                                                                style="width: 28%;margin-right: -24px;">
                                                                            </div>
                                                                            <div class="col-2"
                                                                                style="width: 6%;margin-top: 17px;">
                                                                                <button
                                                                                    class="btn btn-theme mnw-100 bg-blue"
                                                                                    style="float: right;font-size: 14px">Ajouter</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="padding: 0px 17px;" class="row mb-5 mt-2">
                                                            <div class="col-12" style="width: 36%">
                                                                <div class="form-check form-switch"
                                                                    style="margin-top: 15px;">
                                                                    <button class="btn btn-theme mnw-100 bg-green"
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
                    <div class="tab-pane fade " id="posts" role="tabpanel" aria-labelledby="posts-tab">
                        <div class="row align-items-center py-2">
                            <div class="col-12">
                                <div class="card border-0 mb-4"  >
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3" style="padding-left: 30px">
                                                                    <div class="col-2" style="width: 9%;">
                                                                        <div class="col-auto position-relative">
                                                                            <figure
                                                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                style="background-image: url(&quot;assets/img/logo-entreprise/BYTEIT.png&quot;);line-height: 0 !important;margin-top: 2px !important;background-repeat: no-repeat;background-size: 82px;">
                                                                                <img src="{{ asset('assets/img/logo-entreprise/BYTEIT.png') }}"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                                style="top: 78% !important;left: 74%;">
                                                                                <button
                                                                                    class="btn btn-theme btn-44 shadow-sm rounded-circle"><i
                                                                                        class="bi bi-camera"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 24.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="{{ __("generated.Raison sociale") }}"
                                                                                    value="BYTE IT"
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label >{{ __("generated.Raison sociale") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 27%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="{{ __("generated.Adresse") }}"
                                                                                    value="Anfa West, Angle Bd, Sidi Abderrahmane et Rue de la Mer du Nord, Aïn Diab"
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label
                                                                                    >{{ __("generated.Adresse") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="margin-top: 26px;width: 12%;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="{{ __("generated.Code postal") }}"
                                                                                    value="20180" required=""
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label >{{ __("generated.Code postal") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 12%;margin-right: 4px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="{{ __("generated.Ville") }}"
                                                                                    value="Casablanca" required=""
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label
                                                                                    >{{ __("generated.Ville") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 14%">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="{{ __("generated.Pays") }}"
                                                                                    value="Maroc" required=""
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label >{{ __("generated.Pays") }}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
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
                                <div class="card border-0"  >
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <div class="row mb-3" style="padding-left: 10px">
                                                                    <div class="col-2" style="width: 9%;">
                                                                        <div class="col-auto position-relative">
                                                                            <figure
                                                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                style="background-image: url(&quot;assets/img/icon2/9989.jpg&quot;);line-height: 0 !important;margin-top: 2px !important;">
                                                                                <img src="{{ asset('assets/img/icon2/9989.jpg') }}"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                                style="top: 78% !important;left: 74%;">
                                                                                <button
                                                                                    class="btn btn-theme btn-44 shadow-sm rounded-circle"><i
                                                                                        class="bi bi-camera"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Prénom"
                                                                                    value="Abdellah"
                                                                                    class="form-control border-start-0">
                                                                                <label>Prénom</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback mb-3">Add insert valid
                                                                            data </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Nom"
                                                                                    value="CHAHID"
                                                                                    class="form-control border-start-0">
                                                                                <label>Nom</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback">Please enter valid
                                                                            input</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="margin-top: 26px;width: 24%;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Poste"
                                                                                    value="Directeur du Système d'Information "
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Poste</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback">Please enter valid
                                                                            input</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 29%;">
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Entretien comportemental
                                                                                        </option>
                                                                                        <option>Entretien de motivation
                                                                                        </option>
                                                                                        <option>Références professionnelles
                                                                                        </option>
                                                                                        <option>Évaluation soft skills
                                                                                        </option>
                                                                                        <option selected>Capacité à résoudre
                                                                                            de problèmes</option>
                                                                                        <option>Gestion d'équipe</option>
                                                                                        <option>Gestion du temps</option>
                                                                                        <option>Compétences en communication
                                                                                        </option>
                                                                                        <option>Compétence techniques
                                                                                        </option>
                                                                                        <option>Compétence en gestion de
                                                                                            projet</option>
                                                                                        <option>Compétence de prise
                                                                                            d'initiative</option>
                                                                                        <option>Gestion des priorités sous
                                                                                            pression</option>
                                                                                        <option>Prise en charge du stress
                                                                                        </option>
                                                                                        <option>Créativité et innovation
                                                                                        </option>
                                                                                        <option>Intégrité professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Entretien comportemental
                                                                                        </option>
                                                                                        <option>Entretien de motivation
                                                                                        </option>
                                                                                        <option selected>Références
                                                                                            professionnelles</option>
                                                                                        <option>Évaluation soft skills
                                                                                        </option>
                                                                                        <option>Capacité à résoudre de
                                                                                            problèmes</option>
                                                                                        <option>Gestion d'équipe</option>
                                                                                        <option>Gestion du temps</option>
                                                                                        <option>Compétences en communication
                                                                                        </option>
                                                                                        <option>Compétence techniques
                                                                                        </option>
                                                                                        <option>Compétence en gestion de
                                                                                            projet</option>
                                                                                        <option>Compétence de prise
                                                                                            d'initiative</option>
                                                                                        <option>Gestion des priorités sous
                                                                                            pression</option>
                                                                                        <option>Prise en charge du stress
                                                                                        </option>
                                                                                        <option>Créativité et innovation
                                                                                        </option>
                                                                                        <option>Intégrité professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Entretien comportemental
                                                                                        </option>
                                                                                        <option>Entretien de motivation
                                                                                        </option>
                                                                                        <option>Références professionnelles
                                                                                        </option>
                                                                                        <option>Évaluation soft skills
                                                                                        </option>
                                                                                        <option>Capacité à résoudre de
                                                                                            problèmes</option>
                                                                                        <option>Gestion d'équipe</option>
                                                                                        <option>Gestion du temps</option>
                                                                                        <option>Compétences en communication
                                                                                        </option>
                                                                                        <option selected>Compétence
                                                                                            techniques</option>
                                                                                        <option>Compétence en gestion de
                                                                                            projet</option>
                                                                                        <option>Compétence de prise
                                                                                            d'initiative</option>
                                                                                        <option>Gestion des priorités sous
                                                                                            pression</option>
                                                                                        <option>Prise en charge du stress
                                                                                        </option>
                                                                                        <option>Créativité et innovation
                                                                                        </option>
                                                                                        <option>Intégrité professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option selected>Entretien
                                                                                            comportemental</option>
                                                                                        <option>Entretien de motivation
                                                                                        </option>
                                                                                        <option>Références professionnelles
                                                                                        </option>
                                                                                        <option>Évaluation soft skills
                                                                                        </option>
                                                                                        <option>Capacité à résoudre de
                                                                                            problèmes</option>
                                                                                        <option>Gestion d'équipe</option>
                                                                                        <option>Gestion du temps</option>
                                                                                        <option>Compétences en communication
                                                                                        </option>
                                                                                        <option>Compétence techniques
                                                                                        </option>
                                                                                        <option>Compétence en gestion de
                                                                                            projet</option>
                                                                                        <option>Compétence de prise
                                                                                            d'initiative</option>
                                                                                        <option>Gestion des priorités sous
                                                                                            pression</option>
                                                                                        <option>Prise en charge du stress
                                                                                        </option>
                                                                                        <option>Créativité et innovation
                                                                                        </option>
                                                                                        <option>Intégrité professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12"
                                                                                style="width: 61%;margin-right: -10px;">
                                                                            </div>
                                                                            <div class="col-12"
                                                                                style="width: 28%;margin-right: -24px;">
                                                                            </div>
                                                                            <div class="col-2"
                                                                                style="width: 6%;margin-top: 17px;">
                                                                                <button
                                                                                    class="btn btn-theme mnw-100 bg-blue"
                                                                                    style="float: right;font-size: 14px">Ajouter</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <div class="row mb-3" style="padding-left: 10px">
                                                                    <div class="col-2" style="width: 9%;">
                                                                        <div class="col-auto position-relative">
                                                                            <figure
                                                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                style="background-image: url(&quot;assets/img/icon2/new/h2.jpg&quot;);line-height: 0 !important;margin-top: 2px !important;background-repeat: no-repeat;">
                                                                                <img src="{{ asset('assets/img/icon2/new/h2.jpg') }}"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                                style="top: 78% !important;left: 74%;">
                                                                                <button
                                                                                    class="btn btn-theme btn-44 shadow-sm rounded-circle"><i
                                                                                        class="bi bi-camera"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Prénom"
                                                                                    value="Omar"
                                                                                    class="form-control border-start-0">
                                                                                <label>Prénom</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback mb-3">Add insert valid
                                                                            data </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Nom"
                                                                                    value="NHAILI"
                                                                                    class="form-control border-start-0">
                                                                                <label>Nom</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback">Please enter valid
                                                                            input</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="margin-top: 26px;width: 24%;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Poste"
                                                                                    value="Responsable Sécurité des Systèmes d'Information"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Poste</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback">Please enter valid
                                                                            input</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 29%;">
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Entretien comportemental
                                                                                        </option>
                                                                                        <option>Entretien de motivation
                                                                                        </option>
                                                                                        <option>Références professionnelles
                                                                                        </option>
                                                                                        <option selected>Évaluation soft
                                                                                            skills</option>
                                                                                        <option>Capacité à résoudre de
                                                                                            problèmes</option>
                                                                                        <option>Gestion d'équipe</option>
                                                                                        <option>Gestion du temps</option>
                                                                                        <option>Compétences en communication
                                                                                        </option>
                                                                                        <option>Compétence techniques
                                                                                        </option>
                                                                                        <option>Compétence en gestion de
                                                                                            projet</option>
                                                                                        <option>Compétence de prise
                                                                                            d'initiative</option>
                                                                                        <option>Gestion des priorités sous
                                                                                            pression</option>
                                                                                        <option>Prise en charge du stress
                                                                                        </option>
                                                                                        <option>Créativité et innovation
                                                                                        </option>
                                                                                        <option>Intégrité professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option selected>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Entretien comportemental
                                                                                        </option>
                                                                                        <option>Entretien de motivation
                                                                                        </option>
                                                                                        <option>Références professionnelles
                                                                                        </option>
                                                                                        <option>Évaluation soft skills
                                                                                        </option>
                                                                                        <option>Capacité à résoudre de
                                                                                            problèmes</option>
                                                                                        <option>Gestion d'équipe</option>
                                                                                        <option selected>Gestion du temps
                                                                                        </option>
                                                                                        <option>Compétences en communication
                                                                                        </option>
                                                                                        <option>Compétence techniques
                                                                                        </option>
                                                                                        <option>Compétence en gestion de
                                                                                            projet</option>
                                                                                        <option>Compétence de prise
                                                                                            d'initiative</option>
                                                                                        <option>Gestion des priorités sous
                                                                                            pression</option>
                                                                                        <option>Prise en charge du stress
                                                                                        </option>
                                                                                        <option>Créativité et innovation
                                                                                        </option>
                                                                                        <option>Intégrité professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px"
                                                                                        >{{ __("generated.Type d'évaluation") }}</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option >{{ __("generated.Entretien comportemental") }}</option>
                                                                                        <option >{{ __("generated.Entretien de motivation") }}</option>
                                                                                        <option >{{ __("generated.Références professionnelles") }}</option>
                                                                                        <option >{{ __("generated.Évaluation soft skills") }}</option>
                                                                                        <option >{{ __("generated.Capacité à résoudre de problèmes") }}</option>
                                                                                        <option >{{ __("generated.Gestion d'équipe") }}</option>
                                                                                        <option >{{ __("generated.Gestion du temps") }}</option>
                                                                                        <option >{{ __("generated.Compétences en communication") }}</option>
                                                                                        <option >{{ __("generated.Compétence techniques") }}</option>
                                                                                        <option 
                                                                                            selected>{{ __("generated.Compétence en gestion de projet") }}</option>
                                                                                        <option >{{ __("generated.Compétence de prise d'initiative") }}</option>
                                                                                        <option >{{ __("generated.Gestion des priorités sous pression") }}</option>
                                                                                        <option >{{ __("generated.Prise en charge du stress") }}</option>
                                                                                        <option >{{ __("generated.Créativité et innovation") }}</option>
                                                                                        <option >{{ __("generated.Intégrité professionnelle") }}</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12"
                                                                                style="width: 61%;margin-right: -10px;">
                                                                            </div>
                                                                            <div class="col-12"
                                                                                style="width: 28%;margin-right: -24px;">
                                                                            </div>
                                                                            <div class="col-2"
                                                                                style="width: 6%;margin-top: 17px;">
                                                                                <button
                                                                                    class="btn btn-theme mnw-100 bg-blue"
                                                                                    style="float: right;font-size: 14px">Ajouter</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3" style="padding-left: 17px">
                                                                    <div class="col-2" style="width: 9%;">
                                                                        <div class="col-auto position-relative">
                                                                            <figure
                                                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                style="background-image: url(&quot;assets/img/icon2/2147704437.jpg&quot;);line-height: 0 !important;margin-top: 2px !important;">
                                                                                <img src="{{ asset('assets/img/icon2/2147704437.jpg') }}"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                                style="top: 78% !important;left: 74%;">
                                                                                <button
                                                                                    class="btn btn-theme btn-44 shadow-sm rounded-circle"><i
                                                                                        class="bi bi-camera"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="Prénom"
                                                                                    value="Soundouce"
                                                                                    class="form-control border-start-0">
                                                                                <label>Prénom</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback mb-3">Add insert
                                                                            valid data </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-3"
                                                                        style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Nom"
                                                                                    value="EL AMRANI"
                                                                                    class="form-control border-start-0">
                                                                                <label>Nom</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback">Please enter valid
                                                                            input</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="margin-top: 26px;width: 24%;margin-right: -10px;">
                                                                        <div
                                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="Poste"
                                                                                    value="Responsable des Ressources Humaines "
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Poste</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="invalid-feedback">Please enter valid
                                                                            input</div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-2"
                                                                        style="padding-right: 0;margin-top: 26px;width: 29%;">
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Entretien comportemental
                                                                                        </option>
                                                                                        <option>Entretien de motivation
                                                                                        </option>
                                                                                        <option>Références professionnelles
                                                                                        </option>
                                                                                        <option>Évaluation soft skills
                                                                                        </option>
                                                                                        <option>Capacité à résoudre de
                                                                                            problèmes</option>
                                                                                        <option>Gestion d'équipe</option>
                                                                                        <option>Gestion du temps</option>
                                                                                        <option>Compétences en communication
                                                                                        </option>
                                                                                        <option>Compétence techniques
                                                                                        </option>
                                                                                        <option>Compétence en gestion de
                                                                                            projet</option>
                                                                                        <option selected>Compétence de prise
                                                                                            d'initiative</option>
                                                                                        <option>Gestion des priorités sous
                                                                                            pression</option>
                                                                                        <option>Prise en charge du stress
                                                                                        </option>
                                                                                        <option>Créativité et innovation
                                                                                        </option>
                                                                                        <option>Intégrité professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Type
                                                                                        d'évaluation</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>Entretien comportemental
                                                                                        </option>
                                                                                        <option selected>Entretien de
                                                                                            motivation</option>
                                                                                        <option>Références professionnelles
                                                                                        </option>
                                                                                        <option>Évaluation soft skills
                                                                                        </option>
                                                                                        <option>Capacité à résoudre de
                                                                                            problèmes</option>
                                                                                        <option>Gestion d'équipe</option>
                                                                                        <option>Gestion du temps</option>
                                                                                        <option>Compétences en communication
                                                                                        </option>
                                                                                        <option>Compétence techniques
                                                                                        </option>
                                                                                        <option>Compétence en gestion de
                                                                                            projet</option>
                                                                                        <option>Compétence de prise
                                                                                            d'initiative</option>
                                                                                        <option>Gestion des priorités sous
                                                                                            pression</option>
                                                                                        <option>Prise en charge du stress
                                                                                        </option>
                                                                                        <option>Créativité et innovation
                                                                                        </option>
                                                                                        <option>Intégrité professionnelle
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div class="custom-mutliple-select rounded border poste-chosen no-search"
                                                                                    style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important; ">
                                                                                    <label
                                                                                        style="margin-top: 8px;margin-left: 17px; font-size: 12px;margin-bottom: 4px">Coefficient</label>
                                                                                    <select class="chosenoptgroup w-100">
                                                                                        <option>1</option>
                                                                                        <option selected>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                    </select>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash3"
                                                                                    style="font-size: 19px;color: #dd2255;"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12"
                                                                                style="width: 61%;margin-right: -10px;">
                                                                            </div>
                                                                            <div class="col-12"
                                                                                style="width: 28%;margin-right: -24px;">
                                                                            </div>
                                                                            <div class="col-2"
                                                                                style="width: 6%;margin-top: 17px;">
                                                                                <button
                                                                                    class="btn btn-theme mnw-100 bg-blue"
                                                                                    style="float: right;font-size: 14px">Ajouter</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="padding: 0px 17px;" class="row mb-5 mt-2">
                                                            <div class="col-12" style="width: 36%">
                                                                <div class="form-check form-switch"
                                                                    style="margin-top: 15px;">
                                                                    <button class="btn btn-theme mnw-100 bg-green"
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

    </main>
@endsection

@section('js_footer')
    <script type="text/javascript">
        $(window).on('load', function() {
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
    <script type="text/javascript">
        function setFocus(on) {
            var element = document.activeElement;
            if (on) {
                setTimeout(function() {
                    element.parentNode.classList.add("focus");
                });
            } else {
                let box = document.querySelector(".input-box");
                box.classList.remove("focus");
                $("input").each(function() {
                    var $input = $(this);
                    var $parent = $input.closest(".input-box");
                    if ($input.val()) $parent.addClass("focus");
                    else $parent.removeClass("focus");
                });
            }
        }
        $(window).on('load', function() {
            $('#text-chosen').on('change', function(evt, params) {
                var selectedValue = $(this).val(); // Fetch the selected value
                if (selectedValue == 1) {
                    $('.content-ckeditor').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message a été généré automatiquement pour vous rappeler la planification des entretiens.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de planifier les entretiens, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 2) {
                    $('.content-ckeditor').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message a été généré automatiquement pour vous rappeler la planification des tests techniques.<br><br> Nous vous à sélectionner les candidats figurant sur la shortlist afin de planifier les tests, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 3) {
                    $('.content-ckeditor').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message a été généré automatiquement pour vous rappeler la planification des tests de personnalité.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de planifier les tests, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 4) {
                    $('.content-ckeditor').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message a été généré automatiquement pour vous rappeler la programmation des quiz.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de planifier les quiz, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
            });

            $('#text-chosen2').on('change', function(evt, params) {
                var selectedValue = $(this).val(); // Fetch the selected value
                if (selectedValue == 1) {
                    $('.content-ckeditor2').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message constitue un second rappel pour la planification des entretiens.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de programmer les entretiens, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 2) {
                    $('.content-ckeditor2').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message constitue un second rappel concernant la planification des tests techniques.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de programmer les tests, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 3) {
                    $('.content-ckeditor2').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message constitue un second rappel concernant la planification des tests de personnalité.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de programmer les tests, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 4) {
                    $('.content-ckeditor2').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message constitue un second rappel concernant la planification des quiz.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de programmer les quiz, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
            });
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
@endsection
