@extends('layouts.master')
@section('title', 'Gestion des clients')

@section('css_header')
@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Clients") }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>

                <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
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
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                        <img src="assets/img/icon/HJ_icon_green_black.png" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Gestion des clients") }}</li>
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
                                                        <select class="chosenoptgroup w-100" id="client-filter">
                                                            <option value="1" selected>Tous</option>
                                                            <option value="2">AAT</option>
                                                            <option value="3">Agricultura España</option>
                                                            <option value="4">Arthur Benson</option>
                                                            <option value="5">Consortium Delta</option>
                                                            <option value="6">VECTORIA LLC</option>
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
                                                                data-image="assets/img/drap/Cote_d'Ivoire.png">Côte
                                                                d'Ivoire</option>
                                                            <option value="Espagne"
                                                                data-image="assets/img/drap/Spain.png">Espagne</option>
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

            <div class="row mb-4 justify-content-center">
                <div class="col-10">
                    <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation4">
                            <button style="font-size: 14px" class="nav-link " id="personal4-tab" data-bs-toggle="tab"
                                data-bs-target="#personal4" type="button" role="tab" aria-controls="personal4"
                                aria-selected="true">Balance Agée</button>
                        </li>
                        <li class="nav-item" role="presentation5">
                            <button style="font-size: 14px" class="nav-link " id="personal5-tab" data-bs-toggle="tab"
                                data-bs-target="#personal5" type="button" role="tab" aria-controls="personal5"
                                aria-selected="true">Grand Livre</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button style="font-size: 14px" class="nav-link active" id="personal-tab"
                                data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab"
                                aria-controls="personal" aria-selected="true">Etat des factures</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="tab-content py-3" id="myTabContent" style="background-color: transparent">
                        <!-- personal info tab-->
                        <div class="tab-pane fade active show" id="personal" role="tabpanel"
                            aria-labelledby="personal-tab">
                            <div class="card border-0 mb-4">
                                <div class="card-body" style="background-color: #e4e8ee54">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row justify-content-center ">
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <div class="col-auto" style="width: 32%">
                                                                    <div
                                                                        class="form-group  position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="date" placeholder=""
                                                                                    value="2024-11-30" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Date début</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto" style="width: 32%">
                                                                    <div
                                                                        class="form-group  position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="date" placeholder=""
                                                                                    value="2024-12-25" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Date fin</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1" style="width: 32%;">
                                                                    <div id="country-selector2"
                                                                        class="rounded border poste-chosen"
                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                        <label
                                                                            style="margin-top: 5px;margin-left: 17px;color: #505050;font-size: 12px;margin-bottom: 6px;">Devise
                                                                        </label>
                                                                        <select class="chosenoptgroup w-100">
                                                                            <option value="Arabie"
                                                                                data-image="assets/img/drap/saudi-arabia.png">
                                                                                SAR</option>
                                                                            <option value="Belgique"
                                                                                data-image="assets/img/drap/Belgique.jpg">
                                                                                EUR</option>
                                                                            <option value="Canada"
                                                                                data-image="assets/img/drap/Canada.png">CAD
                                                                            </option>
                                                                            <option value="Cameroun"
                                                                                data-image="assets/img/drap/cameroon.jpg">
                                                                                CFA</option>
                                                                            <option value="Chine"
                                                                                data-image="assets/img/drap/china.jpg">CNY
                                                                            </option>
                                                                            <option value="Ivoire"
                                                                                data-image="assets/img/drap/Cote_d'Ivoire.png">
                                                                                CFA</option>
                                                                            <option value="Espagne"
                                                                                data-image="assets/img/drap/Spain.png">EUR
                                                                            </option>
                                                                            <option value="Unis"
                                                                                data-image="assets/img/drap/united-arab-emirates.jpg">
                                                                                AED</option>
                                                                            <option value="France"
                                                                                data-image="assets/img/drap/France.png">EUR
                                                                            </option>
                                                                            <option value="Inde"
                                                                                data-image="assets/img/drap/india.jpg">INR
                                                                            </option>
                                                                            <option value="Irlande"
                                                                                data-image="assets/img/drap/Ireland.png">
                                                                                EUR</option>
                                                                            <option value="Maroc" selected
                                                                                data-image="assets/img/drap/MAROC.jpg">MAD
                                                                            </option>
                                                                            <option value="Qatar"
                                                                                data-image="assets/img/drap/QATAR.jpg">QAR
                                                                            </option>
                                                                            <option value="Sénégal"
                                                                                data-image="assets/img/drap/senegal.jpg">
                                                                                CFA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 ms-auto"
                                                            style="width: 20%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                            <div class="row">
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Aperçu"
                                                                    style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                        <a href="facture-apercu.html" target="_blank"><i
                                                                                class="bi bi-binoculars avatar   rounded h5"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Partager"
                                                                    style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                        <a href="#" type="button"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#emailcompose">
                                                                            <i class="bi bi-share avatar   rounded h5"></i>
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
                                                                        <i class="bi bi-printer avatar   rounded h5"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                        <select
                                                                            style="border: 0;background-color: transparent;width: 49px;color: #005dc7;">
                                                                            <option id="hide-item">Tous</option>
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
                            <div class="card border-0">
                                <div class="card-body" style="background-color: #e4e8ee54">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body" style="padding: 10px 34px;">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h5>Etat des factures</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-3">
                                                        <div class="col-12">
                                                            <input type="file" id="demo-file" class="hidden">
                                                            <table class="table table-shows all-client">
                                                                <thead style="font-size: 14px;">
                                                                    <tr>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            Client</th>
                                                                        <th rowspan="2" style="width: 2px;border: 0">
                                                                        </th>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            FACTURE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 32px">
                                                                            <input type="checkbox" id="check-client">
                                                                        </th>
                                                                        <th>N° client</th>
                                                                        <th>Compte</th>
                                                                        <th>Raison sociale </th>
                                                                        <th style="width: 205px;">Numéro</th>
                                                                        <th style="width: 121px;">Date</th>
                                                                        <th style="width: 121px;text-align: right;">Montant
                                                                        </th>
                                                                        <th style="width: 234px;text-align: center;">
                                                                            Echéance</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 14px">
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27100</td>
                                                                        <td>34211024</td>
                                                                        <td>VECTORIA LLC</td>
                                                                        <td rowspan="39" style="width: 2px;border: 0">
                                                                        </td>
                                                                        <td>FACA291/2024</td>
                                                                        <td>11/10/2024</td>
                                                                        <td style="text-align: right;">10 000,00</td>
                                                                        <td style="text-align: center;">08/11/2024</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27106</td>
                                                                        <td>34211016</td>
                                                                        <td>Agricultura España</td>
                                                                        <td>FACA294/2024</td>
                                                                        <td>18/10/2024</td>
                                                                        <td style="text-align: right;">20 000,00</td>
                                                                        <td style="text-align: center;">23/12/2024</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27106</td>
                                                                        <td>34211016</td>
                                                                        <td>Agricultura España</td>
                                                                        <td>FACA310/2024</td>
                                                                        <td>20/10/2024</td>
                                                                        <td style="text-align: right;">15 000,00</td>
                                                                        <td style="text-align: center;">08/02/2025</td>
                                                                    </tr>
                                                                    <!----------------------->
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td>FACA317/2024</td>
                                                                        <td>20/10/2024</td>
                                                                        <td style="text-align: right">20 000,00</td>
                                                                        <td style="text-align: center;">16/12/2024</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td>FACA327/2024</td>
                                                                        <td>21/10/2024</td>
                                                                        <td style="text-align: right">25 000,00</td>
                                                                        <td style="text-align: center;">30/11/2024</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27106</td>
                                                                        <td>34211016</td>
                                                                        <td>Agricultura España</td>
                                                                        <td>FACA336/2024</td>
                                                                        <td>22/10/2024</td>
                                                                        <td style="text-align: right">7 500,00</td>
                                                                        <td style="text-align: center;">14/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27106</td>
                                                                        <td>34211016</td>
                                                                        <td>Agricultura España</td>
                                                                        <td>FACA346/2024</td>
                                                                        <td>26/10/2024</td>
                                                                        <td style="text-align: right;">5 000,00</td>
                                                                        <td style="text-align: center;">24/03/2025</td>
                                                                    </tr>
                                                                    <!------------------------>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27442</td>
                                                                        <td>34211008</td>
                                                                        <td>Arthur Benson</td>
                                                                        <td>FACA355/2024</td>
                                                                        <td>14/11/2024</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="text-align: center">11/01/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27034</td>
                                                                        <td>34211021</td>
                                                                        <td>AAT</td>
                                                                        <td>FACA365/2024</td>
                                                                        <td>04/12/2024</td>
                                                                        <td style="text-align: right">15 000,00</td>
                                                                        <td style="text-align: center">03/01/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td>FACA374/2024</td>
                                                                        <td>08/12/2024</td>
                                                                        <td style="text-align: right;">10 000,00</td>
                                                                        <td style="text-align: center">12/03/2025</td>
                                                                    </tr>
                                                                    <!------------------------>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27034</td>
                                                                        <td>34211021</td>
                                                                        <td>AAT</td>
                                                                        <td>FACA384/2024</td>
                                                                        <td>11/12/2024</td>
                                                                        <td style="text-align: right">10 000,00</td>
                                                                        <td style="text-align: center;">26/02/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27100</td>
                                                                        <td>34211024</td>
                                                                        <td>VECTORIA LLC</td>
                                                                        <td>FACA393/2024</td>
                                                                        <td>11/12/2024</td>
                                                                        <td style="text-align: right;">5 000,00</td>
                                                                        <td style="text-align: center;">31/01/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27034</td>
                                                                        <td>34211021</td>
                                                                        <td>AAT</td>
                                                                        <td>FACA403/2024</td>
                                                                        <td>12/12/2024</td>
                                                                        <td style="text-align: right;">5 000,00</td>
                                                                        <td style="text-align: center;">11/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27442</td>
                                                                        <td>34211008</td>
                                                                        <td>Arthur Benson</td>
                                                                        <td>FACA412/2024</td>
                                                                        <td>18/12/2024</td>
                                                                        <td style="text-align: right;">10 000,00</td>
                                                                        <td style="text-align: center;">07/01/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27100</td>
                                                                        <td>34211024</td>
                                                                        <td>VECTORIA LLC</td>
                                                                        <td>FACA422/2024</td>
                                                                        <td>18/12/2024</td>
                                                                        <td style="text-align: right;">5 000,00</td>
                                                                        <td style="text-align: center;">15/03/2025</td>
                                                                    </tr>
                                                                    <!------------------------>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27100</td>
                                                                        <td>34211024</td>
                                                                        <td>VECTORIA LLC</td>
                                                                        <td>FACA431/2024</td>
                                                                        <td>20/12/2024</td>
                                                                        <td style="text-align: right">2 500,00</td>
                                                                        <td style="text-align: center;">28/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td>FACA441/2024</td>
                                                                        <td>21/12/2024</td>
                                                                        <td style="text-align: right">15 000,00</td>
                                                                        <td style="text-align: center;">20/02/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td>FACA450/2024</td>
                                                                        <td>23/12/2024</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="text-align: center;">15/04/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27100</td>
                                                                        <td>34211024</td>
                                                                        <td>VECTORIA LLC</td>
                                                                        <td>FACA460/2024</td>
                                                                        <td>23/12/2024</td>
                                                                        <td style="text-align: right">2 500,00</td>
                                                                        <td style="text-align: center;">11/04/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"><input
                                                                                type="checkbox"></td>
                                                                        <td style="border-bottom: 1px solid;">27442</td>
                                                                        <td style="border-bottom: 1px solid;">34211008</td>
                                                                        <td style="border-bottom: 1px solid;">Arthur Benson
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid;">FACA469/2024
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid;">26/12/2024
                                                                        </td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;text-align: right">
                                                                            5 000,00</td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;text-align: center;">
                                                                            06/03/2025</td>
                                                                    </tr>
                                                                    <!------------------------>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td
                                                                            style="font-weight: 700;border-bottom: 1px solid;">
                                                                            Total général</td>
                                                                        <td
                                                                            style="text-align: center;border-bottom: 1px solid;">
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid;">
                                                                            197 500,00</td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-shows client2 hidden">
                                                                <thead style="font-size: 14px;">
                                                                    <tr>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            Client</th>
                                                                        <th rowspan="2" style="width: 2px;border: 0">
                                                                        </th>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            FACTURE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 32px">
                                                                            <input type="checkbox">
                                                                        </th>
                                                                        <th>N° client</th>
                                                                        <th>Compte</th>
                                                                        <th>Raison sociale </th>
                                                                        <th style="width: 205px;">Numéro</th>
                                                                        <th style="width: 121px;">Date</th>
                                                                        <th style="width: 121px;text-align: right;">Montant
                                                                        </th>
                                                                        <th style="width: 234px;text-align: center;">
                                                                            Echéance</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 14px">
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27034</td>
                                                                        <td>34211021</td>
                                                                        <td>AAT</td>
                                                                        <td rowspan="39" style="width: 2px"></td>
                                                                        <td>FACA365/2024</td>
                                                                        <td>04/12/2024</td>
                                                                        <td style="text-align: right;">15 000,00</td>
                                                                        <td style="text-align: center;">03/01/2025
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27034</td>
                                                                        <td>34211021</td>
                                                                        <td>AAT</td>
                                                                        <td>FACA384/2024</td>
                                                                        <td>11/12/2024</td>
                                                                        <td style="text-align: right;">10 000,00</td>
                                                                        <td style="text-align: center;">26/02/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"><input
                                                                                type="checkbox"></td>
                                                                        <td style="border-bottom: 1px solid;">27034</td>
                                                                        <td style="border-bottom: 1px solid;">34211021</td>
                                                                        <td style="border-bottom: 1px solid;">AAT</td>
                                                                        <td style="border-bottom: 1px solid;">FACA403/2024
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid;">12/12/2024
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid;">
                                                                            5 000,00</td>
                                                                        <td
                                                                            style="text-align: center;border-bottom: 1px solid;">
                                                                            11/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;font-weight: 700">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid;font-weight: 700">
                                                                            30 000,00</td>
                                                                        <td
                                                                            style="text-align: center;border-bottom: 1px solid;">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-shows client3 hidden">
                                                                <thead style="font-size: 14px;">
                                                                    <tr>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            Client</th>
                                                                        <th rowspan="2" style="width: 2px;border: 0">
                                                                        </th>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            FACTURE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 32px">
                                                                            <input type="checkbox">
                                                                        </th>
                                                                        <th>N° client</th>
                                                                        <th>Compte</th>
                                                                        <th>Raison sociale </th>
                                                                        <th style="width: 205px;">Numéro</th>
                                                                        <th style="width: 121px;">Date</th>
                                                                        <th style="width: 121px;text-align: right;">Montant
                                                                        </th>
                                                                        <th style="width: 234px;text-align: center;">
                                                                            Echéance</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 14px">
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27106</td>
                                                                        <td>34211016</td>
                                                                        <td>Agricultura España</td>
                                                                        <td rowspan="39" style="width: 2px"></td>
                                                                        <td>FACA294/2024</td>
                                                                        <td>18/10/2024</td>
                                                                        <td style="text-align: right">20 000,00</td>
                                                                        <td style="text-align: center;">23/12/2024</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27106</td>
                                                                        <td>34211016</td>
                                                                        <td>Agricultura España</td>
                                                                        <td>FACA310/2024</td>
                                                                        <td>20/10/2024</td>
                                                                        <td style="text-align: right">15 000,00</td>
                                                                        <td style="text-align: center;">08/02/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27106</td>
                                                                        <td>34211016</td>
                                                                        <td>Agricultura España</td>
                                                                        <td>FACA336/2024</td>
                                                                        <td>22/10/2024</td>
                                                                        <td style="text-align: right">7 500,00</td>
                                                                        <td style="text-align: center;">14/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"><input
                                                                                type="checkbox"></td>
                                                                        <td style="border-bottom: 1px solid;">27106</td>
                                                                        <td style="border-bottom: 1px solid;">34211016</td>
                                                                        <td style="border-bottom: 1px solid;">Agricultura
                                                                            España</td>
                                                                        <td style="border-bottom: 1px solid;">FACA346/2024
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid;">26/10/2024
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid;">
                                                                            5 000,00</td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;text-align: center;">
                                                                            24/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;font-weight: 700">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid;font-weight: 700">
                                                                            47 500,00</td>
                                                                        <td
                                                                            style="text-align: center;border-bottom: 1px solid;">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-shows client4 hidden">
                                                                <thead style="font-size: 14px;">
                                                                    <tr>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            Client</th>
                                                                        <th rowspan="2" style="width: 2px;border: 0">
                                                                        </th>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            FACTURE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 32px">
                                                                            <input type="checkbox">
                                                                        </th>
                                                                        <th>N° client</th>
                                                                        <th>Compte</th>
                                                                        <th>Raison sociale </th>
                                                                        <th style="width: 205px;">Numéro</th>
                                                                        <th style="width: 121px;">Date</th>
                                                                        <th style="width: 121px;text-align: right;">Montant
                                                                        </th>
                                                                        <th style="width: 234px;text-align: center;">
                                                                            Echéance</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 14px">
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27442</td>
                                                                        <td>34211008</td>
                                                                        <td>Arthur Benson</td>
                                                                        <td rowspan="39" style="width: 2px"></td>
                                                                        <td>FACA355/2024</td>
                                                                        <td>14/11/2024</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="text-align: center">11/01/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27442</td>
                                                                        <td>34211008</td>
                                                                        <td>Arthur Benson</td>
                                                                        <td>FACA412/2024</td>
                                                                        <td>18/12/2024</td>
                                                                        <td style="text-align: right">10 000,00</td>
                                                                        <td style="text-align: center">07/01/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"><input
                                                                                type="checkbox"></td>
                                                                        <td style="border-bottom: 1px solid;">27442</td>
                                                                        <td style="border-bottom: 1px solid;">34211008</td>
                                                                        <td style="border-bottom: 1px solid;">Arthur Benson
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid;">FACA469/2024
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid;">26/12/2024
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid;">
                                                                            5 000,00</td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;text-align: center">
                                                                            06/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;font-weight: 700">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid;font-weight: 700">
                                                                            20 000,00</td>
                                                                        <td
                                                                            style="text-align: center;border-bottom: 1px solid;">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-shows client5 hidden">
                                                                <thead style="font-size: 14px;">
                                                                    <tr>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            Client</th>
                                                                        <th rowspan="2" style="width: 2px;border: 0">
                                                                        </th>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            FACTURE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 32px">
                                                                            <input type="checkbox">
                                                                        </th>
                                                                        <th>N° client</th>
                                                                        <th>Compte</th>
                                                                        <th>Raison sociale </th>
                                                                        <th style="width: 205px;">Numéro</th>
                                                                        <th style="width: 121px;">Date</th>
                                                                        <th style="width: 121px;text-align: right;">Montant
                                                                        </th>
                                                                        <th style="width: 234px;text-align: center;">
                                                                            Echéance</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 14px">
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td rowspan="39" style="width: 2px"></td>
                                                                        <td>FACA317/2024</td>
                                                                        <td>20/10/2024</td>
                                                                        <td style="text-align: right;">20 000,00</td>
                                                                        <td style="text-align: center;">16/12/2024</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td>FACA327/2024</td>
                                                                        <td>21/10/2024</td>
                                                                        <td style="text-align: right">25 000,00</td>
                                                                        <td style="text-align: center;">30/11/2024</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td>FACA374/2024</td>
                                                                        <td>08/12/2024</td>
                                                                        <td style="text-align: right;">10 000,00</td>
                                                                        <td style="text-align: center;">12/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td>FACA441/2024</td>
                                                                        <td>21/12/2024</td>
                                                                        <td style="text-align: right;">15 000,00</td>
                                                                        <td style="text-align: center;">20/02/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"><input
                                                                                type="checkbox"></td>
                                                                        <td style="border-bottom: 1px solid;">27056</td>
                                                                        <td style="border-bottom: 1px solid;">34211012</td>
                                                                        <td style="border-bottom: 1px solid;">Consortium
                                                                            Delta</td>
                                                                        <td style="border-bottom: 1px solid;">FACA450/2024
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid;">23/12/2024
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid;">
                                                                            5 000,00</td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;text-align: center;">
                                                                            15/04/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;font-weight: 700">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid;font-weight: 700">
                                                                            75 000,00</td>
                                                                        <td
                                                                            style="text-align: center;border-bottom: 1px solid;">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-shows client6 hidden">
                                                                <thead style="font-size: 14px;">
                                                                    <tr>
                                                                        <th colspan="4"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            Client</th>
                                                                        <th rowspan="2" style="width: 2px;border: 0">
                                                                        </th>
                                                                        <th colspan="5"
                                                                            style="text-align: center;border-top: 1px solid #c7c7c7">
                                                                            FACTURE</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 32px">
                                                                            <input type="checkbox">
                                                                        </th>
                                                                        <th>N° client</th>
                                                                        <th>Compte</th>
                                                                        <th>Raison sociale </th>
                                                                        <th style="width: 205px;">Numéro</th>
                                                                        <th style="width: 121px;">Date</th>
                                                                        <th style="width: 121px;text-align: right;">Montant
                                                                        </th>
                                                                        <th style="width: 234px;text-align: center;">
                                                                            Echéance</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 14px">
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27100</td>
                                                                        <td>34211024</td>
                                                                        <td>VECTORIA LLC</td>
                                                                        <td rowspan="39" style="width: 2px"></td>
                                                                        <td>FACA291/2024</td>
                                                                        <td>11/10/2024</td>
                                                                        <td style="text-align: right">10 000,00</td>
                                                                        <td style="text-align: center;">08/11/2024</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27100</td>
                                                                        <td>34211024</td>
                                                                        <td>VECTORIA LLC</td>
                                                                        <td>FACA393/2024</td>
                                                                        <td>11/12/2024</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="text-align: center;">31/01/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27100</td>
                                                                        <td>34211024</td>
                                                                        <td>VECTORIA LLC</td>
                                                                        <td>FACA422/2024</td>
                                                                        <td>18/12/2024</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="text-align: center;">15/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td>27100</td>
                                                                        <td>34211024</td>
                                                                        <td>VECTORIA LLC</td>
                                                                        <td>FACA431/2024</td>
                                                                        <td>20/12/2024</td>
                                                                        <td style="text-align: right">2 500,00</td>
                                                                        <td style="text-align: center;">28/03/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"><input
                                                                                type="checkbox"></td>
                                                                        <td style="border-bottom: 1px solid;">27100</td>
                                                                        <td style="border-bottom: 1px solid;">34211024</td>
                                                                        <td style="border-bottom: 1px solid;">VECTORIA LLC
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid;">FACA460/2024
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid;">23/12/2024
                                                                        </td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;text-align: right">
                                                                            2 500,00</td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;text-align: center;">
                                                                            11/04/2025</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td style="border-bottom: 1px solid;"></td>
                                                                        <td
                                                                            style="border-bottom: 1px solid;font-weight: 700">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid;font-weight: 700">
                                                                            25 000,00</td>
                                                                        <td
                                                                            style="text-align: center;border-bottom: 1px solid;">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="row align-items-center mx-0 mt-4">
                                                                <div class="col-6 ">

                                                                </div>
                                                                <div class="col-6 footable-paging-external footable-paging-right"
                                                                    id="footable-pagination">
                                                                    <div class="footable-pagination-wrapper">
                                                                        <ul class="pagination">
                                                                            <li class="footable-page-nav disabled"
                                                                                data-page="first"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">«</a></li>
                                                                            <li class="footable-page-nav disabled"
                                                                                data-page="prev"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">‹</a></li>
                                                                            <li class="footable-page visible active"
                                                                                data-page="1"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">1</a></li>
                                                                            <li class="footable-page visible"
                                                                                data-page="2"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">2</a></li>
                                                                            <li class="footable-page-nav"
                                                                                data-page="next"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">›</a></li>
                                                                            <li class="footable-page-nav"
                                                                                data-page="last"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">»</a></li>
                                                                        </ul>
                                                                        <div class="divider"></div><span
                                                                            class="label label-default">1 sur 2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="personal5" role="tabpanel" aria-labelledby="personal5-tab">
                            <div class="card border-0 mb-4">
                                <div class="card-body" style="background-color: #e4e8ee54">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row justify-content-center ">
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <div class="col-auto" style="width: 32%">
                                                                    <div
                                                                        class="form-group  position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="date" placeholder=""
                                                                                    value="2024-11-30" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Date début</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto" style="width: 32%">
                                                                    <div
                                                                        class="form-group  position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="date" placeholder=""
                                                                                    value="2024-12-25" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Date fin</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1" style="width: 32%;">
                                                                    <div id="country-selector4"
                                                                        class="rounded border poste-chosen"
                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                        <label
                                                                            style="margin-top: 5px;margin-left: 17px;color: #505050;font-size: 12px;margin-bottom: 6px;">Devise
                                                                        </label>
                                                                        <select class="chosenoptgroup w-100">
                                                                            <option value="Arabie"
                                                                                data-image="assets/img/drap/saudi-arabia.png">
                                                                                SAR</option>
                                                                            <option value="Belgique"
                                                                                data-image="assets/img/drap/Belgique.jpg">
                                                                                EUR</option>
                                                                            <option value="Canada"
                                                                                data-image="assets/img/drap/Canada.png">CAD
                                                                            </option>
                                                                            <option value="Cameroun"
                                                                                data-image="assets/img/drap/cameroon.jpg">
                                                                                CFA</option>
                                                                            <option value="Chine"
                                                                                data-image="assets/img/drap/china.jpg">CNY
                                                                            </option>
                                                                            <option value="Ivoire"
                                                                                data-image="assets/img/drap/Cote_d'Ivoire.png">
                                                                                CFA</option>
                                                                            <option value="Espagne"
                                                                                data-image="assets/img/drap/Spain.png">EUR
                                                                            </option>
                                                                            <option value="Unis"
                                                                                data-image="assets/img/drap/united-arab-emirates.jpg">
                                                                                AED</option>
                                                                            <option value="France"
                                                                                data-image="assets/img/drap/France.png">EUR
                                                                            </option>
                                                                            <option value="Inde"
                                                                                data-image="assets/img/drap/india.jpg">INR
                                                                            </option>
                                                                            <option value="Irlande"
                                                                                data-image="assets/img/drap/Ireland.png">
                                                                                EUR</option>
                                                                            <option value="Maroc" selected
                                                                                data-image="assets/img/drap/MAROC.jpg">MAD
                                                                            </option>
                                                                            <option value="Qatar"
                                                                                data-image="assets/img/drap/QATAR.jpg">QAR
                                                                            </option>
                                                                            <option value="Sénégal"
                                                                                data-image="assets/img/drap/senegal.jpg">
                                                                                CFA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 ms-auto"
                                                            style="width: 20%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                            <div class="row">
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Aperçu"
                                                                    style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                        <a href="facture-gl-apercu.html"
                                                                            target="_blank"><i
                                                                                class="bi bi-binoculars avatar   rounded h5"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Partager"
                                                                    style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                        <a href="#" type="button"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#emailcompose">
                                                                            <i class="bi bi-share avatar   rounded h5"></i>
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
                                                                        <i class="bi bi-printer avatar   rounded h5"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                        <select
                                                                            style="border: 0;background-color: transparent;width: 49px;color: #005dc7;">
                                                                            <option id="hide-item">Tous</option>
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
                            <div class="card border-0">
                                <div class="card-body" style="background-color: #e4e8ee54">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body" style="padding: 10px 34px;">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h5>Grand Livre</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-3">
                                                        <div class="col-12 mb-4 show-gl-client gcl1">
                                                            <table class="table">
                                                                <thead style="font-size: 14px">
                                                                    <tr style="border-top: 1px solid;">
                                                                        <th style="width: 233px;border-bottom: 1px solid;">
                                                                            N° client&nbsp;&nbsp; 27034</th>
                                                                        <th style="width: 261px;border-bottom: 1px solid;">
                                                                            Compte&nbsp;&nbsp; 34211021</th>
                                                                        <th style="border-bottom: 1px solid;">
                                                                            Client&nbsp;&nbsp; AAT</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                            <table class="table" style="margin-top: 23px;">
                                                                <thead style="border-top: 1px solid #c7c7c7;">
                                                                    <tr>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 135px;">
                                                                            Date</th>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 305px;">
                                                                            Libellé</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Montant</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Solde</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align: center;width: 118px;">Débit
                                                                        </th>
                                                                        <th style="text-align: left;width: 122px;">Crédit
                                                                        </th>
                                                                        <th style="text-align: center;width: 122px;">Débit
                                                                        </th>
                                                                        <th style="text-align: left;width: 122px;">Crédit
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>04/12/2024</td>
                                                                        <td>FACA365/2024 du 04/12/2024</td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right;">15
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right">15
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>11/12/2024</td>
                                                                        <td>FACA384/2024 du 11/12/2024</td>
                                                                        <td style="text-align: right">10
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">25
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000">
                                                                            12/12/2024</td>
                                                                        <td style="border-bottom: 1px solid #000">
                                                                            FACA403/2024 du 12/12/2024</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            5
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            30
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="font-weight: 700;border-bottom: 1px solid #000">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            30
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            30
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="col-12 mb-4 show-gl-client gcl2">
                                                            <table class="table">
                                                                <thead style="font-size: 14px">
                                                                    <tr style="border-top: 1px solid;">
                                                                        <th style="width: 233px;border-bottom: 1px solid;">
                                                                            N° client&nbsp;&nbsp; 27106</th>
                                                                        <th style="width: 261px;border-bottom: 1px solid;">
                                                                            Compte&nbsp;&nbsp; 34211016</th>
                                                                        <th style="border-bottom: 1px solid;">
                                                                            Client&nbsp;&nbsp; Agricultura España</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                            <table class="table" style="margin-top: 23px;">
                                                                <thead style="border-top: 1px solid #c7c7c7;">
                                                                    <tr>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 135px;">
                                                                            Date</th>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 305px;">
                                                                            Libellé</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Montant</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Solde</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align: center;width: 118px;">Débit
                                                                        </th>
                                                                        <th style="text-align: center;width: 122px;">Crédit
                                                                        </th>
                                                                        <th style="text-align: center;width: 122px;">Débit
                                                                        </th>
                                                                        <th style="text-align: left;width: 122px;">Crédit
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>18/10/2024</td>
                                                                        <td>FACA294/2024 du 18/10/2024</td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right;">20
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right">20
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>20/10/2024</td>
                                                                        <td>FACA310/2024 du 20/10/2024</td>
                                                                        <td style="text-align: right">15
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">35
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>22/10/2024</td>
                                                                        <td>FACA336/2024 du 22/10/2024</td>
                                                                        <td style="text-align: right">7
                                                                            500,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">42
                                                                            500,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>26/10/2024</td>
                                                                        <td>FACA346/2024 du 26/10/2024</td>
                                                                        <td style="text-align: right">5 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">47
                                                                            500,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000">
                                                                            23/12/2024</td>
                                                                        <td style="border-bottom: 1px solid #000">Chèque n°
                                                                            ADE286114 - BMCE BANK</td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            20 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            27
                                                                            500,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="font-weight: 700;border-bottom: 1px solid #000">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            47
                                                                            500,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            20 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            27
                                                                            500,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-12 mb-4 show-gl-client gcl3">
                                                            <table class="table">
                                                                <thead style="font-size: 14px">
                                                                    <tr style="border-top: 1px solid;">
                                                                        <th style="width: 233px;border-bottom: 1px solid;">
                                                                            N° client&nbsp;&nbsp; 27442</th>
                                                                        <th style="width: 261px;border-bottom: 1px solid;">
                                                                            Compte&nbsp;&nbsp; 34211008</th>
                                                                        <th style="border-bottom: 1px solid;">
                                                                            Client&nbsp;&nbsp; Arthur Benson</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                            <table class="table" style="margin-top: 23px;">
                                                                <thead style="border-top: 1px solid #c7c7c7;">
                                                                    <tr>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 135px;">
                                                                            Date</th>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 305px;">
                                                                            Libellé</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Montant</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Solde</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align: center;width: 118px;">Débit
                                                                        </th>
                                                                        <th style="text-align: center;width: 122px;">Crédit
                                                                        </th>
                                                                        <th style="text-align: center;width: 122px;">Débit
                                                                        </th>
                                                                        <th style="text-align: left;width: 122px;">Crédit
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>14/11/2024</td>
                                                                        <td>FACA355/2024 du 14/11/2024</td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right">5
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right">15
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>18/12/2024</td>
                                                                        <td>FACA412/2024 du 18/12/2024</td>
                                                                        <td style="text-align: right;">10
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">10
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000">
                                                                            26/12/2024</td>
                                                                        <td style="border-bottom: 1px solid #000">
                                                                            FACA469/2024 du 26/12/2024</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            5
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            20
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="font-weight: 700;border-bottom: 1px solid #000">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            20
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            20
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-12 mb-4 show-gl-client gcl4">
                                                            <table class="table">
                                                                <thead style="font-size: 14px">
                                                                    <tr style="border-top: 1px solid;">
                                                                        <th
                                                                            style="width: 233px;border-bottom: 1px solid;">
                                                                            N° client&nbsp;&nbsp; 27056</th>
                                                                        <th
                                                                            style="width: 261px;border-bottom: 1px solid;">
                                                                            Compte&nbsp;&nbsp; 34211012</th>
                                                                        <th style="border-bottom: 1px solid;">
                                                                            Client&nbsp;&nbsp; Consortium Delta</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                            <table class="table" style="margin-top: 23px;">
                                                                <thead style="border-top: 1px solid #c7c7c7;">
                                                                    <tr>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 135px;">
                                                                            Date</th>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 305px;">
                                                                            Libellé</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Montant</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Solde</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align: center;width: 118px;">Débit
                                                                        </th>
                                                                        <th style="text-align: center;width: 122px;">
                                                                            Crédit</th>
                                                                        <th style="text-align: center;width: 122px;">Débit
                                                                        </th>
                                                                        <th style="text-align: left;width: 122px;">Crédit
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>20/10/2024</td>
                                                                        <td>FACA317/2024 du 20/10/2024</td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right">20
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right">20
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>21/10/2024</td>
                                                                        <td>FACA327/2024 du 21/10/2024</td>
                                                                        <td style="text-align: right;">25
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">45
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>30/11/2024</td>
                                                                        <td>Virement bancaire</td>
                                                                        <td></td>
                                                                        <td style="text-align: right">25 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="text-align: right">20
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>08/12/2024</td>
                                                                        <td>FACA374/2024 du 08/12/2024</td>
                                                                        <td style="text-align: right">10 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">30
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>16/12/2024</td>
                                                                        <td>Chèque n° DCE986114 - ATTIJARIWAFA BANK</td>
                                                                        <td></td>
                                                                        <td style="text-align: right">20 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="text-align: right">10
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>21/12/2024</td>
                                                                        <td>FACA441/2024 du 21/12/2024</td>
                                                                        <td style="text-align: right">15
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">25
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000">
                                                                            23/12/2024</td>
                                                                        <td style="border-bottom: 1px solid #000">
                                                                            FACA450/2024 du 23/12/2024</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            5 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            30
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="font-weight: 700;border-bottom: 1px solid #000">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            75
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>

                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            45 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            30
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-12 mb-4 show-gl-client gcl5">
                                                            <table class="table">
                                                                <thead style="font-size: 14px">
                                                                    <tr style="border-top: 1px solid;">
                                                                        <th
                                                                            style="width: 233px;border-bottom: 1px solid;">
                                                                            N° client&nbsp;&nbsp; 27100</th>
                                                                        <th
                                                                            style="width: 261px;border-bottom: 1px solid;">
                                                                            Compte&nbsp;&nbsp; 34211024</th>
                                                                        <th style="border-bottom: 1px solid;">
                                                                            Client&nbsp;&nbsp; VECTORIA LLC</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                            <table class="table" style="margin-top: 23px;">
                                                                <thead style="border-top: 1px solid #c7c7c7;">
                                                                    <tr>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 135px;">
                                                                            Date</th>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;width: 305px;">
                                                                            Libellé</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Montant</th>
                                                                        <th rowspan="2"
                                                                            style="width: 2px;border: 0 !important;"></th>
                                                                        <th colspan="2" style="text-align: center">
                                                                            Solde</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="text-align: center;width: 118px;">Débit
                                                                        </th>
                                                                        <th style="text-align: center;width: 122px;">
                                                                            Crédit</th>
                                                                        <th style="text-align: center;width: 122px;">Débit
                                                                        </th>
                                                                        <th style="text-align: left;width: 122px;">Crédit
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>11/10/2024</td>
                                                                        <td>FACA291/2024 du 11/10/2024</td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right">10
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td rowspan="29"
                                                                            style="width: 2px;border: 0 !important;"></td>
                                                                        <td style="text-align: right">10
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>08/11/2024</td>
                                                                        <td>Virement bancaire</td>
                                                                        <td></td>
                                                                        <td style="text-align: right">10 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="text-align: right">
                                                                            0,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>11/12/2024</td>
                                                                        <td>FACA393/2024 du 11/12/2024</td>
                                                                        <td style="text-align: right;">5
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">5
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>18/12/2024</td>
                                                                        <td>FACA422/2024 du 18/12/2024</td>
                                                                        <td style="text-align: right">5
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">10
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>20/12/2024</td>
                                                                        <td>FACA431/2024 du 20/12/2024</td>
                                                                        <td style="text-align: right">2
                                                                            500,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                        <td style="text-align: right">2
                                                                            500,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000">
                                                                            23/12/2024</td>
                                                                        <td style="border-bottom: 1px solid #000">
                                                                            FACA460/2024 du 23/12/2024</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            2
                                                                            500,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            15
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                        <td
                                                                            style="font-weight: 700;border-bottom: 1px solid #000">
                                                                            Total</td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            25
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>

                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            10 000,00
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right;font-weight: 700;border-bottom: 1px solid #000">
                                                                            15
                                                                            000,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <div class="row align-items-center mx-0 mb-2">
                                                            <div class="col-6 ">

                                                            </div>
                                                            <div class="col-6 footable-paging-external footable-paging-right"
                                                                id="footable-pagination">
                                                                <div class="footable-pagination-wrapper">
                                                                    <ul class="pagination">
                                                                        <li class="footable-page-nav disabled"
                                                                            data-page="first"><a
                                                                                class="footable-page-link"
                                                                                href="#">«</a></li>
                                                                        <li class="footable-page-nav disabled"
                                                                            data-page="prev"><a
                                                                                class="footable-page-link"
                                                                                href="#">‹</a></li>
                                                                        <li class="footable-page visible active"
                                                                            data-page="1"><a class="footable-page-link"
                                                                                href="#">1</a></li>
                                                                        <li class="footable-page visible"
                                                                            data-page="2"><a class="footable-page-link"
                                                                                href="#">2</a></li>
                                                                        <li class="footable-page-nav" data-page="next">
                                                                            <a class="footable-page-link"
                                                                                href="#">›</a>
                                                                        </li>
                                                                        <li class="footable-page-nav" data-page="last">
                                                                            <a class="footable-page-link"
                                                                                href="#">»</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="divider"></div><span
                                                                        class="label label-default">1 sur 2</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- personal info tab-->
                        <div class="tab-pane fade " id="personal4" role="tabpanel" aria-labelledby="personal4-tab">
                            <div class="card border-0 mb-4">
                                <div class="card-body" style="background-color: #e4e8ee54">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row justify-content-center ">
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <div class="col-auto" style="width: 32%">
                                                                    <div
                                                                        class="form-group  position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="date" placeholder=""
                                                                                    value="2024-09-24" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Date début</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto" style="width: 32%">
                                                                    <div
                                                                        class="form-group  position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="date" placeholder=""
                                                                                    value="2024-10-31" required=""
                                                                                    class="form-control border-start-0">
                                                                                <label>Date fin</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1" style="width: 32%;">
                                                                    <div id="country-selector3"
                                                                        class="rounded border poste-chosen"
                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                        <label
                                                                            style="margin-top: 5px;margin-left: 17px;color: #505050;font-size: 12px;margin-bottom: 6px;">Devise
                                                                        </label>
                                                                        <select class="chosenoptgroup w-100">
                                                                            <option value="Arabie"
                                                                                data-image="assets/img/drap/saudi-arabia.png">
                                                                                SAR</option>
                                                                            <option value="Belgique"
                                                                                data-image="assets/img/drap/Belgique.jpg">
                                                                                EUR</option>
                                                                            <option value="Canada"
                                                                                data-image="assets/img/drap/Canada.png">
                                                                                CAD</option>
                                                                            <option value="Cameroun"
                                                                                data-image="assets/img/drap/cameroon.jpg">
                                                                                CFA</option>
                                                                            <option value="Chine"
                                                                                data-image="assets/img/drap/china.jpg">CNY
                                                                            </option>
                                                                            <option value="Ivoire"
                                                                                data-image="assets/img/drap/Cote_d'Ivoire.png">
                                                                                CFA</option>
                                                                            <option value="Espagne"
                                                                                data-image="assets/img/drap/Spain.png">EUR
                                                                            </option>
                                                                            <option value="Unis"
                                                                                data-image="assets/img/drap/united-arab-emirates.jpg">
                                                                                AED</option>
                                                                            <option value="France"
                                                                                data-image="assets/img/drap/France.png">
                                                                                EUR</option>
                                                                            <option value="Inde"
                                                                                data-image="assets/img/drap/india.jpg">INR
                                                                            </option>
                                                                            <option value="Irlande"
                                                                                data-image="assets/img/drap/Ireland.png">
                                                                                EUR</option>
                                                                            <option value="Maroc" selected
                                                                                data-image="assets/img/drap/MAROC.jpg">MAD
                                                                            </option>
                                                                            <option value="Qatar"
                                                                                data-image="assets/img/drap/QATAR.jpg">QAR
                                                                            </option>
                                                                            <option value="Sénégal"
                                                                                data-image="assets/img/drap/senegal.jpg">
                                                                                CFA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 ms-auto"
                                                            style="width: 20%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                            <div class="row">
                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="Aperçu"
                                                                    style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                        <a href="facture-bal-apercu.html"
                                                                            target="_blank"><i
                                                                                class="bi bi-binoculars avatar   rounded h5"></i></a>
                                                                    </div>
                                                                </div>
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
                                                                        <i class="bi bi-printer avatar   rounded h5"></i>
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
                            <div class="card border-0">
                                <div class="card-body" style="background-color: #e4e8ee54">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body" style="padding: 10px 34px;">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h5>Balance Agée</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center mb-3">
                                                        <div class="col-12">
                                                            <table class="table">
                                                                <thead style="font-size: 14px">
                                                                    <tr>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;border-top: 1px solid #c7c7c7">
                                                                            N° client</th>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;border-top: 1px solid #c7c7c7">
                                                                            Compte</th>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;border-top: 1px solid #c7c7c7">
                                                                            Raison sociale</th>
                                                                        <td rowspan="2" style="width: 2px;border: 0">
                                                                        </td>
                                                                        <th colspan="5"
                                                                            style="vertical-align: middle;text-align: center;border-top: 1px solid #c7c7c7">
                                                                            Echéance</th>
                                                                        <td rowspan="2" style="width: 2px;border: 0">
                                                                        </td>
                                                                        <th rowspan="2"
                                                                            style="vertical-align: middle;border-top: 1px solid #c7c7c7;text-align: right">
                                                                            Total</th>
                                                                    </tr>
                                                                    <tr style="vertical-align: middle">
                                                                        <th style="text-align: right">De 1 à 30 Jours</th>
                                                                        <th style="text-align: right">De 31 à 45 Jours
                                                                        </th>
                                                                        <th style="text-align: right">De 46 à 60 Jours
                                                                        </th>
                                                                        <th style="text-align: right">De 61 à 90 Jours
                                                                        </th>
                                                                        <th style="text-align: right">Plus de 90 Jours
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 14px">
                                                                    <tr id="cl1" class="hg-tr">
                                                                        <td>27034</td>
                                                                        <td>34211021</td>
                                                                        <td>AAT</td>
                                                                        <td rowspan="29" style="width: 2px;border: 0">
                                                                        </td>
                                                                        <td style="text-align: right">15 000,00</td>
                                                                        <td style="text-align: right">10 000,00</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="text-align: right"></td>
                                                                        <td style="text-align: right"></td>
                                                                        <td rowspan="29" style="width: 2px;border: 0">
                                                                        </td>
                                                                        <td style="font-weight: 700;text-align: right">30
                                                                            000,00</td>
                                                                    </tr>
                                                                    <tr id="cl2" class="hg-tr">
                                                                        <td>27106</td>
                                                                        <td>34211016</td>
                                                                        <td>Agricultura España</td>
                                                                        <td style="text-align: right">-20 000,00</td>
                                                                        <td style="text-align: right">15 000,00</td>
                                                                        <td style="text-align: right">7 500,00</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="text-align: right"></td>
                                                                        <td style="font-weight: 700;text-align: right">27
                                                                            500,00</td>
                                                                    </tr>
                                                                    <tr id="cl3" class="hg-tr">
                                                                        <td>27442</td>
                                                                        <td>34211008</td>
                                                                        <td>Arthur Benson</td>
                                                                        <td style="text-align: right">10 000,00</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="text-align: right"></td>
                                                                        <td style="text-align: right"></td>
                                                                        <td style="font-weight: 700;text-align: right">20
                                                                            000,00</td>
                                                                    </tr>
                                                                    <tr id="cl4" class="hg-tr">
                                                                        <td>27056</td>
                                                                        <td>34211012</td>
                                                                        <td>Consortium Delta</td>
                                                                        <td style="text-align: right">-25 000,00</td>
                                                                        <td style="text-align: right">-20 000,00</td>
                                                                        <td style="text-align: right">15 000,00</td>
                                                                        <td style="text-align: right">10 000,00</td>
                                                                        <td style="text-align: right">5 000,00</td>
                                                                        <td style="font-weight: 700;text-align: right">30
                                                                            000,00</td>
                                                                    </tr>
                                                                    <tr id="cl5" class="hg-tr">
                                                                        <td style="border-bottom: 1px solid #000">27100
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000">34211024
                                                                        </td>
                                                                        <td style="border-bottom: 1px solid #000">VECTORIA
                                                                            LLC</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            -10 000,00</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            5 000,00</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            5 000,00</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            2 500,00</td>
                                                                        <td
                                                                            style="text-align: right;border-bottom: 1px solid #000">
                                                                            2 500,00</td>
                                                                        <td
                                                                            style="font-weight: 700;text-align: right;border-bottom: 1px solid #000">
                                                                            15 000,00</td>
                                                                    </tr>
                                                                    <tr id="cl6" class="hg-tr">
                                                                        <td colspan="3"
                                                                            style="font-weight: 700;text-align: center;border-bottom: 1px solid #000">
                                                                            Total</td>
                                                                        <td
                                                                            style="font-weight: 700;text-align: right;border-bottom: 1px solid #000">
                                                                            25 000,00</td>
                                                                        <td
                                                                            style="font-weight: 700;text-align: right;border-bottom: 1px solid #000">
                                                                            35 000,00</td>
                                                                        <td
                                                                            style="font-weight: 700;text-align: right;border-bottom: 1px solid #000">
                                                                            37 500,00</td>
                                                                        <td
                                                                            style="font-weight: 700;text-align: right;border-bottom: 1px solid #000">
                                                                            17 500,00</td>
                                                                        <td
                                                                            style="font-weight: 700;text-align: right;border-bottom: 1px solid #000">
                                                                            7 500,00</td>
                                                                        <td
                                                                            style="font-weight: 700;text-align: right;border-bottom: 1px solid #000">
                                                                            122 500,00</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="row align-items-center mx-0 mt-4">
                                                                <div class="col-6 ">

                                                                </div>
                                                                <div class="col-6 footable-paging-external footable-paging-right"
                                                                    id="footable-pagination">
                                                                    <div class="footable-pagination-wrapper">
                                                                        <ul class="pagination">
                                                                            <li class="footable-page-nav disabled"
                                                                                data-page="first"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">«</a></li>
                                                                            <li class="footable-page-nav disabled"
                                                                                data-page="prev"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">‹</a></li>
                                                                            <li class="footable-page visible active"
                                                                                data-page="1"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">1</a></li>
                                                                            <li class="footable-page visible"
                                                                                data-page="2"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">2</a></li>
                                                                            <li class="footable-page-nav"
                                                                                data-page="next"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">›</a></li>
                                                                            <li class="footable-page-nav"
                                                                                data-page="last"><a
                                                                                    class="footable-page-link"
                                                                                    href="#">»</a></li>
                                                                        </ul>
                                                                        <div class="divider"></div><span
                                                                            class="label label-default">1 sur 2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            ClassicEditor
                .create(document.querySelector('#ckeditor'), {
                    language: 'fr'
                })
                .catch(error => {
                    console.error(error);
                });

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

            function addImagesToChosen() {
                $('.chosen-results li').each(function() {
                    var $chosenOption = $(this);
                    var index = $chosenOption.data('option-array-index');
                    var imageSrc = $('#country-selector2 option').eq(index).data('image');

                    if (imageSrc) {
                        if (!$chosenOption.find('img').length) {
                            $chosenOption.prepend('<img src="' + imageSrc + '" />');
                        }
                    }
                });
            }
            $('#country-selector2').on('chosen:showing_dropdown', addImagesToChosen);
            $('#country-selector2').on('change', function() {
                var value = $(this).find('option:selected').attr('value');
                $('.chosen-single span').html($(this).attr('label'));
                var selectedCountry = $(this).find('option:selected');
                var imgsrc = selectedCountry.attr('data-image');
                $('#country-selector2 .chosen-container .chosen-single img').attr('src', imgsrc);
                // Get the image URL from the data attribute
                //var imgSrc = selectedCountry.data('img-src');
                $('.ville-p').addClass('hidden');
                $('#' + value).removeClass('hidden');
            })


            var selectedOption = $('#country-selector2 option:selected');
            var selectedImage = selectedOption.data('image');
            if (selectedImage) {
                $('#country-selector2 .chosen-container .chosen-single').prepend('<img src="' + selectedImage +
                    '" />');
            }



            function addImagesToChosen() {
                $('.chosen-results li').each(function() {
                    var $chosenOption = $(this);
                    var index = $chosenOption.data('option-array-index');
                    var imageSrc = $('#country-selector3 option').eq(index).data('image');

                    if (imageSrc) {
                        if (!$chosenOption.find('img').length) {
                            $chosenOption.prepend('<img src="' + imageSrc + '" />');
                        }
                    }
                });
            }
            $('#country-selector3').on('chosen:showing_dropdown', addImagesToChosen);
            $('#country-selector3').on('change', function() {
                var value = $(this).find('option:selected').attr('value');
                $('.chosen-single span').html($(this).attr('label'));
                var selectedCountry = $(this).find('option:selected');
                var imgsrc = selectedCountry.attr('data-image');
                $('#country-selector3 .chosen-container .chosen-single img').attr('src', imgsrc);
                // Get the image URL from the data attribute
                //var imgSrc = selectedCountry.data('img-src');
                $('.ville-p').addClass('hidden');
                $('#' + value).removeClass('hidden');
            })


            var selectedOption = $('#country-selector3 option:selected');
            var selectedImage = selectedOption.data('image');
            if (selectedImage) {
                $('#country-selector3 .chosen-container .chosen-single').prepend('<img src="' + selectedImage +
                    '" />');
            }


            function addImagesToChosen() {
                $('.chosen-results li').each(function() {
                    var $chosenOption = $(this);
                    var index = $chosenOption.data('option-array-index');
                    var imageSrc = $('#country-selector4 option').eq(index).data('image');

                    if (imageSrc) {
                        if (!$chosenOption.find('img').length) {
                            $chosenOption.prepend('<img src="' + imageSrc + '" />');
                        }
                    }
                });
            }
            $('#country-selector4').on('chosen:showing_dropdown', addImagesToChosen);
            $('#country-selector4').on('change', function() {
                var value = $(this).find('option:selected').attr('value');
                $('.chosen-single span').html($(this).attr('label'));
                var selectedCountry = $(this).find('option:selected');
                var imgsrc = selectedCountry.attr('data-image');
                $('#country-selector4 .chosen-container .chosen-single img').attr('src', imgsrc);
                // Get the image URL from the data attribute
                //var imgSrc = selectedCountry.data('img-src');
                $('.ville-p').addClass('hidden');
                $('#' + value).removeClass('hidden');
            })


            var selectedOption = $('#country-selector4 option:selected');
            var selectedImage = selectedOption.data('image');
            if (selectedImage) {
                $('#country-selector4 .chosen-container .chosen-single').prepend('<img src="' + selectedImage +
                    '" />');
            }

            $('.show-row4').on('click', function() {
                $('#demo-file').trigger('click');
            })
            $('#client-filter').on('change', function() {

                $('.hg-tr').removeClass('selected-row-table');
                var value = $(this).val();
                if (value == 1) {
                    $('.table-shows').addClass('hidden');
                    $('.all-client').removeClass('hidden');
                    $('.show-gl-client').removeClass('hidden');

                } else if (value == 2) {
                    $('.table-shows').addClass('hidden');
                    $('.client2').removeClass('hidden');
                    $('#cl1').addClass('selected-row-table');
                    $('.show-gl-client').addClass('hidden');
                    $('.gcl1').removeClass('hidden');
                } else if (value == 3) {
                    $('.table-shows').addClass('hidden');
                    $('.client3').removeClass('hidden');
                    $('#cl2').addClass('selected-row-table');
                    $('.show-gl-client').addClass('hidden');
                    $('.gcl2').removeClass('hidden');
                } else if (value == 4) {
                    $('.table-shows').addClass('hidden');
                    $('.client4').removeClass('hidden');
                    $('#cl3').addClass('selected-row-table');
                    $('.show-gl-client').addClass('hidden');
                    $('.gcl3').removeClass('hidden');
                } else if (value == 5) {
                    $('.table-shows').addClass('hidden');
                    $('.client5').removeClass('hidden');
                    $('#cl4').addClass('selected-row-table');
                    $('.show-gl-client').addClass('hidden');
                    $('.gcl4').removeClass('hidden');
                } else if (value == 6) {
                    $('.table-shows').addClass('hidden');
                    $('.client6').removeClass('hidden');
                    $('#cl5').addClass('selected-row-table');
                    $('.show-gl-client').addClass('hidden');
                    $('.gcl5').removeClass('hidden');
                }

            })


            $('#check-client').on('change', function() {
                if ($(this).is(':checked')) {
                    $('.table-shows tbody input:checkbox').each(function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $('.table-shows tbody input:checkbox').each(function() {
                        $(this).prop('checked', false);
                    });
                }
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
            margin-top: 0px;
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

        #country-selector2 ul li img {
            width: 30px !important;
            margin-right: 5px;
            height: 21px !important;
            border: 1px solid #999696 !important;
        }

        #country-selector3 ul li img {
            width: 30px !important;
            margin-right: 5px;
            height: 21px !important;
            border: 1px solid #999696 !important;
        }

        #country-selector4 ul li img {
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

        #country-selector2 .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector3 .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector4 .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector .chosen-single span {
            float: left
        }

        #country-selector2 .chosen-single span {
            float: left
        }

        #country-selector3 .chosen-single span {
            float: left
        }

        #country-selector4 .chosen-single span {
            float: left
        }

        .poste-chosen .chosen-single span {
            font-size: 14px !important;
        }

        .input-box.active-grey .input-1 {
            border: 1px solid #dadce0;
        }

        .input-box.active-grey .input-1 {
            border: 1px solid #dadce0;
        }

        .input-box.active-grey .input-label {
            color: #80868b;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        .input-box.active-grey .input-label svg {
            position: relative;
            width: 11px;
            height: 11px;
            top: 2px;
            transition: 250ms;
        }

        .input-box {
            position: relative;
            margin: 10px 0;
        }

        .input-box .input-label {
            position: absolute;
            color: #80868b;
            font-size: 16px;
            font-weight: 400;
            max-width: calc(100% - (2 * 8px));
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            left: 8px;
            top: 13px;
            padding: 0 8px;
            transition: 250ms;
            user-select: none;
            pointer-events: none;
        }

        .input-box .input-label svg {
            position: relative;
            width: 15px;
            height: 15px;
            top: 2px;
            transition: 250ms;
        }

        .input-box .input-1 {
            box-sizing: border-box;
            height: 50px;
            width: 100%;
            border-radius: 4px;
            color: #202124;
            border: 1px solid #dadce0;
            padding: 13px 15px;
            transition: 250ms;
        }

        .input-box .input-1:focus {
            outline: none;
            border: 2px solid #005dc7;
            transition: 250ms;
        }

        .input-box.error .input-label {
            color: #f44336;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        .input-box.error .input-1 {
            border: 2px solid #f44336;
        }

        .input-box.focus .input-label,
        .input-box.active .input-label {
            color: #005dc7;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        [type=time]::-webkit-calendar-picker-indicator {
            color: #005dc7 !important;
        }

        .input-box.focus .input-label svg,
        .input-box.active .input-label svg {
            position: relative;
            width: 11px;
            height: 11px;
            top: 2px;
            transition: 250ms;
        }

        .input-box.active .input-1 {
            border: 2px solid #005dc7;
        }

        table thead tr th,
        table tbody tr td {
            border-color: rgb(0 0 0 / 22%);
        }

        .selected-row-table {
            outline: 2px solid #005dc7;
            outline-offset: 4px;
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
