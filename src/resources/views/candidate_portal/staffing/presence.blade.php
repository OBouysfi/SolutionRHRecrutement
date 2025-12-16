@extends('candidate_portal.layouts.second')

@section('title', content: 'Staffing - Présences')

@section('css_header')

@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">Staffing</h5>
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
                    <li class="breadcrumb-item active" aria-current="page">Présences</li>
                </ol>
            </nav>
        </div>

        <!-- content -->
        <div class="container border-bottom">

            <div class="row mb-4 hidden">
                <div class="col-12">
                    <div class="card border-0"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body filter-block">
                                            <div class="row">
                                                <div class="col-3" style="width: 251px;">
                                                    <div id="country-selector" class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Pays
                                                        </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                data-image="{{ asset('assets/img/drap/MAROC.jpg') }}">Maroc
                                                            </option>
                                                            <option value="Qatar"
                                                                data-image="{{ asset('assets/img/drap/QATAR.jpg') }}">Qatar
                                                            </option>
                                                            <option value="Sénégal"
                                                                data-image="{{ asset('assets/img/drap/senegal.jpg') }}">
                                                                Sénégal</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
                                                                <option>{{ __('candidate-portal.Ahmedabad') }}</option>
                                                                <option selected>{{ __('candidate-portal.Bangalore') }}</option>
                                                                <option>{{ __('candidate-portal.Chennai') }}</option>
                                                                <option>{{ __('candidate-portal.Delhi') }}</option>
                                                                <option>{{ __('candidate-portal.Hyderabad') }}</option>
                                                                <option>{{ __('candidate-portal.Kolkata') }}</option>
                                                                <option>{{ __('candidate-portal.Mumbai') }}</option>
                                                                <option>{{ __('candidate-portal.Surat') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
                                                                <option>{{ __('candidate-portal.Beijing') }}</option>
                                                                <option selected>{{ __('candidate-portal.Chengdu') }}</option>
                                                                <option>{{ __('candidate-portal.Chongqing') }}</option>
                                                                <option>{{ __('candidate-portal.Guangzhou') }}</option>
                                                                <option>{{ __('candidate-portal.Hong Kong') }}</option>
                                                                <option>{{ __('candidate-portal.Shanghai') }}</option>
                                                                <option>{{ __('candidate-portal.Shenzhen') }}</option>
                                                                <option>{{ __('candidate-portal.Tianjin') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                                <option>{{ __('candidate-portal.Tous') }}</option>
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
                                                <div class="col-3" style="width: 249px;">
                                                    <div class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Client</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>AAT</option>
                                                            <option>Agricultura España</option>
                                                            <option>Arthur Benson</option>
                                                            <option selected>Consortium Delta</option>
                                                            <option>VECTORIA LLC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3" style="width: 276px;margin-right: 0px  !important;">
                                                    <div class="rounded border poste-chosen type-con"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Type
                                                            de contrat</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option selected>Tous</option>
                                                            <option style="font-size: 12px;">Contrat de travail à durée
                                                                indéterminée (CDI)</option>
                                                            <option style="font-size: 12px;">Contrat de travail à durée
                                                                déterminée (CDD)</option>
                                                            <option style="font-size: 12px;">Contrat de travail étranger
                                                            </option>
                                                            <option style="font-size: 12px;">Contrat d'insertion
                                                                professionnelle (ANAPEC)</option>
                                                            <option style="font-size: 12px;">Contrat de Travail Temporaire
                                                                (Intérim)</option>
                                                            <option style="font-size: 12px;">Contrat de Travail à Temps
                                                                Partiel</option>
                                                            <option style="font-size: 12px;">Contrat de stage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3" style="width: 312px;">
                                                    <div class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Poste</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>{{ __('candidate-portal.Lead Tech') }}</option>
                                                            <option>{{ __('candidate-portal.Développeur Senior') }}</option>
                                                            <option>{{ __('candidate-portal.Chef de projet AMOA') }}</option>
                                                            <option>{{ __('candidate-portal.Développeur Senior Java') }}</option>
                                                            <option>{{ __('candidate-portal.Pentest') }}</option>
                                                            <option>{{ __('candidate-portal.Analyste SOC N2') }}</option>
                                                            <option>{{ __('candidate-portal.Développeur Python') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3" style="width: 278px;">
                                                    <div class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Consultant</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option selected>Tous</option>
                                                            <option>Ahmed EL MANSOURI</option>
                                                            <option>Fatima BENYAHIA</option>
                                                            <option>Youssef AMRANI</option>
                                                            <option>Hind TAZI</option>
                                                            <option>Salma AÏT LAHCEN</option>
                                                            <option>Latifa IDRISSI</option>
                                                            <option>Rania ESSALHI</option>
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
            <div class="row mb-4 mt-5">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="background-color: #e4e8ee54">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <h5>{{ __('candidate-portal.Calendrier') }}</h5>
                                                        </div>
                                                        <div class="col-2 ms-auto btn-tkh-p hidden"
                                                            style="width: 17%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                            <div class="row">
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                        <a href="etat-candidate-portals-apercu.html"
                                                                            target="_blank"><i
                                                                                class="bi bi-binoculars avatar   rounded h5"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" style="margin-right: -15px;">
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
                                                                    data-bs-placement="top" style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                        <a href="#" type="button">
                                                                            <i
                                                                                class="bi bi-cloud-download avatar   rounded h5"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                        <i
                                                                            class="bi bi-printer avatar   rounded h5"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2 ms-auto hidden"
                                                    style="width: 24%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                    <div class="row">
                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Ajouter une affectation"
                                                            style="margin-right: -15px;">
                                                            <div class="avatar avatar-50 rounded bg-light-theme">
                                                                <a type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#emailcompose2"><i
                                                                        class="bi bi-plus-square avatar   rounded h5"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Aperçu"
                                                            style="margin-right: -15px;">
                                                            <div class="avatar avatar-50 rounded bg-light-theme">
                                                                <a href="affectation-list-apercu.html" target="_blank"><i
                                                                        class="bi bi-binoculars avatar   rounded h5"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Partager"
                                                            style="margin-right: -15px;">
                                                            <div class="avatar avatar-50 rounded bg-light-theme">
                                                                <a href="#" type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#emailcompose">
                                                                    <i
                                                                        class="bi bi-share avatar   rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Télécharger"
                                                            style="margin-right: -15px;">
                                                            <div class="avatar avatar-50 rounded bg-light-theme">
                                                                <a href="#" type="button">
                                                                    <i
                                                                        class="bi bi-cloud-download avatar   rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Imprimer"
                                                            style="margin-right: -15px;">
                                                            <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                <i
                                                                    class="bi bi-printer avatar   rounded h5"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="">
                                                            <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                <select
                                                                    style="border: 0;background-color: transparent;width: 49px;color: #005dc7;">
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
            <div class="row mb-4">
                <div class="col-12">
                    <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="navtabscard139"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button style="font-size: 14px" class="nav-link active" id="tab119-tab" data-bs-toggle="tab"
                                data-bs-target="#tab119" type="button" role="tab" aria-controls="tab119"
                                aria-selected="true">Calendrier</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button style="font-size: 14px" class="nav-link" id="tab219-tab" data-bs-toggle="tab"
                                data-bs-target="#tab219" type="button" role="tab" aria-controls="tab219"
                                aria-selected="false" tabindex="-1">Etat de présences</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content py-3" id="myTabContent">
                <!-- personal info tab-->
                <div class="tab-pane fade show active" id="tab119" role="tabpanel" aria-labelledby="tab119-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body filter-block" style="padding: 23px;">
                                                    <div class="row">
                                                        <div class="inner-sidebar-wrap border-bottom">
                                                            <div class="inner-sidebar" style="width: 317px !important;">
                                                                <div class="row mx-0 my-3">
                                                                    <div class="col d-grid">
                                                                        <button class="btn btn-theme border"
                                                                            type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#emailcompose"><i
                                                                                class="bi bi-envelope-plus me-2 vm"></i>
                                                                            {{ __('candidate-portal.Créer événement') }}</button>
                                                                    </div>
                                                                </div>
                                                                <ul class="nav nav-pills mb-4">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" aria-current="page"
                                                                            href="#">
                                                                            <div class="avatar avatar-40 icon"><i
                                                                                    class="bi bi-calendar-week"></i></div>
                                                                            <div class="col">Calendrier</div>
                                                                            <div class="col-auto align-self-center">
                                                                                <figure
                                                                                    class="avatar avatar-24 coverimg rounded-circle">
                                                                                    <img src="{{ asset('assets/img/user-2.jpg') }}"
                                                                                        alt="">
                                                                                </figure>
                                                                                <figure
                                                                                    class="avatar avatar-24 bg-light-theme rounded-circle">
                                                                                    <small class="fs-10 vm">+2</small>
                                                                                </figure>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item dropdown">
                                                                        <a class="nav-link dropdown-toggle"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="false"
                                                                            data-bs-display="static" href="#"
                                                                            role="button" aria-expanded="false">
                                                                            <div class="avatar avatar-40 icon"><i
                                                                                    class="bi bi-calendar-check"></i></div>
                                                                            <div class="col">Présences</div>
                                                                            <div class="arrow"><i
                                                                                    class="bi bi-chevron-down plus"></i> <i
                                                                                    class="bi bi-chevron-up minus"></i>
                                                                            </div>
                                                                        </a>
                                                                        <ul class="dropdown-menu cal-tkh"
                                                                            style="padding-bottom: 20px;padding-left: 10px;">
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Présentiel</div>

                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Télétravail</div>

                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" aria-current="page"
                                                                            href="#">
                                                                            <div class="avatar avatar-40 icon"><i
                                                                                    class="bi bi-save"></i></div>
                                                                            <div class="col">Brouillons</div>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" aria-current="page"
                                                                            href="#">
                                                                            <div class="avatar avatar-40 icon"><i
                                                                                    class="bi bi-trash"></i></div>
                                                                            <div class="col">Supprimer</div>
                                                                            <div class="col-auto">

                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item dropdown">
                                                                        <a class="nav-link dropdown-toggle"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="false"
                                                                            data-bs-display="static" href="#"
                                                                            role="button" aria-expanded="false">
                                                                            <div class="avatar avatar-40 icon"><i
                                                                                    class="bi bi-calendar-x"></i></div>
                                                                            <div class="col">Absences</div>
                                                                            <div class="arrow"><i
                                                                                    class="bi bi-chevron-down plus"></i> <i
                                                                                    class="bi bi-chevron-up minus"></i>
                                                                            </div>
                                                                        </a>
                                                                        <ul class="dropdown-menu cal-tkh"
                                                                            style="padding-bottom: 20px;padding-left: 10px;">
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Congé annuel</div>

                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Congé de maternité</div>

                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Congé parental</div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Absence pour examen</div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox" checked>
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Congé maladie</div>
                                                                                    <div class="col-auto align-items-center"
                                                                                        style="margin-top: -10px">
                                                                                        <figure
                                                                                            class="avatar avatar-24 bg-light-theme rounded-circle">
                                                                                            <small
                                                                                                class="fs-10 vm">1</small>
                                                                                        </figure>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Maladie professionnelle</div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Circoncision</div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Accident de travail</div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Congé - opération du conjoint</div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center"
                                                                                        style="line-height: 20px !important;">
                                                                                        Congé - opération enfant à charge
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item nav-link"
                                                                                    href="#">
                                                                                    <div class="avatar avatar-40 icon">
                                                                                        <input type="checkbox">
                                                                                    </div>
                                                                                    <div class="col align-self-center">
                                                                                        Convenance personnelle</div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="nav-item dropdown">
                                                                        <a class="nav-link dropdown-toggle"
                                                                            data-bs-toggle="dropdown"
                                                                            data-bs-auto-close="false"
                                                                            data-bs-display="static" href="#"
                                                                            role="button" aria-expanded="false">
                                                                            <div class="avatar avatar-40 icon"><i
                                                                                    class="bi bi-calendar-heart"></i></div>
                                                                            <div class="col">Jours fériés</div>
                                                                            <div class="arrow"><i
                                                                                    class="bi bi-chevron-down plus"></i> <i
                                                                                    class="bi bi-chevron-up minus"></i>
                                                                            </div>
                                                                        </a>
                                                                        <ul class="dropdown-menu cal-tkh"
                                                                            style="padding-bottom: 20px;padding-left: 10px;width: 316px">
                                                                            <li>
                                                                                <a class="nav-link dropdown-toggle tkh-2"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="false"
                                                                                    data-bs-display="static"
                                                                                    href="#" role="button"
                                                                                    aria-expanded="false">
                                                                                    <div class="col">Fêtes nationales
                                                                                    </div>
                                                                                    <div class="arrow"><i
                                                                                            class="bi bi-chevron-down plus"></i>
                                                                                        <i
                                                                                            class="bi bi-chevron-up minus"></i>
                                                                                    </div>
                                                                                </a>
                                                                                <ul class="dropdown-menu cal-tkh tk-cal2"
                                                                                    style="padding-bottom: 20px;padding-left: 0px;">

                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        1er janvier : Nouvel
                                                                                                        an
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 20px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        11 janvier : Fête du
                                                                                                        Manifeste de
                                                                                                        l'Indépendance
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        1er mai : Fête du
                                                                                                        Travail
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        14 janvier : Nouvel
                                                                                                        an Amazigh
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        30 juillet : Fête du
                                                                                                        Trône
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        14 août : Journée de
                                                                                                        Oued Ed-Dahab
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        20 août : Révolution
                                                                                                        du Roi et du Peuple
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        21 août : Fête de la
                                                                                                        Jeunesse
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 20px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        6 novembre : Fête de
                                                                                                        la Marche Verte
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        18 novembre : Fête
                                                                                                        de l'Indépendance
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                            <li>
                                                                                <a class="nav-link dropdown-toggle tkh-2"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="false"
                                                                                    data-bs-display="static"
                                                                                    href="#" role="button"
                                                                                    aria-expanded="false">
                                                                                    <div class="col">Fêtes religieuses
                                                                                    </div>
                                                                                    <div class="arrow"><i
                                                                                            class="bi bi-chevron-down plus"></i>
                                                                                        <i
                                                                                            class="bi bi-chevron-up minus"></i>
                                                                                    </div>
                                                                                </a>
                                                                                <ul class="dropdown-menu cal-tkh tk-cal2"
                                                                                    style="padding-bottom: 20px;padding-left: 0px;">
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        31 mars : Aïd Al
                                                                                                        Fitr
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 20px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        6 juin : Aïd Al Adha
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        27 juin : Nouvel An
                                                                                                        Hégirien
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li style="height: 20px;">
                                                                                        <a class="dropdown-item nav-link"
                                                                                            href="#">
                                                                                            <div class="col align-self-center"
                                                                                                style="line-height: 21px">
                                                                                                <div class="row">
                                                                                                    <div class="col-1">
                                                                                                        <i class="bi bi-square-fill"
                                                                                                            style="font-size: 6px"></i>
                                                                                                    </div>
                                                                                                    <div class="col-auto"
                                                                                                        style="font-size: 11.5px;">
                                                                                                        5 septembre : Aïd Al
                                                                                                        Mawlid
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                                <div class="row mx-0 mb-4 hidden">
                                                                    <div class="col d-grid">
                                                                        <button class="btn btn-outline-secondary border"
                                                                            type="button"><i
                                                                                class="bi bi-camera-video me-2"></i>
                                                                            Meet</button>
                                                                    </div>
                                                                    <div class="col d-grid">
                                                                        <button class="btn btn-outline-secondary border"
                                                                            type="button"><i
                                                                                class="bi bi-chat-right-text me-2"></i>
                                                                            Chat</button>
                                                                    </div>
                                                                </div>
                                                                <div class="card shadow-none bg-none border-0 hidden">
                                                                    <div class="input-group input-group-md">
                                                                        <span class="input-group-text text-theme"><i
                                                                                class="bi bi-person-plus"></i></span>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Equipe entretien... "
                                                                            value="">
                                                                        <div
                                                                            class="dropdown input-group-text rounded px-0">
                                                                            <button
                                                                                class="btn   btn-link dd-arrow-none"
                                                                                type="button" id="statuschat1"
                                                                                data-bs-toggle="dropdown"
                                                                                data-bs-auto-close="true"
                                                                                aria-expanded="false">
                                                                                <i class="bi bi-three-dots-vertical"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                                aria-labelledby="statuschat1">
                                                                                <li><a class="dropdown-item"
                                                                                        href="javascript:void(0)"><span
                                                                                            class="vm me-1 bg-success rounded-circle d-inline-block p-1"></span>
                                                                                        En ligne</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="javascript:void(0)"><span
                                                                                            class="vm me-1 bg-warning rounded-circle d-inline-block p-1"></span>
                                                                                        Absent</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="javascript:void(0)"><span
                                                                                            class="vm me-1 bg-danger rounded-circle d-inline-block p-1"></span>
                                                                                        Hors ligne</a></li>
                                                                                <li><a class="dropdown-item"
                                                                                        href="javascript:void(0)"><span
                                                                                            class="vm me-1 bg-secondary rounded-circle d-inline-block p-1"></span>
                                                                                        Désactivé</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body mh-300 overflow-y-auto p-0">
                                                                        <ul
                                                                            class="list-group list-group-flush bg-none rounded-0 border-top">
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        <figure
                                                                                            class="avatar avatar-40 coverimg rounded-circle"
                                                                                            style="background-size: 26px;">
                                                                                            <img src="{{ asset('assets/img/team/T1.jpg') }}"
                                                                                                alt="" />
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-9 align-self-center ps-0">
                                                                                        <p class="text-truncate mb-0">
                                                                                            Farida EL WAFA</p>
                                                                                        <p
                                                                                            class="text-secondary small text-truncate">
                                                                                            Manager de recrutement</p>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        <figure
                                                                                            class="avatar avatar-40 coverimg rounded-circle"
                                                                                            style="background-size: 32px;">
                                                                                            <img src="{{ asset('assets/img/team/T2.jpg') }}"
                                                                                                alt="" />
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-9 align-self-center ps-0">
                                                                                        <p class="text-truncate mb-0">Asmaa
                                                                                            BENHIDA</p>
                                                                                        <p
                                                                                            class="text-secondary small text-truncate">
                                                                                            Chef de projet</p>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        <figure
                                                                                            class="avatar avatar-40 coverimg rounded-circle"
                                                                                            style="background-size: 33px;">
                                                                                            <img src="{{ asset('assets/img/team/T3.jpg') }}"
                                                                                                alt="" />
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-9 align-self-center ps-0">
                                                                                        <p class="text-truncate mb-0">
                                                                                            Jamila EL MANSOURI</p>
                                                                                        <p
                                                                                            class="text-secondary small text-truncate">
                                                                                            Chargé de sourcing</p>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        <figure
                                                                                            class="avatar avatar-40 coverimg rounded-circle">
                                                                                            <img src="{{ asset('assets/img/team/T4.jpg') }}"
                                                                                                alt="" />
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-9 align-self-center ps-0">
                                                                                        <p class="text-truncate mb-0">
                                                                                            Jaouad
                                                                                            FATHALLAH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                                                style="font-size: 12px">+1</span>
                                                                                        </p>
                                                                                        <p
                                                                                            class="text-secondary small text-truncate">
                                                                                            Consultant en recrutement</p>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        <figure
                                                                                            class="avatar avatar-40 coverimg rounded-circle"
                                                                                            style="background-size: 31px;">
                                                                                            <img src="{{ asset('assets/img/team/T5.jpg') }}"
                                                                                                alt="" />
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-9 align-self-center ps-0">
                                                                                        <p class="text-truncate mb-0">Omar
                                                                                            BENKIRANE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                                                style="font-size: 12px">+1</span>
                                                                                        </p>
                                                                                        <p
                                                                                            class="text-secondary small text-truncate">
                                                                                            Responsable recrutemen</p>
                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="inner-sidebar-content">
                                                                <div id="calendar"></div>
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
                <div class="tab-pane fade" id="tab219" role="tabpanel" aria-labelledby="tab219-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body filter-block" style="padding: 23px;">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <table class="table">
                                                                <thead style="font-size: 14px">
                                                                    <tr>
                                                                        <th rowspan="1" style="vertical-align: middle">
                                                                            {{ __('candidate-portal.Jours') }}</th>
                                                                        <th rowspan="1" style="vertical-align: middle">
                                                                            {{ __('candidate-portal.Date') }}</th>
                                                                        <th rowspan="1" style="vertical-align: middle">
                                                                            {{ __('candidate-portal.Mode de travail') }}</th>
                                                                        <th rowspan="1"
                                                                            style="vertical-align: middle;width: 222px;">
                                                                            {{ __('candidate-portal.Heures normales') }}</th>
                                                                        <th rowspan="1"
                                                                            style="vertical-align: middle;width: 245px;">
                                                                            {{ __('candidate-portal.Heures Supp.') }}</th>
                                                                        <th rowspan="1"
                                                                            style="vertical-align: middle;width: 197px;">
                                                                            {{ __('candidate-portal.Absence') }}</th>
                                                                        <th rowspan="1"
                                                                            style="vertical-align: middle;width: 197px;">
                                                                            {{ __('candidate-portal.Jour Férié') }}</th>
                                                                        <th rowspan="1"
                                                                            style="vertical-align: middle;width: 250px;">
                                                                            {{ __('candidate-portal.Commentaires') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 14px">
                                                                    <tr style="background-color: #ebf8fb">
                                                                        <td>{{ __('candidate-portal.Mercredi') }}</td>
                                                                        <td>01/01/2025</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>{{ __('candidate-portal.Nouvel an') }}</td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Jeudi') }}</td>
                                                                        <td>02/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td>17:00 - 18:30 <span>&nbsp;&nbsp;1,5
                                                                                heures</span></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Vendredi') }}</td>
                                                                        <td>03/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #eeeff1;">
                                                                        <td>{{ __('candidate-portal.Samedi') }}</td>
                                                                        <td>04/01/2025</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #eeeff1;">
                                                                        <td>{{ __('candidate-portal.Dimanche') }}</td>
                                                                        <td>05/01/2025</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Lundi') }}</td>
                                                                        <td>06/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Mardi') }}</td>
                                                                        <td>07/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Mercredi') }}</td>
                                                                        <td>08/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #fbf6e4">
                                                                        <td>{{ __('candidate-portal.Jeudi') }}</td>
                                                                        <td>09/01/2025</td>
                                                                        <td>Télétravail</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Vendredi') }}</td>
                                                                        <td>10/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #eeeff1;">
                                                                        <td>{{ __('candidate-portal.Samedi') }}</td>
                                                                        <td>11/01/2025</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #eeeff1;">
                                                                        <td>{{ __('candidate-portal.Dimanche') }}</td>
                                                                        <td>12/01/2025</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Lundi') }}</td>
                                                                        <td>13/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Mardi') }}</td>
                                                                        <td>14/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Mercredi') }}</td>
                                                                        <td>15/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Jeudi') }}</td>
                                                                        <td>16/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Vendredi') }}</td>
                                                                        <td>17/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #eeeff1;">
                                                                        <td>{{ __('candidate-portal.Samedi') }}</td>
                                                                        <td>18/01/2025</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #eeeff1;">
                                                                        <td>{{ __('candidate-portal.Dimanche') }}</td>
                                                                        <td>19/01/2025</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Lundi') }}</td>
                                                                        <td>20/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Mardi') }}</td>
                                                                        <td>21/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Mercredi') }}</td>
                                                                        <td>22/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #fbf6e4">
                                                                        <td>{{ __('candidate-portal.Jeudi') }}</td>
                                                                        <td>23/01/2025</td>
                                                                        <td>Télétravail</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Vendredi') }}</td>
                                                                        <td>24/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #eeeff1;">
                                                                        <td>{{ __('candidate-portal.Samedi') }}</td>
                                                                        <td>25/01/2025</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr style="background-color: #eeeff1;">
                                                                        <td>{{ __('candidate-portal.Dimanche') }}</td>
                                                                        <td>26/01/2025</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Lundi') }}</td>
                                                                        <td>27/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Mardi') }}</td>
                                                                        <td>28/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Mercredi') }}</td>
                                                                        <td>29/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Jeudi') }}</td>
                                                                        <td>30/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{ __('candidate-portal.Vendredi') }}</td>
                                                                        <td>31/01/2025</td>
                                                                        <td>Présentiel</td>
                                                                        <td>08:30 - 16:30 <span>&nbsp;&nbsp;8 heures</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3" style="width: 21%;">
                                                            <div class="card border-0"  >
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="card border-0">
                                                                                <div class="card-header bg-gradient-theme-light-modal"
                                                                                    style="padding: 18px;">
                                                                                    <h6 class="align-items-center">
                                                                                        Récapitulatif</h6>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <table class="table">
                                                                                                <tbody
                                                                                                    style="font-size: 14px">
                                                                                                    <tr>
                                                                                                        <td>Jours de travail
                                                                                                        </td>
                                                                                                        <td>26 Jours</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Jours travaillés
                                                                                                        </td>
                                                                                                        <td>22 Jours</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Présentiel</td>
                                                                                                        <td>20 Jours</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Télétravail</td>
                                                                                                        <td>2 Jours</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Heures de
                                                                                                            travail</td>
                                                                                                        <td>191 Heures</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Heures
                                                                                                            travaillées</td>
                                                                                                        <td>177,5 Heures
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Heures normales
                                                                                                        </td>
                                                                                                        <td>176 Heures</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Heures Supp.
                                                                                                        </td>
                                                                                                        <td>1,5 Heure</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Absence</td>
                                                                                                        <td>0</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Jours férié</td>
                                                                                                        <td>1 Jour</td>
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
                                                        <div class="col-1" style="width: 0%"></div>
                                                        <div class="col-8" style="width: 77%">
                                                            <div class="row">
                                                                <div class="col-12 mb-4">
                                                                    <div class="card border-0"
                                                                         >
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="card border-0">
                                                                                        <div class="card-header bg-gradient-theme-light-modal"
                                                                                            style="padding: 18px;">
                                                                                            <h6 class="align-items-center">
                                                                                                Consultant</h6>
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <table class="table">
                                                                                                        <tbody
                                                                                                            style="font-size: 14px">
                                                                                                            <tr>
                                                                                                                <td>{{ __('candidate-portal.Matricule') }} : 12759
                                                                                                                </td>
                                                                                                                <td>{{ __('candidate-portal.Prénom') }} : Ahmed
                                                                                                                </td>
                                                                                                                <td>{{ __('candidate-portal.Nom') }} : EL
                                                                                                                    MANSOURI
                                                                                                                </td>
                                                                                                                <td>{{ __('candidate-portal.Poste') }} : Lead
                                                                                                                    Tech
                                                                                                                </td>
                                                                                                                <td>{{ __('candidate-portal.Signature') }} :
                                                                                                                    1L5OA2DA1-1P8MA2-12O309
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
                                                                <div class="col-5">
                                                                    <div class="card border-0"
                                                                         >
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="card border-0">
                                                                                        <div class="card-header bg-gradient-theme-light-modal"
                                                                                            style="padding: 18px;">
                                                                                            <h6 class="align-items-center">
                                                                                                Fournisseur</h6>
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <table class="table">
                                                                                                        <tbody
                                                                                                            style="font-size: 14px">
                                                                                                            <tr>
                                                                                                                <td>ARTUS
                                                                                                                    Maroc
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Prénom :
                                                                                                                    Farida
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Nom : EL
                                                                                                                    WAFA
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Poste :
                                                                                                                    Responsable
                                                                                                                    staffing
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Signature
                                                                                                                    :
                                                                                                                    1PAZ241-32SF5532-132FPD9
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
                                                                <div class="col-5 ms-auto">
                                                                    <div class="card border-0"
                                                                         >
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="card border-0">
                                                                                        <div class="card-header bg-gradient-theme-light-modal"
                                                                                            style="padding: 18px;">
                                                                                            <h6 class="align-items-center">
                                                                                                Client</h6>
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <table class="table">
                                                                                                        <tbody
                                                                                                            style="font-size: 14px">
                                                                                                            <tr>
                                                                                                                <td>BYTE IT
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Prénom :
                                                                                                                    Abdellah
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Nom :
                                                                                                                    CHAHID
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Poste :
                                                                                                                    DSI</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Signature
                                                                                                                    :
                                                                                                                    28DZ241-32SOP232-132FPPOA
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
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>

    <div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 601px;">
            <div class="modal-content theme-blue bg-gradient-theme-light-modal">
                <div class="modal-header" style="background-color: #fff;border: 0;width: 599px;">
                    <div class="row align-items-center" style="width: 105%">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px"
                                        class="bi bi-calendar-check avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="fw-medium mb-0">Présence</h5>
                        </div>
                        <div class="col-auto ms-auto">
                            <p class="current-date-html"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-body d-block" style="width: 599px;">


                    <div class="row align-items-center mb-2 justify-content-center">
                        <p class="hidden" id="date-evenement"></p>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-auto" style="width: 28%;margin-top: -8px;">
                                    <div class="form-check form-switch" style="margin-top: 8px;margin-left: 15px;">
                                        <input class="form-check-input" type="checkbox" role="switch" id="rememeberme"
                                            checked>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span>Présentiel</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto" style="width: 28%;margin-top: -8px;">
                                    <div class="form-check form-switch" style="margin-top: 8px;margin-left: 15px;">
                                        <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span>Télétravail</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4" style="width: 26%;margin-top: 12px">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="time" placeholder="Heure début" value="08:30" required=""
                                            class="form-control border-start-0">
                                        <label>{{ __('candidate-portal.Heure début') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4" style="width: 26%;margin-top: 12px">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="time" placeholder="Heure fin" value="16:30" required=""
                                            class="form-control border-start-0">
                                        <label>{{ __('candidate-portal.Heure fin') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <button style="background-color: #15215a !important;font-size: 13px;" class="btn btn-theme"
                                type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square me-2"
                                    style="font-size: 14px"></i> {{ __('candidate-portal.Annuler') }}</button>
                        </div>
                        <div class="col-auto">
                            <button style="background-color: #15215a !important;font-size: 13px;" class="btn btn-theme"
                                type="button"><i class="bi bi-floppy me-2" style="font-size: 14px"></i>
                                {{ __('candidate-portal.Enregistrer') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="emailcompose2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 601px;">
            <div class="modal-content theme-blue bg-gradient-theme-light-modal">
                <div class="modal-header" style="background-color: #fff;border: 0;width: 599px">
                    <div class="row align-items-center" style="width: 105%">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px"
                                        class="bi bi-calendar-x avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="fw-medium mb-0">Absence</h5>
                        </div>
                        <div class="col-auto ms-auto">
                            <p class="current-date-html"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-body d-block" style="width: 599px;">


                    <div class="row align-items-center mb-2 justify-content-center">
                        <p class="hidden" id="date-evenement"></p>
                        <div class="col-4" style="width: 45%;">
                            <div class="rounded border poste-chosen stp-drop"
                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;padding: 1px;">
                                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Type
                                    d'absence</label>
                                <select class="chosenoptgroup w-100">
                                    <option value="conge_annuel">{{ __('candidate-portal.Congé annuel') }}</option>
                                    <option value="conge_maternite">{{ __('candidate-portal.Congé de maternité') }}</option>
                                    <option value="conge_parental">{{ __('candidate-portal.Congé parental') }}</option>
                                    <option value="absence_examen">{{ __('candidate-portal.Absence pour examen') }}</option>
                                    <option value="conge_maladie">{{ __('candidate-portal.Congé maladie') }}</option>
                                    <option value="maladie_pro">{{ __('candidate-portal.Maladie professionnelle') }}</option>
                                    <option value="circoncision">{{ __('candidate-portal.Circoncision') }}</option>
                                    <option value="accident_travail">{{ __('candidate-portal.Accident de travail') }}</option>
                                    <option value="operation_conjoint">{{ __('candidate-portal.Congé - opération du conjoint') }}</option>
                                    <option value="operation_enfant">{{ __('candidate-portal.Congé - opération enfant à charge') }}</option>
                                    <option value="convenance_perso">{{ __('candidate-portal.Convenance personnelle') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4" style="width: 26%;margin-top: 12px">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="Date" placeholder="Date début" value="" required=""
                                            class="form-control border-start-0 date-start-ex">
                                        <label>{{ __('candidate-portal.Date début') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4" style="width: 26%;margin-top: 12px">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="Date" placeholder="Date fin" value="" required=""
                                            class="form-control border-start-0 date-end-ex">
                                        <label>{{ __('candidate-portal.Date fin') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <button style="background-color: #15215a !important;font-size: 13px;" class="btn btn-theme"
                                type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x-square me-2" style="font-size: 14px"></i> {{ __('candidate-portal.Annuler') }}</button>
                        </div>
                        <div class="col-auto">
                            <button style="background-color: #15215a !important;font-size: 13px;" class="btn btn-theme"
                                type="button"><i class="bi bi-floppy me-2" style="font-size: 14px"></i>
                                {{ __('candidate-portal.Enregistrer') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js_footer')

@endsection
