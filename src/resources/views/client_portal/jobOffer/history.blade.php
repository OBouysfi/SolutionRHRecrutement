@extends('client_portal.layouts.portal')

@section('title', 'Organisation')

@section('css_header')

@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Missions") }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>
                {{-- <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div> --}}
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
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
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Historique des offres d'emploi") }}</li>
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
                                                <div class="col-4 ">
                                                    <div id="country-selector"
                                                        class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label >{{ __("generated.Pays") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-pays">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($countries as $country)
                                                                <option class=" translated_text" value="{{ __($country->id) }}"
                                                                    data-image="https://flagcdn.com/20x15/{{ strtolower($country->code) }}.png">
                                                                    {{ __($country->name) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Cities -->
                                                <div class="col-4 ">
                                                    <div id="city-selector"
                                                        class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label >{{ __("generated.Ville") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-ville">
                                                            <option  value="Tous" selected>{{ __("generated.Tous") }}</option>
                                                            @if (isset($cities))
                                                                @foreach ($cities as $city)
                                                                    <option class=" translated_text"
                                                                        value="{{ $city->id ?? '' }}"
                                                                        data-country="{{ $city->country?->id ?? '' }}">
                                                                        {{ __($city->name ?? '_' )}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Missions en cours -->
                                                <div class="col-4 ">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label >{{ __("generated.Missions en cours") }}</label>
                                                        <select class="chosenoptgroup w-100" id="filter-status-jobOffre">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @foreach ($status_jobOffres as $key => $status_jobOffre)
                                                                <option class=" translated_text"
                                                                    value="{{ $key }}">
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
                                                            <h5 >{{ __("generated.Missions précédentes") }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Icônes et sélecteur -->
                                                <div class="col-auto ms-md-auto">
                                                    <!-- Utilisation de col-auto et ms-md-auto pour aligner à droite -->
                                                    <div class="row g-4 align-items-center">
                                                        <!-- Ajout de align-items-center pour aligner verticalement -->
                                                        <!-- Icône Aperçu -->
                                                        @can('profile-preview')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __("generated.Aperçu") }}">
                                                                    <a href="{{ route('jobOffer.previewHistory') }}"
                                                                        target="_blank">
                                                                        <i
                                                                            class="bi bi-binoculars avatar   rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan


                                                        @can('profile-export')
                                                            <!-- Icône Télécharger -->
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __("generated.Télécharger") }}" id="downloadExcel">
                                                                    <a href="{{ route('export.job.offers') }}"
                                                                        type="button">
                                                                        <i
                                                                            class="bi bi-cloud-download avatar   rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan

                                                        <!-- Icône Imprimer -->

                                                        @can('profile-print')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __("generated.Imprimer") }}">
                                                                    <a href="#" onclick="printSection()"
                                                                        data-format="A4">
                                                                        <i
                                                                            class="bi bi-printer avatar   rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        <!-- Sélecteur de longueur -->
                                                        <div class="col col-4 col-md-2" class=" translated_text"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="">
                                                            <div
                                                                class="avatar avatar-50 rounded bg-light-theme select-avatar">
                                                                <select id="customLength"
                                                                    style="border: 0;background-color: transparent;width: 49px;color: #005dc7; display: block !important;">
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
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="tab-content py-3" id="myTabContent">
                                                <!-- personal info tab-->
                                                <div class="tab-pane fade active show" id="personalB" role="tabpanel"
                                                    aria-labelledby="personalB-tab" style="padding: 0px 17px">
                                                    <div class="row mb-4">

                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <table
                                                                class="table table-mission table-responsive tous mission-history-table"
                                                                data-show-toggle="true" style="width: 100%;">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;text-align: center;">
                                                                    <tr>
                                                                        <th style="width: 78px;padding: 12px 8px;"
                                                                            >{{ __("generated.N°") }}</th>
                                                                        <th style="width: 186px;padding: 12px 8px;"
                                                                            >{{ __("generated.Client") }}</th>
                                                                        <th style="width: 111px;padding: 12px 8px;"
                                                                            >{{ __("generated.Date début") }}</th>
                                                                        <th style="width: 111px;padding: 12px 8px;"
                                                                            >{{ __("generated.Date fin") }}</th>
                                                                        <th style="padding: 12px 8px;width: 200px;"
                                                                            >{{ __("generated.Poste") }}</th>
                                                                        <th style="width: 83px;padding: 12px 8px;"
                                                                            >{{ __("generated.Durée") }}</th>
                                                                        <th style="text-align: center;width: 165px;padding: 12px 8px;"
                                                                            >{{ __("generated.Présélectionnés") }}</th>
                                                                        <th style="text-align: center;width: 133px;padding: 12px 8px;"
                                                                            >{{ __("generated.En entretien") }}</th>
                                                                        <th style="text-align: center;width: 128px;padding: 12px 8px;"
                                                                            >{{ __("generated.Retenus") }}</th>
                                                                        <th style="text-align: center;width: 136px;padding: 12px 8px;"
                                                                            >{{ __("generated.Embauchés") }}</th>
                                                                        <th style="text-align: center;width: 127px;padding: 12px 8px;"
                                                                            >{{ __("generated.Rejetés") }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px; text-align: center;">

                                                                </tbody>
                                                            </table>


                                                        </div>
                                                        <div class="row align-items-center mx-0 mb-4">
                                                            <div class="col-5 ">

                                                            </div>
                                                            <div class="col-7  footable-paging-external footable-paging-right"
                                                                id="footable-pagination">
                                                                <div class="footable-pagination-wrapper">
                                                                    <ul class="pagination">
                                                                        <li class="footable-page-nav disabled"
                                                                            data-page="first">
                                                                            <a class="footable-page-link"
                                                                                href="#">«</a>
                                                                        </li>
                                                                        <li class="footable-page-nav disabled"
                                                                            data-page="prev">
                                                                            <a class="footable-page-link"
                                                                                href="#">‹</a>
                                                                        </li>
                                                                        <li class="footable-page visible active"
                                                                            data-page="1"><a class="footable-page-link"
                                                                                href="#">1</a>
                                                                        </li>
                                                                        <li class="footable-page visible" data-page="2">
                                                                            <a class="footable-page-link"
                                                                                href="#">2</a>
                                                                        </li>
                                                                        <li class="footable-page-nav" data-page="next"><a
                                                                                class="footable-page-link"
                                                                                href="#">›</a>
                                                                        </li>
                                                                        <li class="footable-page-nav" data-page="last"><a
                                                                                class="footable-page-link"
                                                                                href="#">»</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="divider"></div><span
                                                                        class="label label-default">1
                                                                        <span >{{ __("generated.sur") }}</span> 2</span>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    {{-- <script src="{{ asset('assets/js/jobOffer/history.js') }}"></script> --}}
    @vite('resources/js/jobOffer/history.js')
    <script>
        var jobOfferHistoryData = "{{ route('client-portail.jobOffer.data.history') }}";
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
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            function addImagesToChosen() {
                $('.chosen-results li').each(function() {
                    var $chosenOption = $(this);
                    var index = $chosenOption.data('option-array-index');
                    var imageSrc = $('.Flag_Country option').eq(index).data('image');
                    if (imageSrc) {
                        if (!$chosenOption.find('img').length) {
                            $chosenOption.prepend('<img src="' + imageSrc + '" />');
                        }
                    }
                });
            }
            $('.Flag_Country').on('chosen:showing_dropdown', addImagesToChosen);
        });
    </script>
@endsection
