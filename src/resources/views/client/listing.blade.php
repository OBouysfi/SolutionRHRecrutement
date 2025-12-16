@extends('layouts.master')

@section('title',  __('generated.HumanJobs - Liste des clients'))

@section('css_header')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    <style>
        .td-left-align{
            text-align: left !important;
            padding: 8px 10px !important;
        }
        .dataTables_wrapper .dataTables_info {
            margin: 10px 0px;
        }

        .footable-paging-external.footable-paging-right{
            padding: 10px 0px;
        }

        .title:after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            height: 3px;
            border-radius: 2px;
            width: 25px;
            display: block;
            background-color: #005dc7 !important;
        }


        .icons_div {
            height: 50px !important;
            margin-top: auto;
            margin-bottom: auto;
            margin-right: -24px;
            display: flex;
            justify-content: flex-end;
        }

        tr th {
            text-align: center
        }
        table.dataTable thead th, table.dataTable thead td {
            border-color: #e9e9e9 !important;
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row mb-4" style="padding: 20px 5px;">
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
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
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
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>

                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}"
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Liste des clients") }}</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body filter-block">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group check-valid is-valid">
                                                        <div id="country-selector"
                                                        class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-radius: 8px !important;">
                                                        <label >{{ __("generated.Pays") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-pays">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ __($country->id) }}"
                                                                    data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png">
                                                                    {{ __($country->name) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>


                                                </div>
                                                <div class="col">
                                                    <div class="form-group check-valid is-valid">
                                                         <div id="city-selector"
                                                        class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-radius: 8px !important;">
                                                        <label >{{ __("generated.Ville") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-ville">
                                                            <option value="Tous"  selected>{{ __("generated.Tous") }}</option>
                                                            @if (isset($cities))
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id ?? '' }}"
                                                                        data-country="{{ $city->country?->id ?? '' }}">
                                                                        {{ __($city->name ?? '_') }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="form-group check-valid is-valid">
                                                         <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-radius: 8px !important;">
                                                        <label >{{ __("generated.Client") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-name">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($clients as $client)
                                                                <option value="{{ __($client->id) }}">
                                                                    {{ __($client->name ?? ' - ') }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-radius: 8px !important;">
                                                        <label >{{ __("generated.Secteur d'activité") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-activity_area">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($activityArea as $activityarea)
                                                                <option value="{{ __($activityarea->id) }}">
                                                                    {{ __($activityarea->label) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="form-group  check-valid is-valid">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-radius: 8px !important;">
                                                        <label >{{ __("generated.Missions en cours") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-status_job_offer">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($statusJobOfferEnum as $key => $value)
                                                                <option value="{{ $key }}">
                                                                    {{ __($value) }}
                                                                </option>
                                                            @endforeach
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

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body bg-gradient-theme-light">
                                            <div class="row justify-content-center align-items-center">
                                                <!-- Ajout de align-items-center pour aligner verticalement -->
                                                <!-- Titre CVthèque -->
                                                <div class="col-auto"> <!-- Utilisation de col-auto pour le titre -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="">{{ __('generated.Clients') }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Icônes et sélecteur -->
                                                <div class="col-auto ms-auto">
                                                    <div class="row">
                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                             data-bs-placement="top" title="{{ __("generated.Partager") }}"
                                                             style="margin-right: -15px;">
                                                            <div class="avatar avatar-50 rounded bg-light-theme">
                                                                <a href="#" type="button" data-bs-toggle="modal"
                                                                   data-bs-target="#emailcompose">
                                                                    <i
                                                                        class="bi bi-share avatar icon-bw  rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                             data-bs-placement="top" title="{{ __("generated.Télécharger") }}"
                                                             id="downloadExcel" style="margin-right: -15px;">
                                                            <div class="avatar avatar-50 rounded bg-light-theme">
                                                                <a href="#" type="button">
                                                                    <i
                                                                        class="bi bi-cloud-download avatar icon-bw  rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                             data-bs-placement="top" title="{{ __("generated.Imprimer") }}"
                                                             style="margin-right: -15px;">
                                                            <div class="avatar avatar-50 rounded bg-light-theme ">
                                                                <a href="#" onclick="printSection()"
                                                                   data-format="A4">
                                                                    <i
                                                                        class="bi bi-printer avatar icon-bw  rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col col-4 col-md-2" data-bs-toggle="tooltip"
                                                             data-bs-placement="top" title="{{ __("generated.pagination") }}">
                                                            <div
                                                                class="avatar avatar-50 rounded bg-light-theme select-avatar">
                                                                <select id="customLength"
                                                                        style="border: 0;background-color: transparent;width: 49px;color: var(--adminux-theme); display: block !important;">
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


            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 ">
                                        <div class="card-header bg-gradient-theme-light ">
                                            <div class="row align-items-center">

                                                <div class="col-auto">
                                                    <h5 >{{ __("generated.Liste des clients") }}</h5>
                                                </div>

                                                <div class="col-12 col-md-3 mt-2 mt-md-0 ms-auto">
                                                    <div class="input-group searchbar-full">
                                                                <span class="input-group-text text-theme">
                                                                    <i class="bi bi-search"></i>
                                                                </span>
                                                        <input type="text" class="form-control form-control-sm"
                                                               id="customSearchBox" placeholder="Recherche...">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12" style="overflow: hidden;overflow-x: scroll;">
                                                    <table style="width: 3105px;border-collapse:collapse"
                                                        class="table offres-table" data-show-toggle="true"
                                                        id="clientTable">
                                                        <thead
                                                            style="font-size: 13px;border-top: 1px solid #e9e9e9 !important;">

                                                            <tr>
                                                                <th colspan="10" style="text-align:center;"
                                                                    >{{ __("generated.Coordonnées") }}</th>
                                                                <th colspan="6" style="text-align:center;"
                                                                    >{{ __("generated.Infos fiscales") }}</th>
                                                                <th colspan="3" style="text-align:center;"
                                                                    >{{ __("generated.Contacts") }}</th>
                                                                <th style="font-weight: 600; text-align: center; vertical-align: middle;"  rowspan="2" >{{ __("generated.Action") }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th style="font-weight: 600;">#</th>
                                                                <th style="font-weight: 600;text-align: center"
                                                                    >{{ __("generated.N° client") }}</th>
                                                                <th style="font-weight: 600;text-align: center"
                                                                    >{{ __("generated.Raison sociale") }}</th>
                                                                <th style="font-weight: 600;text-align: center"
                                                                    >{{ __("generated.Forme juridique") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.Régime fiscal") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.Secteur") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.Activité") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.Adresse") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.Code postal") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.Ville") }}</th>
                                                                <!-- 3 pour le Registre du Commerce -->
                                                                <th style="font-weight: 600;" >{{ __("generated.RC Numéro") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.RC Ville") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.RC Pays") }}</th>
                                                                <!-- ICE, IF, Taxe Pro -->
                                                                <th style="font-weight: 600;" >{{ __("generated.ICE") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.identifiant Fiscal") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.Taxe Pro") }}</th>
                                                                <!-- 3 pour contacts -->
                                                                <th style="font-weight: 600;" >{{ __("generated.Téléphone") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.Email") }}</th>
                                                                <th style="font-weight: 600;" >{{ __("generated.Site Web") }}</th>
<th></th>
                                                            </tr>

                                                        </thead>
                                                        <tbody
                                                            style="font-size: 13px; vertical-align: middle;text-align:center;">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mx-0 mb-3">
                                                <div class="col-6 ">

                                                </div>
                                                <div class="col-6 footable-paging-external footable-paging-right"
                                                    id="footable-pagination">
                                                    <div class="footable-pagination-wrapper">
                                                        <ul class="pagination">
                                                            <li class="footable-page-nav disabled" data-page="first"><a
                                                                    class="footable-page-link" href="#">«</a></li>
                                                            <li class="footable-page-nav disabled" data-page="prev"><a
                                                                    class="footable-page-link" href="#">‹</a></li>
                                                            <li class="footable-page visible active" data-page="1"><a
                                                                    class="footable-page-link" href="#">1</a></li>
                                                            <li class="footable-page visible" data-page="2"><a
                                                                    class="footable-page-link" href="#">2</a></li>
                                                            <li class="footable-page-nav" data-page="next"><a
                                                                    class="footable-page-link" href="#">›</a></li>
                                                            <li class="footable-page-nav" data-page="last"><a
                                                                    class="footable-page-link" href="#">»</a></li>
                                                        </ul>
                                                        <div class="divider"></div><span
                                                            class="label label-default ">{{ __("generated.1 sur 2") }}</span>
                                                    </div>
                                                </div>
                                            </div>
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

    <!-- page to print -->
    <div id="print-section" class="d-none">
        @include('client.print')
    </div>
    @include('profile.inc.translation')


    <!-- Modal Partager -->
    <div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Utilisation de modal-lg -->
            <div class="modal-content">
                <div class="modal-body p-4"> <!-- Ajout de padding pour un meilleur espacement -->
                    <h6 class="mb-4 text-center ">{{ __("generated.Envoyez un lien de cette page par email.") }}</h6>
                    <!-- Formulaire pour envoyer l'email -->
                    <form action="{{ route('send.share.email') }}" method="POST">
                        @csrf
                        <input type="hidden" name="page_url" value="{{ url()->current() }}">
                        <input type="hidden" name="message" value="Voici le lien de la page que vous m'avez demandé :">

                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __("generated.À :") }}</label>
                            <input type="text" name="to" class="form-control translated_text"
                                placeholder="{{ __("generated.Entrez les adresses email") }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary">{{ __("generated.CC :") }}</label>
                            <input type="text" name="cc" class="form-control translated_text"
                                placeholder="{{ __("generated.Entrez les adresses en CC") }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary" >{{ __("generated.Objet :") }}</label>
                            <input type="text" name="subject" class="form-control translated_text"
                                placeholder="{{ __("generated.Entrez le sujet de l'email") }}" required>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button class="btn btn-link text-danger" type="button" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="bi bi-trash h4 me-2"></i><span >{{ __("generated.Annuler") }}</span>
                            </button>
                            <button class="btn btn-theme" type="submit">
                                <i class="bi bi-send me-2"></i><span >{{ __("generated.Envoyer") }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js_footer')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/js/client/listing.js') }}"></script>

    <script>
        var clientListingData = "{{ route('client.listing.data') }}";
        var apiClientDelete = "{{ route('api.client.delete', ['id' => 'id']) }}"
    </script>

    <script>
        //js for print
        window.printSection = function() {
            var printContent = document.getElementById('print-section').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();

            window.onafterprint = function() {
                document.body.innerHTML = originalContent;
                window.location.reload();
            };
        }


        //js for flags
        $(document).ready(function() {
            $('#country-select').select2({
                templateResult: function(state) {
                    if (!state.id) {
                        return state.text;
                    }
                    var imgUrl = $(state.element).data('image');
                    return $('<span><img src="' + imgUrl + '" width="20" /> ' + state.text + '</span>');
                },
                templateSelection: function(state) {
                    return $('<span><img src="' + $(state.element).data('image') + '" width="20" /> ' +
                        state.text + '</span>');
                }
            });
        });
    </script>

    <script>
        var exportUrl = '{{ route('exportClients') }}';

        $(document).on('click', '#downloadExcel', function(event) {
            event.preventDefault();
            Swal.fire({
                title: "{{ __('generated.Quel type de fichier souhaitez-vous ?') }}",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "{{ __('generated.Excel') }}",
                cancelButtonText: "{{ __('generated.Annuler') }}",
                showDenyButton: true,
                denyButtonText: "{{ __('generated.CSV') }}" ,
                focusCancel: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // L'utilisateur a choisi Excel
                    window.location.href = exportUrl + '?type=excel';
                } else if (result.isDenied) {
                    // L'utilisateur a choisi CSV
                    window.location.href = exportUrl + '?type=csv';
                }
            });
        });
    </script>

    @vite(['resources/js/client/listing.js'])
    @vite(['resources/js/profile/dateFillter.js'])

@endsection

    {{--                                                <div class="col-12 col-md-12 col-lg-2"> --}}
                                                {{--                                                    <div class="rounded border poste-chosen" --}}
                                                {{--                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;"> --}}
                                                {{--                                                        <label --}}
                                                {{--                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Statut --}}
                                                {{--                                                            du client</label> --}}
                                                {{--                                                        <select class="chosenoptgroup w-100" id="filter-site_web"> --}}
                                                {{--                                                            <option>Tous</option> --}}
                                                {{--                                                            @foreach ($clientSite as $clientsite) --}}
                                                {{--                                                                <option value="{{ __($clientsite->id) }}"> --}}
                                                {{--                                                                    {{ __($clientsite->site_name) }} --}}
                                                {{--                                                                </option> --}}
                                                {{--                                                            @endforeach --}}
                                                {{--                                                        </select> --}}
                                                {{--                                                    </div> --}}
                                                {{--                                                </div> --}}
