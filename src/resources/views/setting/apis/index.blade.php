@extends('layouts.master')

@section('title', __('generated.Intégration (API)'))

@section('css_header')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Paramètre") }}</h5>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
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
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{asset('assets/img/icon/HJ_icon_green_black.png')}}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}"
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
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Intégration (API)") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">

            {{-- Filter  --}}
            {{-- <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0"  >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body filter-block">
                                            <div class="row">
                                                <div class="col-md-3 mb-2">
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
                                                <div class="col-md-3 mb-2">
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
                                                <div class="col-md-3 mb-2">
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
                                                <div class="col-md-3 mb-2">
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
            </div> --}}

            <!-- Bouton pour ouvrir le modal -->
            <div class="text-end">
                <button type="button" class="btn btn-theme text-white " data-bs-toggle="modal" data-bs-target="#addApiModal"><i class="bi bi-plus-square me-2"></i> {{ __("generated.Ajouter un API") }}</button>
            </div>
            {{-- CARDS APIS --}}
            <div class="row mb-5 mt-5">
                
                @foreach($apis as $api)
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-3 column-set">
                        <div class="card border-0" >
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0 theme-gr h-100" style="height: 177px !important;">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <i class="bi bi-gear-wide-connected h5 me-1 avatar avatar-40 rounded me-2 bg-light-blue" style="color: #005dc7;"></i>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <h6 class="fw-medium mb-0" style="font-size: 13px;margin-left: -12px;">
                                                            <a href="{{ route('api.detail', $api->id) }}" class="text-dark text-decoration-none">
                                                                {{ __($api->name) }}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input toggle-api" type="checkbox" 
                                                                id="toggle-{{ __($api->id) }}"
                                                                data-id="{{ __($api->id) }}"
                                                                data-name="{{ __($api->name) }}"
                                                                {{ $api->status ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="coverimg w-100 h-150 position-relative" style="background-image: url('{{ asset($api->image_path) }}');">
                                                <img src="{{ asset($api->image_path) }}" class="mw-100" alt="" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </main>

    <!-- Modal d'ajout d'API -->
    <div class="modal fade" id="addApiModal" tabindex="-1" aria-labelledby="addApiModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="addApiModalLabel">{{ __("generated.Ajouter un nouvel API") }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addApiForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label ">{{ __("generated.Nom de l'API") }}</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="system_name" class="form-label ">{{ __("generated.Nom du Système") }}</label>
                            <input type="text" class="form-control" id="system_name" name="system_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label ">{{ __("generated.Type") }}</label>
                            <select class="form-select" id="type" name="type">
                                <option value="SIRH">SIRH</option>
                                <option value="ERP">ERP</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="connection_port" class="form-label ">{{ __("generated.Port de Connexion") }}</label>
                            <input type="text" class="form-control" id="connection_port" name="connection_port">
                        </div>
                        <div class="mb-3">
                            <label for="protocol" class="form-label ">{{ __("generated.Protocole") }}</label>
                            <input type="text" class="form-control" id="protocol" name="protocol" value="HTTPS">
                        </div>
                        <div class="mb-3">
                            <label for="access_identifier" class="form-label ">{{ __("generated.identifiant d'accès") }}</label>
                            <input type="text" class="form-control" id="access_identifier" name="access_identifier" required>
                        </div>
                        <div class="mb-3">
                            <label for="access_password" class="form-label ">{{ __("generated.Mot de Passe") }}</label>
                            <input type="password" class="form-control" id="access_password" name="access_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label ">{{ __("generated.Image") }}</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-theme ">{{ __("generated.Ajouter API") }}</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_footer')
<!-- AJAX pour ajouter API -->
<script>
    $(document).ready(function() {
        $('.toggle-api').on('change', function() {
            let apiId = $(this).data('id');
            let apiName = $(this).data('name');
            let status = $(this).is(':checked') ? 1 : 0;
            let switchElement = $(this);
            let iconElement = $('#icon-' + apiId);

            Swal.fire({
                title: "{{ __('generated.Êtes-vous sûr ?') }}",
                text: "{{ __('generated.Voulez-vous vraiment') }} " + (status ? "{{ __('generated.activer') }}" : "{{ __('generated.désactiver') }}") + " {{ __('generated.l’API') }} " + apiName + " ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "{{ __('generated.Oui, confirmer!') }}",
                cancelButtonText: "{{ __('generated.Annuler') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('api.toggle') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            api_id: apiId,
                            status: status
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "{{ __('generated.Succès!') }}",
                                text: "{{ __('generated.Statut mis à jour avec succès !') }}",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });

                            // Mise à jour de l'icône du toggle
                            if (status) {
                                iconElement.removeClass('bi-toggle-off').addClass('bi-toggle-on');
                            } else {
                                iconElement.removeClass('bi-toggle-on').addClass('bi-toggle-off');
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: "Erreur!",
                                text: "Un problème est survenu.",
                                icon: "error",
                            });

                            // Restaurer l'état précédent si l'update a échoué
                            switchElement.prop('checked', !status);
                        }
                    });
                } else {
                    // Si annulation, restaurer l'état du switch
                    switchElement.prop('checked', !status);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#addApiForm').on('submit', function(e) {
            e.preventDefault(); // Empêche le rechargement de la page

            let formData = new FormData(this); // Création du FormData
            let button = $(this).find('button[type="submit"]');
            button.prop('disabled', true).text('Ajout en cours...');

            $.ajax({
                url: "{{ route('api.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: "Succès!",
                        text: response.message,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });

                    $('#addApiModal').modal('hide'); // Ferme le modal
                    $('#addApiForm')[0].reset(); // Réinitialise le formulaire
                    button.prop('disabled', false).text('Ajouter API');

                    // Ajoute dynamiquement l'API à la liste
                    let newApiHtml = `
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-3 column-set">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0 theme-gr h-100" style="height: 177px !important;">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <i class="bi bi-gear-wide-connected h5 me-1 avatar avatar-40 rounded me-2 bg-light-blue" style="color: #005dc7;"></i>
                                                        </div>
                                                        <div class="col ps-0">
                                                            <h6 class="fw-medium mb-0" style="font-size: 13px;margin-left: -12px;">
                                                                <a href="/setting/apis/api/${response.id}/detail" class="text-dark text-decoration-none">
                                                                    ${response.name}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input toggle-api" type="checkbox" 
                                                                    id="toggle-${response.id}" data-id="${response.id}" 
                                                                    data-name="${response.name}" checked>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="coverimg w-100 h-150 position-relative" 
                                                    style="background-image: url('${response.image_path}');">
                                                    <img src="${response.image_path}" class="mw-100" alt="" style="display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                    // Ajoute l'API nouvellement créée au début de la liste
                    $('.row.mb-5.mt-3').prepend(newApiHtml);
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Erreur!",
                        text: "Un problème est survenu. Vérifiez les champs.",
                        icon: "error"
                    });
                    button.prop('disabled', false).text('Ajouter API');
                }
            });
        });
    });
</script>

@endsection
