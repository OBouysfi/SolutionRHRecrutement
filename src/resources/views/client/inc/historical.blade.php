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
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;"
                                                            >{{ __("generated.Client") }}</label>
                                                        <select class="chosenoptgroup w-100" id="client-liste-chosen">
                                                            <option value="0" selected >{{ __("generated.Tous") }}</option>
                                                            <option>AAT</option>
                                                            <option>Agricultura España</option>
                                                            <option>Arthur Benson</option>
                                                            <option value="1">Consortium Delta</option>
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
                        <li class="nav-item" role="presentation">
                            <a style="font-size: 14px" class="nav-link " href="gestion-clients.html">Informations
                                générales</a>
                        </li>
                        <li class="nav-item" role="presentation2">
                            <a style="font-size: 14px" href="historique-tab.html" class="nav-link active">Historique</a>
                        </li>
                        <li class="nav-item" role="presentation3">
                            <a style="font-size: 14px" href="mission-tab.html" class="nav-link ">Missions</a>
                        </li>
                        <li class="nav-item" role="presentation6">
                            <a style="font-size: 14px" href="facturation-tab.html" class="nav-link ">Facturations et
                                paiements</a>
                        </li>
                        <li class="nav-item" role="presentation7">
                            <a style="font-size: 14px" href="rapports-financiers.html" class="nav-link ">Rapports
                                financiers</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-2 justify-content-center">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="background-color: #e4e8ee54">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-7">
                                                    <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill"
                                                        id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentationB">
                                                            <button style="font-size: 14px" class="nav-link active"
                                                                id="personalB-tab" data-bs-toggle="tab"
                                                                data-bs-target="#personalB" type="button" role="tab"
                                                                aria-controls="personalB" aria-selected="true">Missions
                                                                précédentes</button>
                                                        </li>
                                                        <li class="nav-item" role="presentationB2">
                                                            <button style="font-size: 14px" class="nav-link "
                                                                id="personalB2-tab" data-bs-toggle="tab"
                                                                data-bs-target="#personalB2" type="button"
                                                                role="tab" aria-controls="personalB2"
                                                                aria-selected="false" tabindex="-1">Résultats des
                                                                recrutements précédents</button>
                                                        </li>
                                                        <li class="nav-item" role="presentationB3">
                                                            <button style="font-size: 14px" class="nav-link "
                                                                id="personalB3-tab" data-bs-toggle="tab"
                                                                data-bs-target="#personalB3" type="button"
                                                                role="tab" aria-controls="personalB3"
                                                                aria-selected="false" tabindex="-1">Candidats
                                                                précédemment recrutés</button>
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
            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="background-color: #e4e8ee54">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="tab-content py-3" id="myTabContent"
                                                style="background-color: #fff">
                                                <!-- personal info tab-->
                                                <div class="tab-pane fade active show" id="personalB" role="tabpanel"
                                                    aria-labelledby="personalB-tab" style="padding: 0px 17px">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h5>Missions précédentes</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <table class="table table-mission tous">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr>
                                                                        <th style="width: 78px;padding: 12px 8px;">N°</th>
                                                                        <th style="width: 186px;padding: 12px 8px;">Client
                                                                        </th>
                                                                        <th style="width: 111px;padding: 12px 8px;">Date
                                                                            début</th>
                                                                        <th style="width: 111px;padding: 12px 8px;">Date
                                                                            fin</th>
                                                                        <th style="padding: 12px 8px;width: 200px;">Poste
                                                                        </th>
                                                                        <th style="width: 83px;padding: 12px 8px;">Durée
                                                                        </th>
                                                                        <th
                                                                            style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                            Présélectionnés</th>
                                                                        <th
                                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                            En entretien</th>
                                                                        <th
                                                                            style="text-align: center;width: 128px;padding: 12px 8px;">
                                                                            Retenus</th>
                                                                        <th
                                                                            style="text-align: center;width: 136px;padding: 12px 8px;">
                                                                            Embauchés</th>
                                                                        <th
                                                                            style="text-align: center;width: 127px;padding: 12px 8px;">
                                                                            Rejetés</th>
                                                                        <th style="padding: 12px 8px;">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27034</td>
                                                                        <td style="vertical-align: middle">AAT</td>
                                                                        <td style="vertical-align: middle">01/01/2023</td>
                                                                        <td style="vertical-align: middle">30/06/2023</td>
                                                                        <td style="vertical-align: middle">Développeur Full
                                                                            Stack</td>
                                                                        <td style="vertical-align: middle">6 mois</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            5</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            3</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27106</td>
                                                                        <td style="vertical-align: middle">Agricultura
                                                                            España</td>
                                                                        <td style="vertical-align: middle">15/02/2023</td>
                                                                        <td style="vertical-align: middle">15/05/2023</td>
                                                                        <td style="vertical-align: middle">Chef de projet
                                                                            IT</td>
                                                                        <td style="vertical-align: middle">3 mois</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            4</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27442</td>
                                                                        <td style="vertical-align: middle">Arthur Benson
                                                                        </td>
                                                                        <td style="vertical-align: middle">01/03/2023</td>
                                                                        <td style="vertical-align: middle">31/03/2023</td>
                                                                        <td style="vertical-align: middle">Responsable
                                                                            Marketing</td>
                                                                        <td style="vertical-align: middle">1 mois</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            3</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27056</td>
                                                                        <td style="vertical-align: middle">Consortium Delta
                                                                        </td>
                                                                        <td style="vertical-align: middle">01/04/2023</td>
                                                                        <td style="vertical-align: middle">30/06/2023</td>
                                                                        <td style="vertical-align: middle">Analyste
                                                                            financier</td>
                                                                        <td style="vertical-align: middle">3 mois</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            6</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            4</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27100</td>
                                                                        <td style="vertical-align: middle">VECTORIA LLC
                                                                        </td>
                                                                        <td style="vertical-align: middle">10/05/2023</td>
                                                                        <td style="vertical-align: middle">10/08/2023</td>
                                                                        <td style="vertical-align: middle">Commercial B2B
                                                                        </td>
                                                                        <td style="vertical-align: middle">3 mois</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            7</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            5</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            3</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27089</td>
                                                                        <td style="vertical-align: middle">Agricultura
                                                                            España</td>
                                                                        <td style="vertical-align: middle">01/06/2023</td>
                                                                        <td style="vertical-align: middle">30/06/2023</td>
                                                                        <td style="vertical-align: middle">Designer UX/UI
                                                                        </td>
                                                                        <td style="vertical-align: middle">1 mois</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            4</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            3</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-mission client-1 hidden">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr>
                                                                        <th style="width: 136px;padding: 12px 8px;">Date
                                                                            début</th>
                                                                        <th style="width: 139px;padding: 12px 8px;">Date
                                                                            fin</th>
                                                                        <th style="padding: 12px 8px;width: 270px;">Poste
                                                                        </th>
                                                                        <th style="width: 97px;padding: 12px 8px;">Durée
                                                                        </th>
                                                                        <th
                                                                            style="text-align: center;width: 178px;padding: 12px 8px;">
                                                                            Présélectionnés</th>
                                                                        <th
                                                                            style="text-align: center;width: 147px;padding: 12px 8px;">
                                                                            En entretien</th>
                                                                        <th
                                                                            style="text-align: center;width: 155px;padding: 12px 8px;">
                                                                            Retenus</th>
                                                                        <th
                                                                            style="text-align: center;width: 148px;padding: 12px 8px;">
                                                                            Embauchés</th>
                                                                        <th
                                                                            style="text-align: center;width: 148px;padding: 12px 8px;">
                                                                            Rejetés</th>
                                                                        <th style="padding: 12px 8px;">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td style="vertical-align: middle">01/10/2024</td>
                                                                        <td style="vertical-align: middle">30/11/2024</td>
                                                                        <td style="vertical-align: middle">Développeur
                                                                            Informatique</td>
                                                                        <td style="vertical-align: middle">2 mois</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            5</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            3</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">15/09/2024</td>
                                                                        <td style="vertical-align: middle">30/10/2024</td>
                                                                        <td style="vertical-align: middle">Responsable
                                                                            Achat et Logistique</td>
                                                                        <td style="vertical-align: middle">1,5 mois</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            4</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">17/10/2024</td>
                                                                        <td style="vertical-align: middle">09/11/2024</td>
                                                                        <td style="vertical-align: middle">Talent
                                                                            Acquisition Specialist</td>
                                                                        <td style="vertical-align: middle">22 jours</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            3</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            0</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">04/11/2024</td>
                                                                        <td style="vertical-align: middle">28/11/2024</td>
                                                                        <td style="vertical-align: middle">Analyste SOC
                                                                        </td>
                                                                        <td style="vertical-align: middle">24 jours</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            6</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            4</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            1</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">26/10/2024</td>
                                                                        <td style="vertical-align: middle">14/11/2024</td>
                                                                        <td style="vertical-align: middle">Contrôleur de
                                                                            Gestion</td>
                                                                        <td style="vertical-align: middle">18 jours</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            7</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            5</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            3</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            2</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-auto"
                                                                                style="margin-left: 8px;">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="ats.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="personalB2" role="tabpanel"
                                                    aria-labelledby="personalB2-tab" style="padding: 0px 17px">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h5>Résultats des recrutements
                                                                précédents</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <table class="table">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr>
                                                                        <th style="width: 78px;padding: 12px 8px;">N°</th>
                                                                        <th style="width: 186px;padding: 12px 8px;">Client
                                                                        </th>
                                                                        <th style="width: 186px;padding: 12px 8px;">Poste
                                                                        </th>
                                                                        <th style="width: 83px;padding: 12px 8px;">Durée
                                                                        </th>
                                                                        <th
                                                                            style="text-align: center;width: 111px;padding: 12px 8px;">
                                                                            Taux de placement</th>
                                                                        <th style="width: 111px;padding: 12px 8px;">
                                                                            Candidats placés</th>
                                                                        <th
                                                                            style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                            Performances des candidats</th>
                                                                        <th
                                                                            style="text-align: center;padding: 12px 8px;width: 200px;">
                                                                            Satisfaction client</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27034</td>
                                                                        <td style="vertical-align: middle">AAT</td>
                                                                        <td style="vertical-align: middle">Développeur Full
                                                                            Stack</td>
                                                                        <td style="vertical-align: middle">2 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 82%;">85%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 85%"
                                                                                    aria-valuenow="85" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27106</td>
                                                                        <td style="vertical-align: middle">Agricultura
                                                                            España</td>
                                                                        <td style="vertical-align: middle">Chef de projet
                                                                            IT</td>
                                                                        <td style="vertical-align: middle">3 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 64%;">75%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 75%"
                                                                                    aria-valuenow="75" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27442</td>
                                                                        <td style="vertical-align: middle">Arthur Benson
                                                                        </td>
                                                                        <td style="vertical-align: middle">Responsable
                                                                            Marketing</td>
                                                                        <td style="vertical-align: middle">1 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 43%;">65%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 65%"
                                                                                    aria-valuenow="65" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27056</td>
                                                                        <td style="vertical-align: middle">Consortium Delta
                                                                        </td>
                                                                        <td style="vertical-align: middle">Analyste
                                                                            financier</td>
                                                                        <td style="vertical-align: middle">3 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 97%;">92%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 92%"
                                                                                    aria-valuenow="92" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27100</td>
                                                                        <td style="vertical-align: middle">VECTORIA LLC
                                                                        </td>
                                                                        <td style="vertical-align: middle">Commercial B2B
                                                                        </td>
                                                                        <td style="vertical-align: middle">2 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 53%;">70%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 70%"
                                                                                    aria-valuenow="70" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left;vertical-align: middle">
                                                                            27089</td>
                                                                        <td style="vertical-align: middle">Agricultura
                                                                            España</td>
                                                                        <td style="vertical-align: middle">Designer UX/UI
                                                                        </td>
                                                                        <td style="vertical-align: middle">1 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenM6">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            1</td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenSM6">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: center;vertical-align: middle">
                                                                            <label
                                                                                style="text-align: right;width: 102%;">95%</label>
                                                                            <div class="progress mb-3">
                                                                                <div class="progress-bar progress-bar-striped bg-teal"
                                                                                    role="progressbar" style="width: 95%"
                                                                                    aria-valuenow="95" aria-valuemin="0"
                                                                                    aria-valuemax="100"></div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="personalB3" role="tabpanel"
                                                    aria-labelledby="personalB3-tab" style="padding: 0px 17px">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h5>Candidats précédemment recrutés
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <table class="table table-mission tous">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr>
                                                                        <th style="width: 218px;padding: 12px 8px;">Prénom
                                                                            et Nom du candidat</th>
                                                                        <th style="width: 78px;padding: 12px 8px;">
                                                                            Référence</th>
                                                                        <th style="width: 135px;padding: 12px 8px;">Client
                                                                        </th>
                                                                        <th style="padding: 12px 8px;width: 200px;">Poste
                                                                        </th>
                                                                        <th
                                                                            style="width: 134px;padding: 12px 8px;text-align: center">
                                                                            Date de placement</th>
                                                                        <th
                                                                            style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                            Durée dans le poste</th>
                                                                        <th style="width: 174px;padding: 12px 8px;">
                                                                            Évaluation de performance</th>
                                                                        <th
                                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                            Objectifs atteints</th>
                                                                        <th
                                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                            Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                                                                                <img src="assets/img/icon/59902.jpg"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Nouhaila
                                                                                SAOUD</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">19872</td>
                                                                        <td style="vertical-align: middle">AAT</td>
                                                                        <td style="vertical-align: middle">Chef de projet
                                                                            senior</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            01/03/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            6 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv19.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv19.jpg"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Yassine EL
                                                                                ALAMI</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">12759</td>
                                                                        <td style="vertical-align: middle">Agricultura
                                                                            España</td>
                                                                        <td style="vertical-align: middle">Consultant Cloud
                                                                            Computing</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            15/04/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            3 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv20.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv20.jpg"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Hicham
                                                                                KABBAJ</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">10659</td>
                                                                        <td style="vertical-align: middle">Arthur Benson
                                                                        </td>
                                                                        <td style="vertical-align: middle">Ingénieur
                                                                            BigData</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            10/05/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            4 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv21.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv21.jpg"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Fatima Zahra
                                                                                BENSOUDA</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">10959</td>
                                                                        <td style="vertical-align: middle">Consortium Delta
                                                                        </td>
                                                                        <td style="vertical-align: middle">Gestion de
                                                                            projets IT</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            01/06/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            12 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv22.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv22.jpg"
                                                                                    alt="" style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Karim
                                                                                BENKIRAN</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">11752</td>
                                                                        <td style="vertical-align: middle">VECTORIA LLC
                                                                        </td>
                                                                        <td style="vertical-align: middle">Consultant Cloud
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            20/06/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZM5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-5" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenTM5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                            <table class="table table-mission client-1 hidden">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr>
                                                                        <th style="width: 180px;padding: 12px 8px;">Prénom
                                                                            et Nom du candidat</th>
                                                                        <th style="padding: 12px 8px;width: 122px;">Poste
                                                                        </th>
                                                                        <th
                                                                            style="width: 134px;padding: 12px 8px;text-align: center">
                                                                            Date de placement</th>
                                                                        <th
                                                                            style="text-align: center;width: 165px;padding: 12px 8px;">
                                                                            Durée dans le poste</th>
                                                                        <th
                                                                            style="width: 155px;padding: 12px 8px;text-align: center;">
                                                                            Évaluation de performance</th>
                                                                        <th
                                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                            Objectifs atteints</th>
                                                                        <th
                                                                            style="text-align: center;width: 133px;padding: 12px 8px;">
                                                                            Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px">
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv1.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv1.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Ahmed EL
                                                                                MANSOURI</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Analyste
                                                                            financier</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            01/03/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            6 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M1">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv4.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv4.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Fatima
                                                                                BENYAHIA</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Architecte
                                                                            Cloud</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            15/04/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            3 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M2">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv2.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv2.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Youssef
                                                                                AMRANI</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Comptable</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            10/05/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            4 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M3">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv5.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv5.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Hind
                                                                                TAZI</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Chef comptable
                                                                        </td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            01/06/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            12 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M4">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: middle">
                                                                            <figure
                                                                                class="avatar avatar-50 mb-0 coverimg "
                                                                                style="background-image: url(&quot;assets/img/cvtheque/cv3.jpg&quot;);">
                                                                                <img src="assets/img/cvtheque/cv3.jpg"
                                                                                    alt=""
                                                                                    style="display: none;">
                                                                            </figure>
                                                                            <span style="margin-left: 8px">Khalid
                                                                                OULHAJ</span>
                                                                        </td>
                                                                        <td style="vertical-align: middle">Technicien
                                                                            junior</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            20/06/2023</td>
                                                                        <td
                                                                            style="vertical-align: middle;text-align: center">
                                                                            2 mois</td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenZ2M5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td style="vertical-align: middle">
                                                                            <div class="col-2" style="margin: 0 auto;">
                                                                                <div class="circle-small">
                                                                                    <div id="circleprogressgreenT2M5">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-3" style="margin: 0 auto">
                                                                                <div class="dropdown d-inline-block">
                                                                                    <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                                        role="button"
                                                                                        data-bs-toggle="dropdown"
                                                                                        data-bs-auto-close="outside"
                                                                                        aria-expanded="false">
                                                                                        <i class="bi bi-three-dots"
                                                                                            style="font-size: 21px;"></i>
                                                                                    </a>
                                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                                        data-bs-popper="static"
                                                                                        style="padding: 0;min-width: 99px !important;">
                                                                                        <li><a class="dropdown-item show-row1"
                                                                                                href="matching-detail.html">Détail</a>
                                                                                        </li>
                                                                                    </ul>
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

            $('#client-liste-chosen').on('change', function() {
                var value = $(this).val();
                if (value == 1) {
                    $('.table-mission').addClass('hidden');
                    $('.client-1').removeClass('hidden');
                } else if (value == 0) {

                    $('.table-mission').addClass('hidden');
                    $('.tous').removeClass('hidden');
                }
            })
            var progressCirclesredM1 = new ProgressBar.Circle(circleprogressgreenM1, {
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
            progressCirclesredM1.animate(0.60); // Number from 0.0 to 1.0

            var progressCirclesredM2 = new ProgressBar.Circle(circleprogressgreenM2, {
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
            progressCirclesredM2.animate(0.50); // Number from 0.0 to 1.0

            var progressCirclesredM3 = new ProgressBar.Circle(circleprogressgreenM3, {
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
            progressCirclesredM3.animate(0.33); // Number from 0.0 to 1.0

            var progressCirclesredM4 = new ProgressBar.Circle(circleprogressgreenM4, {
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
            progressCirclesredM4.animate(0.85); // Number from 0.0 to 1.0

            var progressCirclesredM5 = new ProgressBar.Circle(circleprogressgreenM5, {
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
            progressCirclesredM5.animate(0.40); // Number from 0.0 to 1.0

            var progressCirclesredM6 = new ProgressBar.Circle(circleprogressgreenM6, {
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
            progressCirclesredM6.animate(0.50); // Number from 0.0 to 1.0


            var progressCirclesredSM1 = new ProgressBar.Circle(circleprogressgreenSM1, {
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
            progressCirclesredSM1.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredSM2 = new ProgressBar.Circle(circleprogressgreenSM2, {
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
            progressCirclesredSM2.animate(0.70); // Number from 0.0 to 1.0

            var progressCirclesredSM3 = new ProgressBar.Circle(circleprogressgreenSM3, {
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
            progressCirclesredSM3.animate(0.50); // Number from 0.0 to 1.0

            var progressCirclesredSM4 = new ProgressBar.Circle(circleprogressgreenSM4, {
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
            progressCirclesredSM4.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredSM5 = new ProgressBar.Circle(circleprogressgreenSM5, {
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
            progressCirclesredSM5.animate(0.70); // Number from 0.0 to 1.0

            var progressCirclesredSM6 = new ProgressBar.Circle(circleprogressgreenSM6, {
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
            progressCirclesredSM6.animate(0.47); // Number from 0.0 to 1.0

            var progressCirclesredZM1 = new ProgressBar.Circle(circleprogressgreenZM1, {
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
            progressCirclesredZM1.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredZM2 = new ProgressBar.Circle(circleprogressgreenZM2, {
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
            progressCirclesredZM2.animate(0.70); // Number from 0.0 to 1.0

            var progressCirclesredZM3 = new ProgressBar.Circle(circleprogressgreenZM3, {
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
            progressCirclesredZM3.animate(0.50); // Number from 0.0 to 1.0

            var progressCirclesredZM4 = new ProgressBar.Circle(circleprogressgreenZM4, {
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
            progressCirclesredZM4.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredZM5 = new ProgressBar.Circle(circleprogressgreenZM5, {
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
            progressCirclesredZM5.animate(0.70); // Number from 0.0 to 1.0

            var progressCirclesredTM1 = new ProgressBar.Circle(circleprogressgreenTM1, {
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
            progressCirclesredTM1.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredTM2 = new ProgressBar.Circle(circleprogressgreenTM2, {
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
            progressCirclesredTM2.animate(0.70); // Number from 0.0 to 1.0

            var progressCirclesredTM3 = new ProgressBar.Circle(circleprogressgreenTM3, {
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
            progressCirclesredTM3.animate(0.60); // Number from 0.0 to 1.0

            var progressCirclesredTM4 = new ProgressBar.Circle(circleprogressgreenTM4, {
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
            progressCirclesredTM4.animate(0.95); // Number from 0.0 to 1.0

            var progressCirclesredTM5 = new ProgressBar.Circle(circleprogressgreenTM5, {
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
            progressCirclesredTM5.animate(0.80); // Number from 0.0 to 1.0






            var progressCirclesredZ2M1 = new ProgressBar.Circle(circleprogressgreenZ2M1, {
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
            progressCirclesredZ2M1.animate(0.80); // Number from 0.0 to 1.0

            var progressCirclesredZ2M2 = new ProgressBar.Circle(circleprogressgreenZ2M2, {
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
            progressCirclesredZ2M2.animate(0.70); // Number from 0.0 to 1.0

            var progressCirclesredZ2M3 = new ProgressBar.Circle(circleprogressgreenZ2M3, {
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
            progressCirclesredZ2M3.animate(0.50); // Number from 0.0 to 1.0

            var progressCirclesredZ2M4 = new ProgressBar.Circle(circleprogressgreenZ2M4, {
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
            progressCirclesredZ2M4.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredZ2M5 = new ProgressBar.Circle(circleprogressgreenZ2M5, {
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
            progressCirclesredZ2M5.animate(0.70); // Number from 0.0 to 1.0

            var progressCirclesredT2M1 = new ProgressBar.Circle(circleprogressgreenT2M1, {
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
            progressCirclesredT2M1.animate(0.90); // Number from 0.0 to 1.0

            var progressCirclesredT2M2 = new ProgressBar.Circle(circleprogressgreenT2M2, {
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
            progressCirclesredT2M2.animate(0.70); // Number from 0.0 to 1.0

            var progressCirclesredT2M3 = new ProgressBar.Circle(circleprogressgreenT2M3, {
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
            progressCirclesredT2M3.animate(0.60); // Number from 0.0 to 1.0

            var progressCirclesredT2M4 = new ProgressBar.Circle(circleprogressgreenT2M4, {
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
            progressCirclesredT2M4.animate(0.95); // Number from 0.0 to 1.0

            var progressCirclesredT2M5 = new ProgressBar.Circle(circleprogressgreenT2M5, {
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
            progressCirclesredT2M5.animate(0.80); // Number from 0.0 to 1.0



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
