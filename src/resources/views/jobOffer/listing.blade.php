@extends('layouts.master')

@section('title', __('generated.HumanJobs - Offres d\'emploi'))

@section('css_header')@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Missions") }}</h5>
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
                        <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ __("generated.contact") }}">
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
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: black;">
                        <img src="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" alt=""
                            style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Offres d'emploi") }}</li>
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
                                            <div class="row p-1">
                                                  <!-- Countries -->
                                                <div class="col-12 col-md-4 col-lg-3 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select poste-chosen rounded border select-search"
                                                            style="border-radius: 8px !important;">
                                                            <label class="text-bw translated_text">{{ __("generated.Pays") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-pays">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country->id }}" class="translated_text"
                                                                        data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png">
                                                                        {{ __($country->name) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Cities -->
                                                <div class="col-12 col-md-4 col-lg-3 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select poste-chosen rounded border select-search"
                                                            style="border-radius: 8px !important;">
                                                            <label class="text-bw translated_text">{{ __("generated.Ville") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-ville">
                                                                <option value="Tous" selected class="translated_text">{{ __("generated.Tous") }}</option>
                                                                @if (isset($cities))
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city->id ?? '' }}" class="translated_text"
                                                                            data-country="{{ $city->country?->id ?? '' }}">
                                                                            {{ __($city->name ?? '_' )}}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Client -->
                                                <div class="col-12 col-md-4 col-lg-2 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select poste-chosen rounded border select-search"
                                                            style="border-radius: 8px !important;">
                                                            <label class="text-bw translated_text">{{ __("generated.Client") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-client">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @foreach ($clients as $client)
                                                                    <option value="{{ $client->id }}" class="translated_text">
                                                                        {{ $client->name ?? ' - ' }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>



                                                <!-- Secteur d’activité -->
                                                <div class="col-12 col-md-6 col-lg-2">
                                                            <div class="form-group check-valid is-valid">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label >{{ __("generated.Secteur d’activité") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-diploma">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($diplomas as $diploma)
                                                                <option value="{{ __($diploma->id) }}"
                                                                    class=" translated_text">{{ __($diploma->label) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>

                                                <!-- Missions en cours -->
                                                <div class="col-12 col-md-6 col-lg-2">
                                                    <div class="form-group check-valid is-valid">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label >{{ __("generated.Missions en cours") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-status-jobOffre">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($status_jobOffres as $key => $status_jobOffre)
                                                                <option value="{{ $key }}"
                                                                    class=" translated_text">
                                                                    {{ $status_jobOffre ?? ' - ' }}
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

            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        {{-- <div class="card-header bg-gradient-theme-light">
                                            <h6 class="fw-medium mb-0 translated_text">Offres d'emploi</h5>
                                        </div> --}}

                                        <div class="card-header bg-gradient-theme-light">
                                            <div class="row justify-content-center align-items-center">
                                                <!-- Titre -->
                                                <div class="col-12 col-md-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="fw-medium mb-0 ">{{ __("generated.Offres d'emploi") }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Icônes -->
                                                <div class="col-12 col-md-8 ms-md-auto">
                                                    <div class="row g-2 justify-content-end align-items-center">
                                                        <!-- Icône Aperçu -->
                                                        @can('mission-preview')
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ __("generated.Aperçu") }}">
                                                                <a href="{{ route('jobOffer.preview') }}"
                                                                    target="_blank">
                                                                    <i
                                                                        class="bi bi-binoculars avatar icon-bw rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        @endcan

                                                        <!-- Icône Partager -->
                                                        @can('mission-share')
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ __("generated.Partager") }}">
                                                                <a href="#" type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#emailcompose">
                                                                    <i class="bi bi-share avatar icon-bw rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        @endcan
                                                        <!-- Icône Télécharger -->
                                                        @can('mission-download')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __("generated.Télécharger") }}" id="downloadExcel">
                                                                    <a href="#" type="button">
                                                                        <i class="bi bi-cloud-download avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan

                                                        <!-- Icône Imprimer -->
                                                        @can('mission-print')
                                                            <div class="col-auto" data-bs-toggle="tooltip translated_text"
                                                                data-bs-placement="top" title="{{ __("generated.Imprimer") }}">
                                                                <div class="avatar avatar-50 rounded bg-light-theme text-bw"
                                                                    target="_blank" onclick="printSection()">
                                                                    <i class="bi bi-printer avatar icon-bw rounded h5"></i>
                                                                </div>
                                                            </div>
                                                        @endcan

                                                        <div class="col-auto">
                                                            <div class="select-avatar avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                                <select id="customLength" style="border: 0;background-color: transparent; color: var(--adminux-theme); ;width: 49px;">
                                                                    <option selected="">10</option>
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

                                        <div class="card-body">
                                            <!-- Ajout de la classe table-responsive pour permettre le défilement horizontal -->
                                            <div class="table-responsive">
                                                <table class="table offres-table" data-show-toggle="true" id="missionTable" style="width: 100%;border-collapse:collapse">
                                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;text-align: center;">
                                                        <tr style="vertical-align: middle;">
                                                            <th rowspan="2" >#</th>
                                                            <th rowspan="2" >{{ __("generated.N° client") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Client") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Intitulé de la mission") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Type de contrat") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Localisation") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Formation") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Expérience") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Nombre de Profils") }}</th>
                                                            <th colspan="2" >{{ __("generated.Période de l'offre") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Statut") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Action") }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-weight: 600" >{{ __("generated.Date de début") }}</th>
                                                            <th style="font-weight: 600" >{{ __("generated.Date de fin") }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody
                                                        style="font-size: 13px;vertical-align: middle;text-align: center;">
                                                    </tbody>
                                                </table>
                                            </div>

                                            {{-- <div class="row align-items-center mx-0 m-2">
                                                <div class="col-12 col-md-6"></div>
                                                <div class="col-12 col-md-6 footable-paging-external footable-paging-right text-center text-md-end" id="footable-pagination">
                                                    <div class="footable-pagination-wrapper d-inline-block d-md-flex justify-content-md-end overflow-auto">
                                                        <ul class="pagination mb-2 mb-md-0">
                                                            <li class="footable-page-nav disabled translated_text" data-page="first"><a class="footable-page-link" href="#">«</a></li>
                                                            <li class="footable-page-nav disabled translated_text" data-page="prev"><a class="footable-page-link" href="#">‹</a></li>
                                                            <li class="footable-page visible active" data-page="1"><a class="footable-page-link" href="#">1</a></li>
                                                            <li class="footable-page visible" data-page="2"><a class="footable-page-link" href="#">2</a></li>
                                                            <li class="footable-page-nav" data-page="next"><a class="footable-page-link" href="#">›</a></li>
                                                            <li class="footable-page-nav" data-page="last"><a class="footable-page-link" href="#">»</a></li>
                                                        </ul>
                                                        <div class="divider d-none d-md-block mx-2"></div>
                                                        <span class="label label-default d-block d-md-inline ">{{ __("generated.1 sur 2") }}</span>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="row align-items-center mx-0 mb-3">
                                                <div class="col-6"></div>
                                                <div class="col-6 footable-paging-external footable-paging-right mt-3"
                                                    id="footable-pagination">
                                                    <div class="footable-pagination-wrapper">
                                                        <ul class="pagination"></ul>
                                                        <div class="divider"></div>
                                                        <span class="label label-default">1 <span
                                                                >{{ __("generated.sur") }}</span> 1</span>
                                                    </div>
                                                </div>
                                            </div>

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
    <div id="print-section" class="d-none">
        @include('jobOffer.inc.print')
    </div>
    @include('translation')
@endsection

<!-- Ajouter l'inclusion du modal pour le changement de statut -->
{{-- @include('jobOffer.inc.ModalStatusAnnuler') --}}

    @section('js_footer')
    @include('jobOffer.inc.share')


    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    {{-- <script src="{{ asset('assets/js/jobOffer/listing.js') }}"></script> --}}
    <script>
        var jobOfferListingData = "{{ route('jobOffer.listing.data') }}";
    </script>

    @vite(['resources/js/jobOffer/listing.js', 'resources/js/jobOffer/confirmeStatusAnnuler.js'])
    @vite(['resources/js/profile/dateFillter.js'])

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: window.translations.confirmation_question,
                text: window.translations.irreversible_action,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: window.translations.confirm_delete,
                cancelButtonText: window.translations.cancel,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("delete-form-" + id).submit();
                }
            });
        }
    </script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    title: "Succès !",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
            @endif
        });
    </script> --}}

    @if (session('success_delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: window.translations.success_ats,
                text: window.translations.succes_offre_emploi_delete,
                confirmButtonColor: '#3085d6',
                confirmButtonText: window.translations.OKconfirm,
            });
        </script>
    @endif

    {{-- star export excel --}}
    <script>
        var exportUrl = '{{ route('export_excel_jobOffre') }}';

        $(document).on('click', '#downloadExcel', function(event) {
            event.preventDefault();
            Swal.fire({
                title: "{{ __('generated.Quel type de fichier souhaitez-vous ?') }}",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "{{ __('generated.Excel') }}",
                cancelButtonText: "{{ __('generated.Annuler') }}",
                showDenyButton: true,
                denyButtonText: "CSV",
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

    <script>
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
    </script>

@endsection
