@extends('layouts.master')
@section('title', 'Gestion des clients')

@section('css_header')
@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">Clients</h5>
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
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                        <img src="assets/img/icon/HJ_icon_green_black.png" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Confort utilisateur"
                    style="margin-right: 40px;">
                    <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                        id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="assets/img/icon/faciliti.png"
                                style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Gestion des clients</li>
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
                                                <div class="col-3" style="width: 312px;">
                                                    <div class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Secteur
                                                            d’activité</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Agriculture</option>
                                                            <option>Agroalimentaire</option>
                                                            <option>Aéronautique</option>
                                                            <option>Automobile</option>
                                                            <option>Bâtiments Travaux Publics (BTP)</option>
                                                            <option>Banques et Assurances</option>
                                                            <option>Commerce de détail</option>
                                                            <option>Communication</option>
                                                            <option>Energies renouvelables</option>
                                                            <option>Enseignement</option>
                                                            <option>Grande consommation</option>
                                                            <option>Gouvernement</option>
                                                            <option>Hospitalité</option>
                                                            <option>Immobilier</option>
                                                            <option>Industrie</option>
                                                            <option>Médias et divertissement</option>
                                                            <option>Mines</option>
                                                            <option>Négoce</option>
                                                            <option>Offshore et Outsourcing</option>
                                                            <option>Pétrole et Gaz</option>
                                                            <option>Santé</option>
                                                            <option>Services professionnels</option>
                                                            <option>Technologie IT</option>
                                                            <option>Télécommunication</option>
                                                            <option>Textile et habillement</option>
                                                            <option>Tourisme</option>
                                                            <option>Transport et logistique</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3" style="width: 251px;">
                                                    <div id="country-selector" class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Pays
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
                                                                data-image="assets/img/drap/Cote_d'Ivoire.png">Côte d'Ivoire
                                                            </option>
                                                            <option value="Espagne" data-image="assets/img/drap/Spain.png">
                                                                Espagne</option>
                                                            <option value="Unis"
                                                                data-image="assets/img/drap/united-arab-emirates.jpg">
                                                                Émirats Arabes Unis</option>
                                                            <option value="France"
                                                                data-image="assets/img/drap/France.png">France</option>
                                                            <option value="Inde" data-image="assets/img/drap/india.jpg">
                                                                Inde</option>
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
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Missions
                                                            en cours </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Shortlist</option>
                                                            <option>Entretien</option>
                                                            <option>Evaluation</option>
                                                            <option selected>Offre en cours</option>
                                                            <option>En attente de réponse</option>
                                                            <option>Acceptation de l'offre</option>
                                                            <option>Retenu</option>
                                                            <option>Embauché</option>
                                                            <option>Rejeté</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3" style="width: 276px;margin-right: 0px  !important;">
                                                    <div class="rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Statut
                                                            du client</label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Actif</option>
                                                            <option>En attente</option>
                                                            <option>Inactif</option>
                                                            <option selected>Prospect</option>
                                                            <option>En négociation</option>
                                                            <option>Suspendu</option>
                                                            <option>Rupture de collaboration</option>
                                                            <option>Réactivation</option>
                                                            <option>A surveiller</option>
                                                            <option>Retardé</option>
                                                            <option>Gagné</option>
                                                            <option>Non intéressé</option>
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

            <div class="row mb-5 justify-content-center">
                <div class="col-10">
                    <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button style="font-size: 14px" class="nav-link active" id="personal-tab"
                                data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab"
                                aria-controls="personal" aria-selected="true">Recrutement</button>
                        </li>
                        <li class="nav-item" role="presentation2">
                            <button style="font-size: 14px" class="nav-link " id="personal2-tab" data-bs-toggle="tab"
                                data-bs-target="#personal2" type="button" role="tab" aria-controls="personal2"
                                aria-selected="false" tabindex="-1">Echelle</button>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-12">

                    <div class="tab-content py-3" id="myTabContent" style="background-color: transparent">
                        <div class="tab-pane fade active show" id="personal" role="tabpanel"
                            aria-labelledby="personal-tab">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body" style="background-color: #e4e8ee54">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-4" style="width: 66%">
                                                                    <div class="card border-0">
                                                                        <div class="card-header"
                                                                            style="padding-bottom: 6px !important;">
                                                                            <div class="row mb-4">
                                                                                <div class="col-12">
                                                                                    <h6 class="title custom-title">Détails
                                                                                        du Poste</h6>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body"
                                                                            style="padding-top: 0 !important;">
                                                                            <div class="row">
                                                                                <div class="col-auto" style="width: 34%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="Chef de Projet IT"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0">
                                                                                                <label>Poste</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-auto" style="width: 26%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="Casablanca"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0">
                                                                                                <label>Lieu</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-1" style="width: 40%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating ">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="permis">
                                                                                                    <option>Contrat de
                                                                                                        travail à durée
                                                                                                        indéterminée (CDI)
                                                                                                    </option>
                                                                                                    <option>Contrat de
                                                                                                        travail à durée
                                                                                                        déterminée (CDD)
                                                                                                    </option>
                                                                                                    <option>Contrat de
                                                                                                        travail étranger
                                                                                                    </option>
                                                                                                    <option>Contrat
                                                                                                        d'insertion
                                                                                                        professionnelle
                                                                                                        (ANAPEC)</option>
                                                                                                    <option>Contrat de
                                                                                                        Travail Temporaire
                                                                                                        (Intérim)</option>
                                                                                                    <option>Contrat de
                                                                                                        Travail à Temps
                                                                                                        Partiel</option>
                                                                                                    <option>Contrat de stage
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label for="permis"
                                                                                                    class="">Type de
                                                                                                    contrat</label>
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
                                                                        <div class="card-header"
                                                                            style="padding-bottom: 6px !important;">
                                                                            <div class="row mb-4">
                                                                                <div class="col-12">
                                                                                    <h6 class="title custom-title">
                                                                                        Informations sur la mission</h6>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body"
                                                                            style="padding-top: 0 !important;">
                                                                            <div class="row">
                                                                                <div class="col-auto ms-auto"
                                                                                    style="width: 32%">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="date"
                                                                                                    placeholder=""
                                                                                                    value="2024-09-24"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0">
                                                                                                <label>Date début</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-auto" style="width: 32%">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="date"
                                                                                                    placeholder=""
                                                                                                    value="2024-10-31"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0">
                                                                                                <label>Date fin</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-1" style="width: 36%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="1 mois et 6 jours"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0">
                                                                                                <label>Durée</label>
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
                            <div class="card border-0">
                                <div class="card-body" style="background-color: #e4e8ee54">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0 mb-4">
                                                                <div class="card-header"
                                                                    style="padding-bottom: 6px !important;">
                                                                    <div class="row mb-4">
                                                                        <div class="col-12">
                                                                            <h6 class="title custom-title"
                                                                                style="font-size: 22px !important;">Offre
                                                                                d'emploi</h6>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="card-body" style="padding-top: 0 !important;">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="card border-0"
                                                                                style="margin-bottom: 30px !important;">
                                                                                <div class="card-body"
                                                                                    style="background-color: #e4e8ee54">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card border-0">
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div
                                                                                                            class="col-12">
                                                                                                            <div class="form-control border"
                                                                                                                id="ckeditor">
                                                                                                                <b>Infos sur
                                                                                                                    l’entreprise</b>
                                                                                                                Consortium
                                                                                                                Delta est un
                                                                                                                acteur
                                                                                                                majeur dans
                                                                                                                le secteur
                                                                                                                des
                                                                                                                technologies
                                                                                                                de
                                                                                                                l’information,
                                                                                                                reconnu pour
                                                                                                                son
                                                                                                                expertise
                                                                                                                dans la mise
                                                                                                                en œuvre de
                                                                                                                solutions
                                                                                                                innovantes
                                                                                                                et la
                                                                                                                transformation
                                                                                                                digitale des
                                                                                                                entreprises.
                                                                                                                Spécialisé
                                                                                                                dans la
                                                                                                                gestion de
                                                                                                                projets
                                                                                                                complexes à
                                                                                                                l’échelle
                                                                                                                internationale,
                                                                                                                Consortium
                                                                                                                Delta
                                                                                                                accompagne
                                                                                                                des clients
                                                                                                                de
                                                                                                                différents
                                                                                                                secteurs
                                                                                                                dans la mise
                                                                                                                en place de
                                                                                                                stratégies
                                                                                                                digitales
                                                                                                                ambitieuses.
                                                                                                                Fort d’une
                                                                                                                équipe
                                                                                                                dynamique et
                                                                                                                de projets à
                                                                                                                forte valeur
                                                                                                                ajoutée,
                                                                                                                Consortium
                                                                                                                Delta
                                                                                                                cherche
                                                                                                                aujourd’hui
                                                                                                                à renforcer
                                                                                                                son équipe
                                                                                                                avec un Chef
                                                                                                                de Projet IT
                                                                                                                Senior pour
                                                                                                                superviser
                                                                                                                et piloter
                                                                                                                des
                                                                                                                initiatives
                                                                                                                stratégiques
                                                                                                                au sein de
                                                                                                                l'entreprise
                                                                                                                et de ses
                                                                                                                partenaires.
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="card border-0"
                                                                                style="margin-bottom: 30px !important;">
                                                                                <div class="card-body"
                                                                                    style="background-color: #e4e8ee54">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card border-0">
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12"
                                                                                                            id="ck2">
                                                                                                            <div class="form-control border"
                                                                                                                id="ckeditor2">
                                                                                                                <b>Mission
                                                                                                                    Principale</b>
                                                                                                                Nous
                                                                                                                recherchons
                                                                                                                un Chef de
                                                                                                                Projet IT
                                                                                                                Senior
                                                                                                                expérimenté
                                                                                                                pour piloter
                                                                                                                des projets
                                                                                                                stratégiques
                                                                                                                dans
                                                                                                                l'environnement
                                                                                                                technologique
                                                                                                                de notre
                                                                                                                client. Le
                                                                                                                candidat
                                                                                                                sélectionné
                                                                                                                sera
                                                                                                                responsable
                                                                                                                de
                                                                                                                l’élaboration,
                                                                                                                de la
                                                                                                                conception,
                                                                                                                du suivi et
                                                                                                                du pilotage
                                                                                                                de projets
                                                                                                                complexes
                                                                                                                tout en
                                                                                                                garantissant
                                                                                                                leur bonne
                                                                                                                exécution.
                                                                                                                Il sera
                                                                                                                également
                                                                                                                impliqué
                                                                                                                dans la
                                                                                                                conception
                                                                                                                des
                                                                                                                solutions
                                                                                                                Azure, la
                                                                                                                gestion des
                                                                                                                équipes
                                                                                                                techniques
                                                                                                                et le suivi
                                                                                                                de
                                                                                                                l’optimisation
                                                                                                                des
                                                                                                                ressources
                                                                                                                et des
                                                                                                                coûts.
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card border-0"
                                                                                style="margin-bottom: 30px !important;">
                                                                                <div class="card-body"
                                                                                    style="background-color: #e4e8ee54">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card border-0">
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12"
                                                                                                            id="ck3">
                                                                                                            <div class="form-control border"
                                                                                                                id="ckeditor3">
                                                                                                                <b>Responsabilités</b>
                                                                                                                <ul>
                                                                                                                    <li>
                                                                                                                        <b>Pilotage
                                                                                                                            de
                                                                                                                            projets
                                                                                                                            de
                                                                                                                            transformation
                                                                                                                            numérique
                                                                                                                            :</b>
                                                                                                                        <ul>
                                                                                                                            <li>Diriger
                                                                                                                                des
                                                                                                                                projets
                                                                                                                                de
                                                                                                                                refonte
                                                                                                                                d'infrastructures
                                                                                                                                et
                                                                                                                                de
                                                                                                                                systèmes
                                                                                                                                d'information,
                                                                                                                                y
                                                                                                                                compris
                                                                                                                                la
                                                                                                                                gestion
                                                                                                                                des
                                                                                                                                équipes,
                                                                                                                                des
                                                                                                                                plannings,
                                                                                                                                et
                                                                                                                                des
                                                                                                                                ressources.
                                                                                                                            </li>
                                                                                                                            <li>Garantir
                                                                                                                                l’alignement
                                                                                                                                des
                                                                                                                                solutions
                                                                                                                                avec
                                                                                                                                les
                                                                                                                                besoins
                                                                                                                                métiers
                                                                                                                                tout
                                                                                                                                en
                                                                                                                                respectant
                                                                                                                                les
                                                                                                                                délais
                                                                                                                                et
                                                                                                                                le
                                                                                                                                budget
                                                                                                                                des
                                                                                                                                projets.
                                                                                                                            </li>
                                                                                                                            <li>Appliquer
                                                                                                                                des
                                                                                                                                méthodologies
                                                                                                                                agiles,
                                                                                                                                comme
                                                                                                                                Scrum,
                                                                                                                                pour
                                                                                                                                optimiser
                                                                                                                                la
                                                                                                                                gestion
                                                                                                                                de
                                                                                                                                projet
                                                                                                                                et
                                                                                                                                la
                                                                                                                                collaboration
                                                                                                                                entre
                                                                                                                                les
                                                                                                                                équipes.<br>
                                                                                                                            </li>
                                                                                                                        </ul>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <b>Mise
                                                                                                                            en
                                                                                                                            œuvre
                                                                                                                            de
                                                                                                                            solutions
                                                                                                                            Cloud
                                                                                                                            (Azure)
                                                                                                                            :</b>
                                                                                                                        <ul>
                                                                                                                            <li>Concevoir
                                                                                                                                des
                                                                                                                                architectures
                                                                                                                                Azure
                                                                                                                                robustes
                                                                                                                                et
                                                                                                                                évolutives,
                                                                                                                                en
                                                                                                                                tenant
                                                                                                                                compte
                                                                                                                                des
                                                                                                                                aspects
                                                                                                                                de
                                                                                                                                sécurité,
                                                                                                                                de
                                                                                                                                performance
                                                                                                                                et
                                                                                                                                d’optimisation
                                                                                                                                des
                                                                                                                                coûts.
                                                                                                                            </li>
                                                                                                                            <li>Superviser
                                                                                                                                l'automatisation
                                                                                                                                des
                                                                                                                                processus
                                                                                                                                grâce
                                                                                                                                à
                                                                                                                                l'utilisation
                                                                                                                                d'outils
                                                                                                                                DevOps
                                                                                                                                et
                                                                                                                                d'autres
                                                                                                                                technologies
                                                                                                                                cloud
                                                                                                                                avancées.<br>
                                                                                                                            </li>
                                                                                                                        </ul>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <b>Migration
                                                                                                                            et
                                                                                                                            déploiement
                                                                                                                            d'infrastructures
                                                                                                                            cloud
                                                                                                                            :</b>
                                                                                                                        <ul>
                                                                                                                            <li>Assurer
                                                                                                                                la
                                                                                                                                migration
                                                                                                                                d’infrastructures
                                                                                                                                existantes
                                                                                                                                vers
                                                                                                                                des
                                                                                                                                solutions
                                                                                                                                Cloud
                                                                                                                                Azure,
                                                                                                                                en
                                                                                                                                mettant
                                                                                                                                l’accent
                                                                                                                                sur
                                                                                                                                la
                                                                                                                                performance,
                                                                                                                                la
                                                                                                                                sécurité
                                                                                                                                et
                                                                                                                                la
                                                                                                                                réduction
                                                                                                                                des
                                                                                                                                coûts.
                                                                                                                            </li>
                                                                                                                            <li>Mettre
                                                                                                                                en
                                                                                                                                place
                                                                                                                                des
                                                                                                                                infrastructures
                                                                                                                                haute
                                                                                                                                disponibilité
                                                                                                                                pour
                                                                                                                                des
                                                                                                                                applications
                                                                                                                                critiques.
                                                                                                                            </li>
                                                                                                                            <li>Piloter
                                                                                                                                les
                                                                                                                                tests
                                                                                                                                de
                                                                                                                                performance,
                                                                                                                                de
                                                                                                                                sécurité
                                                                                                                                et
                                                                                                                                de
                                                                                                                                résilience
                                                                                                                                des
                                                                                                                                nouvelles
                                                                                                                                infrastructures
                                                                                                                                mises
                                                                                                                                en
                                                                                                                                place.<br>
                                                                                                                            </li>
                                                                                                                        </ul>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <b>Leadership
                                                                                                                            et
                                                                                                                            coordination
                                                                                                                            des
                                                                                                                            équipes
                                                                                                                            :</b>
                                                                                                                        <ul>
                                                                                                                            <li>Diriger
                                                                                                                                des
                                                                                                                                équipes
                                                                                                                                techniques
                                                                                                                                multidisciplinaires,
                                                                                                                                y
                                                                                                                                compris
                                                                                                                                des
                                                                                                                                ingénieurs
                                                                                                                                spécialisés
                                                                                                                                dans
                                                                                                                                le
                                                                                                                                développement,
                                                                                                                                la
                                                                                                                                gestion
                                                                                                                                des
                                                                                                                                infrastructures,
                                                                                                                                la
                                                                                                                                sécurité,
                                                                                                                                et
                                                                                                                                la
                                                                                                                                performance
                                                                                                                                des
                                                                                                                                systèmes.
                                                                                                                            </li>
                                                                                                                            <li>Travailler
                                                                                                                                en
                                                                                                                                étroite
                                                                                                                                collaboration
                                                                                                                                avec
                                                                                                                                les
                                                                                                                                autres
                                                                                                                                départements
                                                                                                                                pour
                                                                                                                                garantir
                                                                                                                                une
                                                                                                                                cohérence
                                                                                                                                entre
                                                                                                                                les
                                                                                                                                besoins
                                                                                                                                métiers
                                                                                                                                et
                                                                                                                                les
                                                                                                                                solutions
                                                                                                                                techniques
                                                                                                                                proposées.
                                                                                                                            </li>
                                                                                                                        </ul>
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
                                                                            <div class="card border-0"
                                                                                style="margin-bottom: 30px !important;">
                                                                                <div class="card-body"
                                                                                    style="background-color: #e4e8ee54">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card border-0">
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12"
                                                                                                            id="ck4">
                                                                                                            <div class="form-control border"
                                                                                                                id="ckeditor4">
                                                                                                                <b>Compétences
                                                                                                                    techniques</b>
                                                                                                                <ul>
                                                                                                                    <li><b>Cloud
                                                                                                                            Computing
                                                                                                                            :</b>
                                                                                                                        Expertise
                                                                                                                        avancée
                                                                                                                        dans
                                                                                                                        la
                                                                                                                        conception
                                                                                                                        et
                                                                                                                        la
                                                                                                                        gestion
                                                                                                                        d'architectures
                                                                                                                        cloud
                                                                                                                        sur
                                                                                                                        des
                                                                                                                        plateformes
                                                                                                                        comme
                                                                                                                        Azure
                                                                                                                        (Infrastructure
                                                                                                                        as
                                                                                                                        Code,
                                                                                                                        DevOps,
                                                                                                                        migration
                                                                                                                        de
                                                                                                                        données,
                                                                                                                        gestion
                                                                                                                        de
                                                                                                                        la
                                                                                                                        sécurité
                                                                                                                        et
                                                                                                                        des
                                                                                                                        coûts).
                                                                                                                    </li>
                                                                                                                    <li><b>Développement
                                                                                                                            logiciel
                                                                                                                            :</b>
                                                                                                                        Compétences
                                                                                                                        solides
                                                                                                                        en
                                                                                                                        <b>Java</b>,
                                                                                                                        <b>C++</b>,
                                                                                                                        et
                                                                                                                        <b>PHP</b>,
                                                                                                                        avec
                                                                                                                        une
                                                                                                                        compréhension
                                                                                                                        intermédiaire
                                                                                                                        de
                                                                                                                        <b>JavaScript</b>
                                                                                                                        et
                                                                                                                        <b>Ruby</b>
                                                                                                                        pour
                                                                                                                        le
                                                                                                                        développement
                                                                                                                        de
                                                                                                                        solutions
                                                                                                                        adaptées
                                                                                                                        aux
                                                                                                                        besoins
                                                                                                                        des
                                                                                                                        clients.
                                                                                                                    </li>
                                                                                                                    <li><b>Gestion
                                                                                                                            des
                                                                                                                            systèmes
                                                                                                                            d’information
                                                                                                                            :</b>
                                                                                                                        Maîtrise
                                                                                                                        de
                                                                                                                        la
                                                                                                                        refonte
                                                                                                                        de
                                                                                                                        systèmes
                                                                                                                        d'information
                                                                                                                        complexes.
                                                                                                                    </li>
                                                                                                                    <li><b>Architecture
                                                                                                                            Cloud
                                                                                                                            :</b>Expertise
                                                                                                                        dans
                                                                                                                        la
                                                                                                                        conception
                                                                                                                        et
                                                                                                                        le
                                                                                                                        déploiement
                                                                                                                        d'architectures
                                                                                                                        haute
                                                                                                                        disponibilité
                                                                                                                        et
                                                                                                                        la
                                                                                                                        gestion
                                                                                                                        des
                                                                                                                        infrastructures
                                                                                                                        critiques
                                                                                                                        en
                                                                                                                        <b>Cloud
                                                                                                                            Azure</b>.
                                                                                                                    </li>
                                                                                                                    <li><b>Migration
                                                                                                                            Cloud
                                                                                                                            :</b>Expérience
                                                                                                                        dans
                                                                                                                        la
                                                                                                                        migration
                                                                                                                        d'architectures
                                                                                                                        complexes
                                                                                                                        vers
                                                                                                                        des
                                                                                                                        solutions
                                                                                                                        <b>Azure
                                                                                                                            Cloud</b>.
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
                                                                            <div class="card border-0"
                                                                                style="margin-bottom: 30px !important;">
                                                                                <div class="card-body"
                                                                                    style="background-color: #e4e8ee54">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card border-0">
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12"
                                                                                                            id="ck5">
                                                                                                            <div class="form-control border"
                                                                                                                id="ckeditor5">
                                                                                                                <b>Compétences
                                                                                                                    personnelles</b>
                                                                                                                <ul>
                                                                                                                    <li><b>Leadership
                                                                                                                            &
                                                                                                                            collaboration
                                                                                                                            :</b>
                                                                                                                        Capacité
                                                                                                                        à
                                                                                                                        diriger
                                                                                                                        des
                                                                                                                        équipes
                                                                                                                        de
                                                                                                                        taille
                                                                                                                        variable,
                                                                                                                        avec
                                                                                                                        un
                                                                                                                        accent
                                                                                                                        particulier
                                                                                                                        sur
                                                                                                                        la
                                                                                                                        gestion
                                                                                                                        de
                                                                                                                        projets
                                                                                                                        collaboratifs
                                                                                                                        et
                                                                                                                        la
                                                                                                                        direction
                                                                                                                        de
                                                                                                                        groupes
                                                                                                                        techniques
                                                                                                                        multidisciplinaires.
                                                                                                                    </li>
                                                                                                                    <li><b>Communication
                                                                                                                            :</b>
                                                                                                                        Excellentes
                                                                                                                        compétences
                                                                                                                        en
                                                                                                                        <b>communication</b>,
                                                                                                                        à la
                                                                                                                        fois
                                                                                                                        pour
                                                                                                                        coordonner
                                                                                                                        des
                                                                                                                        équipes
                                                                                                                        internes
                                                                                                                        et
                                                                                                                        pour
                                                                                                                        interagir
                                                                                                                        efficacement
                                                                                                                        avec
                                                                                                                        les
                                                                                                                        clients,
                                                                                                                        notamment
                                                                                                                        dans
                                                                                                                        des
                                                                                                                        environnements
                                                                                                                        interculturels.
                                                                                                                    </li>
                                                                                                                    <li><b>Adaptabilité
                                                                                                                            &
                                                                                                                            gestion
                                                                                                                            du
                                                                                                                            changement
                                                                                                                            :</b>
                                                                                                                        Capacité
                                                                                                                        à
                                                                                                                        évoluer
                                                                                                                        dans
                                                                                                                        des
                                                                                                                        environnements
                                                                                                                        technologiques
                                                                                                                        en
                                                                                                                        constante
                                                                                                                        évolution
                                                                                                                        et à
                                                                                                                        mener
                                                                                                                        des
                                                                                                                        projets
                                                                                                                        d'adaptation
                                                                                                                        et
                                                                                                                        de
                                                                                                                        transformation
                                                                                                                        digitale.
                                                                                                                    </li>
                                                                                                                    <li><b>Prise
                                                                                                                            de
                                                                                                                            décision
                                                                                                                            :</b>
                                                                                                                        Compétences
                                                                                                                        avérées
                                                                                                                        dans
                                                                                                                        la
                                                                                                                        prise
                                                                                                                        de
                                                                                                                        décisions
                                                                                                                        stratégiques,
                                                                                                                        que
                                                                                                                        ce
                                                                                                                        soit
                                                                                                                        au
                                                                                                                        niveau
                                                                                                                        de
                                                                                                                        la
                                                                                                                        gestion
                                                                                                                        des
                                                                                                                        projets
                                                                                                                        ou
                                                                                                                        de
                                                                                                                        l'optimisation
                                                                                                                        des
                                                                                                                        coûts
                                                                                                                        dans
                                                                                                                        des
                                                                                                                        projets
                                                                                                                        d'envergure.
                                                                                                                    </li>
                                                                                                                    <li><b>Gestion
                                                                                                                            de
                                                                                                                            crises
                                                                                                                            &
                                                                                                                            résolution
                                                                                                                            de
                                                                                                                            problèmes
                                                                                                                            :</b>
                                                                                                                        Forte
                                                                                                                        capacité
                                                                                                                        à
                                                                                                                        résoudre
                                                                                                                        des
                                                                                                                        crises
                                                                                                                        techniques
                                                                                                                        et à
                                                                                                                        mener
                                                                                                                        des
                                                                                                                        initiatives
                                                                                                                        de
                                                                                                                        résolution
                                                                                                                        rapide
                                                                                                                        de
                                                                                                                        problèmes
                                                                                                                        dans
                                                                                                                        des
                                                                                                                        environnements
                                                                                                                        de
                                                                                                                        production.
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
                                                                        <div class="col-6">
                                                                            <div class="card border-0"
                                                                                style="margin-bottom: 30px !important;">
                                                                                <div class="card-body"
                                                                                    style="background-color: #e4e8ee54">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card border-0">
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12"
                                                                                                            id="ck6">
                                                                                                            <div class="form-control border"
                                                                                                                id="ckeditor6">
                                                                                                                <b>Formation</b>
                                                                                                                <ul>
                                                                                                                    <li>Diplôme
                                                                                                                        d’ingénieur,
                                                                                                                        Master
                                                                                                                        en
                                                                                                                        informatique,
                                                                                                                        systèmes
                                                                                                                        d'information,
                                                                                                                        ou
                                                                                                                        dans
                                                                                                                        un
                                                                                                                        domaine
                                                                                                                        technique
                                                                                                                        pertinent.
                                                                                                                    </li>
                                                                                                                    <li>Certification(s)
                                                                                                                        en
                                                                                                                        <b>Azure
                                                                                                                            Cloud</b>,
                                                                                                                        telles
                                                                                                                        que
                                                                                                                        <b>Microsoft
                                                                                                                            Certified:
                                                                                                                            Azure
                                                                                                                            Solutions
                                                                                                                            Architect
                                                                                                                            Expert</b>
                                                                                                                        ou
                                                                                                                        équivalent.
                                                                                                                    </li>
                                                                                                                    <li>Formation
                                                                                                                        complémentaire
                                                                                                                        en
                                                                                                                        <b>gestion
                                                                                                                            de
                                                                                                                            projet
                                                                                                                            agile</b>.
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
                                                                            <div class="card border-0"
                                                                                style="margin-bottom: 30px !important;">
                                                                                <div class="card-body"
                                                                                    style="background-color: #e4e8ee54">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card border-0">
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12"
                                                                                                            id="ck7">
                                                                                                            <div class="form-control border"
                                                                                                                id="ckeditor7">
                                                                                                                <b>Expérience</b>
                                                                                                                <ul>
                                                                                                                    <li>Expérience
                                                                                                                        de
                                                                                                                        <b>5 à
                                                                                                                            10
                                                                                                                            ans</b>
                                                                                                                        en
                                                                                                                        gestion
                                                                                                                        de
                                                                                                                        projets
                                                                                                                        IT
                                                                                                                        complexes,
                                                                                                                        avec
                                                                                                                        une
                                                                                                                        forte
                                                                                                                        composante
                                                                                                                        en
                                                                                                                        <b>Cloud
                                                                                                                            Computing</b>
                                                                                                                        et
                                                                                                                        <b>migration
                                                                                                                            vers
                                                                                                                            des
                                                                                                                            infrastructures
                                                                                                                            cloud</b>.
                                                                                                                    </li>
                                                                                                                    <li><b>3 à
                                                                                                                            5
                                                                                                                            ans
                                                                                                                            d'expérience</b>
                                                                                                                        en
                                                                                                                        tant
                                                                                                                        qu'<b>Architecte
                                                                                                                            Cloud
                                                                                                                            Azure</b>,
                                                                                                                        avec
                                                                                                                        une
                                                                                                                        solide
                                                                                                                        maîtrise
                                                                                                                        de
                                                                                                                        l'architecture
                                                                                                                        des
                                                                                                                        solutions
                                                                                                                        Cloud,
                                                                                                                        de
                                                                                                                        l'automatisation
                                                                                                                        des
                                                                                                                        infrastructures
                                                                                                                        (IaC),
                                                                                                                        et
                                                                                                                        de
                                                                                                                        la
                                                                                                                        gestion
                                                                                                                        de
                                                                                                                        projets
                                                                                                                        de
                                                                                                                        migration
                                                                                                                        cloud.
                                                                                                                    </li>
                                                                                                                    <li>Expérience
                                                                                                                        confirmée
                                                                                                                        en
                                                                                                                        <b>gestion
                                                                                                                            d'équipes
                                                                                                                            techniques</b>
                                                                                                                        (développement,
                                                                                                                        infrastructure)
                                                                                                                        et
                                                                                                                        en
                                                                                                                        <b>supervision
                                                                                                                            de
                                                                                                                            projets
                                                                                                                            multidisciplinaires</b>
                                                                                                                        dans
                                                                                                                        des
                                                                                                                        environnements
                                                                                                                        complexes.
                                                                                                                    </li>
                                                                                                                    <li>Expertise
                                                                                                                        démontrée
                                                                                                                        dans
                                                                                                                        <b>la
                                                                                                                            refonte
                                                                                                                            de
                                                                                                                            systèmes
                                                                                                                            d’information</b>
                                                                                                                        (SI)
                                                                                                                        dans
                                                                                                                        des
                                                                                                                        secteurs
                                                                                                                        exigeants
                                                                                                                        tels
                                                                                                                        que
                                                                                                                        la
                                                                                                                        <b>banque</b>,
                                                                                                                        la
                                                                                                                        <b>monétique</b>,
                                                                                                                        ou
                                                                                                                        les
                                                                                                                        <b>services
                                                                                                                            financiers</b>.
                                                                                                                    </li>
                                                                                                                    <li>Expérience
                                                                                                                        en
                                                                                                                        <b>développement
                                                                                                                            agile</b>
                                                                                                                        et
                                                                                                                        utilisation
                                                                                                                        de
                                                                                                                        méthodes
                                                                                                                        <b>Scrum</b>
                                                                                                                        pour
                                                                                                                        le
                                                                                                                        suivi
                                                                                                                        et
                                                                                                                        la
                                                                                                                        gestion
                                                                                                                        des
                                                                                                                        projets.
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
                                                                            <div class="row"
                                                                                style="margin-bottom: 30px !important;">
                                                                                <div class="col-12">
                                                                                    <div class="card border-0">
                                                                                        <div class="card-body"
                                                                                            style="background-color: #e4e8ee54">
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <div
                                                                                                        class="card border-0">
                                                                                                        <div
                                                                                                            class="card-body">
                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-12">
                                                                                                                    <div
                                                                                                                        class="row mb-4">
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <h6
                                                                                                                                class="title custom-title">
                                                                                                                                Compétences
                                                                                                                                Linguistiques
                                                                                                                            </h6>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="row mb-4">
                                                                                                                        <div class="col-4 col-md-4"
                                                                                                                            style="width: 24%;">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div
                                                                                                                                    class="col-12 col-md-12 mb-2">
                                                                                                                                    <div
                                                                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        Anglais
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        value="">
                                                                                                                                                        Allemand
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Arabe
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Chinois
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Espagnol
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        selected>
                                                                                                                                                        Français
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Italien
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Japonais
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Portugais
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
                                                                                                                        <div class="col-8"
                                                                                                                            style="width: 76%">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 52%;">
                                                                                                                                    <div
                                                                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                                        <div
                                                                                                                                            class="input-group input-group-lg">
                                                                                                                                            <div
                                                                                                                                                class="form-floating">
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    placeholder="Compétence"
                                                                                                                                                    value="Compréhension orale"
                                                                                                                                                    required=""
                                                                                                                                                    class="form-control border-start-0">
                                                                                                                                                <label>Compétence</label>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 44%;padding-right: 0;">
                                                                                                                                    <div
                                                                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        A1
                                                                                                                                                        :
                                                                                                                                                        Débutant
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        A2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        bas
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B1
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        selected>
                                                                                                                                                        C1
                                                                                                                                                        :
                                                                                                                                                        Avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C2
                                                                                                                                                        :
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
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 52%;">
                                                                                                                                    <div
                                                                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                                        <div
                                                                                                                                            class="input-group input-group-lg">
                                                                                                                                            <div
                                                                                                                                                class="form-floating">
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    placeholder="Compétence"
                                                                                                                                                    value="Expression orale"
                                                                                                                                                    required=""
                                                                                                                                                    class="form-control border-start-0">
                                                                                                                                                <label>Compétence</label>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                </div>
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 44%;padding-right: 0;">
                                                                                                                                    <div
                                                                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        A1
                                                                                                                                                        :
                                                                                                                                                        Débutant
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        A2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        bas
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B1
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C1
                                                                                                                                                        :
                                                                                                                                                        Avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        selected>
                                                                                                                                                        C2
                                                                                                                                                        :
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
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 52%;">
                                                                                                                                    <div
                                                                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                                        <div
                                                                                                                                            class="input-group input-group-lg">
                                                                                                                                            <div
                                                                                                                                                class="form-floating">
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    placeholder="Compétence"
                                                                                                                                                    value="Compréhension écrite"
                                                                                                                                                    required=""
                                                                                                                                                    class="form-control border-start-0">
                                                                                                                                                <label>Compétence</label>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 44%;padding-right: 0;">
                                                                                                                                    <div
                                                                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        A1
                                                                                                                                                        :
                                                                                                                                                        Débutant
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        A2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        bas
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B1
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        selected>
                                                                                                                                                        B2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C1
                                                                                                                                                        :
                                                                                                                                                        Avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C2
                                                                                                                                                        :
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
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 52%;">
                                                                                                                                    <div
                                                                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                                        <div
                                                                                                                                            class="input-group input-group-lg">
                                                                                                                                            <div
                                                                                                                                                class="form-floating">
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    placeholder="Compétence"
                                                                                                                                                    value="Expression écrite"
                                                                                                                                                    required=""
                                                                                                                                                    class="form-control border-start-0">
                                                                                                                                                <label>Compétence</label>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 44%;padding-right: 0;">
                                                                                                                                    <div
                                                                                                                                        class="form-group position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        A1
                                                                                                                                                        :
                                                                                                                                                        Débutant
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        A2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        bas
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B1
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        selected>
                                                                                                                                                        C1
                                                                                                                                                        :
                                                                                                                                                        Avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C2
                                                                                                                                                        :
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
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div class="col-4 col-md-4"
                                                                                                                            style="width: 24%;">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div
                                                                                                                                    class="col-12 col-md-12 mb-2">
                                                                                                                                    <div
                                                                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        selected>
                                                                                                                                                        Anglais
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        value="">
                                                                                                                                                        Allemand
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Arabe
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Chinois
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Espagnol
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Français
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Italien
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Japonais
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        Portugais
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
                                                                                                                        <div class="col-8"
                                                                                                                            style="width: 76%">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 52%;">
                                                                                                                                    <div
                                                                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                                        <div
                                                                                                                                            class="input-group input-group-lg">
                                                                                                                                            <div
                                                                                                                                                class="form-floating">
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    placeholder="Compétence"
                                                                                                                                                    value="Compréhension orale"
                                                                                                                                                    required=""
                                                                                                                                                    class="form-control border-start-0">
                                                                                                                                                <label>Compétence</label>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 44%;padding-right: 0;">
                                                                                                                                    <div
                                                                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        A1
                                                                                                                                                        :
                                                                                                                                                        Débutant
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        A2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        bas
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B1
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        selected>
                                                                                                                                                        B2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C1
                                                                                                                                                        :
                                                                                                                                                        Avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C2
                                                                                                                                                        :
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
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 52%;">
                                                                                                                                    <div
                                                                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                                        <div
                                                                                                                                            class="input-group input-group-lg">
                                                                                                                                            <div
                                                                                                                                                class="form-floating">
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    placeholder="Compétence"
                                                                                                                                                    value="Expression orale"
                                                                                                                                                    required=""
                                                                                                                                                    class="form-control border-start-0">
                                                                                                                                                <label>Compétence</label>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>

                                                                                                                                </div>
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 44%;padding-right: 0;">
                                                                                                                                    <div
                                                                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        A1
                                                                                                                                                        :
                                                                                                                                                        Débutant
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        A2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        bas
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        selected>
                                                                                                                                                        B1
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C1
                                                                                                                                                        :
                                                                                                                                                        Avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C2
                                                                                                                                                        :
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
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 52%;">
                                                                                                                                    <div
                                                                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                                        <div
                                                                                                                                            class="input-group input-group-lg">
                                                                                                                                            <div
                                                                                                                                                class="form-floating">
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    placeholder="Compétence"
                                                                                                                                                    value="Compréhension écrite"
                                                                                                                                                    required=""
                                                                                                                                                    class="form-control border-start-0">
                                                                                                                                                <label>Compétence</label>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 44%;padding-right: 0;">
                                                                                                                                    <div
                                                                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        A1
                                                                                                                                                        :
                                                                                                                                                        Débutant
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        A2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        bas
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B1
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        selected>
                                                                                                                                                        B2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C1
                                                                                                                                                        :
                                                                                                                                                        Avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C2
                                                                                                                                                        :
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
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 52%;">
                                                                                                                                    <div
                                                                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                                                                        <div
                                                                                                                                            class="input-group input-group-lg">
                                                                                                                                            <div
                                                                                                                                                class="form-floating">
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    placeholder="Compétence"
                                                                                                                                                    value="Expression écrite"
                                                                                                                                                    required=""
                                                                                                                                                    class="form-control border-start-0">
                                                                                                                                                <label>Compétence</label>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                                                                    style="width: 44%;padding-right: 0;">
                                                                                                                                    <div
                                                                                                                                        class="form-group position-relative is-valid check-valid is-valid">
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
                                                                                                                                                        A1
                                                                                                                                                        :
                                                                                                                                                        Débutant
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        A2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        bas
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B1
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        B2
                                                                                                                                                        :
                                                                                                                                                        Intermédiaire
                                                                                                                                                        avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        selected>
                                                                                                                                                        C1
                                                                                                                                                        :
                                                                                                                                                        Avancé
                                                                                                                                                    </option>
                                                                                                                                                    <option>
                                                                                                                                                        C2
                                                                                                                                                        :
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
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-12">
                                                                                    <div class="card border-0"
                                                                                        style="background-color: #e4e8ee54;">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <div
                                                                                                        class="card border-0">
                                                                                                        <div
                                                                                                            class="card-body">
                                                                                                            <div
                                                                                                                class="row justify-content-center">
                                                                                                                <h6 class="title mb-5 custom-title"
                                                                                                                    style="width: 98%;margin-left: 20px;">
                                                                                                                    Mobilité
                                                                                                                </h6>
                                                                                                                <div class="col-12 col-md-4 mt-2 mb-2"
                                                                                                                    style="width: 35%">

                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-auto">
                                                                                                                            <div
                                                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                                <div class="input-group input-group-lg"
                                                                                                                                    style="padding: 10px 26px;background-color: #e3e7f1;">
                                                                                                                                    <label>Mobilité
                                                                                                                                        géographique</label>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
                                                                                                                                        <input
                                                                                                                                            class="form-check-input"
                                                                                                                                            type="checkbox"
                                                                                                                                            role="switch"
                                                                                                                                            id="savecard"
                                                                                                                                            checked>
                                                                                                                                        <label
                                                                                                                                            class="form-check-label"
                                                                                                                                            for="savecard">Locale</label>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
                                                                                                                                        <input
                                                                                                                                            class="form-check-input"
                                                                                                                                            type="checkbox"
                                                                                                                                            role="switch"
                                                                                                                                            id="savecard"
                                                                                                                                            checked>
                                                                                                                                        <label
                                                                                                                                            class="form-check-label"
                                                                                                                                            for="savecard">Régionale</label>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
                                                                                                                                        <input
                                                                                                                                            class="form-check-input"
                                                                                                                                            type="checkbox"
                                                                                                                                            role="switch"
                                                                                                                                            id="savecard"
                                                                                                                                            checked>
                                                                                                                                        <label
                                                                                                                                            class="form-check-label"
                                                                                                                                            for="savecard">Nationale</label>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
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

                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-1">
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-12 col-md-4 mt-2 mb-2">
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-auto">

                                                                                                                            <div
                                                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                                <div class="input-group input-group-lg"
                                                                                                                                    style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                                                                                                    <label>Mode
                                                                                                                                        de
                                                                                                                                        travail</label>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
                                                                                                                                        <input
                                                                                                                                            class="form-check-input"
                                                                                                                                            type="checkbox"
                                                                                                                                            role="switch"
                                                                                                                                            id="savecard"
                                                                                                                                            checked>
                                                                                                                                        <label
                                                                                                                                            class="form-check-label"
                                                                                                                                            for="savecard">Présentiel</label>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
                                                                                                                                        <input
                                                                                                                                            class="form-check-input"
                                                                                                                                            type="checkbox"
                                                                                                                                            role="switch"
                                                                                                                                            id="savecard"
                                                                                                                                            checked>
                                                                                                                                        <label
                                                                                                                                            class="form-check-label"
                                                                                                                                            for="savecard">Distanciel</label>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
                                                                                                                                        <input
                                                                                                                                            class="form-check-input"
                                                                                                                                            type="checkbox"
                                                                                                                                            role="switch"
                                                                                                                                            id="savecard"
                                                                                                                                            checked>
                                                                                                                                        <label
                                                                                                                                            class="form-check-label"
                                                                                                                                            for="savecard">Hybride</label>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="row mt-5 justify-content-center">
                                                                                                                <div class="col-12 col-md-6 mb-2"
                                                                                                                    style="width: 34.8%;">
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-auto">
                                                                                                                            <div
                                                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                                <div class="input-group input-group-lg"
                                                                                                                                    style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                                                                                                    <label>Temps
                                                                                                                                        de
                                                                                                                                        travail</label>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
                                                                                                                                        <input
                                                                                                                                            class="form-check-input"
                                                                                                                                            type="checkbox"
                                                                                                                                            role="switch"
                                                                                                                                            id="savecard"
                                                                                                                                            checked>
                                                                                                                                        <label
                                                                                                                                            class="form-check-label"
                                                                                                                                            for="savecard">Plein</label>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
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
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-12 col-md-6 mb-2"
                                                                                                                    style="width: 33%;margin-left: 60px;">
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-auto">
                                                                                                                            <div
                                                                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                                <div class="input-group input-group-lg"
                                                                                                                                    style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                                                                                                    <label>Disponibilité</label>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col"
                                                                                                                            style="margin-top: 0px;">
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
                                                                                                                                        <input
                                                                                                                                            class="form-check-input"
                                                                                                                                            type="checkbox"
                                                                                                                                            role="switch"
                                                                                                                                            id="savecard"
                                                                                                                                            checked>
                                                                                                                                        <label
                                                                                                                                            class="form-check-label"
                                                                                                                                            for="savecard">Immédiate</label>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="row">
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 64%;">
                                                                                                                                    <div
                                                                                                                                        class="form-check form-switch">
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
                                                                                                                                <div class="col-2"
                                                                                                                                    style="width: 17%;margin-top: -4px;position: absolute;right: 93px;">
                                                                                                                                    <div
                                                                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                                        <select
                                                                                                                                            class="form-select border-0"
                                                                                                                                            id="country1"
                                                                                                                                            required=""
                                                                                                                                            style="font-size: 13px">
                                                                                                                                            <option
                                                                                                                                                selected="">
                                                                                                                                                1
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                2
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                3
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                4
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                5
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                6
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                7
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                8
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                9
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                10
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                11
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                            <option>
                                                                                                                                                12
                                                                                                                                                mois
                                                                                                                                            </option>
                                                                                                                                        </select>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="row mb-4 mt-5 justify-content-center">
                                                                                                                <div class="col-6 col-md-6 mt-3"
                                                                                                                    style="width: 26.8%">
                                                                                                                    <div
                                                                                                                        class="row justify-content-center">
                                                                                                                        <div
                                                                                                                            class="col-12">
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
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="col-6 col-md-6 mt-3"
                                                                                                                    style="width: 28.8%">
                                                                                                                    <div
                                                                                                                        class="row ">
                                                                                                                        <div
                                                                                                                            class="col-12">
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
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Transactions -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="personal2" role="tabpanel" aria-labelledby="personal2-tab">
                            <div class="row justify-content-center mb-4 ">
                                <div class="col-6">
                                    <div class="card border-0">
                                        <div class="card-body" style="background-color: #e4e8ee54">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row justify-content-center"
                                                                style="padding: 12px 30px;">
                                                                <h5 class="title mb-3 custom-title">Formation</h5>
                                                            </div>
                                                            <div class="row justify-content-center mb-3">
                                                                <div class="col-auto" style="width: 74%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder=""
                                                                                    value="Diplôme d’ingénieur ou Master en informatique"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Formation</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 col-md-4 mb-2" style="width: 18%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input style="text-align: center"
                                                                                    type="text" placeholder=""
                                                                                    value="50" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>% Tolérance</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center mb-3">
                                                                <div class="col-auto" style="width: 74%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder=""
                                                                                    value="Certification en Azure Cloud"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Certification</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 col-md-4 mb-2" style="width: 18%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input style="text-align: center"
                                                                                    type="text" placeholder=""
                                                                                    value="50" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>% Tolérance</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center">
                                                                <div class="col-auto" style="width: 74%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder=""
                                                                                    value="Gestion de projet agile"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Formation complémentaire</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 col-md-4 mb-2" style="width: 18%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input style="text-align: center"
                                                                                    type="text" placeholder=""
                                                                                    value="50" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>% Tolérance</label>
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
                                <div class="col-6">
                                    <div class="card border-0">
                                        <div class="card-body" style="background-color: #e4e8ee54">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row justify-content-center"
                                                                style="padding: 12px 30px;">
                                                                <h5 class="title mb-3 custom-title">Expérience</h5>
                                                            </div>
                                                            <div class="row justify-content-center mb-3">
                                                                <div class="col-auto" style="width: 74%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder=""
                                                                                    value="5 à 10 ans en gestion de projets IT"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Expérience</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 col-md-4 mb-2" style="width: 18%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input style="text-align: center"
                                                                                    type="text" placeholder=""
                                                                                    value="15" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>% Tolérance</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center mb-3">
                                                                <div class="col-auto" style="width: 74%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder=""
                                                                                    value="3 à 5 ans d'expérience en tant qu'Architecte Cloud Azure"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Expérience</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 col-md-4 mb-2" style="width: 18%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input style="text-align: center"
                                                                                    type="text" placeholder=""
                                                                                    value="20" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>% Tolérance</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center">
                                                                <div class="col-auto" style="width: 74%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder=""
                                                                                    value="3 à 5 ans en gestion d'équipes techniques"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Expérience</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 col-md-4 mb-2" style="width: 18%;">
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input style="text-align: center"
                                                                                    type="text" placeholder=""
                                                                                    value="40" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>% Tolérance</label>
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
                            <div class="row justify-content-center mb-4 ">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body" style="background-color: #e4e8ee54">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row justify-content-center"
                                                                style="padding: 12px 30px;">
                                                                <h5 class="title mb-5 custom-title">Compétences techniques
                                                                </h5>
                                                                <div class="col-10 mb-4" style="">
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 36%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            placeholder="Catégorie"
                                                                                            value="Développement informatique"
                                                                                            required=""
                                                                                            class="form-control border-start-0">
                                                                                        <label>Catégorie</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 36%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            placeholder="Détail"
                                                                                            value="Cloud Computing"
                                                                                            required=""
                                                                                            class="form-control border-start-0">
                                                                                        <label>Détail</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 15%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">
                                                                                                Débutant</option>
                                                                                            <option>Intermédiaire</option>
                                                                                            <option selected>Avancé</option>
                                                                                            <option>Expert</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option>4</option>
                                                                                            <option selected>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-10 mb-4" style="">
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 36%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            placeholder="Catégorie"
                                                                                            value="Développement informatique"
                                                                                            required=""
                                                                                            class="form-control border-start-0">
                                                                                        <label>Catégorie</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 36%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 15%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">
                                                                                                Débutant</option>
                                                                                            <option>Intermédiaire</option>
                                                                                            <option selected>Avancé</option>
                                                                                            <option>Expert</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option selected>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-10 mb-4" style="">
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 36%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            placeholder="Catégorie"
                                                                                            value="Développement informatique"
                                                                                            required=""
                                                                                            class="form-control border-start-0">
                                                                                        <label>Catégorie</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 36%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 15%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">
                                                                                                Débutant</option>
                                                                                            <option>Intermédiaire</option>
                                                                                            <option selected>Avancé</option>
                                                                                            <option>Expert</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option selected>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-10 mb-4" style="">
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 36%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            placeholder="Catégorie"
                                                                                            value="Développement informatique"
                                                                                            required=""
                                                                                            class="form-control border-start-0">
                                                                                        <label>Catégorie</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 36%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 15%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">
                                                                                                Débutant</option>
                                                                                            <option>Intermédiaire</option>
                                                                                            <option selected>Avancé</option>
                                                                                            <option>Expert</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option>4</option>
                                                                                            <option selected>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
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
                            <div class="row justify-content-center mb-4 py-2">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body" style="background-color: #e4e8ee54">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row justify-content-center"
                                                                style="padding: 12px 30px;">
                                                                <h5 class="title mb-5 custom-title">Compétences
                                                                    personnelles</h5>
                                                                <div class="col-10" style="">
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="communication" required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire"
                                                                                                selected>Intermédiaire
                                                                                            </option>
                                                                                            <option value="Avancé">Avancé
                                                                                            </option>
                                                                                            <option value="Expert">Expert
                                                                                            </option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option selected>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="collaboration" required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire">
                                                                                                Intermédiaire</option>
                                                                                            <option value="Avancé"
                                                                                                selected>Avancé</option>
                                                                                            <option value="Expert">Expert
                                                                                            </option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option>4</option>
                                                                                            <option selected>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="adaptabilit" required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire">
                                                                                                Intermédiaire</option>
                                                                                            <option value="Avancé">Avancé
                                                                                            </option>
                                                                                            <option value="Expert"
                                                                                                selected>Expert</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option selected>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="prise" required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire">
                                                                                                Intermédiaire</option>
                                                                                            <option value="Avancé"
                                                                                                selected>Avancé</option>
                                                                                            <option value="Expert">Expert
                                                                                            </option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option selected>3</option>
                                                                                            <option>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="temps" required>
                                                                                            <option
                                                                                                value="Débutant"selected>
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire">
                                                                                                Intermédiaire</option>
                                                                                            <option value="Avancé">Avancé
                                                                                            </option>
                                                                                            <option value="Expert">Expert
                                                                                            </option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option selected>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="leadership" required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire">
                                                                                                Intermédiaire</option>
                                                                                            <option value="Avancé"
                                                                                                selected>Avancé</option>
                                                                                            <option value="Expert">Expert
                                                                                            </option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option>4</option>
                                                                                            <option selected>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="problemes" required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire">
                                                                                                Intermédiaire</option>
                                                                                            <option value="Avancé">Avancé
                                                                                            </option>
                                                                                            <option value="Expert"
                                                                                                selected>Expert</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option selected>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="analyse" required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire"
                                                                                                selected>Intermédiaire
                                                                                            </option>
                                                                                            <option value="Avancé">Avancé
                                                                                            </option>
                                                                                            <option value="Expert">Expert
                                                                                            </option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option selected>3</option>
                                                                                            <option>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="innovation" required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire">
                                                                                                Intermédiaire</option>
                                                                                            <option value="Avancé"
                                                                                                selected>Avancé</option>
                                                                                            <option value="Expert">Expert
                                                                                            </option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option selected>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="ethique" required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire">
                                                                                                Intermédiaire</option>
                                                                                            <option value="Avancé">Avancé
                                                                                            </option>
                                                                                            <option value="Expert"
                                                                                                selected>Expert</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option selected>3</option>
                                                                                            <option>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="padding-left: 21px;">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 28%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                            style="width: 39%;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
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
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="interculturelles"
                                                                                            required>
                                                                                            <option value="Débutant">
                                                                                                Débutant</option>
                                                                                            <option value="Intermédiaire">
                                                                                                Intermédiaire</option>
                                                                                            <option value="Avancé"
                                                                                                selected>Avancé</option>
                                                                                            <option value="Expert">Expert
                                                                                            </option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Niveau</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 12%;padding-right: 0;">
                                                                            <div
                                                                                class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1M" required>
                                                                                            <option value="">1
                                                                                            </option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option>4</option>
                                                                                            <option selected>5</option>
                                                                                        </select>
                                                                                        <label
                                                                                            for="country1">Echelle</label>
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
                            <div class="row justify-content-center mb-4">
                                <div class="col-12">
                                    <div class="card border-0 mb-3" style="background-color: #e4e8ee54">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row justify-content-center"
                                                                style="padding: 30px">
                                                                <h5 class="title mb-5 custom-title">Compétences
                                                                    Linguistiques</h5>
                                                                <div class="col-10">
                                                                    <div class="row mb-4">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 24%;">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">
                                                                                                        Anglais</option>
                                                                                                    <option
                                                                                                        value="">
                                                                                                        Allemand</option>
                                                                                                    <option>Arabe</option>
                                                                                                    <option>Chinois</option>
                                                                                                    <option>Espagnol
                                                                                                    </option>
                                                                                                    <option selected>
                                                                                                        Français</option>
                                                                                                    <option>Italien</option>
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
                                                                        <div class="col-8" style="width: 76%">
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option>4</option>
                                                                                                    <option selected>5
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option selected>3
                                                                                                    </option>
                                                                                                    <option>4</option>
                                                                                                    <option>5</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option>4</option>
                                                                                                    <option selected>5
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option selected>4
                                                                                                    </option>
                                                                                                    <option>5</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">

                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option>4</option>
                                                                                                    <option selected>5
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">

                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option selected>4
                                                                                                    </option>
                                                                                                    <option>5</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-4 col-md-4 mb-2"
                                                                            style="width: 24%;">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option value=""
                                                                                                        selected>Anglais
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="">
                                                                                                        Allemand</option>
                                                                                                    <option>Arabe</option>
                                                                                                    <option>Chinois</option>
                                                                                                    <option>Espagnol
                                                                                                    </option>
                                                                                                    <option>Français
                                                                                                    </option>
                                                                                                    <option>Italien</option>
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
                                                                        <div class="col-8" style="width: 76%">
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option>4</option>
                                                                                                    <option selected>5
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option selected>4
                                                                                                    </option>
                                                                                                    <option>5</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option>4</option>
                                                                                                    <option selected>5
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option selected>4
                                                                                                    </option>
                                                                                                    <option>5</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">

                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                    <option>4</option>
                                                                                                    <option selected>5
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 52%;">

                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
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
                                                                                <div class="col-4 col-md-4 mb-3"
                                                                                    style="width: 28%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group  position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">A1
                                                                                                        : Débutant</option>
                                                                                                    <option>A2 :
                                                                                                        Intermédiaire bas
                                                                                                    </option>
                                                                                                    <option selected>B1 :
                                                                                                        Intermédiaire
                                                                                                    </option>
                                                                                                    <option>B2 :
                                                                                                        Intermédiaire avancé
                                                                                                    </option>
                                                                                                    <option>C1 : Avancé
                                                                                                    </option>
                                                                                                    <option>C2 : Maîtrise
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Niveau</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 col-md-4 mb-2"
                                                                                    style="width: 12%;padding-right: 0;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative is-valid check-valid is-valid">
                                                                                        <div
                                                                                            class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <select
                                                                                                    class="form-select border-0"
                                                                                                    id="country1M"
                                                                                                    required>
                                                                                                    <option
                                                                                                        value="">1
                                                                                                    </option>
                                                                                                    <option>2</option>
                                                                                                    <option selected>3
                                                                                                    </option>
                                                                                                    <option>4</option>
                                                                                                    <option>5</option>
                                                                                                </select>
                                                                                                <label
                                                                                                    for="country1">Echelle</label>
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
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card border-0" style="background-color: #e4e8ee54;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row justify-content-center">
                                                                <h5 class="title mb-5 custom-title"
                                                                    style="width: 98%;margin-left: 20px;">Mobilité</h5>
                                                                <div class="col-12 col-md-4 mt-2 mb-2"
                                                                    style="width: 35%">

                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <div class="input-group input-group-lg"
                                                                                    style="padding: 10px 26px;background-color: #e3e7f1;">
                                                                                    <label>Mobilité géographique</label>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col" style="margin-top: -20px;">
                                                                            <div class="row">
                                                                                <div class="col-12"
                                                                                    style="text-align: right;margin-bottom: 10px;font-size: 12px;color: #706f6f;">
                                                                                    <span
                                                                                        style="margin-right: 44px">Echelle</span>
                                                                                </div>
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Locale</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 34%;margin-top: -4px">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating"
                                                                                                style="">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="75"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                                            </div>
                                                                                            <span
                                                                                                class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                                                    class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Régionale</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 34%;margin-top: -4px">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating"
                                                                                                style="">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="10"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                                            </div>
                                                                                            <span
                                                                                                class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                                                    class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Nationale</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 34%;margin-top: -4px">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating"
                                                                                                style="">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="5"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                                            </div>
                                                                                            <span
                                                                                                class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                                                    class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard">
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Internationale</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 34%;margin-top: -4px">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating"
                                                                                                style="">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="0"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                                            </div>
                                                                                            <span
                                                                                                class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                                                    class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-1"></div>
                                                                <div class="col-12 col-md-4 mt-2 mb-2">
                                                                    <div class="row">
                                                                        <div class="col-auto">

                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <div class="input-group input-group-lg"
                                                                                    style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                                                    <label>Mode de travail</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col" style="margin-top: -20px;">
                                                                            <div class="row">
                                                                                <div class="col-12"
                                                                                    style="text-align: right;margin-bottom: 10px;font-size: 12px;color: #706f6f;">
                                                                                    <span
                                                                                        style="margin-right: 35px">Echelle</span>
                                                                                </div>
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Présentiel</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 34%;margin-top: -4px">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating"
                                                                                                style="">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="75"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                                            </div>
                                                                                            <span
                                                                                                class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                                                    class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Distanciel</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 34%;margin-top: -4px">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating"
                                                                                                style="">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="15"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                                            </div>
                                                                                            <span
                                                                                                class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                                                    class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Hybride</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 34%;margin-top: -4px">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating"
                                                                                                style="">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="10"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                                            </div>
                                                                                            <span
                                                                                                class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                                                    class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-5 justify-content-center">
                                                                <div class="col-12 col-md-6 mb-2" style="width: 34.8%;">
                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <div class="input-group input-group-lg"
                                                                                    style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                                                    <label>Temps de travail</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col" style="margin-top: -20px;">
                                                                            <div class="row">
                                                                                <div class="col-12"
                                                                                    style="text-align: right;margin-bottom: 10px;font-size: 12px;color: #706f6f;">
                                                                                    <span
                                                                                        style="margin-right: 43px">Echelle</span>
                                                                                </div>
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Plein</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 34%;margin-top: -4px">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating"
                                                                                                style="">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="100"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                                            </div>
                                                                                            <span
                                                                                                class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                                                    class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard">
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Partiel</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 34%;margin-top: -4px">
                                                                                    <div class="form-group mb-3 position-relative check-valid"
                                                                                        style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                                                        <div class="input-group input-group-lg"
                                                                                            style="width: 56px;">
                                                                                            <div class="form-floating"
                                                                                                style="">
                                                                                                <input type="text"
                                                                                                    placeholder=""
                                                                                                    value="0"
                                                                                                    required=""
                                                                                                    class="form-control border-start-0"
                                                                                                    style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                                            </div>
                                                                                            <span
                                                                                                class="input-group-text text-theme border-end-0"
                                                                                                style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                                                    class="bi bi-">%</i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 mb-2"
                                                                    style="width: 33%;margin-left: 124px;">
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
                                                                        <div class="col" style="margin-top: 0px;">
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Immédiate</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-2" style="width: 64%;">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            role="switch"
                                                                                            id="savecard">
                                                                                        <label class="form-check-label"
                                                                                            for="savecard">Préavis</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2"
                                                                                    style="width: 9%;margin-top: -4px;position: absolute;right: 207px;">
                                                                                    <div
                                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="country1"
                                                                                            required=""
                                                                                            style="font-size: 13px">
                                                                                            <option selected="">1 mois
                                                                                            </option>
                                                                                            <option>2 mois</option>
                                                                                            <option>3 mois</option>
                                                                                            <option>4 mois</option>
                                                                                            <option>5 mois</option>
                                                                                            <option>6 mois</option>
                                                                                            <option>7 mois</option>
                                                                                            <option>8 mois</option>
                                                                                            <option>9 mois</option>
                                                                                            <option>10 mois</option>
                                                                                            <option>11 mois</option>
                                                                                            <option>12 mois</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row mb-4 justify-content-center">
                                                                <div class="col-6 col-md-6 mt-3" style="width: 15.8%">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12">
                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            id="permis">
                                                                                            <option selected>Oui</option>
                                                                                            <option value="">Non
                                                                                            </option>
                                                                                        </select>
                                                                                        <label for="country1">Permis de
                                                                                            conduire</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6 col-md-6 mt-3" style="width: 15.8%">
                                                                    <div class="row ">
                                                                        <div class="col-12">
                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <div class="input-group input-group-lg"
                                                                                    style="padding: 16px 15px 6px;background-color: #e3e7f1;">
                                                                                    <div class="form-floating">
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
                                                                                                    de permis</label>
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
                                                                                                            Permis A
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
                                                                                                            Permis A1
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
                                                                                                            Permis AM
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
                                                                                                            Permis B
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
                                                                                                            Permis C
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
                                                                                                            Permis D
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
                                                                                                            Permis EB
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
                                                                                                            Permis EC
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
                                                                                                            Permis ED
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('js_footer')
    <script>
        'use strict'
        $(window).on('load', function() {
            /* ck editor 1*/
            ClassicEditor
                .create(document.querySelector('#ckeditor'), {
                    language: 'fr'
                })
                .catch(error => {
                    console.error(error);
                });
            /* ck editor 2*/
            ClassicEditor
                .create(document.querySelector('#ckeditor2'), {
                    language: 'fr'
                })
                .catch(error => {
                    console.error(error);
                });
            /* ck editor 3*/
            ClassicEditor
                .create(document.querySelector('#ckeditor3'), {
                    language: 'fr'
                })
                .catch(error => {
                    console.error(error);
                });
            /* ck editor 4*/
            ClassicEditor
                .create(document.querySelector('#ckeditor4'), {
                    language: 'fr'
                })
                .catch(error => {
                    console.error(error);
                });
            /* ck editor 5*/
            ClassicEditor
                .create(document.querySelector('#ckeditor5'), {
                    language: 'fr'
                })
                .catch(error => {
                    console.error(error);
                });
            /* ck editor 6*/
            ClassicEditor
                .create(document.querySelector('#ckeditor6'), {
                    language: 'fr'
                })
                .catch(error => {
                    console.error(error);
                });
            /* ck editor 7*/
            ClassicEditor
                .create(document.querySelector('#ckeditor7'), {
                    language: 'fr'
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
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
            margin-right: 8px
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

        .poste-chosen ul li {
            font-size: 13px !important;
        }

        #country-selector ul li img {
            width: 30px !important;
            margin-right: 5px;
            height: 21px !important;
            border: 1px solid #999696 !important;
        }

        #country-selector .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector .chosen-single span {
            float: left
        }

        .poste-chosen .chosen-single span {
            font-size: 14px !important;
        }

        .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
            max-height: 276px !important;
            padding: 0 22px;
        }

        #ck2 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
            max-height: 236px !important;
            height: 235px !important;
        }

        #ck2 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline>ul {
            margin-top: 22px !important;
        }

        #ck3 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
            max-height: 711px !important;
            height: 708px !important;
        }

        #ck3 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline>ul {
            margin-top: 22px !important;
        }

        #ck4 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
            max-height: 366px !important;
            height: 366px !important;
        }

        #ck4 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline>ul {
            margin-top: 22px !important;
        }

        #ck5 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
            max-height: 789px !important;
            height: 430px !important;
        }

        #ck5 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline>ul {
            margin-top: 22px !important;
        }

        #ck7 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
            max-height: 356px !important;
            height: 430px !important;
        }

        #ck7 .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline>ul {
            margin-top: 22px !important;
        }

        .ck.ck-reset.ck-editor.ck-rounded-corners {
            border: 1px solid #a7a2a27d;
            border-radius: 5px;
        }

        .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline>p>strong {
            line-height: 34px;
            padding: 5px 0;
            margin-bottom: 20px;
            position: relative;
            border-bottom: border-bottom: 0 !important;
            width: 100%;
            display: block;
        }

        .ck-editor__main .ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline>p>strong:after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            height: 3px;
            border-radius: 2px;
            width: 63px;
            display: block;
            background-color: #005dc7;
        }

        .title.custom-title {
            border-bottom: 0 !important;
        }

        .title.custom-title:after {
            width: 63px !important;
        }

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
