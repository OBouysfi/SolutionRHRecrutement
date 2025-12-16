@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('css_header')

@endsection

@section('content')


@endsection
@section('js_footer')
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
                    <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                </div>
            </div>
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                 title="{{ __("generated.contact") }}">
                <a href="{{ route('support.index') }}" class="text-decoration-none">
                    <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
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
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Chatbot") }}">
                <figure class="avatar avatar-40 coverimg  shadow custom-chatbox" style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                    <img src="assets/img/icon/HJ_icon_green_black.png" alt="" style="display: none;">
                </figure>
            </div>
            <div class="col col-sm-auto"  data-bs-toggle="tooltip" data-bs-placement="top" title="Confort utilisateur" style="margin-right: 40px;">
                <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button" id="showNotificationFaciliti">
                    <i class="bi bi-" style="font-size: 26px;">
                        <img src="assets/img/icon/faciliti.png" style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                    </i>
                </button>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <!--
                <li class="breadcrumb-item active" aria-current="page">Détail CV :  </li>
                -->
            </ol>
        </nav>
    </div>
    <!-- content -->
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
                                            <div class="col-3" style="width: 249px;">
                                                <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Client") }}</label>
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
                                                <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Secteur d’activité") }}</label>
                                                    <select class="chosenoptgroup w-100">
                                                        <option>Tous</option>
                                                        <option>Agriculture</option>
                                                        <option>Agroalimentaire</option>
                                                        <option>Aéronautique</option>
                                                        <option >Automobile</option>
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
                                                <div  id="country-selector" class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Pays") }}</label>
                                                    <select class="chosenoptgroup w-100">
                                                        <option>Tous</option>
                                                        <option value="Arabie" data-image="assets/img/drap/saudi-arabia.png">Arabie Saoudite</option>
                                                        <option value="Belgique"  data-image="assets/img/drap/Belgique.jpg">Belgique</option>
                                                        <option value="Canada"  data-image="assets/img/drap/Canada.png">Canada</option>
                                                        <option value="Cameroun"  data-image="assets/img/drap/cameroon.jpg">Cameroun</option>
                                                        <option value="Chine"  data-image="assets/img/drap/china.jpg">Chine</option>
                                                        <option value="Ivoire"  data-image="assets/img/drap/Cote_d'Ivoire.png">Côte d'Ivoire</option>
                                                        <option value="Espagne"  data-image="assets/img/drap/Spain.png">Espagne</option>
                                                        <option value="Unis"  data-image="assets/img/drap/united-arab-emirates.jpg">Émirats Arabes Unis</option>
                                                        <option value="France"  data-image="assets/img/drap/France.png">France</option>
                                                        <option value="Inde"  data-image="assets/img/drap/india.jpg">Inde</option>
                                                        <option value="Irlande"  data-image="assets/img/drap/Ireland.png">Irlande</option>
                                                        <option value="Maroc" selected data-image="assets/img/drap/MAROC.jpg">Maroc</option>
                                                        <option value="Qatar"  data-image="assets/img/drap/QATAR.jpg">Qatar</option>
                                                        <option value="Sénégal"  data-image="assets/img/drap/senegal.jpg">Sénégal</option>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Ville") }}</label>
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
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Missions en cours") }}</label>
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
                                                <div class="rounded border poste-chosen" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                    <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;" >{{ __("generated.Statut du client") }}</label>
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
        <div class="row mb-5">
            <div class="col-7">
                <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist" style="font-size: 16px">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active " href="clients.html">{{ __("generated.Tableau de bord") }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link " href="indicateurs-cles.html">{{ __("generated.Indicateurs clés") }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link " href="gestion-clients.html">{{ __("generated.Gestion des clients") }}</a>
                    </li>
                </ul>
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
