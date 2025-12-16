@extends('layouts.master')

@section('title', 'Sauvegarde')

@section('css_header')

@endsection

@section('content')
<main class="main mainheight">
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0 ">{{ __("generated.Paramètres") }}</h5>
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
            <div class="col col-sm-auto translated_text"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
                <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button" id="showNotificationFaciliti">
                    <i class="bi bi-" style="font-size: 26px;">
                        <img src="{{asset('assets/img/icon/faciliti.png')}}" style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                    </i>
                </button>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><span >{{ __("generated.Sauvegarde") }}</span></li>
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
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Pays") }}</label>
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
                                            <div class="col-3" style="width: 170px;">
                                                <div id="Maroc" class="ville-p">
                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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

        <div class="row mb-4">
            <div class="col-9">
                <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist" style="width: 87%">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="tab1120-tab" data-bs-toggle="tab" data-bs-target="#tab1120" type="button" role="tab" aria-controls="tab1120" aria-selected="true">{{ __("generated.Sauvegarde") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tab11320-tab" data-bs-toggle="tab" data-bs-target="#tab11320" type="button" role="tab" aria-controls="tab11320" aria-selected="true">{{ __("generated.Restauration") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="tab14120-tab" data-bs-toggle="tab" data-bs-target="#tab14120" type="button" role="tab" aria-controls="tab14120" aria-selected="true">{{ __("generated.Historique") }}</button>
                    </li>

                </ul>
            </div>

        </div>
        <div class="row">
            <div class="tab-content" id="nav-navtabscard30">
                <div class="tab-pane fade active show" id="tab1120" role="tabpanel" aria-labelledby="tab1120-tab">
                    <div class="row mt-2 mb-4">
                        <div class="col-12">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body filter-block">
                                                    <div class="row" style="padding-left: 35px;">
                                                        <div class="col-4 col-md-5 col-lg-4 col-xl-3 col-xxl-2" style="margin-right: 10px;width: 14%;">
                                                            <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Type") }}</label>
                                                                <select class="chosenoptgroup one w-100" id="">
                                                                    <option id="hide-item" >{{ __("generated.Type") }}</option>
                                                                    <option selected >{{ __("generated.Complète") }}</option>
                                                                    <option >{{ __("generated.Incrémentale") }}</option>
                                                                    <option >{{ __("generated.Différentielle") }}</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-4 col-md-5 col-lg-4 col-xl-3 col-xxl-2" style="margin-right: 10px;width: 14%;">
                                                            <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Fréquence") }}</label>
                                                                <select class="chosenoptgroup one w-100" id="">
                                                                    <option id="hide-item" >{{ __("generated.Fréquence") }}</option>
                                                                    <option selected >{{ __("generated.Quotidienne") }}</option>
                                                                    <option >{{ __("generated.Hebdomadaire") }}</option>
                                                                    <option >{{ __("generated.Mensuelle") }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-md-5 col-lg-4 col-xl-3 col-xxl-2" style="margin-right: 10px;width: 9%;">
                                                            <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Heure") }}</label>
                                                                <select class="chosenoptgroup one w-100" id="">
                                                                    <option id="hide-item" >{{ __("generated.Heure") }}</option>
                                                                    <option >01:00</option>
                                                                    <option >02:00</option>
                                                                    <option >03:00</option>
                                                                    <option >04:00</option>
                                                                    <option selected>05:00</option>
                                                                    <option >06:00</option>
                                                                    <option >07:00</option>
                                                                    <option >08:00</option>
                                                                    <option >09:00</option>
                                                                    <option >10:00</option>
                                                                    <option >11:00</option>
                                                                    <option >12:00</option>
                                                                    <option >13:00</option>
                                                                    <option >14:00</option>
                                                                    <option >15:00</option>
                                                                    <option >16:00</option>
                                                                    <option >17:00</option>
                                                                    <option >18:00</option>
                                                                    <option >19:00</option>
                                                                    <option >20:00</option>
                                                                    <option >21:00</option>
                                                                    <option >22:00</option>
                                                                    <option >23:00</option>
                                                                    <option >24:00</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-4 col-md-5 col-lg-4 col-xl-3 col-xxl-2" style="margin-right: 10px;width: 14%;">
                                                            <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Alertes") }}</label>
                                                                <select class="chosenoptgroup one w-100" id="">
                                                                    <option id="hide-item" >{{ __("generated.Alertes") }}</option>
                                                                    <option selected >{{ __("generated.E-mails") }}</option>
                                                                    <option >{{ __("generated.Journal de sauvegarde") }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-md-5 col-lg-4 col-xl-3 col-xxl-2" style="margin-right: 10px;width: 14%;">
                                                            <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Durée") }}</label>
                                                                <select class="chosenoptgroup one w-100" id="">
                                                                    <option id="hide-item" >{{ __("generated.Durée") }}</option>
                                                                    <option >{{ __("generated.1 mois") }}</option>
                                                                    <option >{{ __("generated.2 mois") }}</option>
                                                                    <option >{{ __("generated.3 mois") }}</option>
                                                                    <option >{{ __("generated.4 mois") }}</option>
                                                                    <option >5 mois</option>
                                                                    <option >6 mois</option>
                                                                    <option >7 mois</option>
                                                                    <option >8 mois</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-md-5 col-lg-4 col-xl-3 col-xxl-2" style="margin-right: 10px;width: 14%;">
                                                            <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Durée</label>
                                                                <select class="chosenoptgroup one w-100" id="">
                                                                    <option id="hide-item">Tests</option>
                                                                    <option >1 mois</option>
                                                                    <option >2 mois</option>
                                                                    <option >3 mois</option>
                                                                    <option >4 mois</option>
                                                                    <option >5 mois</option>
                                                                    <option >6 mois</option>
                                                                    <option >7 mois</option>
                                                                    <option >8 mois</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-md-5 col-lg-4 col-xl-3 col-xxl-2" style="width: 14%;">
                                                            <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Evaluation</label>
                                                                <select class="chosenoptgroup one w-100" id="">
                                                                    <option id="hide-item">Tests</option>
                                                                    <option >1 mois</option>
                                                                    <option >2 mois</option>
                                                                    <option >3 mois</option>
                                                                    <option >4 mois</option>
                                                                    <option >5 mois</option>
                                                                    <option >6 mois</option>
                                                                    <option >7 mois</option>
                                                                    <option >8 mois</option>
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

                        <style>.chosen-search{display: none}</style>
                    </div>
                    <div class="row mb-3">
                        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active " id="t1-tab" data-bs-toggle="tab" data-bs-target="#t1" type="button" role="tab" aria-controls="t1" aria-selected="true">{{ __("generated.Serveur local") }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="t2-tab" data-bs-toggle="tab" data-bs-target="#t2" type="button" role="tab" aria-controls="t2" aria-selected="false" tabindex="-1">{{ __("generated.Serveur externe") }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="t3-tab" data-bs-toggle="tab" data-bs-target="#t3" type="button" role="tab" aria-controls="t3" aria-selected="false" tabindex="-1">{{ __("generated.Serveur cloud") }}</button>
                            </li>
                        </ul>
                    </div>
                    <div class="row mt-3 mb-5" style="padding: 10px">
                        <div class="card border-0 theme-blue card-1" style="padding: 0px;background-color: transparent;">
                            <div class="card-body" style="padding: 20px">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="t1" role="tabpanel" aria-labelledby="t1-tab">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="card border-0"  >
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body" style="padding: 10px 34px;">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div style="margin-top: -11px !important;" class="row mt-4">
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-12" style="padding-top: 8px">
                                                                                                <h6 class="title custom-title ">{{ __("generated.Gestion des sauvegardes") }}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid ">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Type de destination" value="Serveur local" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Type de destination") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Adresse IP" value="192.168.1.10" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Adresse IP") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Nom de l'hôte" value="ServeurLocal" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Nom de l'hôte") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Emplacement" value="\ServeurLocal\Sauvegardes\" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Emplacement") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Port" value="445" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Port") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Nom d'utilisateur" value="user@domaine.com" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Nom d'utilisateur") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Mot de passe" value="***********" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Mot de passe") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country2" required>
                                                                                                                <option selected >{{ __("generated.Quotidienne") }}</option>
                                                                                                                <option >{{ __("generated.Mensuelle") }}</option>
                                                                                                                <option >{{ __("generated.Trimestrielle") }}</option>
                                                                                                                <option >{{ __("generated.Semestrielle") }}</option>
                                                                                                                <option >{{ __("generated.Annuelle") }}</option>
                                                                                                            </select>
                                                                                                            <label  for="country2">{{ __("generated.Fréquence de sauvegarde") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country3" required>
                                                                                                                <option selected >{{ __("generated.Sauvegarde complète") }}</option>
                                                                                                                <option >{{ __("generated.Sauvegarde incrémentielle") }}</option>
                                                                                                                <option >{{ __("generated.Sauvegarde différentielle") }}</option>
                                                                                                                <option >{{ __("generated.Sauvegarde miroir") }}</option>
                                                                                                                <option >{{ __("generated.Sauvegarde à chaud") }}</option>
                                                                                                                <option >{{ __("generated.Sauvegarde à froid") }}</option>
                                                                                                            </select>
                                                                                                            <label for="country3" >{{ __("generated.Méthode de sauvegarde") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Chiffrement des données" value="AES-256" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Chiffrement des données") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Taille de sauvegarde" value="500 Go" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Taille de sauvegarde") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Espace de stockage" value="2 To" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Espace de stockage") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3translated_text ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Format des données" value="base de données" required class="form-control border-start-0">
                                                                                                            <label translated_text>Format des données</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <div class="row">

                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country4" required>
                                                                                                                <option selected >{{ __("generated.30 jours") }}</option>
                                                                                                                <option >{{ __("generated.60 jours") }}</option>
                                                                                                                <option >{{ __("generated.90 jours") }}</option>
                                                                                                            </select>
                                                                                                            <label for="country4" >{{ __("generated.Politique de rétention") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country5" required>
                                                                                                                <option selected >{{ __("generated.Manuelle") }}</option>
                                                                                                                <option >{{ __("generated.Automatique") }}</option>
                                                                                                            </select>
                                                                                                            <label for="country5" >{{ __("generated.Méthode de suppression") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Notifications" value="E-mail" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Notifications") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country6" required>
                                                                                                                <option  selected>{{ __("generated.Mensuelle") }}</option>
                                                                                                                <option >{{ __("generated.Trimestrielle") }}</option>
                                                                                                                <option >{{ __("generated.Semestrielle") }}</option>
                                                                                                                <option >{{ __("generated.Annuelle") }}</option>
                                                                                                            </select>
                                                                                                            <label for="country6" >{{ __("generated.Test de récupération") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country7" required>
                                                                                                                <option selected >{{ __("generated.1ère version") }}</option>
                                                                                                                <option >{{ __("generated.2ème version") }}</option>
                                                                                                                <option >{{ __("generated.3ème version") }}</option>
                                                                                                                <option >{{ __("generated.4ème version") }}</option>
                                                                                                            </select>
                                                                                                            <label for="country7" >{{ __("generated.Changement de version") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country8" required>
                                                                                                                <option  selected>{{ __("generated.Mensuelle") }}</option>
                                                                                                                <option >{{ __("generated.Trimestrielle") }}</option>
                                                                                                                <option >{{ __("generated.Semestrielle") }}</option>
                                                                                                                <option >{{ __("generated.Annuelle") }}</option>
                                                                                                            </select>
                                                                                                            <label for="country8" >{{ __("generated.Audit de sauvegarde") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mt-4 ">
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-12" style="padding-top: 8px">
                                                                                                <h6 class="title custom-title ">{{ __("generated.Rotation des sauvegardes") }}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">

                                                                                        <div class="row mb-4">
                                                                                            <div class="col-1">
                                                                                                <div class="form-check form-switch" style="margin-top: 8px;">
                                                                                                    <input class="form-check-input " type="radio" role="switch" name="rt1" data-target="#v1" id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Activer/Désactiver">
                                                                                                    <label class="form-check-label" for="userlist1"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-7" style="padding-top: 8px;margin-left: 17px;">
                                                                                                <span >{{ __("generated.Versioning des sauvegardes") }}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="v1">
                                                                                            <div class="row mb-4">
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country9" required>
                                                                                                                    <option selected>2 versions</option>
                                                                                                                    <option>3 versions</option>
                                                                                                                    <option>4 versions</option>
                                                                                                                    <option>5 versions</option>
                                                                                                                </select>
                                                                                                                <label for="country9" >{{ __("generated.Politique de versioning") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Identifiants de version" value="Fichier_A_v1_2024-01-01_12-00" required class="form-control border-start-0">
                                                                                                                <label >identifiants de version") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country10" required>
                                                                                                                    <option selected >{{ __("generated.30 jours") }}</option>
                                                                                                                    <option >{{ __("generated.60 jours") }}</option>
                                                                                                                    <option >{{ __("generated.90 jours") }}</option>
                                                                                                                </select>
                                                                                                                <label for="country10" >{{ __("generated.Politique de conservation") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Méthode de suppression" value="versions > à 90 jours." required class="form-control border-start-0">
                                                                                                                <label >{{ __("generated.Méthode de suppression") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Notifications avant suppression" value="7 jours" required class="form-control border-start-0">
                                                                                                                <label >{{ __("generated.Notifications avant suppression") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country11" required>
                                                                                                                    <option  selected>{{ __("generated.Mensuelle") }}</option>
                                                                                                                    <option >{{ __("generated.Trimestrielle") }}</option>
                                                                                                                    <option >{{ __("generated.Semestrielle") }}</option>
                                                                                                                    <option >{{ __("generated.Annuelle") }}</option>
                                                                                                                </select>
                                                                                                                <label for="country11" >{{ __("generated.Évaluation continue") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"></div>
                                                                                    <div class="col-4">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-1">
                                                                                                <div class="form-check form-switch" style="margin-top: 8px;">
                                                                                                    <input class="form-check-input" type="radio" role="switch" name="rt1" data-target="#v2" id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Activer/Désactiver">
                                                                                                    <label class="form-check-label" for="userlist1"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-8" style="padding-top: 8px;margin-left: 17px;">
                                                                                                <span >{{ __("generated.Suppression des anciennes versions") }}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="" id="v2">
                                                                                            <div class="row mb-4">
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country12" required>
                                                                                                                    <option selected >{{ __("generated.30 jours") }}</option>
                                                                                                                    <option >{{ __("generated.60 jours") }}</option>
                                                                                                                    <option >{{ __("generated.90 jours") }}</option>
                                                                                                                </select>
                                                                                                                <label for="country12" >{{ __("generated.Politique de conservation") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country13" required>
                                                                                                                    <option selected >{{ __("generated.Automatique") }}</option>
                                                                                                                    <option >{{ __("generated.Manuelle") }}</option>
                                                                                                                </select>
                                                                                                                <label for="country13" >{{ __("generated.Méthode de suppression") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Notifications avant suppression" value="7 jours" required class="form-control border-start-0">
                                                                                                                <label >{{ __("generated.Notifications avant suppression") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country14" required>
                                                                                                                    <option  selected>{{ __("generated.Mensuelle") }}</option>
                                                                                                                    <option >{{ __("generated.Trimestrielle") }}</option>
                                                                                                                    <option >{{ __("generated.Semestrielle") }}</option>
                                                                                                                    <option >{{ __("generated.Annuelle") }}</option>
                                                                                                                </select>
                                                                                                                <label for="country14" >{{ __("generated.Évaluation continue") }}</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-12" style="padding-top: 8px">
                                                                                                <h6 class="title custom-title ">{{ __("generated.Historique des sauvegardes") }}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div id="v5">
                                                                                            <div class="row mb-4">
                                                                                                <div class="col-4">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Date et heure de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label >{{ __("generated.Date et heure de la sauvegarde") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Nom de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label >{{ __("generated.Nom de la sauvegarde") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">

                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country20" required>
                                                                                                                            <option selected >{{ __("generated.Complète") }}</option>
                                                                                                                            <option >{{ __("generated.Incrémentielle") }}</option>
                                                                                                                            <option >{{ __("generated.Différentielle") }}</option>
                                                                                                                        </select>
                                                                                                                        <label for="country20" >{{ __("generated.Type de sauvegarde") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Taille des données sauvegardées" value="" required class="form-control border-start-0">
                                                                                                                        <label >{{ __("generated.Taille des données sauvegardées") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Emplacement de sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label >{{ __("generated.Emplacement de sauvegarde") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country21" required>
                                                                                                                            <option  selected>{{ __("generated.Réussie") }}</option>
                                                                                                                            <option >{{ __("generated.Échouée") }}</option>
                                                                                                                            <option >{{ __("generated.Partielle") }}</option>
                                                                                                                        </select>
                                                                                                                        <label for="country21" >{{ __("generated.Statut de la sauvegarde") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 " >{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="{{ __("generated.Durée de la sauvegarde") }}" value="" required class="form-control border-start-0 translated_text">
                                                                                                                        <label >{{ __("generated.Durée de la sauvegarde") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="{{ __("generated.Chiffrement des données") }}" value="" required class="form-control border-start-0 translated_text">
                                                                                                                        <label >{{ __("generated.Chiffrement des donnéese") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="{{ __("generated.Utilisateur responsable") }}" value="" required class="form-control border-start-0 translated_text">
                                                                                                                        <label >{{ __("generated.Utilisateur responsable") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-2"></div>
                                                                                                <div class="col-4">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="{{ __("generated.Adresse IP source") }}" value="" required class="form-control border-start-0 translated_text">
                                                                                                                        <label >{{ __("generated.Adresse IP source") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="{{ __("generated.Sites concernés") }}" value="" required class="form-control border-start-0 translated_text">
                                                                                                                        <label >{{ __("generated.Sites concernés") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country21" required>
                                                                                                                            <option selected>GMT</option>
                                                                                                                            <option >UTC</option>
                                                                                                                        </select>
                                                                                                                        <label for="country21" >{{ __("generated.Fuseau horaire") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="{{ __("generated.Version de la sauvegarde") }}" value="" required class="form-control border-start-0 translated_text">
                                                                                                                        <label >{{ __("generated.Version de la sauvegarde") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="{{ __("generated.Politique de rétention globale") }}" value="" required class="form-control border-start-0 translated_text">
                                                                                                                        <label >{{ __("generated.Politique de rétention globale") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country22" required>
                                                                                                                            <option selected >{{ __("generated.Envoyée") }}</option>
                                                                                                                            <option >{{ __("generated.Non envoyée") }}</option>
                                                                                                                        </select>
                                                                                                                        <label for="country22" >{{ __("generated.Statut des notifications") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country23" required>
                                                                                                                            <option selected>RGPD</option>
                                                                                                                            <option >SOX</option>
                                                                                                                        </select>
                                                                                                                        <label for="country23" >{{ __("generated.Conformité aux réglementations") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country24" required>
                                                                                                                            <option selected >{{ __("generated.Réussie") }}</option>
                                                                                                                            <option >{{ __("generated.Échouée") }}</option>
                                                                                                                        </select>
                                                                                                                        <label for="country24" >{{ __("generated.Vérification d'intégrité des données") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="{{ __("generated.Dernier audit des sauvegardes") }}" value="" required class="form-control border-start-0 translated_text">
                                                                                                                        <label >{{ __("generated.Dernier audit des sauvegardes") }}</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade " id="t2" role="tabpanel" aria-labelledby="t2-tab">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="card border-0"  >
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body" style="padding: 10px 34px;">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div style="margin-top: -11px !important;" class="row mt-4">
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-12" style="padding-top: 8px">
                                                                                                <h6 class="title custom-title ">{{ __("generated.Gestion des sauvegardes") }}</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country30" required>
                                                                                                                <option selected="">{{ __("generated.On-Premise") }}</option>
                                                                                                                <option >{{ __("generated.Cluster") }}</option>
                                                                                                                <option >{{ __("generated.Hyperconvergée") }}</option>
                                                                                                                <option >{{ __("generated.Virtual Private Server (VPS)") }}</option>
                                                                                                                <option >{{ __("generated.Data Center") }}</option>
                                                                                                            </select>
                                                                                                            <label for="country30" >{{ __("generated.Type de destination") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Adresse IP" value="203.0.113.10" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Adresse IP") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Nom de l'hôte" value="c2VydmVyRXh0ZXJuYWwx" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Nom de l'hôte") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Emplacement" value="\\DataCenterEU\Backups" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Emplacement") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Port" value="445" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Port") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Nom d'utilisateur" value="user@domaine.com" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Nom d'utilisateur") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Mot de passe" value="***********" required class="form-control border-start-0">
                                                                                                            <label >{{ __("generated.Mot de passe") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country2" required>
                                                                                                                <option  selected>{{ __("generated.Quotidienne") }}</option>
                                                                                                                <option >{{ __("generated.Mensuelle") }}</option>
                                                                                                                <option >{{ __("generated.Trimestrielle") }}</option>
                                                                                                                <option >{{ __("generated.Semestrielle") }}</option>
                                                                                                                <option >{{ __("generated.Annuelle") }}</option>
                                                                                                            </select>
                                                                                                            <label for="country2" >{{ __("generated.Fréquence de sauvegarde") }}</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country3" required>
                                                                                                                <option selected>Sauvegarde complète</option>
                                                                                                                <option >Sauvegarde incrémentielle</option>
                                                                                                                <option >Sauvegarde différentielle</option>
                                                                                                                <option >Sauvegarde miroir</option>
                                                                                                                <option>Sauvegarde à chaud</option>
                                                                                                                <option>Sauvegarde à froid</option>
                                                                                                            </select>
                                                                                                            <label for="country3">Méthode de sauvegarde</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Chiffrement des données" value="AES-256" required class="form-control border-start-0">
                                                                                                            <label>Chiffrement des données</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Taille de sauvegarde" value="500 Go" required class="form-control border-start-0">
                                                                                                            <label>Taille de sauvegarde</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Espace de stockage" value="2 To" required class="form-control border-start-0">
                                                                                                            <label>Espace de stockage</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Format des données" value="base de données" required class="form-control border-start-0">
                                                                                                            <label>Format des données</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <div class="row">

                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country4" required>
                                                                                                                <option selected>30 jours</option>
                                                                                                                <option>60 jours</option>
                                                                                                                <option>90 jours</option>
                                                                                                            </select>
                                                                                                            <label for="country4">Politique de rétention</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country5" required>
                                                                                                                <option selected>Manuelle</option>
                                                                                                                <option>Automatique</option>
                                                                                                            </select>
                                                                                                            <label for="country5">Méthode de suppression</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Notifications" value="E-mail" required class="form-control border-start-0">
                                                                                                            <label>Notifications</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country6" required>
                                                                                                                <option selected>Mensuelle</option>
                                                                                                                <option >Trimestrielle</option>
                                                                                                                <option >Semestrielle</option>
                                                                                                                <option>Annuelle</option>
                                                                                                            </select>
                                                                                                            <label for="country6">Test de récupération</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country7" required>
                                                                                                                <option selected>1ère version</option>
                                                                                                                <option >2ème version</option>
                                                                                                                <option >3ème version</option>
                                                                                                                <option >4ème version</option>
                                                                                                            </select>
                                                                                                            <label for="country7">Changement de version</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country8" required>
                                                                                                                <option selected>Mensuelle</option>
                                                                                                                <option >Trimestrielle</option>
                                                                                                                <option >Semestrielle</option>
                                                                                                                <option>Annuelle</option>
                                                                                                            </select>
                                                                                                            <label for="country8">Audit de sauvegarde</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mt-4 mb-4">
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-12" style="padding-top: 8px">
                                                                                                <h6 class="title custom-title">Rotation des sauvegardes</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">

                                                                                        <div class="row mb-4">
                                                                                            <div class="col-1">
                                                                                                <div class="form-check form-switch" style="margin-top: 8px;">
                                                                                                    <input class="form-check-input " type="radio" role="switch" name="rt1" data-target="#v1" id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Activer/Désactiver">
                                                                                                    <label class="form-check-label" for="userlist1"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-7" style="padding-top: 8px;margin-left: 17px;">
                                                                                                <span>Versioning des sauvegardes</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="v1">
                                                                                            <div class="row mb-4">
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country9" required>
                                                                                                                    <option selected>2 versions</option>
                                                                                                                    <option>3 versions</option>
                                                                                                                    <option>4 versions</option>
                                                                                                                    <option>5 versions</option>
                                                                                                                </select>
                                                                                                                <label for="country9">Politique de versioning</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Identifiants de version" value="Fichier_A_v1_2024-01-01_12-00" required class="form-control border-start-0">
                                                                                                                <label>Identifiants de version</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country10" required>
                                                                                                                    <option selected>30 jours</option>
                                                                                                                    <option>60 jours</option>
                                                                                                                    <option>90 jours</option>
                                                                                                                </select>
                                                                                                                <label for="country10">Politique de conservation</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Méthode de suppression" value="versions > à 90 jours." required class="form-control border-start-0">
                                                                                                                <label>Méthode de suppression</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Notifications avant suppression" value="7 jours" required class="form-control border-start-0">
                                                                                                                <label>Notifications avant suppression</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country11" required>
                                                                                                                    <option selected>Mensuelle</option>
                                                                                                                    <option >Trimestrielle</option>
                                                                                                                    <option >Semestrielle</option>
                                                                                                                    <option>Annuelle</option>
                                                                                                                </select>
                                                                                                                <label for="country11">Évaluation continue</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"></div>
                                                                                    <div class="col-4">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-1">
                                                                                                <div class="form-check form-switch" style="margin-top: 8px;">
                                                                                                    <input class="form-check-input" type="radio" role="switch" name="rt1" data-target="#v2" id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Activer/Désactiver">
                                                                                                    <label class="form-check-label" for="userlist1"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-8" style="padding-top: 8px;margin-left: 17px;">
                                                                                                <span>Suppression des anciennes versions</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="" id="v2">
                                                                                            <div class="row mb-4">
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country12" required>
                                                                                                                    <option selected>30 jours</option>
                                                                                                                    <option>60 jours</option>
                                                                                                                    <option>90 jours</option>
                                                                                                                </select>
                                                                                                                <label for="country12">Politique de conservation</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country13" required>
                                                                                                                    <option selected>Automatique</option>
                                                                                                                    <option >Manuelle</option>
                                                                                                                </select>
                                                                                                                <label for="country13">Méthode de suppression</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Notifications avant suppression" value="7 jours" required class="form-control border-start-0">
                                                                                                                <label>Notifications avant suppression</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country14" required>
                                                                                                                    <option selected>Mensuelle</option>
                                                                                                                    <option >Trimestrielle</option>
                                                                                                                    <option >Semestrielle</option>
                                                                                                                    <option>Annuelle</option>
                                                                                                                </select>
                                                                                                                <label for="country14">Évaluation continue</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-12" style="padding-top: 8px">
                                                                                                <h6 class="title custom-title">Historique des sauvegardes</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div id="v5">
                                                                                            <div class="row mb-4">
                                                                                                <div class="col-4">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Date et heure de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Date et heure de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Nom de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Nom de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">

                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country20" required>
                                                                                                                            <option selected>Complète</option>
                                                                                                                            <option >Incrémentielle</option>
                                                                                                                            <option >Différentielle</option>
                                                                                                                        </select>
                                                                                                                        <label for="country20">Type de sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Taille des données sauvegardées" value="" required class="form-control border-start-0">
                                                                                                                        <label>Taille des données sauvegardées</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Emplacement de sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Emplacement de sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country21" required>
                                                                                                                            <option selected>Réussie</option>
                                                                                                                            <option >Échouée</option>
                                                                                                                            <option >Partielle</option>
                                                                                                                        </select>
                                                                                                                        <label for="country21">Statut de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Durée de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Durée de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Chiffrement des données" value="" required class="form-control border-start-0">
                                                                                                                        <label>Chiffrement des donnéese</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Utilisateur responsable" value="" required class="form-control border-start-0">
                                                                                                                        <label>Utilisateur responsable</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-2"></div>
                                                                                                <div class="col-4">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Adresse IP source" value="" required class="form-control border-start-0">
                                                                                                                        <label>Adresse IP source</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Sites concernés" value="" required class="form-control border-start-0">
                                                                                                                        <label>Sites concernés</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country21" required>
                                                                                                                            <option selected>GMT</option>
                                                                                                                            <option >UTC</option>
                                                                                                                        </select>
                                                                                                                        <label for="country21">Fuseau horaire</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Version de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Version de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Politique de rétention globale" value="" required class="form-control border-start-0">
                                                                                                                        <label>Politique de rétention globale</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country22" required>
                                                                                                                            <option selected>Envoyée</option>
                                                                                                                            <option >Non envoyée</option>
                                                                                                                        </select>
                                                                                                                        <label for="country22">Statut des notifications</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country23" required>
                                                                                                                            <option selected>RGPD</option>
                                                                                                                            <option >SOX</option>
                                                                                                                        </select>
                                                                                                                        <label for="country23">Conformité aux réglementations</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country24" required>
                                                                                                                            <option selected>Réussie</option>
                                                                                                                            <option >Échouée</option>
                                                                                                                        </select>
                                                                                                                        <label for="country24">Vérification d'intégrité des données</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Dernier audit des sauvegardes" value="" required class="form-control border-start-0">
                                                                                                                        <label>Dernier audit des sauvegardes</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade " id="t3" role="tabpanel" aria-labelledby="t3-tab">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="card border-0"  >
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body" style="padding: 10px 34px;">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div style="margin-top: -11px !important;" class="row mt-4">
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-12" style="padding-top: 8px">
                                                                                                <h6 class="title custom-title">Gestion des sauvegardes</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country30" required>
                                                                                                                <option>Cloud</option>
                                                                                                                <option selected="">Cloud</option>
                                                                                                                <option>SaaS</option>
                                                                                                                <option>IaaS</option>
                                                                                                                <option>PaaS</option>
                                                                                                            </select>
                                                                                                            <label for="country30">Type de destination</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Adresse IP" value="203.0.113.101" required class="form-control border-start-0">
                                                                                                            <label>Adresse IP</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Nom de l'hôte" value="cloudbackup.provider.com" required class="form-control border-start-0">
                                                                                                            <label>Nom de l'hôte</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Emplacement" value="\cloud\backups" required class="form-control border-start-0">
                                                                                                            <label>Emplacement</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Port" value="445" required class="form-control border-start-0">
                                                                                                            <label>Port</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Nom d'utilisateur" value="user@domaine.com" required class="form-control border-start-0">
                                                                                                            <label>Nom d'utilisateur</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Mot de passe" value="***********" required class="form-control border-start-0">
                                                                                                            <label>Mot de passe</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country2" required>
                                                                                                                <option selected>Quotidienne</option>
                                                                                                                <option >Mensuelle</option>
                                                                                                                <option >Trimestrielle</option>
                                                                                                                <option >Semestrielle</option>
                                                                                                                <option>Annuelle</option>
                                                                                                            </select>
                                                                                                            <label for="country2">Fréquence de sauvegarde</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country3" required>
                                                                                                                <option selected>Sauvegarde complète</option>
                                                                                                                <option >Sauvegarde incrémentielle</option>
                                                                                                                <option >Sauvegarde différentielle</option>
                                                                                                                <option >Sauvegarde miroir</option>
                                                                                                                <option>Sauvegarde à chaud</option>
                                                                                                                <option>Sauvegarde à froid</option>
                                                                                                            </select>
                                                                                                            <label for="country3">Méthode de sauvegarde</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Chiffrement des données" value="AES-256" required class="form-control border-start-0">
                                                                                                            <label>Chiffrement des données</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Taille de sauvegarde" value="500 Go" required class="form-control border-start-0">
                                                                                                            <label>Taille de sauvegarde</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Espace de stockage" value="2 To" required class="form-control border-start-0">
                                                                                                            <label>Espace de stockage</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Format des données" value="base de données" required class="form-control border-start-0">
                                                                                                            <label>Format des données</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <div class="row">

                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country4" required>
                                                                                                                <option selected>30 jours</option>
                                                                                                                <option>60 jours</option>
                                                                                                                <option>90 jours</option>
                                                                                                            </select>
                                                                                                            <label for="country4">Politique de rétention</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country5" required>
                                                                                                                <option selected>Manuelle</option>
                                                                                                                <option>Automatique</option>
                                                                                                            </select>
                                                                                                            <label for="country5">Méthode de suppression</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <input type="text" placeholder="Notifications" value="E-mail" required class="form-control border-start-0">
                                                                                                            <label>Notifications</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country6" required>
                                                                                                                <option selected>Mensuelle</option>
                                                                                                                <option >Trimestrielle</option>
                                                                                                                <option >Semestrielle</option>
                                                                                                                <option>Annuelle</option>
                                                                                                            </select>
                                                                                                            <label for="country6">Test de récupération</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country7" required>
                                                                                                                <option selected>1ère version</option>
                                                                                                                <option >2ème version</option>
                                                                                                                <option >3ème version</option>
                                                                                                                <option >4ème version</option>
                                                                                                            </select>
                                                                                                            <label for="country7">Changement de version</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 mb-2">
                                                                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                    <div class="input-group input-group-lg">
                                                                                                        <div class="form-floating">
                                                                                                            <select class="form-select border-0" id="country8" required>
                                                                                                                <option selected>Mensuelle</option>
                                                                                                                <option >Trimestrielle</option>
                                                                                                                <option >Semestrielle</option>
                                                                                                                <option>Annuelle</option>
                                                                                                            </select>
                                                                                                            <label for="country8">Audit de sauvegarde</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mt-4 mb-4">
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-12" style="padding-top: 8px">
                                                                                                <h6 class="title custom-title">Rotation des sauvegardes</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-4">

                                                                                        <div class="row mb-4">
                                                                                            <div class="col-1">
                                                                                                <div class="form-check form-switch" style="margin-top: 8px;">
                                                                                                    <input class="form-check-input " type="radio" role="switch" name="rt1" data-target="#v1" id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Activer/Désactiver">
                                                                                                    <label class="form-check-label" for="userlist1"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-7" style="padding-top: 8px;margin-left: 17px;">
                                                                                                <span>Versioning des sauvegardes</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="v1">
                                                                                            <div class="row mb-4">
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country9" required>
                                                                                                                    <option selected>2 versions</option>
                                                                                                                    <option>3 versions</option>
                                                                                                                    <option>4 versions</option>
                                                                                                                    <option>5 versions</option>
                                                                                                                </select>
                                                                                                                <label for="country9">Politique de versioning</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Identifiants de version" value="Fichier_A_v1_2024-01-01_12-00" required class="form-control border-start-0">
                                                                                                                <label>Identifiants de version</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country10" required>
                                                                                                                    <option selected>30 jours</option>
                                                                                                                    <option>60 jours</option>
                                                                                                                    <option>90 jours</option>
                                                                                                                </select>
                                                                                                                <label for="country10">Politique de conservation</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Méthode de suppression" value="versions > à 90 jours." required class="form-control border-start-0">
                                                                                                                <label>Méthode de suppression</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Notifications avant suppression" value="7 jours" required class="form-control border-start-0">
                                                                                                                <label>Notifications avant suppression</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">
                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country11" required>
                                                                                                                    <option selected>Mensuelle</option>
                                                                                                                    <option >Trimestrielle</option>
                                                                                                                    <option >Semestrielle</option>
                                                                                                                    <option>Annuelle</option>
                                                                                                                </select>
                                                                                                                <label for="country11">Évaluation continue</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-2"></div>
                                                                                    <div class="col-4">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-1">
                                                                                                <div class="form-check form-switch" style="margin-top: 8px;">
                                                                                                    <input class="form-check-input" type="radio" role="switch" name="rt1" data-target="#v2" id="userlist1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Activer/Désactiver">
                                                                                                    <label class="form-check-label" for="userlist1"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-8" style="padding-top: 8px;margin-left: 17px;">
                                                                                                <span>Suppression des anciennes versions</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="" id="v2">
                                                                                            <div class="row mb-4">
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country12" required>
                                                                                                                    <option selected>30 jours</option>
                                                                                                                    <option>60 jours</option>
                                                                                                                    <option>90 jours</option>
                                                                                                                </select>
                                                                                                                <label for="country12">Politique de conservation</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country13" required>
                                                                                                                    <option selected>Automatique</option>
                                                                                                                    <option >Manuelle</option>
                                                                                                                </select>
                                                                                                                <label for="country13">Méthode de suppression</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <input type="text" placeholder="Notifications avant suppression" value="7 jours" required class="form-control border-start-0">
                                                                                                                <label>Notifications avant suppression</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 mb-2">
                                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                        <div class="input-group input-group-lg">

                                                                                                            <div class="form-floating">
                                                                                                                <select class="form-select border-0" id="country14" required>
                                                                                                                    <option selected>Mensuelle</option>
                                                                                                                    <option >Trimestrielle</option>
                                                                                                                    <option >Semestrielle</option>
                                                                                                                    <option>Annuelle</option>
                                                                                                                </select>
                                                                                                                <label for="country14">Évaluation continue</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <div class="row mb-4">
                                                                                            <div class="col-12" style="padding-top: 8px">
                                                                                                <h6 class="title custom-title">Historique des sauvegardes</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div id="v5">
                                                                                            <div class="row mb-4">
                                                                                                <div class="col-4">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Date et heure de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Date et heure de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Nom de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Nom de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">

                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country20" required>
                                                                                                                            <option selected>Complète</option>
                                                                                                                            <option >Incrémentielle</option>
                                                                                                                            <option >Différentielle</option>
                                                                                                                        </select>
                                                                                                                        <label for="country20">Type de sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Taille des données sauvegardées" value="" required class="form-control border-start-0">
                                                                                                                        <label>Taille des données sauvegardées</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Emplacement de sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Emplacement de sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country21" required>
                                                                                                                            <option selected>Réussie</option>
                                                                                                                            <option >Échouée</option>
                                                                                                                            <option >Partielle</option>
                                                                                                                        </select>
                                                                                                                        <label for="country21">Statut de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Durée de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Durée de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Chiffrement des données" value="" required class="form-control border-start-0">
                                                                                                                        <label>Chiffrement des donnéese</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Utilisateur responsable" value="" required class="form-control border-start-0">
                                                                                                                        <label>Utilisateur responsable</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-2"></div>
                                                                                                <div class="col-4">
                                                                                                    <div class="row">
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Adresse IP source" value="" required class="form-control border-start-0">
                                                                                                                        <label>Adresse IP source</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Sites concernés" value="" required class="form-control border-start-0">
                                                                                                                        <label>Sites concernés</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country21" required>
                                                                                                                            <option selected>GMT</option>
                                                                                                                            <option >UTC</option>
                                                                                                                        </select>
                                                                                                                        <label for="country21">Fuseau horaire</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Version de la sauvegarde" value="" required class="form-control border-start-0">
                                                                                                                        <label>Version de la sauvegarde</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Politique de rétention globale" value="" required class="form-control border-start-0">
                                                                                                                        <label>Politique de rétention globale</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country22" required>
                                                                                                                            <option selected>Envoyée</option>
                                                                                                                            <option >Non envoyée</option>
                                                                                                                        </select>
                                                                                                                        <label for="country22">Statut des notifications</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country23" required>
                                                                                                                            <option selected>RGPD</option>
                                                                                                                            <option >SOX</option>
                                                                                                                        </select>
                                                                                                                        <label for="country23">Conformité aux réglementations</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <select class="form-select border-0" id="country24" required>
                                                                                                                            <option selected>Réussie</option>
                                                                                                                            <option >Échouée</option>
                                                                                                                        </select>
                                                                                                                        <label for="country24">Vérification d'intégrité des données</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                        <div class="col-12 col-md-12 mb-2">
                                                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                                                <div class="input-group input-group-lg">
                                                                                                                    <div class="form-floating">
                                                                                                                        <input type="text" placeholder="Dernier audit des sauvegardes" value="" required class="form-control border-start-0">
                                                                                                                        <label>Dernier audit des sauvegardes</label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="padding: 10px">
                                <div class="col-12">
                                    <div class="form-check form-switch" style="margin-top: 15px;">
                                        <button class="btn btn-theme mnw-100 bg-info" style="float: right;font-size: 14px;margin-left: 10px">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade " id="tab11320" role="tabpanel" aria-labelledby="tab11320-tab">
                    <div class="row ">
                        <div class="col-12">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body" style="padding: 20px 34px;">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div style="width: 50%;" class="col-12 col-md-6 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country40" required>
                                                                                    <option selected>Datacenters</option>
                                                                                    <option>Cloud</option>
                                                                                    <option>AWS</option>
                                                                                    <option>Azure</option>
                                                                                </select>
                                                                                <label for="country40">Source de sauvegarde</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                                <div style="width: 50%;" class="col-12 col-md-6 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Noms de Serveur" value="srv-backup-eu1.local" required="" class="form-control border-start-0">
                                                                                <label>Noms de Serveur</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-6 mb-2">
                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text" placeholder="Ville" value="Francfort" required="" class="form-control border-start-0">
                                                                                                <label>Ville</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6 mb-2">
                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text" placeholder="Pays" value="Allemagne" required="" class="form-control border-start-0">
                                                                                                <label>Pays</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row" style="margin-top: 35px;">
                                                                <div style="width: 50%;" class="col-12 col-md-4 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country42" required>
                                                                                    <option selected>Complète</option>
                                                                                    <option>Granulaire</option>
                                                                                    <option>Incrémentale</option>
                                                                                </select>
                                                                                <label for="country42">Type de restauration</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-6 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" placeholder="Date" value="22/10/2024" required="" class="form-control border-start-0">
                                                                                        <label>Date</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-6 mb-2">
                                                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text" placeholder="Heure" value="03:00" required="" class="form-control border-start-0">
                                                                                        <label>Heure</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="invalid-feedback mb-3">Add valid data </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row"  style="margin-top: 35px;">
                                                                <div style="width: 50%;" class="col-12 col-md-4 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Cible de restauration" value="srv-test-eu2.azure" required="" class="form-control border-start-0">
                                                                                <label>Cible de restauration</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                                <div style="width: 50%;" class="col-12 col-md-4 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country43" required>
                                                                                    <option selected>Serveurs locaux</option>
                                                                                    <option>Cloud</option>
                                                                                    <option>Serveur de test</option>
                                                                                </select>
                                                                                <label for="country43">Environnement cible</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div style="width: 50%;" class="col-12 col-md-4 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country45" required>
                                                                                    <option selected>E-mail</option>
                                                                                    <option>SMS</option>
                                                                                </select>
                                                                                <label for="country45">Notification</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                                <div class="col-12 col-md-4 mb-2" style="width: 50%">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country45" required>
                                                                                    <option selected>Immédiate</option>
                                                                                    <option>Différée</option>
                                                                                </select>
                                                                                <label for="country45">Planification</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-6 mb-2">
                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text" placeholder="Date" value="22/10/2024" required="" class="form-control border-start-0">
                                                                                                <label>Date</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6 mb-2">
                                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                                        <div class="input-group input-group-lg">
                                                                                            <div class="form-floating">
                                                                                                <input type="text" placeholder="Heure" value="03:00" required="" class="form-control border-start-0">
                                                                                                <label>Heure</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row"  style="margin-top: 35px;">
                                                                <div style="width: 50%;" class="col-12 col-md-4 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country45" required>
                                                                                    <option selected>Post-restauration</option>
                                                                                    <option>Tests périodiques</option>
                                                                                </select>
                                                                                <label for="country45">Vérification de l'intégrité des données</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                                <div style="width: 50%;" class="col-12 col-md-4 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Outil utilisé" value="srv-checksum-eu1.local" required="" class="form-control border-start-0">
                                                                                <label>Outil utilisé</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top: 35px;">
                                                                <div style="width: 50%;" class="col-12 col-md-4 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country47" required>
                                                                                    <option selected>Rapports centralisés</option>
                                                                                    <option>Tests périodiques</option>
                                                                                </select>
                                                                                <label for="country47">Documentation de la restauration</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                                <div style="width: 50%;" class="col-12 col-md-4 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" placeholder="Serveur de journalisation" value="srv-audit-eu3.local" required="" class="form-control border-start-0">
                                                                                <label>Serveur de journalisation</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row"  style="margin-top: 35px;">
                                                                <div style="width: 25%;" class="col-12 col-md-4 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country44" required>
                                                                                    <option selected>Bases de données</option>
                                                                                    <option>Machines virtuelles</option>
                                                                                    <option>Serveur de test</option>
                                                                                </select>
                                                                                <label for="country44">Options de restauration</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                                <div style="width: 25%;"  class="col-12 col-md-12 mb-2" >
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country45" required>
                                                                                    <option selected>AES-256</option>
                                                                                </select>
                                                                                <label for="country45">Chiffrement</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                                <div style="width: 25%;" class="col-12 col-md-12 mb-2" >
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country46" required>
                                                                                    <option selected>MFA</option>
                                                                                    <option >Simple</option>
                                                                                </select>
                                                                                <label for="country46">Authentification</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>
                                                                <div style="width: 25%;" class="col-12 col-md-12 mb-2">
                                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <select class="form-select border-0" id="country47" required>
                                                                                    <option selected>RGPD</option>
                                                                                    <option >HIPAA</option>
                                                                                </select>
                                                                                <label for="country47">Conformité</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">Add valid data </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer" style="padding: 10px">
                                                    <div class="col-12">
                                                        <div class="form-check form-switch" style="margin-top: 15px;">
                                                            <button class="btn btn-theme mnw-100 bg-info" style="float: right;font-size: 14px;margin-left: 10px">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade " id="tab14120" role="tabpanel" aria-labelledby="tab14120-tab">
                    <div class="row mb-4 mt-2" style="margin-top: -28px;">
                        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="t11-tab" data-bs-toggle="tab" data-bs-target="#t11" type="button" role="tab" aria-controls="t11" aria-selected="true">Sauvegarde </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="t12-tab" data-bs-toggle="tab" data-bs-target="#t12" type="button" role="tab" aria-controls="t12" aria-selected="false" tabindex="-1">Restauration </button>
                            </li>
                        </ul>
                    </div>
                    <div class="row mt-1 mb-5" style="padding: 10px">
                        <div class="card border-0 theme-blue card-1" style="padding: 0px;background-color: transparent;">
                            <div class="card-body" style="padding: 20px">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0 mb-2">
                                            <div class="card-body" style="background-color: #e4e8ee54">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row justify-content-center ">
                                                                    <div class="col-4" style="width: 30%;"></div>
                                                                    <div class="col-auto" style="width: 49%;">
                                                                        <div class="col-auto" style="width: 34%;float: right;margin-top: 2px;">
                                                                            <div class="input-group input-group-md">
                                                                                <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" style="background-color: transparent !important;">
                                                                                <span class="input-group-text text-secondary bg-none" id="titlecalandershow" style="background-color: transparent !important;">
                                                                                    <i class="bi bi-calendar-event" style="font-size: 24px;color: #005dc7;"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto " style="width: 362px;margin-top: 9px;">
                                                                            <div class="input-group " style="border: 1px solid #ffffff47;">
                                                                                <span class="input-group-text text-theme"><i class="bi bi-search"></i></span>
                                                                                <input type="text" class="form-control" placeholder="Recherche">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 ms-auto" style="width: 20%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                                                        <div class="row">
                                                                            <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Partager"  style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#emailcompose">
                                                                                        <i class="bi bi-share avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Télécharger" style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme">
                                                                                    <a href="#" type="button" >
                                                                                        <i class="bi bi-cloud-download avatar   rounded h5"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Imprimer" style="margin-right: -15px;">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <i class="bi bi-printer avatar   rounded h5"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                                                                                <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                                    <select style="border: 0;background-color: transparent;width: 49px;color: #005dc7;">
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
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="t11" role="tabpanel" aria-labelledby="t11-tab">
                                        <div class="row mb-4" style="padding: 0px 20px;">
                                            <div class="col-12">
                                                <div class="card border-0"  >
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body" style="padding: 20px 34px;">
                                                                        <div class="row mb-5">
                                                                            <div class="col-12">
                                                                                <h6 class="title custom-title">Sauvegarde</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div style="" class="row ">
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <table class="table">
                                                                                            <thead style="font-size: 13px">
                                                                                            <tr style="border-top: 1px solid #e9e9e9;">
                                                                                                <th style="text-align: left">Date</th>
                                                                                                <th style="text-align: left">Heure</th>
                                                                                                <th style="text-align: left">Type de Sauvegarde</th>
                                                                                                <th style="text-align: left">Fréquence</th>
                                                                                                <th style="text-align: left">Destination</th>
                                                                                                <th style="text-align: left">Taille des Données</th>
                                                                                                <th style="text-align: left">Méthode</th>
                                                                                                <th style="text-align: left">Notifications</th>
                                                                                                <th style="text-align: left">Statut</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody style="font-size: 13px">
                                                                                            <tr>
                                                                                                <td>22/10/2024</td>
                                                                                                <td>03:00</td>
                                                                                                <td>Complète</td>
                                                                                                <td>Quotidienne</td>
                                                                                                <td>Serveur local</td>
                                                                                                <td>500 Go</td>
                                                                                                <td>AES-256</td>
                                                                                                <td>E-mail</td>
                                                                                                <td>Succès</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>21/10/2024</td>
                                                                                                <td>03:00</td>
                                                                                                <td>Complète</td>
                                                                                                <td>Quotidienne</td>
                                                                                                <td>Serveur externe</td>
                                                                                                <td>400 Go</td>
                                                                                                <td>AES-256</td>
                                                                                                <td>E-mail</td>
                                                                                                <td>Succès</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>20/10/2024</td>
                                                                                                <td>03:00</td>
                                                                                                <td>Complète</td>
                                                                                                <td>Quotidienne</td>
                                                                                                <td>Serveur cloud</td>
                                                                                                <td>350 Go</td>
                                                                                                <td>AES-256</td>
                                                                                                <td>E-mail</td>
                                                                                                <td>Échec (Erreur)</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>19/10/2024</td>
                                                                                                <td>03:00</td>
                                                                                                <td>Complète</td>
                                                                                                <td>Quotidienne</td>
                                                                                                <td>Serveur local</td>
                                                                                                <td>450 Go</td>
                                                                                                <td>AES-256</td>
                                                                                                <td>E-mail</td>
                                                                                                <td>Succès</td>
                                                                                            </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <div class="row mt-2 mb-2">
                                                                                        <div class="col-12 footable-paging-external footable-paging-right" id="footable-pagination">
                                                                                            <div class="footable-pagination-wrapper" style="display: block !important;float: right">
                                                                                                <ul class="pagination">
                                                                                                    <li class="footable-page-nav disabled" data-page="first">
                                                                                                        <a class="footable-page-link" href="#">«</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page-nav disabled" data-page="prev">
                                                                                                        <a class="footable-page-link" href="#">‹</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page visible active" data-page="1">
                                                                                                        <a class="footable-page-link" href="#">1</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page visible" data-page="2">
                                                                                                        <a class="footable-page-link" href="#">2</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page-nav" data-page="next">
                                                                                                        <a class="footable-page-link" href="#">›</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page-nav" data-page="last">
                                                                                                        <a class="footable-page-link" href="#">»</a>
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
                                    <div class="tab-pane fade " id="t12" role="tabpanel" aria-labelledby="t12-tab">
                                        <div class="row mb-4" style="padding: 0px 20px;">
                                            <div class="col-12">
                                                <div class="card border-0"  >
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body" style="padding: 20px 34px;">
                                                                        <div class="row mb-5">
                                                                            <div class="col-12">
                                                                                <h6 class="title custom-title">Restauration</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div style="" class="row ">
                                                                                    <div class="col-12" style="margin-bottom: 17px !important;">
                                                                                        <table class="table">
                                                                                            <thead style="font-size: 13px">
                                                                                            <tr style="border-top: 1px solid #e9e9e9;">
                                                                                                <th style="text-align: left">Date</th>
                                                                                                <th style="text-align: left">Heure</th>
                                                                                                <th style="text-align: left">Source de Sauvegarde</th>
                                                                                                <th style="text-align: left">Cible de Restauration</th>
                                                                                                <th style="text-align: left">Type de Restauration</th>
                                                                                                <th style="text-align: left">Environnement Cible</th>
                                                                                                <th style="text-align: left">Notification</th>
                                                                                                <th style="text-align: left">Vérification Intégrité</th>
                                                                                                <th style="text-align: left">Outil Utilisé</th>
                                                                                                <th style="text-align: left">Statut</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody style="font-size: 13px">
                                                                                            <tr>
                                                                                                <td>22/10/2024</td>
                                                                                                <td>03:00</td>
                                                                                                <td>Datacenters</td>
                                                                                                <td>srv-test-eu2.azure</td>
                                                                                                <td>Complète</td>
                                                                                                <td>Serveurs locaux</td>
                                                                                                <td>E-mail</td>
                                                                                                <td>Post-restauration</td>
                                                                                                <td>srv-checksum-eu1</td>
                                                                                                <td>Succès</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>21/10/2024</td>
                                                                                                <td>03:00</td>
                                                                                                <td>Datacenters</td>
                                                                                                <td>srv-prod-eu2.azure</td>
                                                                                                <td>Complète</td>
                                                                                                <td>Serveurs locaux</td>
                                                                                                <td>E-mail</td>
                                                                                                <td>Post-restauration</td>
                                                                                                <td>srv-checksum-eu1</td>
                                                                                                <td>Succès</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>20/10/2024</td>
                                                                                                <td>03:00</td>
                                                                                                <td>Datacenters</td>
                                                                                                <td>srv-test-eu2.azure</td>
                                                                                                <td>Complète</td>
                                                                                                <td>Serveurs cloud</td>
                                                                                                <td>E-mail</td>
                                                                                                <td>Post-restauration</td>
                                                                                                <td>srv-checksum-eu1</td>
                                                                                                <td>Échec (Erreur)</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>19/10/2024</td>
                                                                                                <td>03:00</td>
                                                                                                <td>Datacenters</td>
                                                                                                <td>srv-prod-eu2.azure</td>
                                                                                                <td>Complète</td>
                                                                                                <td>Serveurs locaux</td>
                                                                                                <td>E-mail</td>
                                                                                                <td>Post-restauration</td>
                                                                                                <td>srv-checksum-eu1</td>
                                                                                                <td>Succès</td>
                                                                                            </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <div class="row mt-2 mb-2">
                                                                                        <div class="col-12 footable-paging-external footable-paging-right" id="footable-pagination">
                                                                                            <div class="footable-pagination-wrapper" style="display: block !important;float: right">
                                                                                                <ul class="pagination">
                                                                                                    <li class="footable-page-nav disabled" data-page="first">
                                                                                                        <a class="footable-page-link" href="#">«</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page-nav disabled" data-page="prev">
                                                                                                        <a class="footable-page-link" href="#">‹</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page visible active" data-page="1">
                                                                                                        <a class="footable-page-link" href="#">1</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page visible" data-page="2">
                                                                                                        <a class="footable-page-link" href="#">2</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page-nav" data-page="next">
                                                                                                        <a class="footable-page-link" href="#">›</a>
                                                                                                    </li>
                                                                                                    <li class="footable-page-nav" data-page="last">
                                                                                                        <a class="footable-page-link" href="#">»</a>
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