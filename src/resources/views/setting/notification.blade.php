@extends('layouts.master')

@section('title', 'Notification')

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
                    <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                </div>
            </div>
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                 title="{{ __("generated.contact") }}">
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
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                    <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                        <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                    </span>
                </figure>
            </div>
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __("generated.Chatbot") }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
            </div>
            <div class="col col-sm-auto"  data-bs-toggle="tooltip" data-bs-placement="top" title="Confort utilisateur" style="margin-right: 40px;">
                <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button" id="showNotificationFaciliti">
                    <i class="bi bi-" style="font-size: 26px;">
                        <img src="{{asset('assets/img/icon/faciliti.png')}}" style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                    </i>
                </button>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Notifications") }}</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0"  >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-body filter-block">
                                        <div class="row">
                                            <div class="col-3" style="width: 251px;">
                                                <div  id="country-selector" class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Pays </label>
                                                    <select class="chosenoptgroup w-100">
                                                        <option>Tous</option>
                                                        <option value="Arabie" data-image="{{asset('assets/img/drap/saudi-arabia.png') }}">Arabie Saoudite</option>
                                                        <option value="Belgique"  data-image="{{asset('assets/img/drap/Belgique.jpg') }}">Belgique</option>
                                                        <option value="Canada"  data-image="{{asset('assets/img/drap/Canada.png') }}">Canada</option>
                                                        <option value="Cameroun"  data-image="{{asset('assets/img/drap/cameroon.jpg') }}">Cameroun</option>
                                                        <option value="Chine"  data-image="{{asset('assets/img/drap/china.jpg') }}">Chine</option>
                                                        <option value="Ivoire"  data-image="{{asset("assets/img/drap/Cote_d'Ivoire.png") }}">Côte d'Ivoire</option>
                                                        <option value="Espagne"  data-image="{{asset('assets/img/drap/Spain.png') }}">Espagne</option>
                                                        <option value="Unis"  data-image="{{asset('assets/img/drap/united-arab-emirates.jpg') }}">Émirats Arabes Unis</option>
                                                        <option value="France"  data-image="{{asset('assets/img/drap/France.png') }}">France</option>
                                                        <option value="Inde"  data-image="{{asset('assets/img/drap/india.jpg') }}">Inde</option>
                                                        <option value="Irlande"  data-image="{{asset('assets/img/drap/Ireland.png') }}">Irlande</option>
                                                        <option value="Maroc" selected data-image="{{asset('assets/img/drap/MAROC.jpg') }}">Maroc</option>
                                                        <option value="Qatar"  data-image="{{asset('assets/img/drap/QATAR.jpg') }}">Qatar</option>
                                                        <option value="Sénégal"  data-image="{{asset('assets/img/drap/senegal.jpg') }}">Sénégal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3" style="width: 170px;">
                                                <div id="Maroc" class="ville-p">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Agadir</option>
                                                            <option selected>Casablanca</option>
                                                            <option >Dakhla</option>
                                                            <option>Fès</option>
                                                            <option >Kenitra</option>
                                                            <option >Laâyoune</option>
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
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Bordeaux</option>
                                                            <option selected>Lille</option>
                                                            <option>Lyon</option>
                                                            <option >Marseille</option>
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
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Cork</option>
                                                            <option selected>Drogheda</option>
                                                            <option>Dublin</option>
                                                            <option >Galway</option>
                                                            <option>Limerick</option>
                                                            <option>Waterford</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Arabie" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Buraidah</option>
                                                            <option selected>Dammam</option>
                                                            <option>Jeddah</option>
                                                            <option >Khobar</option>
                                                            <option>Mecca</option>
                                                            <option>Medina</option>
                                                            <option>Riyad</option>
                                                            <option>Taïf</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Qatar" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Al Daayen</option>
                                                            <option selected>Al Khor</option>
                                                            <option>Al Rayyan</option>
                                                            <option >Al Wakrah</option>
                                                            <option>Doha</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Unis" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Abou Dabi</option>
                                                            <option selected>Ajman</option>
                                                            <option>Dubaï</option>
                                                            <option >Ras Al Khaimah</option>
                                                            <option>Sharjah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Sénégal" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Dakar</option>
                                                            <option selected>Kaolack</option>
                                                            <option>Thiès</option>
                                                            <option >Touba</option>
                                                            <option>Ziguinchor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Ivoire" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Abidjan</option>
                                                            <option selected>Bouaké</option>
                                                            <option>Daloa</option>
                                                            <option >San Pedro</option>
                                                            <option>Yamoussoukro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Cameroun" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Bafoussam</option>
                                                            <option selected>Bamenda</option>
                                                            <option>Douala</option>
                                                            <option >Garoua</option>
                                                            <option>Yaoundé</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Inde" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Ahmedabad</option>
                                                            <option selected>Bangalore</option>
                                                            <option>Chennai</option>
                                                            <option >Delhi</option>
                                                            <option>Hyderabad</option>
                                                            <option>Kolkata</option>
                                                            <option>Mumbai</option>
                                                            <option>Surat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Chine" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Beijing</option>
                                                            <option selected>Chengdu</option>
                                                            <option>Chongqing</option>
                                                            <option >Guangzhou</option>
                                                            <option>Hong Kong</option>
                                                            <option>Shanghai</option>
                                                            <option>Shenzhen</option>
                                                            <option>Tianjin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Espagne" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Barcelone</option>
                                                            <option selected>Madrid</option>
                                                            <option>Malaga</option>
                                                            <option >Saragosse</option>
                                                            <option>Séville</option>
                                                            <option>Valence</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Canada" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Calgary</option>
                                                            <option selected>Edmonton</option>
                                                            <option>Montréal</option>
                                                            <option >Ottawa</option>
                                                            <option>Toronto</option>
                                                            <option>Vancouver </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="Belgique" class="ville-p hidden">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Ville </label>
                                                        <select class="chosenoptgroup w-100">
                                                            <option>Tous</option>
                                                            <option>Anvers</option>
                                                            <option selected>Bruxelles</option>
                                                            <option>Charleroi</option>
                                                            <option >Gand</option>
                                                            <option>Liège</option>
                                                            <option>Leuven</option>
                                                            <option>Namur</option>
                                                            <option>Bruges</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-3" style="width: 278px;">
                                                <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Filiale</label>
                                                    <select class="chosenoptgroup w-100">
                                                        <option>Tous</option>
                                                        <option>Filatoc</option>
                                                        <option>Xima</option>
                                                        <option>Kamala</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3" style="width: 276px;margin-right: 0px  !important;">
                                                <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Agence</label>
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
        <div class="row mb-3">
            <div class="col-12">
                <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist" style="width: 97%">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="tab1220-tab" data-bs-toggle="tab" data-bs-target="#tab1220" type="button" role="tab" aria-controls="tab1220" aria-selected="true">{{ __("generated.Rappel automatique") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tab11120-tab" data-bs-toggle="tab" data-bs-target="#tab11120" type="button" role="tab" aria-controls="tab11120" aria-selected="true">{{ __("generated.Planification des rappels") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tab1120-tab" data-bs-toggle="tab" data-bs-target="#tab1120" type="button" role="tab" aria-controls="tab1120" aria-selected="true">{{ __("generated.Personnalisation des notifications") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tab11220-tab" data-bs-toggle="tab" data-bs-target="#tab11220" type="button" role="tab" aria-controls="tab11220" aria-selected="true">{{ __("generated.Destinataire") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">{{ __("generated.Escalade des notifications") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="true">{{ __("generated.Rapport de suivi") }}</button>
                    </li>

                </ul>
            </div>

        </div>
        <div class="row">
            <div class="tab-content" id="nav-navtabscard30">
                <div class="tab-pane fade active show" id="tab1220" role="tabpanel" aria-labelledby="tab1220-tab">
                    <div class="row mt-4 mb-4">
                        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active " id="planner-tab" data-bs-toggle="tab" data-bs-target="#planner" type="button" role="tab" aria-controls="planner" aria-selected="true">{{ __("generated.Premier rappel") }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts" type="button" role="tab" aria-controls="posts" aria-selected="false" tabindex="-1">{{ __("generated.Second rappel") }}</button>
                            </li>
                        </ul>
                    </div>



                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="planner" role="tabpanel" aria-labelledby="planner-tab">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card border-0 mb-2">
                                                <div class="card-body" style="background-color: #e4e8ee54">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body">
                                                                    <div class="row justify-content-center ">
                                                                        <div class="col-4" style="width: 30%;"></div>
                                                                        <div class="col-2 ms-auto" style="width: 24%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                            <div class="row">
                                                                                <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-right: -15px;" title="Ajouter">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#emailcompose">
                                                                                            <i class="bi bi-plus-square avatar   rounded h5"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-right: -15px;" title="Apérçu">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                                        <a href="#" type="button">
                                                                                            <i class="bi bi-file avatar   rounded h5"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-right: -15px;" title="Modifier">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                                        <i class="bi bi-pen avatar   rounded h5"></i>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-auto" style="margin-right: -15px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Enregistrer">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                                        <i class="bi bi-floppy avatar   rounded h5"></i>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-right: -15px;" title="Supprimer">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                                        <i class="bi bi-trash avatar   rounded h5"></i>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
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
                                            <div class="card border-0 mb-2">
                                                <div class="card-body" style="background-color: #e4e8ee54">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center py-2" style="padding: 10px 20px;">
                                                                        <div class="col-12">
                                                                            <div class="row mb-4">
                                                                                <div class="col-7 mt-1 " >
                                                                                    <h4 class="title custom-title ">{{ __("generated.Premier rappel") }}</h4>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row mt-4 mb-4">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <span style="font-weight: 700;" >{{ __("generated.Relance client :") }}</span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input" type="checkbox" id="emailsocial1" data-bs-toggle="tooltip" data-bs-placement="top" title="Oui/Non">
                                                                                        <label class="form-check-label" for="emailsocial1"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >{{ __("generated.Expéditeur e-mail :") }}</p>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <div class="input-group ">
                                                                                        <input style="border-bottom: 1px solid #005DC7;padding: 10px;" type="text" class="form-control" placeholder="" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >Destinataire de l'e-mail : </p>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <div class="input-group ">
                                                                                        <input style="border-bottom: 1px solid #005DC7;padding: 10px;" type="text" class="form-control" placeholder="" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >CC : </p>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <div class="input-group ">
                                                                                        <input style="border-bottom: 1px solid #005DC7;padding: 10px;" type="text" class="form-control" placeholder="" value="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >Date de clôture : </p>
                                                                                </div>
                                                                                <div class="col col-sm-auto">
                                                                                    <div class="form-group mb-2 position-relative check-valid is-valid">
                                                                                        <div class="input-group input-group-lg" >
                                                                                            <div class="form-floating">
                                                                                                <input type="text" value="20/10/2024" required="" class="form-control border-start-0" id="notificationdaterange2">
                                                                                                <label>Date</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >Date de relance : </p>
                                                                                </div>
                                                                                <div class="col col-sm-auto">
                                                                                    <div class="form-group mb-2 position-relative check-valid is-valid">
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text" value="" required="" class="form-control border-start-0" id="notificationdaterange3">
                                                                                                <label>Date</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >Objet : </p>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <div class="input-group input-group-md rounded custom-trt poste-chosen email-chosen"  style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                                        <select class="form-control simplechosen" id="text-chosen">
                                                                                            <option value="1" selected>Planification des entretiens</option>
                                                                                            <option value="2" >Planification d'un test technique</option>
                                                                                            <option value="3">Planification d'un test de personnalité</option>
                                                                                            <option value="4">Planification d'un quiz</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <style>.chosen-search{display: none}</style>
                                                                            </div>
                                                                            <div class="form-control border content-ckeditor ckedit" id="ckeditor" style="text-align: justify;padding: 12px 30px;">
                                                                                Cher client,<br><br>

                                                                                Ce message a été généré automatiquement pour vous rappeler la planification des entretiens.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de planifier les entretiens, en précisant le mode, le lieu ou le lien correspondant.<br><br>

                                                                                Cordialement,<br><br>
                                                                                Soundousse BELYAZID<br>
                                                                                Coordinatrice de projet recrutement
                                                                            </div>

                                                                            <div class="row gx-2 mt-4">
                                                                                <div class="col-auto">
                                                                                    <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-paperclip me-0 me-md-2"></i> <span class="d-none d-md-inline-block">Pièce jointe</span></button>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-link h5 me-0 me-md-2"></i> <span class="d-none d-md-inline-block">Insérer un lien</span></button>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-vector-pen me-0 me-md-2"></i> <span class="d-none d-md-inline-block">Signer</span></button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-4">
                                                                                <div class="col">

                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <button class="btn btn-theme" type="button">Modiffier</button>
                                                                                    <button class="btn btn-theme " type="button" style="margin-left: 10px">Enregistrer</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card border-0 mb-2">
                                                <div class="card-body" style="background-color: #e4e8ee54">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body">
                                                                    <div class="row justify-content-center ">
                                                                        <div class="col-4" style="width: 30%;"></div>
                                                                        <div class="col-2 ms-auto" style="width: 24%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                            <div class="row">
                                                                                <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-right: -15px;" title="Ajouter">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#emailcompose">
                                                                                            <i class="bi bi-plus-square avatar   rounded h5"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-right: -15px;" title="Apérçu">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                                        <a href="#" type="button">
                                                                                            <i class="bi bi-file avatar   rounded h5"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-right: -15px;" title="Modifier">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                                        <i class="bi bi-pen avatar   rounded h5"></i>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-auto" style="margin-right: -15px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Enregistrer">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                                        <i class="bi bi-floppy avatar   rounded h5"></i>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" style="margin-right: -15px;" title="Supprimer">
                                                                                    <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                                        <i class="bi bi-trash avatar   rounded h5"></i>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
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
                                            <div class="card border-0 mb-2">
                                                <div class="card-body" style="background-color: #e4e8ee54">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center py-2" style="padding: 10px 20px;">
                                                                        <div class="col-12">
                                                                            <div class="row mb-4">
                                                                                <div class="col-7 mt-1 " >
                                                                                    <h4 class="title custom-title">Second rappel</h4>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row mt-4 mb-4">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <span style="font-weight: 700;">Relance client : </span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <div class="form-check form-switch">
                                                                                        <input class="form-check-input" type="checkbox" id="emailsocial1" data-bs-toggle="tooltip" data-bs-placement="top" title="Oui/Non">
                                                                                        <label class="form-check-label" for="emailsocial1"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >Expéditeur e-mail : </p>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <input style="border-bottom: 1px solid #005DC7;padding: 10px;" type="text" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >Destinataire de l'e-mail : </p>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <input style="border-bottom: 1px solid #005DC7;padding: 10px;" type="text" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >CC : </p>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <input style="border-bottom: 1px solid #005DC7;padding: 10px;" type="text" class="form-control" placeholder="" value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >Date de clôture : </p>
                                                                                </div>
                                                                                <div class="col col-sm-auto">
                                                                                    <div class="form-group mb-2 position-relative check-valid is-valide">
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text" value="20/10/2024" required="" class="form-control border-start-0" id="notificationdaterange2">
                                                                                                <label>Date</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >Date de relance : </p>
                                                                                </div>
                                                                                <div class="col col-sm-auto">
                                                                                    <div class="form-group mb-2 position-relative check-valid is-valid">
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text" value="14/10/2024" required="" class="form-control border-start-0" id="notificationdaterange3">
                                                                                                <label>Date</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row align-items-center mb-3">
                                                                                <div class="col-2" style="width: 19%">
                                                                                    <p >Objet : </p>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <div class="input-group input-group-md rounded custom-trt email-chosen"  style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                                        <select class="form-control simplechosen" id="text-chosen2">
                                                                                            <option value="1" selected>Planification des entretiens</option>
                                                                                            <option value="2" >Planification d'un test technique</option>
                                                                                            <option value="3">Planification d'un test de personnalité</option>
                                                                                            <option value="4">Planification d'un quiz</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <style>.chosen-search{display: none}</style>
                                                                            </div>
                                                                            <div class="form-control border content-ckeditor2 ckedit" id="ckeditor" style="text-align: justify;padding: 12px 30px;">
                                                                                Cher client,<br><br>

                                                                                Ce message constitue un second rappel pour la planification des entretiens.<br><br>

                                                                                Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de programmer les entretiens, en précisant le mode, le lieu ou le lien correspondant.<br><br>

                                                                                Cordialement,<br><br>
                                                                                Soundousse BELYAZID<br>
                                                                                Coordinatrice de projet recrutement
                                                                            </div>

                                                                            <div class="row gx-2 mt-4">
                                                                                <div class="col-auto">
                                                                                    <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-paperclip me-0 me-md-2"></i> <span class="d-none d-md-inline-block">Pièce jointe</span></button>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-link h5 me-0 me-md-2"></i> <span class="d-none d-md-inline-block">Insérer un lien</span></button>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-vector-pen me-0 me-md-2"></i> <span class="d-none d-md-inline-block">Signer</span></button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-4">
                                                                                <div class="col">

                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <button class="btn btn-theme" type="button">Modiffier</button>
                                                                                    <button class="btn btn-theme " type="button" style="margin-left: 10px">Enregistrer</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                    <div class="row justify-content-center mb-4 mt-4" style="margin-left: 37px;">
                        <h4 class="title custom-title" style="margin-bottom: 33px;">Canal de notification</h4>
                        <div class="col-3">
                            <div class="card border-0 w-200">
                                <div class="card-body">
                                    <div class="coverimg w-100 h-180 rounded mb-3">
                                        <img src="{{asset('assets/img/icon/outlook.png')}}" alt="" style="display: none;">
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col-8 ">
                                            <h6 class="fw-medium mb-0" style="font-size: 13px;margin-left: -12px;">E-mail</h6>
                                        </div>
                                        <div class="col-2" style="margin-top: -4px;">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input deviceslistAPI" type="checkbox" role="switch" id="" data-target="#exampleModalApi1">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card border-0 w-200">
                                <div class="card-body">
                                    <div class="coverimg w-100 h-180 rounded mb-3" style="background-size: 100px;background-repeat: no-repeat;">
                                        <img src="{{asset('assets/img/icon/teams.png')}}" alt="" style="display: none;">
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col-8 ">
                                            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalteams" class="btn btn-theme dt-b1 " style="font-size: 13px;margin-top: -4px;margin-left: -17px;padding: 4px 10px;">Guide</a>
                                        </div>
                                        <div class="col-2" style="margin-top: -4px;">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input deviceslistAPI" type="checkbox" role="switch" id="" data-target="#exampleModalApi1">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card border-0 w-200">
                                <div class="card-body">
                                    <div class="coverimg w-100 h-180 rounded mb-3">
                                        <img src="{{asset('assets/img/icon/zoom.png')}}" alt="" style="display: none;">
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col-8 ">
                                            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalzoom" class="btn btn-theme dt-b1 " style="font-size: 13px;margin-top: -4px;margin-left: -17px;padding: 4px 10px;">Guide</a>
                                        </div>
                                        <div class="col-2" style="margin-top: -4px;">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input deviceslistAPI" type="checkbox" role="switch" id="" data-target="#exampleModalApi1">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5" style="margin-left: 37px;">
                        <div class="col-3">
                            <div class="card border-0 w-200">
                                <div class="card-body">
                                    <div class="coverimg w-100 h-180 rounded mb-3">
                                        <img src="{{asset('assets/img/icon/slack.png')}}" alt="" style="display: none;">
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col-8 ">
                                            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalslack" class="btn btn-theme dt-b1" style="font-size: 13px;margin-top: -4px;margin-left: -17px;padding: 4px 10px;">Guide</a>
                                        </div>
                                        <div class="col-2" style="margin-top: -4px;">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input deviceslistAPI" type="checkbox" role="switch" id="" data-target="#exampleModalApi1">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card border-0 w-200">
                                <div class="card-body">
                                    <div class="coverimg w-100 h-180 rounded mb-3">
                                        <img src="{{asset('assets/img/icon/larck.png')}}" alt="" style="display: none;">
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col-8 ">
                                            <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModallark" class="btn btn-theme dt-b1" style="font-size: 13px;margin-top: -4px;margin-left: -17px;padding: 4px 10px;">Guide</a>
                                        </div>
                                        <div class="col-2" style="margin-top: -4px;">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input deviceslistAPI" type="checkbox" role="switch" id="" data-target="#exampleModalApi1">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card border-0 w-200">
                                <div class="card-body">
                                    <div class="coverimg w-100 h-180 rounded mb-3" style="background-image: url(&quot;assets/img/icon/HJL.png&quot;);background-size: 167px;background-repeat: no-repeat;">
                                        <img src="{{asset('assets/img/icon/HJL.png')}}" alt="" style="display: none;">
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col-8 ">
                                            <h6 class="fw-medium mb-0" style="font-size: 13px;margin-left: -12px;">Human Jobs</h6>
                                        </div>
                                        <div class="col-2" style="margin-top: -4px;">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input deviceslistAPI" type="checkbox" role="switch" id="" data-target="#exampleModalApi1">
                                                <label class="form-check-label"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="tab11220" role="tabpanel" aria-labelledby="tab11220-tab">

                    <div class="row mt-2 mb-5">
                        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="planner2-tab" data-bs-toggle="tab" data-bs-target="#planner2" type="button" role="tab" aria-controls="planner2" aria-selected="true">Premier rappel</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="posts2-tab" data-bs-toggle="tab" data-bs-target="#posts2" type="button" role="tab" aria-controls="posts2" aria-selected="false" tabindex="-1">Second rappel</button>
                            </li>
                        </ul>
                    </div>
                            <div class="tab-content" id="nav-navtabscard30">
                                <div class="tab-pane fade active show" id="planner2" role="tabpanel" aria-labelledby="planner2-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0"  >
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0" style="background-color: #efefef">
                                                                <div class="card-body" style="padding: 20px 28px">
                                                                    <div class="row mb-5">
                                                                        <div class="row">
                                                                            <h6 class="title custom-title"  style="font-size: 20px; width: 100%;font-weight: 700;margin-bottom: 20px;margin-top: 20px">Expéditeur</h6>
                                                                            <!--<span style="font-size: 20px; width: 100%;font-weight: 700;margin-bottom: 20px;margin-top: 20px">Destinataires</span>-->
                                                                            <div class="swiper swiperauto">
                                                                                <div class="swiper-wrapper">
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-5 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                            <img src="{{asset('assets/img/icon2/outlook-new.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange1"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/9989.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange1"></span> Abdellah CHAHID</h6>
                                                                                                <p class="text-secondary small">Gestionnaire de paie </p>
                                                                                                <p>Service gestion de la paie</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/slack.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange2"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/62261.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange2"></span> Nouhaila SAOUD</h6>
                                                                                                <p class="text-secondary small">Delivery Manager </p>
                                                                                                <p>Service gestion de la paie</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #4c53bb" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange3"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/5841.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange3"></span> Najib ZEROUALI</h6>
                                                                                                <p class="text-secondary small">Responsable Relation Client Paie</p>
                                                                                                <p>Service relation clients</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange4"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/man1.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange4"></span>Ismaïl Najib</h6>
                                                                                                <p class="text-secondary small">HR Manager</p>
                                                                                                <p>Service Ressources Humaines</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                            <img src="{{asset('assets/img/icon2/outlook-new.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/slack.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange5"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/59902.jpg')}}" alt=""/>
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange5"></span>Soukaina ANDALOUSSI</h6>
                                                                                                <p class="text-secondary small">Chargé de temps et activités</p>
                                                                                                <p>Service Ressources Humaines</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange6"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/2147704437.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange6"></span>Soundouce EL AMRANI</h6>
                                                                                                <p class="text-secondary small">Contrôleur de gestion sociale</p>
                                                                                                <p>Service contrôle de gestion</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <h6 class="title custom-title"  style="font-size: 20px; width: 100%;font-weight: 700;margin-bottom: 20px;margin-top: 20px">Destinataire</h6>
                                                                            <!--<span style="font-size: 20px; width: 100%;font-weight: 700;margin-bottom: 20px;margin-top: 20px">Destinataires</span>-->
                                                                            <div class="swiper swiperauto">
                                                                                <div class="swiper-wrapper">
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-5 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                            <img src="{{asset('assets/img/icon2/outlook-new.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange7"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/f1.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange7"></span> Asmaa EL ALAMI</h6>
                                                                                                <p class="text-secondary small">Gestionnaire de paie </p>
                                                                                                <p>Service gestion de la paie</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/slack.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange8"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/h1.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange8"></span> Anas EL OUDGHIRI</h6>
                                                                                                <p class="text-secondary small">Delivery Manager </p>
                                                                                                <p>Service gestion de la paie</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #4c53bb" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange9"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/f2.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange9"></span> Meryem FADILI</h6>
                                                                                                <p class="text-secondary small">Responsable Relation Client Paie</p>
                                                                                                <p>Service relation clients</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange10"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/h2.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange10"></span>Omar NHAILI</h6>
                                                                                                <p class="text-secondary small">HR Manager</p>
                                                                                                <p>Service Ressources Humaines</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                            <img src="{{asset('assets/img/icon2/outlook-new.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/slack.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange11"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/f3.jpg')}}" alt=""/>
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange11"></span>Najwa SEFRIOUI</h6>
                                                                                                <p class="text-secondary small">Chargé de temps et activités</p>
                                                                                                <p>Service Ressources Humaines</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange12"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/h3.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange12"></span>Said EL JAZOULI</h6>
                                                                                                <p class="text-secondary small">Contrôleur de gestion sociale</p>
                                                                                                <p>Service contrôle de gestion</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0"  >
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0" style="background-color: #efefef">
                                                                <div class="card-body" style="padding: 20px 28px">
                                                                    <div class="row mb-5">
                                                                        <div class="row">
                                                                            <h6 class="title custom-title"  style="font-size: 20px; width: 100%;font-weight: 700;margin-bottom: 20px;margin-top: 20px">Expéditeur</h6>
                                                                            <!--<span style="font-size: 20px; width: 100%;font-weight: 700;margin-bottom: 20px;margin-top: 20px">Destinataires</span>-->
                                                                            <div class="swiper swiperauto">
                                                                                <div class="swiper-wrapper">
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-5 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                            <img src="{{asset('assets/img/icon2/outlook-new.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange13"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/9989.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange13"></span> Abdellah CHAHID</h6>
                                                                                                <p class="text-secondary small">Gestionnaire de paie </p>
                                                                                                <p>Service gestion de la paie</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/slack.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange14"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/62261.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange14"></span> Nouhaila SAOUD</h6>
                                                                                                <p class="text-secondary small">Delivery Manager </p>
                                                                                                <p>Service gestion de la paie</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #4c53bb" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/zoom.png') }}" style="max-width: 28px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/lark.jpg') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange15"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/5841.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange15"></span> Najib ZEROUALI</h6>
                                                                                                <p class="text-secondary small">Responsable Relation Client Paie</p>
                                                                                                <p>Service relation clients</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/lark.jpg') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange16"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/man1.jpg') }}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange16"></span>Ismaïl Najib</h6>
                                                                                                <p class="text-secondary small">HR Manager</p>
                                                                                                <p>Service Ressources Humaines</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                            <img src="{{asset('assets/img/icon2/outlook-new.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/slack.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange17"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/59902.jpg')}}" alt=""/>
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange17"></span>Soukaina ANDALOUSSI</h6>
                                                                                                <p class="text-secondary small">Chargé de temps et activités</p>
                                                                                                <p>Service Ressources Humaines</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange18"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/2147704437.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange18"></span>Soundouce EL AMRANI</h6>
                                                                                                <p class="text-secondary small">Contrôleur de gestion sociale</p>
                                                                                                <p>Service contrôle de gestion</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <h6 class="title custom-title"  style="font-size: 20px; width: 100%;font-weight: 700;margin-bottom: 20px;margin-top: 20px">Destinataire</h6>
                                                                            <div class="swiper swiperauto">
                                                                                <div class="swiper-wrapper">
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-5 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                            <img src="{{asset('assets/img/icon2/outlook-new.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange19"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/1499.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange19"></span> El Mehdi BOUZOUBAA</h6>
                                                                                                <p class="text-secondary small">Manager paie régional</p>
                                                                                                <p>Service gestion de la paie</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/slack.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange20"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/2508.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange20"></span> Lina SOUIRI</h6>
                                                                                                <p class="text-secondary small">Delivery Manager </p>
                                                                                                <p>Service gestion de la paie</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #4c53bb" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                            <img src="{{asset('assets/img/icon2/teams.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/zoom.png') }}" style="max-width: 28px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/lark.jpg') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange21"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/2731.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange21"></span> Fouad ZBADI</h6>
                                                                                                <p class="text-secondary small">Directeur de la paie</p>
                                                                                                <p>Service relation clients</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-slide">
                                                                                        <div class="card border-0 w-250">
                                                                                            <div class="card-header">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col avatar-group">
                                                                                                        <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/lark.jpg') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                        <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                            <img src="{{asset('assets/img/icon2/hk.png') }}" style="max-width: 20px !important;"/>
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-auto">
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange22"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                            <label class="form-check-label" for="userlist1"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body text-center">
                                                                                                <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                    <img src="{{asset('assets/img/icon2/new/11644.jpg')}}" alt="" />
                                                                                                </figure>

                                                                                                <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange22"></span>Nirmine BENJELLOUN</h6>
                                                                                                <p class="text-secondary small">Directrice des opérations</p>
                                                                                                <p>Service Ressources Humaines</p>
                                                                                            </div>
                                                                                            <div class="card-footer">
                                                                                                <div class="row align-items-center">
                                                                                                    <div class="col-7">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                        <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                            Maroc
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="col-5">
                                                                                                        <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                        <p class="small">9:15 hrs</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    <style>
                        .swiperauto .swiper-slide {
                            width: auto;
                            padding: 5px 3px;
                            margin-right: 10px;
                        }
                    </style>
                </div>
                <div class="tab-pane fade " id="tab11120" role="tabpanel" aria-labelledby="tab11120-tab">
                    <div class="row mt-4 mb-4">
                        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center mb-5" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="planner-tab" data-bs-toggle="tab" data-bs-target="#planner" type="button" role="tab" aria-controls="planner" aria-selected="true">Planning</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts" type="button" role="tab" aria-controls="posts" aria-selected="false">Utilisateur</button>
                            </li>
                        </ul>
                        <div class="col-12">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="tab-content chosen-withing" id="myTabContent">
                                                                <div class="tab-pane fade show active" id="planner" role="tabpanel" aria-labelledby="planner-tab" style="padding: 10px 15px;">
                                                                    <div class="row align-items-center py-2">
                                                                        <div style="width: 16%;" class="col-2 py-2">
                                                                            <div class="input-group input-group-md rounded w-200" style="width: 174px !important;">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-newspaper"></i></span>
                                                                                <select class=" form-control simplechosen">
                                                                                    <option selected>Canal</option>
                                                                                    <option>E-mail</option>
                                                                                    <option>Teams</option>
                                                                                    <option>Slack</option>
                                                                                    <option>Lark</option>
                                                                                    <option>Human Key</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div style="width: 14%;" class="col-12 col-md-2col-lg-3 col-xl-2 col-xxl-2 py-2">
                                                                            <div class="input-group input-group-md rounded w-100">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-person"></i></span>
                                                                                <select class=" form-control simplechosen">
                                                                                    <option selected>Utilisateur</option>
                                                                                    <option>Utilisateur 1</option>
                                                                                    <option>Utilisateur 2</option>
                                                                                    <option>Utilisateur 3</option>
                                                                                    <option>Utilisateur 4</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div style="width: 14%;" class="col-12 col-md-2 col-lg-3 col-xl-2 col-xxl-2 py-2">
                                                                            <div class="input-group input-group-md rounded w-100">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-clock-history"></i></span>
                                                                                <select class=" form-control simplechosen">
                                                                                    <option selected>Fréquence</option>
                                                                                    <option>12h</option>
                                                                                    <option>24h</option>
                                                                                    <option>48h</option>
                                                                                    <option>72h</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div style="width: 16%;" class="col-12 col-md-2 col-lg-3 col-xl-2 col-xxl-2 py-2">
                                                                            <div class="input-group input-group-md rounded w-100">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-star"></i></span>
                                                                                <select class=" form-control simplechosen">
                                                                                    <option selected>Type d'événement</option>
                                                                                    <option>12h</option>
                                                                                    <option>24h</option>
                                                                                    <option>48h</option>
                                                                                    <option>72h</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div style="width: 13%;" class="col-12 col-md-2 col-lg-3 col-xl-2 col-xxl-2 py-2">
                                                                            <div class="input-group input-group-md rounded w-100" style="height: 30px;margin-top: -13px;">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-calendar"></i></span>
                                                                                <input type="text" class="form-control" placeholder="Date">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col py-2 text-end">
                                                                            <h6>2-8 Octobre 2024</h6>
                                                                        </div>
                                                                        <div class="col-auto py-2">
                                                                            <button class="btn btn-square btn-outline-theme">
                                                                                <i class="bi bi-chevron-left"></i>
                                                                            </button>
                                                                            <button class="btn btn-square btn-outline-theme ms-1">
                                                                                <i class="bi bi-chevron-right"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <table class="table table-scheduled" style="width: 1368px">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th class="text-center">
                                                                                        GMT +4:30
                                                                                    </th>
                                                                                    <th class="bg-light-theme">
                                                                                        <p class="text-uppercase fw-medium">SUN <span class="badge badge-sm vm bg-light-theme">2</span></p>
                                                                                        <span class="mb-0 h2">2</span>
                                                                                    </th>
                                                                                    <th class="">
                                                                                        <p class="text-uppercase fw-medium">Mon</p>
                                                                                        <span class="mb-0 h2">3</span>
                                                                                    </th>
                                                                                    <th class="bg-light-theme theme-green">
                                                                                        <p class="text-uppercase fw-medium">Tue <span class="badge badge-sm vm bg-light-theme">1</span></p>
                                                                                        <span class="mb-0 h2">4</span>
                                                                                    </th>
                                                                                    <th class="">
                                                                                        <p class="text-uppercase fw-medium">Wed <span class="badge badge-sm vm bg-light-theme">2</span></p>
                                                                                        <span class="mb-0 h2">5</span>
                                                                                    </th>
                                                                                    <th class="">
                                                                                        <p class="text-uppercase fw-medium">Thu <span class="badge badge-sm vm bg-light-theme">1</span></p>
                                                                                        <span class="mb-0 h2">6</span>
                                                                                    </th>
                                                                                    <th class="">
                                                                                        <p class="text-uppercase fw-medium">Fri</p>
                                                                                        <span class="mb-0 h2">7</span>
                                                                                    </th>
                                                                                    <th class="bg-light-theme">
                                                                                        <p class="text-uppercase fw-medium">Sat</p>
                                                                                        <span class="mb-0 2">8</span>
                                                                                    </th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>12 AM</td>
                                                                                    <td class="bg-light-theme disabled"></td>
                                                                                    <td class="disabled"></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td> </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>1 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>2 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green">
                                                                                        <div class="fc-daygrid-day-events" style="padding: 20;">
                                                                                            <div class="fc-daygrid-event-harness" style="margin-top: 0px;padding: 10p;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past regular-event" style="padding: 6px;border-left: 4px solid #005DC7 !important;background-color: #2e9c658f;border-color: #2e9c658f;">
                                                                                                    <div class="fc-event-main">
                                                                                                        <div class="fc-event-main-frame">
                                                                                                            <div class="fc-event-title-container">
                                                                                                                <div class="fc-event-title fc-sticky">Evénement 1</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td>
                                                                                        <div class="fc-daygrid-day-events" style="padding: 20;">
                                                                                            <div class="fc-daygrid-event-harness" style="margin-top: 0px;padding: 10p;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past regular-event" style="padding: 6px;border-left: 4px solid #5c6798 !important;background-color: #293258;border-color: #293258;">
                                                                                                    <div class="fc-event-main">
                                                                                                        <div class="fc-event-main-frame">
                                                                                                            <div class="fc-event-title-container">
                                                                                                                <div class="fc-event-title fc-sticky">Evénement 2</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>3 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td>
                                                                                        <div class="fc-daygrid-day-events" style="padding: 20;">
                                                                                            <div class="fc-daygrid-event-harness" style="margin-top: 0px;padding: 10p;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past regular-event" style="padding: 6px;border-left: 4px solid #5c6798 !important;background-color: #293258;border-color: #293258;">
                                                                                                    <div class="fc-event-main">
                                                                                                        <div class="fc-event-main-frame">
                                                                                                            <div class="fc-event-title-container">
                                                                                                                <div class="fc-event-title fc-sticky">Evénement 3</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="fc-daygrid-day-events" style="padding: 20;">
                                                                                            <div class="fc-daygrid-event-harness" style="margin-top: 0px;padding: 10p;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past regular-event" style="padding: 6px;border-left: 4px solid #5c6798 !important;background-color: #293258;border-color: #293258;">
                                                                                                    <div class="fc-event-main">
                                                                                                        <div class="fc-event-main-frame">
                                                                                                            <div class="fc-event-title-container">
                                                                                                                <div class="fc-event-title fc-sticky">Evénement 4</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>4 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td>
                                                                                        <div class="fc-daygrid-day-events" style="padding: 20;">
                                                                                            <div class="fc-daygrid-event-harness" style="margin-top: 0px;padding: 10p;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past regular-event" style="padding: 6px;border-left: 4px solid #5c6798 !important;background-color: #293258;border-color: #293258;">
                                                                                                    <div class="fc-event-main">
                                                                                                        <div class="fc-event-main-frame">
                                                                                                            <div class="fc-event-title-container">
                                                                                                                <div class="fc-event-title fc-sticky">Evénement 8</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>5 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>6 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>7 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>8 AM</td>
                                                                                    <td class="bg-light-theme">
                                                                                        <div class="fc-daygrid-day-events" style="padding: 20;">
                                                                                            <div class="fc-daygrid-event-harness" style="margin-top: 0px;padding: 10p;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past regular-event" style="padding: 6px;border-left: 4px solid #5c6798 !important;background-color: #293258;border-color: #293258;">
                                                                                                    <div class="fc-event-main">
                                                                                                        <div class="fc-event-main-frame">
                                                                                                            <div class="fc-event-title-container">
                                                                                                                <div class="fc-event-title fc-sticky">Evénement 5</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-events" style="padding: 20;margin-top: 5px">
                                                                                            <div class="fc-daygrid-event-harness" style="margin-top: 0px;padding: 10p;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-start fc-event-end fc-event-past regular-event" style="padding: 6px;border-left: 4px solid #5c6798 !important;background-color: #293258;border-color: #293258;">
                                                                                                    <div class="fc-event-main">
                                                                                                        <div class="fc-event-main-frame">
                                                                                                            <div class="fc-event-title-container">
                                                                                                                <div class="fc-event-title fc-sticky">Evénement 6</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>9 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>10 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>11 AM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>12 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>1 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>2 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>3 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>4 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>5 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>6 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>7 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>8 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>9 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>10 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>11 PM</td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme theme-green"></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="bg-light-theme"></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                                                    <div class="row mt-5">
                                                                        <div class="swiper swiperauto">
                                                                            <div class="swiper-wrapper">
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-5 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                        <img src="{{asset('assets/img/icon2/outlook-new.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                        <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange1"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/9989.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange1"></span> Abdellah CHAHID</h6>
                                                                                            <p class="text-secondary small">Gestionnaire de paie </p>
                                                                                            <p>Service gestion de la paie</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/slack.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange1"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/62261.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange2"></span> Nouhaila SAOUD</h6>
                                                                                            <p class="text-secondary small">Delivery Manager </p>
                                                                                            <p>Service gestion de la paie</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #4c53bb" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                        <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange1"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/5841.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange2"></span> Najib ZEROUALI</h6>
                                                                                            <p class="text-secondary small">Responsable Relation Client Paie</p>
                                                                                            <p>Service relation clients</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange1"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/man1.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange2"></span>Ismaïl Najib</h6>
                                                                                            <p class="text-secondary small">HR Manager</p>
                                                                                            <p>Service Ressources Humaines</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                        <img src="{{asset('assets/img/icon2/outlook-new.png') }}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                        <img src="{{asset('assets/img/icon2/teams.png') }}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/slack.png') }}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/hk.png') }}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange1"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/59902.jpg')}}" alt=""/>
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange2"></span>Soukaina ANDALOUSSI</h6>
                                                                                            <p class="text-secondary small">Chargé de temps et activités</p>
                                                                                            <p>Service Ressources Humaines</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange1"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/2147704437.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange2"></span>Soundouce EL AMRANI</h6>
                                                                                            <p class="text-secondary small">Contrôleur de gestion sociale</p>
                                                                                            <p>Service contrôle de gestion</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade chosen-withing" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                    <div class="row mb-5 mt-4">
                        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="planner1-tab" data-bs-toggle="tab" data-bs-target="#planner1" type="button" role="tab" aria-controls="planner" aria-selected="true">Première escalade</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="posts1-tab" data-bs-toggle="tab" data-bs-target="#posts1" type="button" role="tab" aria-controls="posts" aria-selected="false" tabindex="-1">Deuxième escalade</button>
                            </li>
                        </ul>
                    </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="planner1" role="tabpanel" aria-labelledby="planner1-tab">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card border-0"  >
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-4 ms-auto" style="margin-top: 8px;">
                                                                            <div class="input-group ">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-search"></i></span>
                                                                                <input style="padding: 9px" type="text" class="form-control" placeholder="Recherche...">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-3 col-lg-4 col-xl-3 col-xxl-2 py-2" style="width: 15%;">
                                                                            <div class="input-group input-group-md rounded w-100" style="border-bottom: 1px solid #005DC7;">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-clock-history"></i></span>
                                                                                <select class=" form-control simplechosen">
                                                                                    <option selected>Délai</option>
                                                                                    <option>12h</option>
                                                                                    <option>24h</option>
                                                                                    <option>48h</option>
                                                                                    <option>72h</option>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0"  >
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0" style="background-color: #efefef">
                                                                <div class="card-body" style="padding: 20px 28px">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col"><h4 class="title custom-title">Première escalade des notifications</h4></div>
                                                                    </div>
                                                                    <div  class="row mt-5">
                                                                        <div class="swiper swiperauto">
                                                                            <div class="swiper-wrapper">
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-5 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                        <img src="{{asset('assets/img/icon2/outlook-new.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                        <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange1"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/9989.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange1"></span> Abdellah CHAHID</h6>
                                                                                            <p class="text-secondary small">Gestionnaire de paie </p>
                                                                                            <p>Service gestion de la paie</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/slack.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange2"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/62261.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange2"></span> Nouhaila SAOUD</h6>
                                                                                            <p class="text-secondary small">Delivery Manager </p>
                                                                                            <p>Service gestion de la paie</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #4c53bb" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                        <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange3"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/5841.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange3"></span> Najib ZEROUALI</h6>
                                                                                            <p class="text-secondary small">Responsable Relation Client Paie</p>
                                                                                            <p>Service relation clients</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange4"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/man1.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange4"></span>Ismaïl Najib</h6>
                                                                                            <p class="text-secondary small">HR Manager</p>
                                                                                            <p>Service Ressources Humaines</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade " id="posts1" role="tabpanel" aria-labelledby="posts1-tab">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card border-0"  >
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-4 ms-auto" style="margin-top: 8px;">
                                                                            <div class="input-group ">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-search"></i></span>
                                                                                <input style="padding: 9px" type="text" class="form-control" placeholder="Recherche...">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-3 col-lg-4 col-xl-3 col-xxl-2 py-2" style="width: 15%;">
                                                                            <div class="input-group input-group-md rounded w-100" style="border-bottom: 1px solid #005DC7;">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-clock-history"></i></span>
                                                                                <select class=" form-control simplechosen">
                                                                                    <option selected>Délai</option>
                                                                                    <option>12h</option>
                                                                                    <option>24h</option>
                                                                                    <option>48h</option>
                                                                                    <option>72h</option>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0"  >
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0" style="background-color: #efefef">
                                                                <div class="card-body" style="padding: 20px 28px">
                                                                    <div class="row  justify-content-center">
                                                                        <div class="col"><h4 class="title custom-title">Deuxième escalade des notifications</h4></div>
                                                                    </div>
                                                                    <div  class="row mt-5">
                                                                        <div class="swiper swiperauto">
                                                                            <div class="swiper-wrapper">
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-5 text-white" style="background-color: #0072c6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Instagram">
                                                                                                        <img src="{{asset('assets/img/icon2/outlook-new.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle text-white" style="background-color: #4c53bb;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                        <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange19"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/new/1499.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange19"></span> El Mehdi BOUZOUBAA</h6>
                                                                                            <p class="text-secondary small">Manager paie régional</p>
                                                                                            <p>Service gestion de la paie</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/slack.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange20"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/new/2508.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange20"></span> Lina SOUIRI</h6>
                                                                                            <p class="text-secondary small">Delivery Manager </p>
                                                                                            <p>Service gestion de la paie</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-10 text-white" style="background-color: #4c53bb" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook">
                                                                                                        <img src="{{asset('assets/img/icon2/teams.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle  text-white" style="background-color: #0b5cff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/zoom.png')}}" style="max-width: 28px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange21"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/new/2731.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange21"></span> Fouad ZBADI</h6>
                                                                                            <p class="text-secondary small">Directeur de la paie</p>
                                                                                            <p>Service relation clients</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-slide">
                                                                                    <div class="card border-0 w-250">
                                                                                        <div class="card-header">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col avatar-group">
                                                                                                    <figure class="avatar avatar-30 rounded-circle overlay-ms-10  text-white" style="background-color: #fff !important;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/lark.jpg')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                    <figure class="avatar avatar-30 rounded-circle   text-white" style="background-color: #fff !important;;margin-left: 4px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter">
                                                                                                        <img src="{{asset('assets/img/icon2/hk.png')}}" style="max-width: 20px !important;"/>
                                                                                                    </figure>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                                    <div class="form-check form-switch">
                                                                                                        <input class="form-check-input user-check" type="checkbox" role="switch" data-target="#colorchange22"  id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" title="Activer/Désactiver">
                                                                                                        <label class="form-check-label" for="userlist1"></label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-body text-center">
                                                                                            <figure class="avatar avatar-100 coverimg mb-3 rounded-circle">
                                                                                                <img src="{{asset('assets/img/icon2/new/11644.jpg')}}" alt="" />
                                                                                            </figure>

                                                                                            <h6 class="mb-1"><span class="avatar avatar-10 bg-red me-1 rounded-circle vm" id="colorchange22"></span>Nirmine BENJELLOUN</h6>
                                                                                            <p class="text-secondary small">Directrice des opérations</p>
                                                                                            <p>Service Ressources Humaines</p>
                                                                                        </div>
                                                                                        <div class="card-footer">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-7">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-flag"></i> Régime de paie</p>
                                                                                                    <p class=" small" style="margin-right: 12px;font-size: 14px;margin-top: 8px;">
                                                                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" style="/* width: 38px; */height: 20px;margin-right: 4px;">
                                                                                                        Maroc
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-5">
                                                                                                    <p class="text-secondary small mb-0"><i class="bi bi-clock"></i> Session</p>
                                                                                                    <p class="small">9:15 hrs</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="tab-pane fade " id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                    <div class="row mb-4 mt-4">
                        <div class="col-7 mt-1">
                            <h4 class="title custom-title">Sauvegarde des données</h4>
                        </div>
                        <div class="col-5" style="padding-right: 20px;">
                            <div class="avatar avatar-50 rounded bg-light-theme" style="cursor:pointer;float: right" data-bs-toggle="tooltip" data-bs-placement="top" title="Enregistrer">
                                <i class="bi bi-floppy h5"></i>
                            </div>
                            <div class="avatar avatar-50 rounded bg-light-theme modal-click-show" data-target="#exampleModalChamps2" style="cursor:pointer;margin-right: 10px;float: right" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer">
                                <i class="bi bi-trash h5"></i>
                            </div>
                            <div class="avatar avatar-50 rounded bg-light-theme" style="cursor:pointer;margin-right: 10px;float: right" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier">
                                <i class="bi bi-pen h5"></i>
                            </div>
                            <div class="avatar avatar-50 rounded bg-light-theme modal-click-show" data-target="#exampleModalChamps3" style="cursor:pointer;margin-right: 10px;float: right" data-bs-toggle="tooltip" data-bs-placement="top" title="Apérçu">
                                <i class="bi bi-file h5"></i>
                            </div>
                            <div class="avatar avatar-50 rounded bg-light-theme modal-click-show" data-target="#exampleModalChamps1" style="cursor:pointer;margin-right: 10px;float: right" data-bs-toggle="tooltip" data-bs-placement="top" title="Ajouter">
                                <i class="bi bi-plus-square h5"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3" style="padding: 20px;">
                        <div class="card border-0 bg-gradient-theme-light">
                            <div class="card-body">
                                <table class="table">
                                    <thead style="font-size: 14px;">
                                    <tr>
                                        <th style="font-weight: 100">ID</th>
                                        <th style="font-weight: 100">Type de Donnée</th>
                                        <th style="font-weight: 100">Critère</th>
                                        <th style="font-weight: 100;width: 95px;">Durée</th>
                                        <th style="font-weight: 100;width: 142px;">Fréquence</th>
                                        <th style="font-weight: 100">Responsable</th>
                                        <th style="font-weight: 100;width: 127px;">Date</th>
                                        <th style="font-weight: 100;width: 83px;">Heure</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Variables de Paie">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Après validation">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="5 ans">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Mensuelle">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Responsable Paie">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="01/07/2024">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="14:30">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Notifications de Paie">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Après traitement">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="3 ans">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Mensuelle">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Responsable RH">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="01/07/2024">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="16:45">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Données de Retenues">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Après clôture de paie">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="6 ans">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Trimestrielle">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="Responsable Financier">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="02/07/2024">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group " style="border: 1px solid #ffffff4f;">
                                                <input type="text" class="form-control" value="09:00">
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                    <div class="row mt-4 mb-4" style="padding-left: 15px;">
                        <h4 class="title custom-title">Rapport de suivi</h4>
                    </div>
                    <div class="row mb-4 ">
                        <div class="col-5">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0" style="padding: 12px 12px 22px 12px;">
                                                <div class="">
                                                    <table class="table">
                                                        <thead style="font-size: 14px;">
                                                        <tr>
                                                            <th colspan="4" style="font-weight: 700;text-transform: uppercase;font-size: 16px;">Paramètre</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-weight: 100;text-align: left">N°</th>
                                                            <th style="font-weight: 100;text-align: left">Élément</th>
                                                            <th style="font-weight: 100;text-align: left">Statut</th>
                                                            <th style="font-weight: 100;text-align: left">Fréquence</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody style="font-size: 14px">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Planification des Rappels</td>
                                                            <td>Actif</td>
                                                            <td>Mensuelle</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Personnalisation des Notifications</td>
                                                            <td>Actif</td>
                                                            <td>Mensuelle</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Définition des Destinataires</td>
                                                            <td>Actif</td>
                                                            <td>Mensuelle</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Escalades de Notifications</td>
                                                            <td>Actif</td>
                                                            <td>Automatique</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Sauvegarde des Données</td>
                                                            <td>Actif</td>
                                                            <td>Automatique</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 18px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 18px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 18px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 18px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 18px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 18px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 18px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 18px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 18px;"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
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
                        <div class="col-7">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0" style="">
                                                <div class="card-body">
                                                    <table class="table" style="width: 783px">
                                                        <thead style="font-size: 14px;">
                                                        <tr>
                                                            <th colspan="7" style="font-weight: 700;text-transform: uppercase;font-size: 16px;">Premier rappel</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-weight: 100;text-align: left">N°</th>
                                                            <th style="font-weight: 100;text-align: left">Configurées</th>
                                                            <th style="font-weight: 100;text-align: left">Expéditeur</th>
                                                            <th style="font-weight: 100;text-align: left">Destinataires</th>
                                                            <th style="font-weight: 100;text-align: left">Statut</th>
                                                            <th style="font-weight: 100;text-align: left">Date</th>
                                                            <th style="font-weight: 100;text-align: left">Heure</th>
                                                            <th style="font-weight: 100;text-align: left">Réponse</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>48h</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>Envoyé</td>
                                                            <td>26/09/2024</td>
                                                            <td>09:00</td>
                                                            <td>Réponse reçue</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>48h</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>Envoyé</td>
                                                            <td>26/09/2024</td>
                                                            <td>09:15</td>
                                                            <td>Réponse en attente</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>N/A</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>Envoyé</td>
                                                            <td>26/09/2024</td>
                                                            <td>09:30</td>
                                                            <td>Réponse partielle</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>12h</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>Envoyé</td>
                                                            <td>26/09/2024</td>
                                                            <td>10:00</td>
                                                            <td>Réponse en attente</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>72h</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 mt-4"  >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0" style="">
                                                <div class="card-body">
                                                    <table class="table" style="width: 783px">
                                                        <thead style="font-size: 13px;">
                                                        <tr>
                                                            <th colspan="8" style="font-weight: 700;text-transform: uppercase;font-size: 16px;">Deuxième rappel</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-weight: 100;text-align: left">N°</th>
                                                            <th style="font-weight: 100;text-align: left">Configurées</th>
                                                            <th style="font-weight: 100;text-align: left">Expéditeur</th>
                                                            <th style="font-weight: 100;text-align: left">Destinataires</th>
                                                            <th style="font-weight: 100;text-align: left">Statut</th>
                                                            <th style="font-weight: 100;text-align: left">Date</th>
                                                            <th style="font-weight: 100;text-align: left">Heure</th>
                                                            <th style="font-weight: 100;text-align: left">Réponse</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody style="font-size: 14px">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>N/A</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>Envoyé</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>12h</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>Envoyé</td>
                                                            <td>28/09/2024</td>
                                                            <td>10:00</td>
                                                            <td>Réponse reçue</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>72h</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>a.elkarim@3ma.com</td>
                                                            <td>Envoyé</td>
                                                            <td>28/09/2024</td>
                                                            <td>12:00</td>
                                                            <td>Réponse reçue</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
                                                            <td>N/A</td>
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

