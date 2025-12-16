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
                                                        <select class="chosenoptgroup w-100" id="client-filter">
                                                            <option value="1" selected >{{ __("generated.Tous") }}</option>
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
                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;"
                                                            >{{ __("generated.Secteur d’activité") }}</label>
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
                            <a style="font-size: 14px" href="historique-tab.html" class="nav-link ">Historique</a>
                        </li>
                        <li class="nav-item" role="presentation3">
                            <a style="font-size: 14px" href="mission-tab.html" class="nav-link ">Missions</a>
                        </li>
                        <li class="nav-item" role="presentation6">
                            <a style="font-size: 14px" href="facturation-tab.html" class="nav-link ">Facturations et
                                paiements</a>
                        </li>
                        <li class="nav-item" role="presentation7">
                            <a style="font-size: 14px" href="rapports-financiers.html" class="nav-link active">Rapports
                                financiers</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="tab-content py-3" id="myTabContent" style="background-color: transparent">
                        <!-- personal info tab-->
                        <div class="tab-pane fade active show" id="presentation7" role="tabpanel"
                            aria-labelledby="presentation7-tab">
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
                                                                        <a href="rapports-financiers-apercu.html"
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
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body" style="padding: 10px 34px;">
                                                            <div class="row mb-4">
                                                                <div class="col-12">
                                                                    <h5>Rapports financiers</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center ">
                                                                <div class="col-12">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th rowspan="2"
                                                                                    style="vertical-align: middle;width: 224px;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                                    Dépense</th>
                                                                                <th rowspan="2"
                                                                                    style="width: 2px;border: 0 !important;">
                                                                                </th>
                                                                                <th rowspan="2"
                                                                                    style="vertical-align: middle;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                                    Budget</th>
                                                                                <th rowspan="2"
                                                                                    style="width: 2px;border: 0 !important;">
                                                                                </th>
                                                                                <th colspan="3"
                                                                                    style="vertical-align: middle;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                                    Réel</th>
                                                                                <th rowspan="2"
                                                                                    style="width: 2px;border: 0 !important;">
                                                                                </th>
                                                                                <th rowspan="2"
                                                                                    style="vertical-align: middle;text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                                    Ecart</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th
                                                                                    style="text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                                    Date</th>
                                                                                <th
                                                                                    style="text-align: right;width: 93px;border-top: 1px solid #000;border-bottom: 1px solid #000">
                                                                                    Montant</th>
                                                                                <th
                                                                                    style="border-top: 1px solid #000;border-bottom: 1px solid #000;text-align: center;">
                                                                                    Facture</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="vertical-align: middle"><img
                                                                                        src="assets/img/logo-entreprise/linkedin.png"
                                                                                        style="width: 24px;"> <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Linkedin</span>
                                                                                </td>
                                                                                <td rowspan="29"
                                                                                    style="width: 2px;border: 0 !important;vertical-align: middle">
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    45 000,00</td>
                                                                                <td rowspan="29"
                                                                                    style="width: 2px;border: 0 !important;vertical-align: middle">
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                    01/12/2024</td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    48 000,00</td>
                                                                                <td style="vertical-align: middle">
                                                                                    <a href=""
                                                                                        style="width: 18px;display: block;margin: 0 auto;">
                                                                                        <i class="bi bi-file-earmark"
                                                                                            style="color: #6177db;font-size: 19px;"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td rowspan="29"
                                                                                    style="width: 2px;border: 0 !important;">
                                                                                </td>
                                                                                <td style="text-align: right">3 000,00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle"><img
                                                                                        src="assets/img/logo-entreprise/Sigle%20rekrute.jpg"
                                                                                        style="width: 24px;"> <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Rekrute</span>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    60 000,00</td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                    02/12/2024</td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    60 000,00</td>
                                                                                <td style="vertical-align: middle">
                                                                                    <a href=""
                                                                                        style="width: 18px;display: block;margin: 0 auto;">
                                                                                        <i class="bi bi-file-earmark"
                                                                                            style="color: #6177db;font-size: 19px;"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="
