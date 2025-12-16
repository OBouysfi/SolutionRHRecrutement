@extends('layouts.master')

@section('title', 'Application Programming Interface - API')

@section('css_header')
<style>
    .input-group .form-floating .form-control {
        border: 0;
        margin-left: -1px;
        border-bottom: 1px solid #005DC7;
    }
</style>
@endsection

@section('content')
<main class="main mainheight">
    <!-- title bar -->
    <div class="container-fluid mb-4 title-bg">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <div class="col-auto">
                    <div class="avatar avatar-50 rounded bg-light-cyan" style="float: left;">
                        <i class="bi bi-gear-wide-connected h5"  ></i>
                    </div>
                    <h5 class="mb-0 mt-3 " style="float: left;margin-left: 10px;">{{ __("generated.Application Programming Interface - API") }}</h5>
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
                        style="background-image: url(assets/img/icon/HJ_icon_green_black.png);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{asset('assets/img/icon/HJ_icon_green_black.png')}}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Confort utilisateur"
                    style="margin-right: 40px;">
                    <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                        id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="{{asset('assets/img/icon/faciliti.png')}}"
                                style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Application Programming Interface - API") }}</li>
        </nav>

    </div>

    <!-- content -->
    {{-- <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0"  >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-body filter-block">
                                        <div class="row">
                                            <div class="col-md-2 mb-2">
                                                <div  id="country-selector" class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Pays </label>
                                                    <select class="chosenoptgroup w-100">
                                                        <option>Tous</option>
                                                        <option value="Arabie" data-image="{{asset('assets/img/drap/saudi-arabia.png')}}">Arabie Saoudite</option>
                                                        <option value="Belgique"  data-image="{{asset('assets/img/drap/Belgique.jpg')}}">Belgique</option>
                                                        <option value="Canada"  data-image="{{asset('assets/img/drap/Canada.png')}}">Canada</option>
                                                        <option value="Cameroun"  data-image="{{asset('assets/img/drap/cameroon.jpg')}}">Cameroun</option>
                                                        <option value="Chine"  data-image="{{asset('assets/img/drap/china.jpg')}}">Chine</option>
                                                        <option value="Ivoire"  data-image="{{asset("assets/img/drap/Cote_d'Ivoire.png")}}">Côte d'Ivoire</option>
                                                        <option value="Espagne"  data-image="{{asset('assets/img/drap/Spain.png')}}">Espagne</option>
                                                        <option value="Unis"  data-image="{{asset('assets/img/drap/united-arab-emirates.jpg')}}">Émirats Arabes Unis</option>
                                                        <option value="France"  data-image="{{asset('assets/img/drap/France.png')}}">France</option>
                                                        <option value="Inde"  data-image="{{asset('assets/img/drap/india.jpg')}}">Inde</option>
                                                        <option value="Irlande"  data-image="{{asset('assets/img/drap/Ireland.png')}}">Irlande</option>
                                                        <option value="Maroc" selected data-image="{{asset('assets/img/drap/MAROC.jpg')}}">Maroc</option>
                                                        <option value="Qatar"  data-image="{{asset('assets/img/drap/QATAR.jpg')}}">Qatar</option>
                                                        <option value="Sénégal"  data-image="{{asset('assets/img/drap/senegal.jpg')}}">Sénégal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-2">
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
                                            <div class="col-md-2 mb-2">
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
                                            <div class="col-md-2 mb-2">
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
                                            <div class="col-md-2 mb-2">
                                                <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Pôle d'activité</label>
                                                    <select class="chosenoptgroup one w-100" id="activity-pole-selector" data-placeholder="Pôle d'activité">
                                                        <option value="0">Sélectionner</option>
                                                        <option>01 Production</option>
                                                        <option>02 Informatique</option>
                                                        <option>03 Commercial</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Catégorie</label>
                                                    <select class="chosenoptgroup w-100">
                                                        <option value="0">Sélectionner</option>
                                                        <option>10 Cadre</option>
                                                        <option>20 Employé</option>
                                                        <option>30 Ouvrier</option>
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
    </div> --}}
    

    <div class="container mt-4">
            <div class="card border-0 mb-4 show-maroc show-by-country ">
                <div class="card-header" style="padding-left: 26px">
                    <div class="row">

                        <div class="col-9 align-self-center">
                            <h6 class="fw-medium mb-0">
                                <img src="{{asset('assets/img/icon/Recruitment.png')}}" style="width: 153px;" class="light-img">
                            </h6>
                        </div>
                        <div class="col-3 align-self-center">
                            <p class="text-secondary small" style="float: right;margin-right: 12px;font-size: 16px;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Flag_of_Morocco.png/800px-Flag_of_Morocco.png?20150118114614" class="translated_text"="width: 42px;height:28px;margin-right: 10px;">
                                Maroc
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 mb-4 show-france show-by-country hidden ">
                <div class="card-header" style="padding-left: 26px">
                    <div class="row">

                        <div class="col-9 align-self-center">
                            <h6 class="fw-medium mb-0">
                                <img src="{{asset('assets/img/partenaires/3m.png')}}" style="width: 153px;" class="light-img">
                                <img src="{{asset('assets/img/partenaires/3M2.png')}}" style="width: 153px;" class="dark-img">
                            </h6>
                        </div>
                        <div class="col-3 align-self-center">
                            <p class="text-secondary small" style="float: right;margin-right: 12px;font-size: 16px;">
                                <img src="{{asset('assets/img/icon/france.png')}}" class="translated_text" style="width: 42px;height:28px;margin-right: 10px;">
                                France
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 mb-4 show-espagne show-by-country hidden">
                <div class="card-header" style="padding-left: 26px">
                    <div class="row">

                        <div class="col-9 align-self-center">
                            <h6 class="fw-medium mb-0">
                                <img src="{{asset('assets/img/partenaires/3m.png')}}" style="width: 153px;" class="light-img">
                                <img src="{{asset('assets/img/partenaires/3M2.png')}}" style="width: 153px;" class="dark-img">
                            </h6>
                        </div>
                        <div class="col-3 align-self-center">
                            <p class="text-secondary small" style="float: right;margin-right: 12px;font-size: 16px;">
                                <img src="{{asset('assets/img/icon/espagne.png')}}" class="translated_text" style="width: 42px;height:28px;margin-right: 10px;">
                                Espagne
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 mb-4 show-canada show-by-country hidden">
                <div class="card-header" style="padding-left: 26px">
                    <div class="row">

                        <div class="col-9 align-self-center">
                            <h6 class="fw-medium mb-0">
                                <img src="{{asset('assets/img/partenaires/3m.png')}}" style="width: 153px;" class="light-img">
                                <img src="{{asset('assets/img/partenaires/3M2.png')}}" style="width: 153px;" class="dark-img">
                            </h6>
                        </div>
                        <div class="col-3 align-self-center">
                            <p class="text-secondary small" style="float: right;margin-right: 12px;font-size: 16px;">
                                <img src="{{asset('assets/img/icon/canada.png')}}" style="width: 42px;height:28px;margin-right: 10px;">
                                Canada
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 mb-4 show-eau show-by-country hidden">
                <div class="card-header" style="padding-left: 26px">
                    <div class="row">

                        <div class="col-9 align-self-center">
                            <h6 class="fw-medium mb-0">
                                <img src="{{asset('assets/img/partenaires/3m.png')}}" style="width: 153px;" class="light-img">
                                <img src="{{asset('assets/img/partenaires/3M2.png')}}" style="width: 153px;" class="dark-img">
                            </h6>
                        </div>
                        <div class="col-3 align-self-center">
                            <p class="text-secondary small" style="float: right;margin-right: 12px;font-size: 16px;">
                                <img src="{{asset('assets/img/icon/EAU.png')}}" style="width: 42px;height:28px;margin-right: 10px;">
                                Emirats Arabes Unis
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- statistics summary -->
        <div class="row mb-5 mt-5">
            <div class="col text-center">
                <!-- <span class="text-gradient">mix up things &amp; choose</span> -->
                <h3><span >{{ __("generated.Personnalisez vos API pour") }}</span><span class="text-gradient ">{{ __("generated.des résultats optimaux.") }}</span></h3>
                <p class="lead ">{{ __("generated.La ganrantie d’une efficacité inégalée !") }}</p>
                <p class="lead text-secondary"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="t1-tab" data-bs-toggle="tab" data-bs-target="#t1" type="button"
                            role="tab" aria-controls="t1" aria-selected="true">{{ __("generated.Système") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="t2-tab" data-bs-toggle="tab" data-bs-target="#t2" type="button"
                            role="tab" aria-controls="t2" aria-selected="false">{{ __("generated.Connexion") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="t3-tab" data-bs-toggle="tab" data-bs-target="#t3" type="button"
                            role="tab" aria-controls="t3" aria-selected="false">{{ __("generated.Synchronisation") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="t4-tab" data-bs-toggle="tab" data-bs-target="#t4" type="button"
                            role="tab" aria-controls="t4" aria-selected="false">{{ __("generated.Mapping") }}</button>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="row mt-3 mb-5" style="padding: 10px">
            <div class="card border-0 theme-blue card-1" style="padding: 0px; background-color: transparent;">
                <div class="card-body" style="padding: 20px">
                    <div class="tab-content" id="myTabContent">
        
                        <!-- Onglet Système -->
                        <div class="tab-pane fade active show" id="t1" role="tabpanel" aria-labelledby="t1-tab">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="text" placeholder="Système" value="{{ __($api->name) }}" required
                                                    class="form-control border-start-0 translated_text" readonly>
                                                <label >{{ __("generated.Système") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="text" placeholder="Nom du système" value="{{ __($api->system_name) }}" required
                                                    class="form-control border-start-0 translated_text" readonly>
                                                <label >{{ __("generated.Nom du système") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="text" placeholder="Type du système" value="{{ __($api->type) }}" required
                                                    class="form-control border-start-0 translated_text" readonly>
                                                <label >{{ __("generated.Type du système") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- Onglet Connexion -->
                        <div class="tab-pane fade" id="t2" role="tabpanel" aria-labelledby="t2-tab">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="text" placeholder="Port de Connexion" value="{{ __($api->connection_port) }}" required
                                                    class="form-control border-start-0 translated_text" readonly>
                                                <label >{{ __("generated.Port de Connexion") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-2">
                                    <div class="form-group mb-3 position-relative check-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="text" placeholder="Protocole de Communication" value="{{ __($api->protocol) }}" required
                                                    class="form-control border-start-0 translated_text" readonly>
                                                <label >{{ __("generated.Protocole de Communication") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- Onglet Mapping -->
                        <div class="tab-pane fade" id="t4" role="tabpanel" aria-labelledby="t4-tab">
                            <div class="row">
                                @foreach ($api->endpoints as $endpoint)
                                    <div class="col-12 col-md-6 mb-2">
                                        <div class="form-group mb-3 position-relative check-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="text" placeholder="Endpoint disponible"
                                                        value="{{ __($endpoint->endpoint) }}" required class="form-control border-start-0"
                                                        readonly>
                                                    <label >{{ __("generated.Endpoint disponible") }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <div class="form-group mb-3 position-relative check-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="text" placeholder="Url source"
                                                        value="{{ __($endpoint->source_url) }}" required class="form-control border-start-0"
                                                        readonly>
                                                    <label >{{ __("generated.Url source") }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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

@endsection