</main>
@endsection

@section('js_footer')
<script type="text/javascript">

    $(window).on('load', function () {
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
        $('#country-selector').on('change',function(){
            var value = $(this).find('option:selected').attr('value');
            $('.chosen-single span').html($(this).attr('label'));
            var selectedCountry = $(this).find('option:selected');
            var imgsrc = selectedCountry.attr('data-image');
            $('#country-selector .chosen-container .chosen-single img').attr('src',imgsrc);
            // Get the image URL from the data attribute
            //var imgSrc = selectedCountry.data('img-src');
            $('.ville-p').addClass('hidden');
            $('#'+value).removeClass('hidden');
        })

        $(".chosenoptgroup").chosen();
        $(".chosenoptgroup").on('change', function (event, el) {
            var textdisplay_element = $(".chosenoptgroup + .chosen-container .chosen-single > span");
            var selected_element = $(".chosenoptgroup option:selected");
            var selected_value = selected_element.val();
            if (selected_element.closest('optgroup').length > 0) {
                var parent_optgroup = selected_element.closest('optgroup').attr('label');
                textdisplay_element.text(parent_optgroup + ' ' + selected_value).trigger("chosen:updated");
            }
        });


        var selectedOption = $('#country-selector option:selected');
        var selectedImage = selectedOption.data('image');
        if (selectedImage) {
            $('#country-selector .chosen-container .chosen-single').prepend('<img src="' + selectedImage + '" />');
        }
    });
</script>
@endsection