text-align: right;
">0,00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle"><img
                                                                                        src="assets/img/logo-entreprise/Sigle%20indeed.png"
                                                                                        style="width: 24px;background-color: #cccccc8a;">
                                                                                    <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Indeed</span>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    7 000,00</td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                    03/12/2024</td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    8 300,00</td>
                                                                                <td style="vertical-align: middle">
                                                                                    <a href=""
                                                                                        style="width: 18px;display: block;margin: 0 auto;">
                                                                                        <i class="bi bi-file-earmark"
                                                                                            style="color: #6177db;font-size: 19px;"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="
text-align: right;
">1 300,00
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle"><img
                                                                                        src="assets/img/logo-entreprise/Monster%20sigle.png"
                                                                                        style="width: 24px;background-color: var(--adminux-theme-bg);padding: 5px;">
                                                                                    <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Monster</span>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    8 900,00</td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                    04/12/2024</td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    7 200,00</td>
                                                                                <td style="vertical-align: middle">
                                                                                    <a href=""
                                                                                        style="width: 18px;display: block;margin: 0 auto;">
                                                                                        <i class="bi bi-file-earmark"
                                                                                            style="color: #6177db;font-size: 19px;"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="
text-align: right;
">-1 700,00
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle"><img
                                                                                        src="assets/img/logo-entreprise/Dreamjob%20sigle.png"
                                                                                        style="width: 24px;background-color: var(--adminux-theme-bg);">
                                                                                    <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Dreamjob</span>
                                                                                </td>
                                                                                <td style="vertical-align: middle"></td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                </td>
                                                                                <td style="vertical-align: middle">
                                                                                </td>
                                                                                <td style="vertical-align: middle"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle"><img
                                                                                        src="assets/img/logo-entreprise/emploi.ma%20sigle.png"
                                                                                        style="width: 24px;background-color: var(--adminux-theme-bg);padding: 3px;">
                                                                                    <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Emploi.ma</span>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    2 500,00</td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                    06/12/2024</td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    2 500,00</td>
                                                                                <td style="vertical-align: middle">
                                                                                    <a href=""
                                                                                        style="width: 18px;display: block;margin: 0 auto;">
                                                                                        <i class="bi bi-file-earmark"
                                                                                            style="color: #6177db;font-size: 19px;"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    0,00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle"><img
                                                                                        src="assets/img/logo-entreprise/M-Job-sigle.png"
                                                                                        style="width: 24px;"> <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">M-Job</span>
                                                                                </td>
                                                                                <td style="vertical-align: middle"></td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                </td>
                                                                                <td style="vertical-align: middle">
                                                                                </td>
                                                                                <td style="vertical-align: middle"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle"><img
                                                                                        src="assets/img/logo-entreprise/HJ_icon_green_black.png"
                                                                                        alt=""
                                                                                        style="width: 24px"> <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Human
                                                                                        Jobs</span></td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    65 000,00</td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                    08/12/2024</td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    65 000,00</td>
                                                                                <td style="vertical-align: middle">
                                                                                    <a href=""
                                                                                        style="width: 18px;display: block;margin: 0 auto;">
                                                                                        <i class="bi bi-file-earmark"
                                                                                            style="color: #6177db;font-size: 19px;"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    0,00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle">
                                                                                    <img src="assets/img/logo-entreprise/HJ_icon%20black%20background%201.png"
                                                                                        alt=""
                                                                                        style="width: 24px">
                                                                                    <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Test
                                                                                        technique</span>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    10 000,00</td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                    10/12/2024</td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    8 000,00</td>
                                                                                <td style="vertical-align: middle">
                                                                                    <a href=""
                                                                                        style="width: 18px;display: block;margin: 0 auto;">
                                                                                        <i class="bi bi-file-earmark"
                                                                                            style="color: #6177db;font-size: 19px;"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    -2 000,00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="vertical-align: middle">
                                                                                    <img src="assets/img/logo-entreprise/HJ_icon%20black%20background%201.png"
                                                                                        alt=""
                                                                                        style="width: 25px">
                                                                                    <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Test
                                                                                        personnalité</span>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    15 000,00</td>
                                                                                <td
                                                                                    style="text-align: center;vertical-align: middle">
                                                                                    10/12/2024</td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    9 500,00</td>
                                                                                <td style="vertical-align: middle">
                                                                                    <a href=""
                                                                                        style="width: 18px;display: block;margin: 0 auto;">
                                                                                        <i class="bi bi-file-earmark"
                                                                                            style="color: #6177db;font-size: 19px;"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;vertical-align: middle">
                                                                                    -5 500,00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    <div class="avatar avatar-30 rounded bg-light-blue"
                                                                                        style="background-color: #000 !important;width: 24px !important;height: 24px !important;">
                                                                                        <i class="bi bi-megaphone-fill avatar   rounded h5"
                                                                                            style="color: #fff;font-size: 13px;"></i>
                                                                                    </div>
                                                                                    <span
                                                                                        style="font-size: 14px;margin-left: 6px;font-weight: 700">Frais
                                                                                        de communication</span>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    1 500,00</td>
                                                                                <td
                                                                                    style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    08/12/2024</td>
                                                                                <td
                                                                                    style="text-align: right;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    1 200,00</td>
                                                                                <td
                                                                                    style="border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    <a href=""
                                                                                        style="width: 18px;display: block;margin: 0 auto;">
                                                                                        <i class="bi bi-file-earmark"
                                                                                            style="color: #6177db;font-size: 19px;"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    -300,00</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    style="border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                                    Total</td>
                                                                                <td
                                                                                    style="border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                                    214 900,00</td>
                                                                                <td
                                                                                    style="text-align: center;border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: right;border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                                    209 700,00</td>
                                                                                <td
                                                                                    style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                </td>
                                                                                <td
                                                                                    style="text-align: center;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                                    -5 200,00</td>
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
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12 mb-4">
                                                    <div class="card border-0">
                                                        <div class="card-header">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <i
                                                                        class="bi bi-bar-chart h5 avatar avatar-40 bg-light-theme rounded"></i>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-0">Performances</h6>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="padding: 20px 34px;height: 263px;">

                                                            <div class="row justify-content-center ">
                                                                <div class="col-4">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto" style="text-align: center">
                                                                            <div class="doughnutchart mb-2">
                                                                                <canvas id="doughnutchart"></canvas>
                                                                                <div class="countvalue shadow">
                                                                                    <div class="w-100">
                                                                                        <h5 class="mb-1">300</h5>
                                                                                        <p>CVs</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span style="font-weight: 700">CVs
                                                                                générés</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto" style="text-align: center">
                                                                            <div class="doughnutchart mb-2">
                                                                                <canvas id="doughnutchart2"></canvas>
                                                                                <div class="countvalue shadow">
                                                                                    <div class="w-100">
                                                                                        <h5 class="mb-1">170</h5>
                                                                                        <p>CVs</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span style="font-weight: 700">CVs
                                                                                qualifiés</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto" style="text-align: center">
                                                                            <div class="doughnutchart mb-2">
                                                                                <canvas id="doughnutchart3"></canvas>
                                                                                <div class="countvalue shadow">
                                                                                    <div class="w-100">
                                                                                        <h5 class="mb-1">33%</h5>
                                                                                        <p>CVs Retenus</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span style="font-weight: 700">Taux de
                                                                                conversion</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-header">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <i
                                                                        class="bi bi-bar-chart h5 avatar avatar-40 bg-light-theme rounded"></i>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="fw-medium mb-0">Évaluation des dépenses</h6>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="card-body" style="padding: 33px 34px;height: 278px;">

                                                            <div class="row justify-content-center ">
                                                                <div class="col-12">
                                                                    <div class="bigchart200 mt-2">
                                                                        <canvas id="areachart1"></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            /* doughnut chart js */
            var doughnutchart = document.getElementById('doughnutchart').getContext('2d');
            var data = {
                labels: ['Linkedin', 'Rekrute', 'Indeed', 'Monster', 'Emploi.ma'],
                datasets: [{
                    label: '',
                    data: [100, 20, 80, 60, 40],
                    backgroundColor: ['#ffbb00', '#91c300', '#ff6f6a', '#015ec2', '#becede'],
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

            /* doughnut chart js */
            var doughnutchart2 = document.getElementById('doughnutchart2').getContext('2d');
            var data = {
                labels: ['Linkedin', 'Rekrute', 'Indeed', 'Monster', 'Emploi.ma'],
                datasets: [{
                    label: '',
                    data: [70, 15, 40, 45, 35],
                    backgroundColor: ['#ffbb00', '#91c300', '#ff6f6a', '#015ec2', '#becede'],
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

            /* doughnut chart js */
            var doughnutchart3 = document.getElementById('doughnutchart3').getContext('2d');
            var data = {
                labels: ['Linkedin', 'Rekrute', 'Indeed', 'Monster', 'Emploi.ma'],
                datasets: [{
                    label: '',
                    data: [58, 8, 33, 35, 31],
                    backgroundColor: ['#ffbb00', '#91c300', '#ff6f6a', '#015ec2', '#becede'],
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
            /* chart js areachart */
            window.randomScalingFactor = function() {
                return Math.round(Math.random() * 20);
            }

            window.randomScalingFactor2 = function() {
                return Math.round(Math.random() * 10);
            }

            /* bar chart */
            var areachart = document.getElementById('areachart1').getContext('2d');
            var areachart1 = areachart.createLinearGradient(0, 0, 0, 195);
            areachart1.addColorStop(0, 'rgba(1, 94, 194, 0.4)');
            areachart1.addColorStop(1, 'rgba(0, 197, 221, 0)');
            var areachart2 = areachart.createLinearGradient(0, 0, 0, 190);
            areachart2.addColorStop(0, 'rgba(240, 61, 79, 0.4)');
            areachart2.addColorStop(1, 'rgba(255, 223, 220, 0)');
            var areachart3 = areachart.createLinearGradient(0, 0, 0, 195);
            areachart3.addColorStop(0, 'rgba(145, 195, 0, 0.85)');
            areachart3.addColorStop(1, 'rgba(176, 197, 0, 0)');
            var myareachart = {
                type: 'bar',
                data: {
                    labels: ['Jan-2025', 'Fév-2025', 'Mar-2025', 'Avr-2025', 'Mai-2025', 'Jun-2025', 'Jul-2025',
                        'Aoû-2025', 'Sep-2025', 'Oct-2025', 'Nov-2025', 'Déc-2025'
                    ],
                    datasets: [{
                        label: '# income',
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                        ],
                        radius: 2,
                        pointBackgroundColor: '#ffffff',
                        backgroundColor: areachart3,
                        borderColor: '#91C300',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.3,
                    }, {
                        label: '# of Expense',
                        data: [
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                        ],
                        radius: 2,
                        pointBackgroundColor: '#ffffff',
                        backgroundColor: areachart2,
                        borderColor: 'rgba(240, 61, 79, 0.65)',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.3,
                    }, {
                        label: '# of Investments',
                        data: [
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                            randomScalingFactor2(),
                        ],
                        radius: 2,
                        pointBackgroundColor: '#ffffff',
                        backgroundColor: areachart1,
                        borderColor: 'rgba(1, 94, 194, 0.4)',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.3,
                    }]
                },
                options: {
                    layout: {
                        padding: 0,
                    },
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                    scales: {
                        y: {
                            display: true,
                            grid: {
                                display: false
                            },
                            beginAtZero: true,
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            display: true,
                            beginAtZero: false,
                        }
                    }
                }
            }
            var myareachartexecu = new Chart(areachart, myareachart);
        })
    </script>
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
